<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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
    Route::get('/{id}/detail',[ProductController::class,'detail'])->name('products.detail');
    Route::get('/search',[ProductController::class,'search'])->name('products.search');
    Route::get('/filter',[ProductController::class,'filter'])->name('products.filter');
    Route::get('/addCart',[ProductController::class,'addCart'])->name('products.addCart');
    Route::get('/showCart',[ProductController::class,'showCart'])->name('products.showCart');
    Route::get('/cartPlus',[ProductController::class,'cartPlus'])->name('products.cartPlus');
    Route::get('/cartMinus',[ProductController::class,'cartMinus'])->name('products.cartMinus');
    Route::get('/deleteCart',[ProductController::class,'deleteCart'])->name('products.deleteCart');
});

Route::prefix('users')->group(function (){
    Route::get('/login',[AuthController::class,'login'])->name('users.login');
    Route::post('/login',[AuthController::class,'confirmLogin'])->name('users.confirm');
    Route::get('/register',[UserController::class,'register'])->name('users.register');
    Route::post('/register',[UserController::class,'confirmRegister'])->name('users.confirmRegister');
    Route::get('/logout',[AuthController::class,'logout'])->name('users.logout');
});

Route::prefix('admin')->group(function (){
    Route::get('manager',[HomeController::class,'dashboard'])->name('admin.dashboard');

    Route::prefix('products')->group(function (){
        Route::get('/',[HomeController::class,'getAll'])->name('admin.products-list');
        Route::get('create', [ProductController::class, 'create'])->name('admin.product-create');
        Route::post('create', [ProductController::class, 'store'])->name('admin.product-store');
        Route::get('/{id}/edit',[ProductController::class,'edit'])->name('admin.product-edit');
        Route::post('/{id}/edit',[ProductController::class,'update'])->name('admin.product-update');
        Route::get('/destroy',[ProductController::class,'destroy'])->name('admin.product-destroy');
        Route::get('/search',[ProductController::class,'search'])->name('admin.search');
    });

    Route::prefix('category')->group(function (){
        Route::get('/',[CategoryController::class,'getAllCategory'])->name('admin.categories');
        Route::get('create', [CategoryController::class, 'create'])->name('admin.category-create');
        Route::post('create', [CategoryController::class, 'store'])->name('admin.category-store');
        Route::get('/{id}/edit',[CategoryController::class,'edit'])->name('admin.category-edit');
        Route::post('/{id}/edit',[CategoryController::class,'update'])->name('admin.category-update');
        Route::get('/destroy',[CategoryController::class,'destroy'])->name('admin.category-destroy');
    });

    Route::prefix('brand')->group(function (){
        Route::get('/',[BrandController::class,'getAllBrand'])->name('admin.brands');
        Route::get('create', [BrandController::class, 'create'])->name('admin.brand-create');
        Route::post('create', [BrandController::class, 'store'])->name('admin.brand-store');
        Route::get('/{id}/edit',[BrandController::class,'edit'])->name('admin.brand-edit');
        Route::post('/{id}/edit',[BrandController::class,'update'])->name('admin.brand-update');
        Route::get('/destroy',[BrandController::class,'destroy'])->name('admin.brand-destroy');
    });
});
