<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar um usuário administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);

        // Criar um usuário funcionário
        User::create([
            'name' => 'Funcionário',
            'email' => 'funcionario@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role' => 'funcionario',
        ]);
    }
}
