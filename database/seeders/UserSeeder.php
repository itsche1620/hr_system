<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(12345678),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt(87654321),
            'role' => 'manager',
        ]);

        User::create([
            'name' => 'Chelsea',
            'email' => 'chelsea@gmail.com',
            'password' => bcrypt('chelsealeke'),
            'role' => 'user',
        ]);
    }
}
