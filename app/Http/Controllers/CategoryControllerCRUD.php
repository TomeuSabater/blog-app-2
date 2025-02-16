<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\GuardarCategoryRequest;
use App\Http\Requests\ActualizarCategoryRequest;

class CategoryControllerCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at','DESC')->paginate(3); // Obtención categorías orden fecha creación y paginación
        return view('category.index',['categories' => $categories]); // Los mostramos con la View 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create'); // Llama a la vista create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardarCategoryRequest $request)
    {

        $category = new Category; 

        $category->title = $request->title;
        $category->url_clean = $request->url_clean;  

        $category->save(); 

        return redirect()->route('categoryCRUD.index')->with('status','Categoría creada correctamente'); // Salta a View index con mensaje
    }


    /**
     * Display the specified resource.
     */
    public function show(Category $categoryCRUD)
    {
        return view('category.show',['category'=>$categoryCRUD]); // Lo muestra en la View category.show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $categoryCRUD)
    {
        return view('category.edit',['category'=>$categoryCRUD]); // Lo muestra en la View category.edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActualizarCategoryRequest $request, Category $categoryCRUD)
    {

        $categoryCRUD-> update($request->all()); //Actualizamos el registro de la DDBB 
        return back(); // Vuelve a la página origen, y vuelve a cargar el registro actualizado
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $categoryCRUD) 
    {
        // Eliminación del recurso
        $post = Post::where('category_id','=',$categoryCRUD->id)->count(); // Corroborar que no es una FK en Post

        // Si existe algún Post con el category_id a borrar no lo borramos y mostramos un mensaje
        // Si no exite ningún Post con el catetgory_id a borrar entonces sí que lo borramos 
        if($post) {
            return back()->with('status','No es posible eliminar la Categoría');
        } else {
            $categoryCRUD->delete(); 
            return back()->with('status','Categoría eliminada correctamente');
        }
    }
}