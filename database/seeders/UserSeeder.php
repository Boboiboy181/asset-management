<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'PhongbanA',
            'email' => 'phongbana@gmail.com',
            'password' => bcrypt('123456789'),
            'role' => 'Department User',
            'created_at' => now(), // Lấy thời gian hiện tại
            'updated_at' => now(), // Lấy thời gian hiện tại
        ]);
        DB::table('users')->insert([
            'name' => 'PhongbanB',
            'email' => 'phongbanb@gmail.com',
            'password' => bcrypt('123456789'),
            'role' => 'Department User',
            'created_at' => now(), // Lấy thời gian hiện tại
            'updated_at' => now(), // Lấy thời gian hiện tại
        ]);
        DB::table('users')->insert([
            'name' => 'PhongbanC',
            'email' => 'phongbanc@gmail.com',
            'password' => bcrypt('123456789'),
            'role' => 'Department User',
            'created_at' => now(), // Lấy thời gian hiện tại
            'updated_at' => now(), // Lấy thời gian hiện tại
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
            'role' => 'Admin',
            'created_at' => now(), // Lấy thời gian hiện tại
            'updated_at' => now(), // Lấy thời gian hiện tại
        ]);
    }
}
