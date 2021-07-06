<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAllCategory(): Factory|View|Application
    {
        $categories = Category::all();
        return view('admin.list-category',compact('categories'));
    }
}
