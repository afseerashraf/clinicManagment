<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class CreatePatient extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::create([
            'appoinment_date' => '20-12-2024',

            'name' => 'afseer',

            'age' => '24',

            'phone' => '7356233174',

            'email' => 'afseer@gmail.com',

            'place' => 'vadakara',

            'house' => 'kuniyil',

            'medical_history' => 'fever',

            'doctor_id' => 7,
        ]);

        Patient::create([
            'appoinment_date' => '25-12-2024',

            'name' => 'salman',

            'age' => '26',

            'phone' => '9088765466',

            'email' => 'salman@gmail.com',

            'place' => 'Calicut',

            'house' => 'Vadekandi',

            'medical_history' => 'Headtach',
            
            'doctor_id' => 7,
        ]);
    }
}
