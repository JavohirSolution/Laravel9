<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        Category::create(['name' => 'Web Design']);
        Category::create(['name' => 'Web Developer']);
        Category::create(['name' => 'Online marketing']);
        Category::create(['name' => 'Keyword Research']);
        Category::create(['name' => 'Email Marketing']);
    }
}
