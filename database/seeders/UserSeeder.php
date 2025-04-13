<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users =[
            [
                'email' => 'm7mdellham77@gmail.com',
                'first_name' => 'Mohamed',
                'last_name' => 'Maher',
                'userName' => 'm7mdmaher106',
                'password' => Hash::make('M7mdmaher11'),
                'role' => 'admin',
                'academic_year' => 'Fourth Year',
                'phone' => '+201024328382',
            ],
            [
                'email' => 'AhmedMaher@gmail.com',
                'first_name' => 'Ahmed',
                'last_name' => 'Maher',
                'userName' => 'Ahmedmaher114',
                'password' => Hash::make('Ahmedmaher11'),
                'academic_year' => 'Fifth Year',
                'phone' => '+201007352061',
            ]
            ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
