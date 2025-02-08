<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostControllerCRUD;
use App\Http\Controllers\CategoryControllerCRUD;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


///////////////////// MVC CRUDs

//// CRUD Post
Route::resource('/postCRUD', PostControllerCRUD::class); // Genera todas la Route para el Controller de Post

//// CRUD Category 
Route::resource('/categoryCRUD', CategoryControllerCRUD::class); // Genera todas la Route para el Controller de Category


require __DIR__.'/auth.php';