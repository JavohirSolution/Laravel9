<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Javohir',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('2407')
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@2gmail.com',
            'password' => Hash::make('2407')
        ]);

        // \App\Models\Post::factory()->count(20)->create();

    }
}
