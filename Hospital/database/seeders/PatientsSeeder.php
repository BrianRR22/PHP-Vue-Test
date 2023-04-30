<?php

namespace Database\Seeders;

use App\Models\patientModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        patientModel::create([
            'name' => 'John Doe',
            'sex' => 'Male',
            'religion' => 'Islam',
            'phone' => '081234567890',
            'address' => 'Jl. Jend. Sudirman No. 123',
            'nik' => '1234567890123456',
        ]);

        patientModel::create([
            'name' => 'Jane Doe',
            'sex' => 'Female',
            'religion' => 'Kristen',
            'phone' => '081234567891',
            'address' => 'Jl. MH Thamrin No. 456',
            'nik' => '1234567890123457',
        ]);
    }
}
