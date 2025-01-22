<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\GuardarPostRequest;
use App\Http\Requests\ActualizarPostRequest;

class PostControllerCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ejemplos ELOQUENT
        // $posts = Post::all(); // Donde Post es la class de la tabla posts y all() es obtener todos los registros
        // $posts = Post::find(1); // Busca registro con la PK = 1 
        // $posts = Post::find([1, 3]); // Busca registro con la PK = 1, PK = 3

        // Aplicamos un WHERE
        // $posts = Post::where('posted','=','not')->get(); // Where posted=not
        // $posts = Post::where('posted','not')->where('id','>',2)->get(); // Where (posted = not) AND (id > 2); 
        // $posts = Post::where('posted2','not')->where('id','>',2)->get(); // Where (posted = not) AND (id > 2); // tiene error
        // $posts = Post::where('posted','not')->orWhere('id','>',2)->get(); // Where (posted = not) OR (id > 2)
        // $posts = Post::where('posted','yes')
        //     ->orwhere(function($query) {
        //             $query->where('posted','not')
        //            ->where('category_id','2');
        //     })->get();
        // $posts = Post::where('posted','not')->where('id','>',2)->first(); // Where (posted = not) OR (id > 2) y solo el primero 
        // $posts = Post::where('posted','not')->orderBy('id','desc')->get(); // Ordenado

        // SELECT sobre conjunto de campos
        // $posts = Post::select('title','url_clean','content')->get(); // Extracción de columnas específicas 

        // Salida simplificada
        // $posts = Post::pluck('title','url_clean'); // Simplifica la salida, solamente los valores 
        
        // dd($posts); // volcado del resultado 

        $posts = Post::all(); // Obtención de todas las publicaciones en variable $posts
        return view('post.index',['posts' => $posts]);  // Llamada a la View pasando $posts en 'posts' para maquetar el resultado
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ejemplos de SQL DIRECTO
        // $user = DB::select('select * from users');
        // $user = DB::select('select * from users where id = :id', ['id' => 1]); 

        // Ejemplos con el QUERY BUILDER 
        // $user = DB::table('users')->where('role','admin')->get(); // Ejemplo con where x = y
        // $user = DB::table('users')->where('role','!=','admin')->get(); // Ejemplo con where x != y

        // dd($user);  // para ver la respuesta del select anterior
        
        return view('post.create'); // Llama a la vista create.blade.php que muestra el formulario de creación
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardarPostRequest $request)
    {

       // echo "estoy en function store() de PostControllerCrud<br>"; 

       // echo 'Title = '.$request->input('title').'<br>';
       // echo 'Title = '.$request->title.'<br>';
       // echo 'Title = '.request('title'); 
    
        // Validación de los input del formulario
        // $request->validate([
        //   'title' => 'required|unique:posts|min:5|max:255',
        // ]);

          // dd($request); // Desgrana el $request y lo pinta en pantalla


        // Si las validaciones son OK, entonces se debe proceder al insert en la DDBB
        
        $post = new Post; 

        $post->title = $request->title;
        $post->url_clean = $request->url_clean;  
        $post->content = $request->content; 
        $post->posted = 'not'; // Por defecto las publicaciones no están posteadas, requiren de supervisión
        $post->user_id = User::all()->random()->id; // Para que la FK user_id funcione, elegimos al azar
        $post->category_id = Category::all()->random()->id; // Para que la FK category_id funcione, elegimos al azar

        $post->save(); 

        // return back(); // Vuelve a la página anterior 
        // return back()->with('status', 'Publicación creada correctamente'); 
        return redirect()->route('postCRUD.index')->with('status','<h1>Publicación creada correctamente</h1>'); 
    }

    /**
     * Display the specified resource.
     */

     
     /** 
    * public function show(string $id)
    * {
    * 
    *    // $posts = Post::find($id); // Extrae registro con PK = id
    *    $posts = Post::findorfail($id); // Genera una respuesta http de error en caso de not found. Un 404
    *    return view('post.show',['post'=>$posts]); // // Recordar crear la vista 
    * }
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
        return view('post.edit',['post' => $postCRUD]); // Llama a la vista post.edit que muestra form de update
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActualizarPostRequest $request, Post $postCRUD)
    {
        // $postCRUD->title = $request->title; // Actualiza el 'title' por el que viene en request
        // $postCRUD->url_clean = $request->url_clean; // Actualiza la 'url_clean' por la que viene en request
        // $postCRUD->content = $request->content; // Actualiza el 'content' por el que viene en request
    
        // $postCRUD-> update(); //Actualizamos el registro de la DDBB 
        // return back(); // Vuelve a la página origen, y carga el registro actualizado

        $postCRUD-> update($request->all()); //Actualizamos el registro de la DDBB 
        return back(); // Vuelve a la página origen, y vuelve a cargar el registro actualizado
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $postCRUD)
    {
        // Eliminación del registro 
        $postCRUD->delete(); 
        // return back(); 
        return back()->with('status', 'Publicación eliminada correctamente'); // Vuelve a la página llamante con un mensaje 
    }
}
