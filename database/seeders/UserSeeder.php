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
        $user = User::create([
            'name' => 'Javohir',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('2407')
        ]);
        $user->roles()->attach([1,2]);
        $user2 = User::create([
            'name' => 'Doston',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('2407')
        ]);
        $user2->roles()->attach([3]);
        // $user2 =  User::create([
        //     'name' => 'Abdulloh',
        //     'email' => 'admin2@gmail.com',
        //     'password' => Hash::make('2407')
        // ]);
        // $user2->roles->attach([2]);


        // \App\Models\Post::factory()->count(20)->create();

    }
}
