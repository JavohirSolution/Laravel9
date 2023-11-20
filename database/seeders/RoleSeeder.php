<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $tags = [
            ['name' => 'Admin'],
            ['name' => 'editor'],
            ['name' => 'user'],
       ];
       Role::insert($tags);
    }
}
