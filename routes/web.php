<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\OrderController;
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

Route::get('/',[FrontendController::class , 'index']);
Route::get('category',[FrontendController::class , 'category']);
Route::get('view-category/{slug}', [FrontendController::class , 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class , 'productview']);

Auth::routes();

Route::get('/home', [FrontendController::class, 'index']);
Route::post('add-to-cart', [CartController::class,'addProduct']);
Route::post('delete-cart-item',[CartController::class,'deleteproduct'] );
Route::post('update-cart',[CartController::class,'updatecart']);

Route::middleware(['auth'])->group(function(){
       Route::get('cart', [CartController::class, 'viewCart']);
       Route::get('checkout', [CheckoutController::class, 'index']);
       Route::post('place-order',[CheckoutController::class, 'placeorder']);
});

 Route::middleware(['auth', 'isAdmin'])->group(function(){
        Route::get('/dashboard','App\Http\Controllers\Admin\FrontendController@index');

        //category
        Route::get('categories','App\Http\Controllers\Admin\CategoryController@index');
        Route::get('add-category','App\Http\Controllers\Admin\CategoryController@add');
        Route::post('insert-category','App\Http\Controllers\Admin\CategoryController@insert');
        Route::get('edit-category/{id}', [CategoryController::class, 'edit']); 
        Route::put('update-category/{id}',[CategoryController::class, 'update']);
        Route::get('delete-category/{id}',[CategoryController::class, 'destroy']);

        //product
        Route::get('products', [ProductController::class, 'index']);
        Route::get('add-product', [ProductController::class, 'add']);
        Route::post('insert-product', [ProductController::class, 'insert']);
        Route::get('edit-product/{id}', [ProductController::class, 'edit']);
        Route::put('update-product/{id}',[ProductController::class, 'update']);
        Route::get('delete-product/{id}', [ProductController::class, 'destroy']);


        
 });

