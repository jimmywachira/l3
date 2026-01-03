<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Greeting;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->firstOrCreate([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Greeting::create(['greeting' => 'Hello']);
        // Greeting::create(['greeting' => 'Hi']);
        // Greeting::create(['greeting' => 'Hey']);
        // Greeting::create(['greeting' => 'Heyy!']);
        
        Article::factory()->count(10)->create();
    }
}
