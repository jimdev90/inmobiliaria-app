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
                'nombres' => 'Admin',
                'apellidos' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
//                'password' => bcrypt('password'),
                'password' => Hash::make('password'),
                'role' => 'admin',
                'estado' => 'activo'
            ],
            // Agent
            [
                'nombres' => 'Agente',
                'apellidos' => 'Agente',
                'username' => 'agent',
                'email' => 'agent@agent.com',
                'password' => Hash::make('password'),
                'role' => 'agente',
                'estado' => 'activo'
            ],
            // Agent
            [
                'nombres' => 'Usuario',
                'apellidos' => 'Usuario',
                'username' => 'user',
                'email' => 'user@user.com',
                'password' => Hash::make('password'),
                'role' => 'usuario',
                'estado' => 'activo'
            ],
        ]);
    }
}
