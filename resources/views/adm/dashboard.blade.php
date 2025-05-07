<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard Administrativo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">{{ __("Bem-vindo, ") }} {{ Auth::user()->name }}!</h3>
                    <p class="mb-2">{{ __("Você está logado como Administrador.") }}</p>
                </div>
            </div>

            <!-- Cards de acesso rápido -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Card Usuários -->
                <div class="card-blue overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-3">{{ __("Usuários") }}</h3>
                        <p class="mb-4 opacity-90">{{ __("Gerencie os usuários do sistema.") }}</p>
                        <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __("Gerenciar Usuários") }}
                        </a>
                    </div>
                </div>

                <!-- Card Clientes -->
                <div class="card-green overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-3">{{ __("Clientes") }}</h3>
                        <p class="mb-4 opacity-90">{{ __("Gerencie os clientes do sistema.") }}</p>
                        <a href="{{ route('clientes.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __("Gerenciar Clientes") }}
                        </a>
                    </div>
                </div>

                <!-- Card Configurações -->
                <div class="card-yellow overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-3">{{ __("Configurações") }}</h3>
                        <p class="mb-4 opacity-90">{{ __("Configure o sistema.") }}</p>
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-yellow-700 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __("Acessar Configurações") }}
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Segunda linha de cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Card Relatórios -->
                <div class="card-red overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-3">{{ __("Relatórios") }}</h3>
                        <p class="mb-4 opacity-90">{{ __("Acesse os relatórios do sistema.") }}</p>
                        <div class="grid grid-cols-2 gap-2">
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __("Relatórios de Consumo") }}
                            </a>
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __("Relatórios Financeiros") }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card Atividades do Sistema -->
                <div class="card-blue overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-3">{{ __("Atividades do Sistema") }}</h3>
                        <p class="mb-4 opacity-90">{{ __("Monitore as atividades do sistema.") }}</p>
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __("Ver Logs do Sistema") }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Resumo do sistema -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">{{ __("Resumo do Sistema") }}</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <h4 class="font-semibold text-blue-800">{{ __("Total de Usuários") }}</h4>
                            <p class="text-2xl font-bold text-blue-800">2</p>
                        </div>
                        
                        <div class="bg-green-100 p-4 rounded-lg">
                            <h4 class="font-semibold text-green-800">{{ __("Total de Clientes") }}</h4>
                            <p class="text-2xl font-bold text-green-800">0</p>
                        </div>
                        
                        <div class="bg-yellow-100 p-4 rounded-lg">
                            <h4 class="font-semibold text-yellow-800">{{ __("Faturamento") }}</h4>
                            <p class="text-2xl font-bold text-yellow-800">R$ 0,00</p>
                        </div>
                        
                        <div class="bg-red-100 p-4 rounded-lg">
                            <h4 class="font-semibold text-red-800">{{ __("Serviços Ativos") }}</h4>
                            <p class="text-2xl font-bold text-red-800">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>