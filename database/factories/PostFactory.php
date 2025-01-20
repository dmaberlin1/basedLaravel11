<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
            $title = Str::ucfirst(fake()->unique()->sentence(3));
            $content = Str::ucfirst(fake()->unique()->text());
        return [
            'title'=> $title,
            'slug'=>Str::slug($title), // test str 11 => test-str-12
            'content' => fake()->unique()->paragraph(),
            'category_id'=>fake()->numberBetween(1,8),
        ];

    }
}
