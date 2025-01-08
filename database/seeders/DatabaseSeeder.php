<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Insertamos una tupla específica de Users
        // Esto es necesario porque lanzamos los seeder y factories varias veces
        // y elimina el contenido, y eliminaría el usuario que tenemos creado 
        // Sería más correcto tener un  $this->call(UserSeeder::class); 
        $AdminUser = new User(); // Creamos un objeto de tipo User
            $AdminUser->name = "Tomeu"; // Asignamos name
            $AdminUser->email ="bmsabater@gmail.com"; // Asignamos emial
            $AdminUser->role="superjefetop"; //Asignamos role
            $AdminUser->password=Hash::make('12345678'); // Asignamos password
        $AdminUser->save(); // Creamos la tupla 
        
        // Llamamos a Seeders externos 
        $this->call(CategorySeeder::class); // Llamada al seeder de Category ejemplo inserción 1 tupla
        $this->call(CategorySeederJSON::class); // // Llamada al seeder de Category ejemplo inserción desde JSON

        // Llamamos a los Factory
        User::factory(5)->create(); // Llamará a este factory 5 veces

        $posts = Post::factory(5)->create(); // Llama al PostFactory x 5 // Resultado se usará para post_tag
        Comment::factory(5)->create(); // Llama al CommentFactory x 5
        Image::factory(5)->create(); // Llama al ImageFactory x 5
        $tags = Tag::factory(5)->create(); //Llama al TagFactory x 5 // Resultado se usará para post_tag

        // Generamos tuplas para la tabla post_tag
        $posts->each(function ($post) use ($tags) {
            $post->tags()->attach(
                $tags->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
       
    }
}
