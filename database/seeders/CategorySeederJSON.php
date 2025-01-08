<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeederJSON extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ejemplo de inserción desde un archivo externo JSON
        $jsonData = file_get_contents('C:\\laragon\\www\\blog-app\\database\\JSON\\categories.json');
        $categories = json_decode($jsonData, true);

        // Insertar cada registro en la tabla mediante un bucle
        foreach ($categories['categories']['category'] as $category) {
            Category::create([
                'title'     => $category['Nom'], // Asignamos title
                'url_clean' => $category['url'], // Asignamos url_clean
            ]);
        }
    }
}
