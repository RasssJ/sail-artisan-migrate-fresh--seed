<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // Post::truncate();
        // Category::truncate();

        $user = User::factory()->create();
        $personal = Category::create([
            "name"=>"Personal",
            "slug"=>"personal"
        ]);
        $work = Category::create([
            "name"=>"Work",
            "slug"=>"work"
        ]);
        $hobbies = Category::create([
            "name"=>"Hobbies",
            "slug"=>"hobbies"
        ]);
        Post::factory(5)->create([
            "user_id" => $user->id,
            "category_id" => $personal->id,
            ]);
        Post::factory(5)->create([
            "user_id" => $user->id,
            "category_id" => $work->id,
            ]);
        Post::factory(5)->create([
            "user_id" => $user->id,
            "category_id" => $hobbies->id,
            ]);
        Post::factory(5)->create();
    }
}
