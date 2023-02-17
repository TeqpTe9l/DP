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

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/contact', [App\Http\Controllers\MainController::class, 'contact'])->name('contact');
Route::get('/category/{cat}/{product_id}', [App\Http\Controllers\ProductController::class, 'show'])->name('showProduct');
Route::get('/category/{cat}', [App\Http\Controllers\ProductController::class, 'showCategory'])->name('showCategory');
Route::get('/cart',[App\Http\Controllers\MainController::class, 'index'])->middleware(['auth', 'verified'])->name('cart');
Route::post('/cart/create', [App\Http\Controllers\MainController::class,'create'])->middleware(['auth', 'verified'])->name('cart.create');
Route::delete('/cart/destroy/{id}', [App\Http\Controllers\MainController::class,'destroy'])->middleware(['auth', 'verified'])->name('cart.destroy');
Route::post('/cart/plus/{id}', [App\Http\Controllers\MainController::class,'plus'])->middleware(['auth', 'verified'])->name('cart.plus');
Route::post('/cart/minus/{id}', [App\Http\Controllers\MainController::class,'minus'])->middleware(['auth', 'verified'])->name('cart.minus');
Route::get('/cart/clear', [App\Http\Controllers\MainController::class, 'clear'])->name('cart.clear');;
Route::get('/checkout', [App\Http\Controllers\MainController::class, 'checkout'])->name('checkout');

Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
   
   Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_index');
   Route::get('/calendar', [App\Http\Controllers\Admin\HomeController::class, 'calendar'])->name('admin_calendar');

   Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'productTable'])->name('admin_productTable');
   Route::get('/product_details/{id}', [App\Http\Controllers\Admin\ProductController::class, 'productDetails'])->name('admin_productDetails');
   Route::get('/product_delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'productDelete'])->name('admin_productDelete');
   Route::get('/product_create',[App\Http\Controllers\Admin\ProductController::class, 'productCreate'])->name('admin_productCreate');
   Route::post('/product_create',[App\Http\Controllers\Admin\ProductController::class, 'productAdd'])->name('admin_productAdd');
   Route::get('/product_edit/{id}',[App\Http\Controllers\Admin\ProductController::class, 'productEdit'])->name('admin_productEdit');
   Route::post('/product_edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'productUp'])->name('admin_productUp');

   Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'categoryTable'])->name('admin_categoryTable');
   Route::get('/category_details/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'categoryDetails'])->name('admin_categoryDetails');
   Route::get('/category_delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'categoryDelete'])->name('admin_categoryDelete');
   Route::get('/category_create',[App\Http\Controllers\Admin\CategoryController::class, 'categoryCreate'])->name('admin_categoryCreate');
   Route::post('/category_create',[App\Http\Controllers\Admin\CategoryController::class, 'categoryAdd'])->name('admin_categoryAdd');
   Route::get('/category_edit/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'categoryEdit'])->name('admin_categoryEdit');
   Route::post('/category_edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'categoryUp'])->name('admin_categoryUp');

   Route::get('/suppliers', [App\Http\Controllers\Admin\SuppliersController::class, 'suppliersTable'])->name('admin_suppliersTable');
   Route::get('/suppliers_details/{id}', [App\Http\Controllers\Admin\SuppliersController::class, 'suppliersDetails'])->name('admin_suppliersDetails');
   Route::get('/suppliers_delete/{id}', [App\Http\Controllers\Admin\SuppliersController::class, 'suppliersDelete'])->name('admin_suppliersDelete');
   Route::get('/suppliers_create',[App\Http\Controllers\Admin\SuppliersController::class, 'suppliersCreate'])->name('admin_suppliersCreate');
   Route::post('/suppliers_create',[App\Http\Controllers\Admin\SuppliersController::class, 'suppliersAdd'])->name('admin_suppliersAdd');
   Route::get('/suppliers_edit/{id}',[App\Http\Controllers\Admin\SuppliersController::class, 'suppliersEdit'])->name('admin_suppliersEdit');
   Route::post('/suppliers_edit/{id}', [App\Http\Controllers\Admin\SuppliersController::class, 'suppliersUp'])->name('admin_suppliersUp');

   Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'userTable'])->name('admin_userTable');
   Route::get('/user_delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'userDelete'])->name('admin_userDelete');

   Route::get('/model_has_roles', [App\Http\Controllers\Admin\model_has_rolesController::class, 'model_has_rolesTable'])->name('admin_model_has_rolesTable');
   Route::get('/model_has_roles_edit/{model_id}',[App\Http\Controllers\Admin\model_has_rolesController::class, 'model_has_rolesEdit'])->name('admin_model_has_rolesEdit');
   Route::post('/model_has_roles_edit/{model_id}', [App\Http\Controllers\Admin\model_has_rolesController::class, 'model_has_rolesUp'])->name('admin_model_has_rolesUp');
});