<?php

use App\Http\Controllers\Admin\AttributesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Client\CategoryController as ClientCategoryController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Client\LoginController as ClientLoginController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/login', [LoginController::class, 'store']);


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('admin');

        #categories
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category');
            Route::get('/add', [CategoryController::class, 'create'])->name('menu_add');
            Route::post('/add', [CategoryController::class, 'store'])->name('menu_add_');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('menu_edit');
            Route::post('/edit/{id}', [CategoryController::class, 'update']);
            Route::post('/checkname', [CategoryController::class, 'checkName'])->name('menu_add_checkname');
            Route::delete('/delete/{id}', [CategoryController::class, 'destroy']);
        });
        #products
        Route::prefix('product')->group(function (){
            Route::get('/', [ProductController::class, 'index'])->name('product');
            Route::post('/add', [ProductController::class, 'store'])->name('product_add_');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product_edit');
            Route::post('/edit/{id}', [ProductController::class, 'update']);
            Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
        });
        #attributes
        Route::prefix('attributes')->group(function (){
            Route::get('/', [AttributesController::class, 'index'])->name('attributes');
            Route::post('/add', [AttributesController::class, 'store'])->name('attributes_add_');
            Route::get('/edit/{id}', [AttributesController::class, 'edit'])->name('attributes_edit');
            Route::post('/edit/{id}', [AttributesController::class, 'update']);
            Route::delete('/delete/{id}', [AttributesController::class, 'destroy']);
        });

        #customers
        Route::prefix('customer')->group(function (){
            Route::get('/', [CustomerController::class, 'index'])->name('customers');
            Route::post('/add', [CustomerController::class, 'store'])->name('customers_add_');
            Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customers_edit');
            Route::post('/edit/{id}', [CustomerController::class, 'update']);
            Route::delete('/delete/{id}', [CustomerController::class, 'destroy']);
        });
        #User
        Route::prefix('user')->group(function (){
            Route::get('/', [UserController::class, 'index'])->name('user');
            Route::post('/add', [UserController::class, 'store'])->name('user_add_');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user_edit');
            Route::post('/edit/{id}', [UserController::class, 'update']);
            Route::delete('/delete/{id}', [UserController::class, 'destroy']);
        });
    });
});

Route::get('/', [ClientHomeController::class, 'index'])->name('client_home');
Route::get('/shop', [ClientProductController::class, 'index'])->name('client_shop');
Route::get('/category/{id}', [ClientProductController::class, 'category'])->name('client_category');
Route::get('/shop/{id}', [ClientProductController::class, 'show'])->name('client_shop_detail');

Route::get('/blog', function () {
    return view('client.blog.blog');
})->name('client_blog');

Route::get('/contact', function () {
    return view('client.contact.contact');
})->name('client_contact');


Route::get('/login', [ClientLoginController::class, 'index'])->name('client_login');