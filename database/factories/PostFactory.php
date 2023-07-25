<?php

namespace Database\Factories;

use App\Models\Photo;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
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
        $postTitle = $this->faker->sentence(7);
        return [
            'title' => $postTitle,
            'slug' => Str::slug(now().'-'.$postTitle),
            'body' => $this->faker->text,
            'user_id'=> function(){
                return User::factory()->create()->id;
            },
            'is_publish'=>true,
        ];
    }
}
