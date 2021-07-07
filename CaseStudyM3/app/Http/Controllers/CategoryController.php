<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAllCategory(): Factory|View|Application
    {
        $categories = Category::all();
        return view('admin.categories.list',compact('categories'));
    }

    public function create(): Factory|View|Application
    {
        return view('admin.categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $category = new Category();
        $category->name = $request->input('category_name');
        $category->save();
        toastr()->success('Add new category success');
        return redirect()->route('admin.categories');
    }

    public function edit($id): Factory|View|Application
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request,$id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->name = $request->input('category_name');
        $category->save();
        toastr()->success('Edit category success!');
        return redirect()->route('admin.categories');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        for ($i = 0; $i < count($id); $i++) {
            $category = Category::findOrFail($id[$i]);
            $category->delete();
        }
    }
}
