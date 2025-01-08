<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(); // Frase aleatoria
        return [
            'title' => $title,
            'url_clean' => Str::slug($title), // Palabra aleatoria
            'content' => fake()->randomHtml(2,3), //contenido html
            'posted' => fake()->boolean ? 'yes' : 'not', // Aleatorio entre yes y not
            'category_id' => Category::inRandomOrder()->first()->id, // Un Category Id aleatorio
            'user_id' => User::inRandomOrder()->first()->id, // Un User Id aleatorio
        ];
    }
}
