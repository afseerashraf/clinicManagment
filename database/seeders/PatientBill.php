<?php

namespace Database\Seeders;

use App\Models\Bill;
use Illuminate\Database\Seeder;

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
