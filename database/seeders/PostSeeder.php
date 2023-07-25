<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = config('course.subjects');
        $category = $subjects[array_rand($subjects)];

        $posts =  Post::factory()->count(10)->create();
        $posts->each(function ($post) use ($category){
            $post->tags()->firstOrCreate([
                'slug'=> Str::slug($category)
            ],[
                'name' => $category,
            ]);
        });
    }
}
