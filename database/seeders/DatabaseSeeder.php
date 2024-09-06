<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\CampaignCategory;
use App\Models\Category;
use App\Models\Location;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);
        User::factory(200)->create();
        Location::factory(10)->create();
        CampaignCategory::factory(4)->create();
        Category::factory(10)->create();
        Blog::factory(100)->create();
    }
}
