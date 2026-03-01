<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
        User::factory(5)->create();
        Category::factory(2)->create();
        Post::factory(10)->create();
    }
}
