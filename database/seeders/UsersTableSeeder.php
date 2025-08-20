<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin Sijadwal',
                'email' => 'admin@sijadwal.ac.id',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Viewer Sijadwal',
                'email' => 'viewer@sijadwal.ac.id',
                'password' => Hash::make('password'),
                'role' => 'viewer',
            ],
        ]);
    }
}