<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'sample',
            'email' => 'sample@gmail.com',
            'password' => Hash::make('sample'),
            'school' => '豊島丘女子学園高等学校',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
