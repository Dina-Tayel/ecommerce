<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $users=[
        //     [
        //         'fullname' => 'dina tayel',
        //         'username' => 'admin',
        //         'password' => Hash::make('12345678'),
        //         'email' => 'dinatayel@gmail.com',
        //         'role' => 'admin',
        //         'status' => 'active',
        //     ],
        //     [
        //         'fullname' => 'dina',
        //         'username' => 'seller',
        //         'password' => Hash::make('12345678'),
        //         'email' => 'dina@gmail.com',
        //         'role' => 'seller',
        //         'status' => 'active',
        //     ]

        //     ];

        //     foreach($users as $user)
        //     {
        //         User::create($user);
        //     }

        User::create([
            'fullname' => 'dina tayel',
            'username' => 'user',
            'password' => Hash::make('12345678'),
            'email' => 'user@gmail.com',
            'status' => 'active',
        ]);

        // Admin::create([
        //     'fullname' => 'dina tayel',
        //     'password' => Hash::make('12345678'),
        //     'email' => 'admin@gmail.com',
        //     'status' => 'active',
        // ]);

        // Seller::create([
        //     'fullname' => 'dina tayel',
        //     'password' => Hash::make('12345678'),
        //     'email' => 'seller@gmail.com',
        //     'status' => 'active',
        // ]);
    }
}
