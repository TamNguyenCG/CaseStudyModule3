<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::prefix('shop')->group(function (){
    Route::get('/', [ProductController::class, 'getAllProduct'])->name('products.shop');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/create', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
    Route::post('/{id}/edit',[ProductController::class,'update'])->name('products.update');
    Route::get('/{id}/delete',[ProductController::class,'delete'])->name('products.destroy');
    Route::get('/{id}/detail',[ProductController::class,'detail'])->name('products.detail');
    Route::get('style/men',[StyleController::class,'menProduct'])->name('products.men');
    Route::get('style/women',[StyleController::class,'womenProduct'])->name('products.women');
    Route::get('/search',[ProductController::class,'search'])->name('products.search');
});
Route::prefix('users')->group(function (){
    Route::get('/login',[AuthController::class,'login'])->name('users.login');
    Route::post('/login',[AuthController::class,'confirmLogin'])->name('users.confirm');
    Route::get('/register',[UserController::class,'register'])->name('users.register');
    Route::post('/register',[UserController::class,'confirmRegister'])->name('users.confirmRegister');
    Route::get('/logout',[AuthController::class,'logout'])->name('users.logout');
});

Route::prefix('/category')->group(function (){
    Route::get('/filter',[ProductController::class, 'getProductByCategoryId'])->name('category.filter');
    Route::get('/style',[ProductController::class,'getProductByStyleId'])->name('style.filter');
});
