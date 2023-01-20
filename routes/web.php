<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;

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
    return view('Admin-Panel.dashboard');
});
Route::prefix('admin')->name('admin.')->group(function () {

    //Users
    Route::prefix('users')->name('user.')->group(function () {
        $controller = UserController::class;
        Route::get('/list', [$controller, 'index'])->name('index');
        Route::get('/create', [$controller, 'create'])->name('create');
        Route::post('/save', [$controller, 'save'])->name('save');
        Route::get('/edit/{id}', [$controller, 'edit'])->name('edit');
        Route::post('/update/{id}', [$controller, 'update'])->name('update');
        Route::get('/delete/{id}', [$controller, 'delete'])->name('delete');
    });
    //Banners
    Route::prefix('banners')->name('banner.')->group(function () {
        $controller = BannerController::class;
        Route::get('/list', [$controller, 'index'])->name('index');
        Route::get('/create', [$controller, 'create'])->name('create');
        Route::post('/save', [$controller, 'save'])->name('save');
        Route::get('/edit/{id}', [$controller, 'edit'])->name('edit');
        Route::post('/update/{id}', [$controller, 'update'])->name('update');
        Route::get('/delete/{id}', [$controller, 'delete'])->name('delete');
    });
    //Catageory
    Route::prefix('categories')->name('category.')->group(function () {
        $controller = CategoryController::class;
        Route::get('/list', [$controller, 'index'])->name('index');
        Route::get('/create', [$controller, 'create'])->name('create');
        Route::post('/save', [$controller, 'save'])->name('save');
        Route::get('/edit/{id}', [$controller, 'edit'])->name('edit');
        Route::post('/update/{id}', [$controller, 'update'])->name('update');
        Route::get('/delete/{id}', [$controller, 'delete'])->name('delete');
    });
    
    //Brands
    Route::prefix('brands')->name('brand.')->group(function () {
        $controller = BrandController::class;
        Route::get('/list', [$controller, 'index'])->name('index');
        Route::get('/create', [$controller, 'create'])->name('create');
        Route::post('/save', [$controller, 'save'])->name('save');
        Route::get('/edit/{id}', [$controller, 'edit'])->name('edit');
        Route::post('/update/{id}', [$controller, 'update'])->name('update');
        Route::get('/delete/{id}', [$controller, 'delete'])->name('delete');
    });

    //Products
    Route::prefix('products')->name('product.')->group(function () {
        $controller = ProductController::class;
        Route::get('/list', [$controller, 'index'])->name('index');
        Route::get('/create', [$controller, 'create'])->name('create');
        Route::post('/save', [$controller, 'save'])->name('save');
        Route::get('/edit/{id}', [$controller, 'edit'])->name('edit');
        Route::post('/update/{id}', [$controller, 'update'])->name('update');
        Route::get('/delete/{id}', [$controller, 'delete'])->name('delete');
    });
});
