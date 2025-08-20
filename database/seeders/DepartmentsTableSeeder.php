<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentsTableSeeder extends Seeder
{
    public function run(): void
    {
        Department::insert([
            ['name' => 'Teknik Informatika', 'student_count' => 35],
            ['name' => 'Sistem Informasi', 'student_count' => 42],
            ['name' => 'Teknik Elektro', 'student_count' => 28],
        ]);
    }
}