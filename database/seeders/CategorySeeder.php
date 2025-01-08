<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertamos una tupla específica en Categories 
        $category = new Category(); // Creamos el objeto de tipo Category
            $category->title = "Noves Tecnologies"; // Asignamos title
            $category->url_clean ="noves_tecnologies"; // Asignamos url_clean
        $category->save(); // Insertamos tupla 
    }
}
