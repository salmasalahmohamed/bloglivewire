<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home-page');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['user', 'verified'])->name('dashboard');

Route::middleware('user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/home', [\App\Http\Controllers\UserController::class, 'HomePage']);
Route::get('/my-post', [\App\Http\Controllers\UserController::class, 'myPost']);
Route::get('/creatPost', [\App\Http\Controllers\UserController::class, 'createPost']);
Route::get('/editPost/{id}', [\App\Http\Controllers\UserController::class, 'editPost']);
Route::get('/viewPost/{id}', [\App\Http\Controllers\UserController::class, 'viewPost']);
Route::get('/profile',[UserController::class,'loadProfile'])->middleware('user');
Route::get('/view/profile/{user_id}',[UserController::class,'loadGuestProfile'])->middleware('user');
