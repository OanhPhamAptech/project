<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admincontroller;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
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

//
// Page Shop product
// --------------------------------------------------------------------------
Route::get('/', HomeComponent::class);
Route::get('/index', HomeComponent::class);
Route::get('/shop', ShopComponent::class);
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class);


Route::get('/admin', [App\Http\Controllers\admincontroller::class, 'showproduct'])->middleware('CheckLogin')->name('showproduct');
// authenticate user login
Auth::routes();

// controller cho sản phẩm 
//reconfirm password 
Route::middleware('password.confirm')->get('/admin', [App\Http\Controllers\admincontroller::class, 'showproduct'])->name('showproduct');
//select product detail 
Route::get('admin/product_detail/{id}',[App\Http\Controllers\admincontroller::class, 'product_detail'])->name('product.detail');
// add product
Route::get('admin/add_prodduct',[App\Http\Controllers\admincontroller::class, 'add_product'])->name('add.product');
//lưu thông tin product added
Route::patch('/admin/add_product', [App\Http\Controllers\admincontroller::class, 'store_product'])->name('store.product');
//add size 
Route::get('admin/add_size/{id}',[App\Http\Controllers\admincontroller::class, 'add_size'])->name('add.size');
//lưu size mới
Route::patch('/admin/add_size/{id}', [App\Http\Controllers\admincontroller::class, 'store_size'])->name('store.size');
//add color
Route::get('admin/add_color/sizeid={id}',[App\Http\Controllers\admincontroller::class, 'add_color'])->name('add.color');
//lưu color mới
Route::patch('/admin/add_color/sizeid={id}', [App\Http\Controllers\admincontroller::class, 'store_color'])->name('store.color');
//edit product
Route::get('admin/edit_product/productid={id}',[App\Http\Controllers\admincontroller::class, 'edit_product'])->name('edit.product');
//save edited product
Route::post('admin/edit_product/productid={id}',[App\Http\Controllers\admincontroller::class, 'store_edit_product'])->name('store.edit.product');
//edit size product
Route::get('admin/edit_size/colorid={id}',[App\Http\Controllers\admincontroller::class, 'edit_size'])->name('edit.size');
//lưu edit size
Route::patch('admin/edit_size/colorid={id}',[App\Http\Controllers\admincontroller::class, 'store_edit_size'])->name('store.edit.size');
//xóa thông tin dòng color
Route::delete('admin/delete_color/colorid={id}',[App\Http\Controllers\admincontroller::class, 'delete_color']);
//xóa thông tin 1 sản phâm
Route::delete('admin/delete_product/productid={$id}',[App\Http\Controllers\admincontroller::class, 'delete_product']);





//controller cho order
//show order list
Route::get('/admin/order', [App\Http\Controllers\admincontroller::class, 'showorder'])->middleware('CheckLogin')->name('showorder');
// order detail
Route::get('/admin/order_detail', [App\Http\Controllers\admincontroller::class, 'showorder_detail']);



//controller cho user
//show user list, if level 1 -> can access
Route::get('/admin/user', [App\Http\Controllers\admincontroller::class, 'showuser'])->middleware('CheckLogin')->name('showuser');
//add user
Route::get('/admin/add_user', [App\Http\Controllers\admincontroller::class, 'adduser'])->middleware('CheckLogin')->name('add.user');
//lưu thông tin nhân viên mới
Route::patch('/admin/add_user', [App\Http\Controllers\admincontroller::class, 'storeuser'])->middleware('CheckLogin')->name('store.user');
// edit nhân viên
Route::get('/admin/edit_user/{id}', [App\Http\Controllers\admincontroller::class, 'edituser'])->middleware('CheckLogin')->name('edit.user');
// lưu thông tin edit nhân viên
Route::patch('/admin/edit_user/{id}', [App\Http\Controllers\admincontroller::class, 'store_edit_user'])->middleware('CheckLogin')->name('store.edit.user');
//Xóa thông tin nhân viên
Route::delete('/admin/delete_user/{id}', [App\Http\Controllers\admincontroller::class, 'delete_user'])->middleware('CheckLogin')->name('delete.user');


