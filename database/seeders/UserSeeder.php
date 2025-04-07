<?php

namespace Database\Seeders;

use App\Models\BoardingHouse;
use App\Models\Category;
use App\Models\City;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'name' => 'jakarta',
            'slug' => 'jakarta',
            'image' => 'https://raw.githubusercontent.com/BillyJonathan29/assets-icf/main/html.png'
        ]);

        City::create([
            'name' => 'jakarta',
            'slug' => 'jakarta',
            'image' => 'https://raw.githubusercontent.com/BillyJonathan29/assets-icf/main/py.png'
        ]);
        City::create([
            'name' => 'jakarta',
            'slug' => 'jakarta',
            'image' => 'https://raw.githubusercontent.com/BillyJonathan29/assets-icf/main/js.png'
        ]);


        Category::create([
            'name' => 'jakarta',
            'slug' => 'jakarta',
            'image' => 'https://raw.githubusercontent.com/BillyJonathan29/assets-icf/main/head-meja.png'
        ]);

        Category::create([
            'name' => 'jakarta',
            'slug' => 'jakarta',
            'image' => 'https://raw.githubusercontent.com/BillyJonathan29/assets-icf/main/head-learning.png'
        ]);

        Category::create([
            'name' => 'jakarta',
            'slug' => 'jakarta',
            'image' => 'https://raw.githubusercontent.com/BillyJonathan29/assets-icf/main/css.png'
        ]);


    }
}
