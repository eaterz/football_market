<?php



use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ShowController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
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
    Route::get('/upload', [UserController::class, 'create'])->name('images.create');
    Route::post('/upload', [UserController::class, 'store'])->name('images.store');
    Route::get('/show/{id}', [ShowController::class,'create'])->name('image.show');
    Route::delete('/show/{id}', [ShowController::class,'destroy'])->name('image.delete');
    Route::post('/show/{id}', [ShowController::class, 'analyze'])->name('image.analyze');

});

