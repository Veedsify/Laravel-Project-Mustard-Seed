<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CampaignCategory>
 */
class CampaignCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Health', 'Education', 'Environment', 'Animals', 'Human Rights', 'Arts & Culture']),
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'slug' => $this->faker->slug,
            'status' => 1,
            'user_id' => 1,
        ];
    }
}
