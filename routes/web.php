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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('admin.profile');
Route::post('/profile/store', [App\Http\Controllers\UserController::class, 'store_profile'])->name('profile.store');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/user/post', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::get('/test', [App\Http\Controllers\ScrapperController::class, 'test_scrap']);

Route::get('node-setting', [App\Http\Controllers\HomeController::class, 'node_setting'])->name('node_setting');
Route::put('node-setting/update/{id}', [App\Http\Controllers\HomeController::class, 'node_setting_update'])->name('node_setting.update');
Route::get('node-setting/delete/{id}', [App\Http\Controllers\HomeController::class, 'node_setting_delete'])->name('node_setting.delete');
Route::post('node-setting/store', [App\Http\Controllers\HomeController::class, 'node_setting_store'])->name('node_setting.store');


Route::get('scrapp-product', [App\Http\Controllers\ScrapperController::class, 'product_list'])->name('scrap_product');
Route::get('scrapp-product/delete/{id}', [App\Http\Controllers\ScrapperController::class, 'scrap_product_delete'])->name('scrap_product.delete');
Route::post('scrapp-product/store', [App\Http\Controllers\ScrapperController::class, 'scrapp'])->name('scrap_product.store');


