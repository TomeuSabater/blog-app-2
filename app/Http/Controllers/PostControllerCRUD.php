<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostControllerCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create'); // Llama a la vista create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       echo "estoy en function store() de PostControllerCrud"; 

       //  echo 'Title'.$request->input('title').'<br>';
       //  echo 'Title'.$request->title.'<br>';
       //  echo 'Title'.request('title'); 

       // dd($request); // Desgrana el $request y lo pinta en pantalla

        // Validación de los input del formulario
        //$request->validate([
        //    'title' => 'required|unique:posts|min:5|max:255',
        //]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
