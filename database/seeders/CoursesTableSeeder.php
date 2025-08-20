<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    public function run(): void
    {
        Course::insert([
            ['name' => 'Pemrograman Web', 'type' => 'teori', 'sks' => 3, 'department_id' => 1],
            ['name' => 'Matematika Diskrit', 'type' => 'teori', 'sks' => 2, 'department_id' => 1],
            ['name' => 'Sistem Basis Data', 'type' => 'teori', 'sks' => 3, 'department_id' => 2],
            ['name' => 'Pengantar Elektronika', 'type' => 'teori', 'sks' => 2, 'department_id' => 3],
        ]);
    }
}