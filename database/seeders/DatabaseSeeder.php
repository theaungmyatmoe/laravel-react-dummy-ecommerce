<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
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


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
