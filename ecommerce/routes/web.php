<?php

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
    // return view('layouts.app');
    return redirect()->route('home');
});




Auth::routes();

//Admin Routes
Route::group(['prefix' => 'admin'], function () {
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'admin'])->name('Admin.dashboard');
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
Route::resource('product', App\Http\Controllers\Admin\ProductController::class);

});


//User Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('category1', App\Http\Controllers\User\CategoryController::class);
Route::resource('subcategory', App\Http\Controllers\User\subCategoryController::class);


// Route::get('/', [App\Http\Controllers\User\ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [App\Http\Controllers\User\CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [App\Http\Controllers\User\CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [App\Http\Controllers\User\CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [App\Http\Controllers\User\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [App\Http\Controllers\User\CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('stripe', [App\Http\Controllers\Admin\StripeController::class, 'stripePost'])->name('stripe.post');

