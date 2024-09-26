<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PageHeaderImages>
 */
class PageHeaderImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'home_page_header_image' => $this->faker->imageUrl(),
            'about_page_header_image' => $this->faker->imageUrl(),
            'campaigns_page_header_image' => $this->faker->imageUrl(),
            'donations_page_header_image' => $this->faker->imageUrl(),
            'blogs_page_header_image' => $this->faker->imageUrl(),
            'volunteers_page_header_image' => $this->faker->imageUrl(),
            'faq_page_header_image' => $this->faker->imageUrl(),
            'privacy_page_header_image' => $this->faker->imageUrl(),
            'terms_page_header_image' => $this->faker->imageUrl(),
            'contact_page_header_image' => $this->faker->imageUrl(),
        ];
    }
}
