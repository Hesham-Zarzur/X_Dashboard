<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::truncate();
        \App\Models\User::create([
            'name' => 'Hesham Elsamman',
            'code' => 'Support',
            'mobile' => '01033306731',
            'email' => 'hesham.elsamman@outlook.com',
            'password' => bcrypt('123456789'),
            'role' => 'Admin',
        ]);
    }
}
