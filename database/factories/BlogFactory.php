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
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'image' => $this->faker->imageUrl($width = 640, $height = 480, 'Mustard'),
            'category_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'user_id' => 1,
            'content' => $this->faker->paragraph(35),
            'descriptions' => $this->faker->paragraph(2),
            'is_published' => $this->faker->boolean,
            'published_at' => $this->faker->dateTime,
            'views' => $this->faker->randomNumber(),
            'likes' => $this->faker->randomNumber(),
            'dislikes' => $this->faker->randomNumber(),
            'tags' => $this->faker->sentence(),
        ];
    }
}
