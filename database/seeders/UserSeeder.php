<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
        // Create an admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),

        ]);

        // Assign the admin role to the admin user
         $admin->assignRole('admin');

        // Create a writer user
        $writer = User::create([
            'name' => 'Writer',
            'email' => 'writer@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);

        // Assign the writer role to the writer user
         $writer->assignRole('writer');

        // Create a user
        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),

        ]);

        // Assign the user role to the user
         $user->assignRole('user');

    }
}
