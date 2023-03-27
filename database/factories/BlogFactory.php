<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(6),
            'image' =>  "https://upload.wikimedia.org/wikipedia/commons/6/62/Sunrise_at_Lake_Bled.jpg",
            'content' => fake()->paragraph(30),
            'user_id' => rand(1,7),
            'category_id' => rand(1,7),
        ];
    }
}
