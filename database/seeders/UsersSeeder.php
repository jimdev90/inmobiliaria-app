<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
//                'password' => bcrypt('password'),
                'password' => Hash::make('password'),
                'role' => 'admin',
                'status' => 'active'
            ],
            // Agent
            [
                'name' => 'Agent',
                'username' => 'agent',
                'email' => 'agent@agent.com',
                'password' => Hash::make('password'),
                'role' => 'agent',
                'status' => 'active'
            ],
            // Agent
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@user.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'status' => 'active'
            ],
        ]);
    }
}
