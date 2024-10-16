<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bill;
class PatientBill extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bill::create([
            'treatment_id' => 4,
            'doctor_fees' => 350,
            'total_amount' => 350,
        ]);
     
    }
}
