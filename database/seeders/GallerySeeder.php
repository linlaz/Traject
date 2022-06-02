<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::create([
            'travel_packages_id' => '1',
            'image' => 'images/1a.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '1',
            'image' => 'images/1b.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '1',
            'image' => 'images/1c.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '1',
            'image' => 'images/1c.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '2',
            'image' => 'images/2a.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '2',
            'image' => 'images/2b.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '2',
            'image' => 'images/2c.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '3',
            'image' => 'images/3a.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '3',
            'image' => 'images/3b.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '3',
            'image' => 'images/3c.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '4',
            'image' => 'images/4a.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '4',
            'image' => 'images/4b.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '4',
            'image' => 'images/4c.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '5',
            'image' => 'images/5a.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '5',
            'image' => 'images/5b.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '6',
            'image' => 'images/6a.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '6',
            'image' => 'images/6b.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '7',
            'image' => 'images/7a.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '7',
            'image' => 'images/7b.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '8',
            'image' => 'images/8a.webp',
        ]);
        Gallery::create([
            'travel_packages_id' => '8',
            'image' => 'images/8b.webp',
        ]);
    }
}
