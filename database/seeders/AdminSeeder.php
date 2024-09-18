<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            User::updateOrCreate(['email' => 'admin@email.com'], [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'password' => Hash::make('password'),
                'country' => 'Pakistan',
                'isAdmin' => 1
            ]);
        }
    }
}
