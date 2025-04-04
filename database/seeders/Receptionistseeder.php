<?php

namespace Database\Seeders;

use App\Models\Receptionist;
use Illuminate\Database\Seeder;

class Receptionistseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Receptionist::create([
            'name' => 'anagha',
            'email' => 'anagha@gmail.com',
            'place' => 'calicut',
            'phone' => '9087655645',
            'password' => bcrypt('anagha12345'),
        ]);
    }
}
