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

///////////////////// Routes con parámetros

Route::get('/hola/{nom}',function($nom) {

    return '<h1>Hola '.$nom.' estás en un Mundo Cruel</h1>';
})->name('holanom');


Route::get('/hola2/{nom}',function($nom) {

    $html_code = "<!DOCTYPE html>
    <html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
        <h1>I love $nom </h1>
    </body>
    </html>"; 
    
    return $html_code;
}); 

///////////////////// Routes con parámetros condicionados

Route::get('/hola/{nom}/{professio?}',function($nom, $professio = null) {

	return '<h1>Hola '.$nom.' que eres '.$professio.' estás en un Mundo Cruel</h1>';
})->name('nomprof'); // Veremos esto más adelante, es un alias


///////////////////// Routes con restricciones

Route::get('/holar/{nom}',function($nom) {

    return '<h1>Hola '.$nom.' estás en un Mundo Cruel</h1>';
})->where('nom','[A-Za-z]+');  // podemos poner whereAlpha('nom');


Route::get('/perfil/{id}',function($id) { // Route condicionada por plantilla 

    return '<h3>Perfil Nº'.$id.'</h3>'; 
}); 


///////////////////// Routes renombradas 

Route::get('/holanueva',function() {
    return '<h1>Hola Nueva</h1>';
})->name('salutacio'); // Alias, se usará más adelante


Route::get('/perfilr1/{id}',function($id) {
    return "<h3>Perfil Nº ".$id."<a href='/holanueva'>saluda a </a></h3>"; 
}); 

Route::get('/perfilr2/{id}',function($id) {
    return "<h3>Perfil Nº ".$id."<a href='".route('salutacio')."'>saluda a </a></h3>"; 
}); 

Route::get('/lñajalkjasljkasflkjasfd',function() {
    return '<h1>Hola de nuevo, ruta rara es lñajalkjasljkasflkjasfd</h1>';
})->name('rutarara'); 

Route::get('/perfilr3/{id}',function($id) {
    return "<h3>Perfil Nº".$id."<a href='".route('rutarara')."'>saluda</a></h3>"; 
});


///////////////////// Routes renombradas y uso de parámetros

Route::get('/perfilr4/{id}',function($id) {

    return "<h3>Perfil Nº".$id."<a href='".route('holanom',['nom'=>'Tommy'])."'>saluda</a></h3>"; 
}); 


Route::get('/perfilr5/{id}',function($id) {

    return "<h3>Perfil Nº".$id."<a href='".route('nomprof',['nom'=>'Tommy', 'professio'=>'Docent'])."'>saluda</a></h3>"; 
});


///////////////////// Agrupación de Routes para condiciones determinadas

Route::group(['prefix'=>'admin','name'=>'admin'], function() {
    
    Route::get('/hola/{nom}',function($nom) {

        return '<h1>Hola '.$nom.' es agrupación</h1>';
    })->name('saluda'); //dando nombre a la ruta, ya la tomará de manera correcta '/admin/hola'

    Route::get('/usuari/{nom}', function ($nom) {

        return '<h1>Hola '.$nom.' es agrupación</h1>';
    })->name('user'); 
});

Route::get('/redireccion',function() {

    return "<h3>Perfil Nº <a href='".route('saluda',['nom'=>'Tommy'])."'>saluda</a></h3>"; 
}); 

///////////////////// Routes enlazadas con modelos (app>Models)




require __DIR__.'/auth.php';
