<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('password')
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => \Hash::make('password')
        ]);

        $categories = ['Phone', 'Desktop', 'Laptop'];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => \Str::slug($category) . uniqid(),
            ]);
        }

        $brands = ['Apple', 'Google', 'Acer', 'HP'];
        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand,
            ]);
        }

        $colors = ['Red', 'Green', 'Blue'];
        foreach ($colors as $color) {
            Color::create([
                'name' => $color
            ]);
        }

        // \App\Models\User::factory(10)->create();
    }
}
