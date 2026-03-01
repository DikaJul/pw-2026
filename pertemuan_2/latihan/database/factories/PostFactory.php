<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),

            'user_id' => User::inRandomOrder()->first()->id,

            'category_id' => Category::inRandomOrder()->first()->id,

            
            'image' => null,
        ];
    }
}