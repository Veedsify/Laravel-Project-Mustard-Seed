<?php
namespace Database\Seeders;

use App\Models\Blog;
use App\Models\CampaignCategory;
use App\Models\Category;
use App\Models\Location;
use App\Models\Role;
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

        $user = User::factory()->create([
            'name' => 'Kc Admin',
            'email' => 'charitymustardseed@gmail.com',
            'role' => 'admin',
        ]);

        Role::factory()->create([
            'name' => 'admin',
        ]);
        Role::factory()->create([
            'name' => 'user',
        ]);
        Role::factory()->create([
            'name' => 'volunteer',
        ]);
        // User::factory(200)->create();
        // Location::factory(10)->create();
        // CampaignCategory::factory(4)->create();
        // Category::factory(10)->create();
        // Blog::factory(100)->create();
    }
}
