<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'lintang',
            'email' => 'lazuardilintang@apps.ipb.ac.id',
            'email_verified_at' => '2020-12-01',
            'password' => bcrypt('linlaz11'),
            'roles' => 'ADMIN',
        ]);
    }
}
