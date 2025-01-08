<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//////  Routes simples

Route::get('/hola',function() {
    return '<h1>Hola Mundo Cruel</h1>';
}); 

Route::get('/index.html',function() {

    $html_code = "<!DOCTYPE html>
                    <html>
                    <head>
                        <title>Laravel</title>
                    </head>
                    <body>
                        <h1>I love Laravel</h1>
                    </body>
                    </html>"; 

    return $html_code;
}); 







require __DIR__.'/auth.php';
