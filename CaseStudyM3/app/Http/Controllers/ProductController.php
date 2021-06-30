<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Style;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function getAllProduct(): Factory|View|Application
    {
        $allproducts = Product::paginate(3);
        $categories = Category::all();
        return view('products.shop', compact('allproducts', 'categories'));
    }

    public function create(): Factory|View|Application
    {
        $categories = Category::all();
        $brands = Brand::all();
        $styles = Style::all();
        return view('products.create', compact('categories', 'brands', 'styles'));
    }


    public function store(Request $request): RedirectResponse
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->color = $request->input('color');
        $product->price = $request->input('price');
        $product->stocks = $request->input('stocks');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->style_id = $request->input('style_id');
        $file = $request->file('image');
        if (!$request->hasFile('image')) {
            $product->image = $file;
            if (!$request->file('image')->getSize()) {
                $message = 'The image is over size';
                Session::flash('image_fail', $message);
                return redirect()->route('products.create');
            }
        } else {
            $fileName = $file->getClientOriginalName();
            $image = date('Y-m-d H:i:s') . '-' . $fileName;
            $request->file('image')->storeAs('public/image', $image);
            $product->image = $image;
        }
        $product->description = $request->input('description');
        $product->save();
        Session::flash('success', 'Save new product success !');
        return redirect()->route('products.shop');
    }

    public function delete($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        if (!empty($product->image)) {
            unlink('storage/image/' . $product->image);
        }
        $product->delete();
        Session::flash('warning', 'delete success');
        return redirect()->route('products.shop');
    }

    public function edit($id): Factory|View|Application
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $styles = Style::all();
        return view('products.edit', compact('product', 'categories', 'brands', 'styles'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->color = $request->input('color');
        $product->price = $request->input('price');
        $product->stocks = $request->input('stocks');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->style_id = $request->input('style_id');
        $original = $product->image;
        $file = $request->file('image');
        if (!$request->hasFile('image')) {
            $product->image = $original;
        } else {
            $fileName = $file->getClientOriginalName();
            $image = date('Y-m-d H:i:s') . '-' . $fileName;
            $request->file('image')->storeAs('public/image', $image);
            $product->image = $image;
        }
        $product->description = $request->input('description');
        $product->save();
        Session::flash('success', 'Edit product success !');
        return redirect()->route('products.shop');
    }

    public function detail($id): Factory|View|Application
    {
        $product = Product::findOrFail($id);
        $productKey = $product->name;
        if (!Session::has($productKey)) {
            Product::where('id', $id)->increment('view_count');
            Session::put($productKey, 1);
        }
        $categories = Category::all();
        $brands = Brand::all();
        $styles = Style::all();
        return view('products.detail', compact('product', 'categories', 'brands', 'styles'));
    }

    public function menProduct(): Factory|View|Application
    {
        $menproducts = Product::where('style_id', 1)->paginate(5);
        $styles = Style::all();
        return view('styles.men', compact('menproducts', 'styles'));
    }

    public function womenProduct(): Factory|View|Application
    {
        $womenproducts = Product::where('style_id', 2)->paginate(5);
        $styles = Style::all();
        return view('styles.women', compact('womenproducts', 'styles'));
    }

    public function search(Request $request): JsonResponse
    {

        $keyword = $request->keyword;
        $products = Product::with('category')->where('name', 'LIKE', '%' . $keyword . '%')->get();
        return response()->json($products);

    }
}
