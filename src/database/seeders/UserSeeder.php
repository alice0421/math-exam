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
            'name' => '鈴木絵理',
            'email' => 'eri.suzuki@gmail.com',
            'password' => Hash::make('eri.suzuki'),
            'school' => '豊島丘女子学園中学校',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
