<?php

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name'  => 'Yasser',
            'email'  => 'yasser.m22291@gmail.com',
            'password'  => bcrypt('12345678'),

       ]);
    }
}
