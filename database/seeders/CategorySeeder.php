<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    Category::create([
        'name' => 'popular'
    ]);

    Category::create([
        'name' => 'mountain'
    ]);

    Category::create([
        'name' => 'beach'
    ]);

    }
}
