<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(): Factory|View|Application
    {
        return view('login.login');
    }

    public function confirmLogin(Request $request): RedirectResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $data = [
            'email' => $email,
            'password'=>$password
        ];

        if(!Auth::attempt($data)){
            session()->flash('login-error',"Username or Password is incorrect !!!");
            return redirect()->route('users.login');
        }
        return redirect()->route('homepage');
    }
}
