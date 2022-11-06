<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'fullname' => 'dina tayel',
            'password' => Hash::make('12345678'),
            'email' => 'admin@gmail.com',
            'status' => 'active',
        ]);
    }
}
