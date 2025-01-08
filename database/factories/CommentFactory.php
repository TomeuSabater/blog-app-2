<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment'=> fake()->sentence(), // Frase aleatoria
            'user_id' => User::inRandomOrder()->first()->id, // Un User Id aleatorio
            'post_id' => Post::inRandomOrder()->first()->id, // Un Post Id aleatorio
        ];
    }
}
