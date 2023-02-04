<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Todo;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(9)->create();
        User::created([
            "name" => "Ilham Maulana",
            "email" => "ilham@gmail.com",
            "password" => bcrypt('admin123'),
            "url_photo" => fake()->imageUrl(640, 480, 'animals')
        ]);
        Todo::factory(11)->create();
    }
}
