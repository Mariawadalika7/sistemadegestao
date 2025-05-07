<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar um usuário administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@exemplo.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Criar um usuário funcionário
        User::create([
            'name' => 'Funcionário',
            'email' => 'funcionario@exemplo.com',
            'password' => Hash::make('password'),
            'role' => 'funcionario',
        ]);
    }
}
