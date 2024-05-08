<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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
Route::middleware(['auth','userMiddleware'])->group(function(){
    Route::get('dashboard',[UserController::class, 'index'])->name('dashboard');
    Route::get('product',[ProductController::class, 'index'])->name('user.product');
    Route::get('order',[OrderController::class, 'index'])->name('user.order');
});

// admin route
Route::middleware(['auth','adminMiddleware'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
});
//Market
Route::get('home/market',[MarketController::class,'index']);
