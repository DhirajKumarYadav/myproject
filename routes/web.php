<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;

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

Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
   Session::forget('dbdata');
    return view('login'); 
});

Route::view('register','register');
Route::post('check_login',[LoginController::class,'check_login']);
Route::post('register',[LoginController::class,'register']);
Route::get('/',[ProductController::class,'product']);
Route::get('detail/{id}',[ProductController::class,'detail']);
Route::get('search',[ProductController::class,'search']);
Route::post('add_to_cart',[ProductController::class,'addToCart']);
Route::get('cartlist',[ProductController::class,'cartlist']);
Route::get('removecart/{id}',[ProductController::class,'removeCart']);
// Route::get('removeorder/{id}',[ProductController::class,'removeOrder']);
Route::get('ordernow',[ProductController::class,'orderNow']);
Route::post('buynow',[ProductController::class,'buynow']);
Route::post('ordernew',[ProductController::class,'directOrder']);
Route::post('orderplace',[ProductController::class,'orderPlace']);
Route::post('dkorder',[ProductController::class,'dkorder']);
Route::get('myorders',[ProductController::class,'myOrders']);

Route::get('admin/products',[ProductController::class,'addProducts']);












