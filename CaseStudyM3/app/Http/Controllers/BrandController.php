<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function getAllBrand(): Factory|View|Application
    {
       $brands = Brand::all();
       return view('admin.brands.list',compact('brands'));
    }

    public function create(): Factory|View|Application
    {
        return view('admin.brands.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $brand = new Brand();
        $file = $request->file('brand_logo');
        $brand->name = $request->input('brand_name');

        if(!$request->hasFile('brand_logo')){
            $brand->image = $file;
        }else{
            $logo = $file->getClientOriginalName();
            $image = date('Y-m-d H:i:s'). '-' . $logo;
            $request->file('brand_logo')->storeAs('public/image',$image);
            $brand->image = $image;
        }
        $brand->save();
        toastr()->success('Add new brand success !');
        return redirect()->route('admin.brands');
    }

    public function edit($id): Factory|View|Application
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit',compact('brand'));
    }

    public function update(Request $request,$id)
    {
        $brand = Brand::findOrFail($id);
        $brand->name = $request->input('brand_name');
        $originalLogo= $brand->image;
        $file = $request->file('brand_logo');
        if (!$request->hasFile('brand_logo')) {
            $brand->image = $originalLogo;
        } else {
            $fileName = $file->getClientOriginalName();
            $image = date('Y-m-d H:i:s') . '-' . $fileName;
            $request->file('brand_logo')->storeAs('public/image', $image);
            $brand->image = $image;
        }
        $brand->save();
        toastr()->success('Edit brand success !');
        return redirect()->route('admin.brands');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        for ($i = 0;$i < count($id) ;$i++){
            $brand = Brand::findOrFail($id[$i]);
            $brand->delete();
        }
    }
}
