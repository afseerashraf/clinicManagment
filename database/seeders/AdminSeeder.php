<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'admin',

            'email' => 'admin@gmail.com',

            'phone' => '9087654323',
            
            'password' => 'admin12345',
        ]);
    }
}
