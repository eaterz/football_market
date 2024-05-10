<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//user route
Route::middleware('auth')->group(function(){
    Route::get('dashboard',[UserController::class, 'index'])->name('dashboard');
    Route::get('product',[ProductController::class, 'index'])->name('user.product');
    Route::get('order',[OrderController::class, 'index'])->name('user.order');
    Route::get('product/show/{id}', [ProductController::class,'show'])->name('user.product');
    Route::post('cart', [ProductController::class,'add_to_cart'])->name('user.cart');
    Route::get('cart',[CartController::class, 'index'])->name('user.cart');
});

// admin route
Route::middleware('auth')->group(function(){
    Route::get('/admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/product',[AdminProductController::class, 'index'])->name('admin.product');
    Route::get('/admin/product/create',[AdminProductController::class, 'create'])->name('admin.product');
    Route::post('/admin/product',[AdminProductController::class, 'store'])->name('admin.product');
    Route::get('/admin/product/edit/{id}', [AdminProductController::class, 'edit'])->name('admin.product');
    Route::patch('/admin/product', [AdminProductController::class, 'update'])->name('admin.product');
    Route::delete('/admin/product/{id}', [AdminProductController::class,'destroy'])->name('admin.product');
});
//Market
Route::get('home/market',[MarketController::class,'index']);
