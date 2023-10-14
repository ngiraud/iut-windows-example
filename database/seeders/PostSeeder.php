<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()
        ->for(User::where('email', 'contact@ngiraud.me')->first())
        ->count(50)
        ->create();

        Post::factory()
        ->for(User::where('email', 'john@example.com')->first())
        ->count(100)
        ->create();
    }
}
