<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'john.doe@example.com'],
            [
                'name' => 'John Doe',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'), // Add this line
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        
        DB::table('users')->updateOrInsert(
            ['email' => 'jane.smith@example.com'],
            [
                'name' => 'Jane Smith',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
