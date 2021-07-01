<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Style;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    public function menProduct(): Factory|View|Application
    {
        $menproducts = Product::where('style_id', 1)->paginate(5);
        $styles = Style::all();
        return view('styles.men', compact('menproducts','styles'));
    }

    public function womenProduct(): Factory|View|Application
    {
        $womenproducts = Product::where('style_id', 2)->paginate(5);
        $styles = Style::all();
        return view('styles.women', compact('womenproducts', 'styles'));
    }
}
