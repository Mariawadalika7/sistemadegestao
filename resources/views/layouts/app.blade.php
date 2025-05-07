<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-blue-header shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <div class="flex">
                <!-- Sidebar -->
                <div class="sidebar" id="sidebar">
                    <div class="p-4 border-b border-gray-700">
                        <h2 class="text-lg font-semibold text-white">Painel de Controle</h2>
                    </div>
                    <nav class="mt-4">
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('dashboard') }}" class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                            </a>
                            <a href="{{ route('users.index') }}" class="sidebar-item {{ request()->routeIs('users.*') || request()->routeIs('user.*') ? 'active' : '' }}">
                                <i class="fas fa-users mr-2"></i> Usuários
                            </a>
                            <a href="{{ route('clientes.index') }}" class="sidebar-item {{ request()->routeIs('clientes.*') ? 'active' : '' }}">
                                <i class="fas fa-user-tie mr-2"></i> Clientes
                            </a>
                            <a href="#" class="sidebar-item">
                                <i class="fas fa-chart-line mr-2"></i> Relatórios
                            </a>
                            <a href="#" class="sidebar-item">
                                <i class="fas fa-cog mr-2"></i> Configurações
                            </a>
                        @elseif(Auth::user()->role === 'funcionario')
                            <a href="{{ route('funcionario') }}" class="sidebar-item {{ request()->routeIs('funcionario') ? 'active' : '' }}">
                                <i class="fas fa-home mr-2"></i> Painel Funcionário
                            </a>
                            <a href="{{ route('clientes.index') }}" class="sidebar-item {{ request()->routeIs('clientes.*') ? 'active' : '' }}">
                                <i class="fas fa-user-tie mr-2"></i> Clientes
                            </a>
                            <a href="#" class="sidebar-item">
                                <i class="fas fa-tasks mr-2"></i> Gerir Atividades
                            </a>
                            <a href="#" class="sidebar-item">
                                <i class="fas fa-chart-bar mr-2"></i> Gerir Consumo
                            </a>
                            <a href="#" class="sidebar-item">
                                <i class="fas fa-money-bill mr-2"></i> Pagamentos
                            </a>
                            <a href="#" class="sidebar-item">
                                <i class="fas fa-file-invoice-dollar mr-2"></i> Faturas
                            </a>
                            <a href="#" class="sidebar-item">
                                <i class="fas fa-chart-line mr-2"></i> Relatórios de Consumo
                            </a>
                            <a href="#" class="sidebar-item">
                                <i class="fas fa-chart-pie mr-2"></i> Relatórios Financeiros
                            </a>
                        @endif
                        <a href="{{ route('profile.edit') }}" class="sidebar-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                            <i class="fas fa-user-circle mr-2"></i> Meu Perfil
                        </a>
                    </nav>
                </div>
                
                <!-- Page Content -->
                <main class="flex-1 content-with-sidebar">
                    <div class="py-6">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>

        <!-- Toggle Sidebar Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const sidebar = document.getElementById('sidebar');
                const sidebarToggle = document.getElementById('sidebar-toggle');
                
                if (sidebarToggle) {
                    sidebarToggle.addEventListener('click', function() {
                        sidebar.classList.toggle('sidebar-hidden');
                    });
                }
            });
        </script>
    </body>
</html>
