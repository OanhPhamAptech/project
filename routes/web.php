<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admincontroller;

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

Route::get('/admin', [App\Http\Controllers\admincontroller::class, 'showproduct'])->middleware('CheckLogin')->name('showproduct');
// authenticate user login
Auth::routes();

//reconfirm password 
Route::middleware('password.confirm')->get('/admin', [App\Http\Controllers\admincontroller::class, 'showproduct'])->name('showproduct');
//select Category
Route::get('admin/selectCat',[App\Http\Controllers\admincontroller::class, 'selectCat']);
// add product
Route::get('admin/add_prodduct',[App\Http\Controllers\admincontroller::class, 'add_product'])->name('add.product');
//lưu thông tin product added
Route::patch('/admin/add_product', [App\Http\Controllers\admincontroller::class, 'store_product'])->name('store.product');

//show order list
Route::get('/admin/order', [App\Http\Controllers\admincontroller::class, 'showorder'])->middleware('CheckLogin')->name('showorder');
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

// order detail
Route::get('/admin/order_detail', [App\Http\Controllers\admincontroller::class, 'showorder_detail']);
