<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomsTableSeeder extends Seeder
{
    public function run(): void
    {
        Room::insert([
            ['name' => 'Ruang 1', 'capacity' => 40],
            ['name' => 'Ruang 2', 'capacity' => 60],
            ['name' => 'Ruang 3', 'capacity' => 40],
        ]);
    }
}