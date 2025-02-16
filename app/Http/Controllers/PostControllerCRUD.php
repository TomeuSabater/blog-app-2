<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GuardarPostRequest;
use App\Http\Requests\ActualizarPostRequest;

class PostControllerCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::orderBy('created_at','DESC')->paginate(3); // Obtención publicaciones orden fecha creación y paginación
        return view('post.index',['posts' => $posts]);  // Llamada a la View pasando $posts en 'posts' para maquetar el resultado
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $categories = Category::pluck('id','title'); // Recuperamos las Category, solamente los campos que nos interesan 
        return view('post.create', ['categories' => $categories]); // Llama a la vista create.blade.php con Categories  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardarPostRequest $request)
    {
       
        $post = new Post; 

        $post->title = $request->title;
        $post->url_clean = $request->url_clean;  
        $post->content = $request->content; 
        $post->posted = $request->posted; 
        $post->category_id = $request->categories_id; // Añade la FK de category
        $post->user_id = Auth::user()->id; 
        
        $post->save(); 

        return redirect()->route('postCRUD.index')->with('status','Publicación creada correctamente'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $postCRUD)
    {

        return view('post.show',['post' => $postCRUD]);  // El nombre del parámetro en la llamada es postCRUD/{postCRUD}  
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $postCRUD)
    {

        $categories = Category::pluck('id','title'); // Recuperamos las categorías, solamente los campos que nos interesan 
        return view('post.edit',['post' => $postCRUD,'categories' => $categories]); // Llama a la vista post.edit que muestra form de update
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActualizarPostRequest $request, Post $postCRUD)
    {

        $postCRUD-> update($request->all()); //Actualizamos el registro de la DDBB 
        return back(); // Vuelve a la página origen, y vuelve a cargar el registro actualizado
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $postCRUD)
    {

        $postCRUD->delete();  // Eliminación del registro 
        return back()->with('status', 'Publicación eliminada correctamente'); // Vuelve a la página llamante con un mensaje 
    }
}
