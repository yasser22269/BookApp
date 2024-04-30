<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::create([
                'name'  => 'admin',
                'email'  => 'admin@admin.com',
                'password'  => bcrypt('12345678'),

        ]);
        User::create([
            'name'  => 'User',
            'email'  => 'user@gmail.com',
            'password'  => bcrypt('12345678'),
            'user_name' => 'user',
            'gender' => 'male',
            'phone' => '012312412'
        ]);
    }
}
