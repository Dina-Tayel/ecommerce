<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Seller::create([
            'fullname' => 'dina tayel',
            'password' => Hash::make('12345678'),
            'email' => 'seller@gmail.com',
            'status' => 'active',
        ]);
    }
}
