<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/',[HomeController::class,'home']);

Route::get('/dashboard',[HomeController::class,'login_home'])
->middleware(['auth'])->name('dashboard');
Route::get('myorders', [HomeController::class, 'myorders'])
->middleware(['auth']);


require __DIR__.'/auth.php';


route::get('admin/dashboard',[HomeController::class,'index']);
route::get('view_category',[AdminController::class,'view_category']);
route::post('add_category',[AdminController::class,'add_category']);
route::get('delete_category/{id}',[AdminController::class,'delete_category']);
route::get('edit_category/{id}',[AdminController::class,'edit_category']);
route::post('update_category/{id}',[AdminController::class,'update_category']);
route::get('add_product',[AdminController::class,'add_product']);
route::post('upload_product',[AdminController::class,'upload_product']);
route::get('view_product',[AdminController::class,'view_product']);
route::get('delete_product/{id}',[AdminController::class,'delete_product']);
route::get('update_product/{id}',[AdminController::class,'update_product']);
route::post('edit_product/{id}',[AdminController::class,'edit_product']);
// route::get('product_search',[AdminController::class,'product_search']);
route::get('product_details/{id}',[HomeController::class,'product_details']);
route::get('add_cart/{id}',[HomeController::class,'add_cart'])
->middleware(['auth']);
route::get('mycart',[HomeController::class,'mycart'])
->middleware(['auth']);
Route::get('/delete_cart/{id}', [HomeController::class, 'delete_cart'])->name('delete_cart');
Route::post('confirm_order', [HomeController::class, 'confirm_order'])
->middleware(['auth']);
Route::get('view_orders', [AdminController::class, 'view_orders'])
->middleware(['auth']);
Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])
->middleware(['auth']);
Route::get('delivered/{id}', [AdminController::class, 'delivered'])
->middleware(['auth']);
Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])
->middleware(['auth']);
