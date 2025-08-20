<?php

namespace App\Imports;

use App\Models\Department;
use Maatwebsite\Excel\Concerns\ToModel;

class DepartmentsImport implements ToModel
{
    public function model(array $row)
    {
        // Jika ada header, lewati baris pertama
        if ($row[0] === 'name' && $row[1] === 'student_count') {
            return null;
        }
        return new Department([
            'name' => $row[0],
            'student_count' => $row[1]
        ]);
    }
}