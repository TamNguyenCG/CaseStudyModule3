<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function formCheckout(): Factory|View|Application
    {
        return view('checkout.form');
    }

    public function show()
    {

    }
}
