<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Painel do Funcionário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">{{ __("Bem-vindo, ") }} {{ Auth::user()->name }}!</h3>
                    <p class="mb-2">{{ __("Você está logado como Funcionário.") }}</p>
                </div>
            </div>

            <!-- Cards de acesso rápido -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Card Clientes -->
                <div class="card-blue overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-3">{{ __("Clientes") }}</h3>
                        <p class="mb-4 opacity-90">{{ __("Gerencie os clientes cadastrados no sistema.") }}</p>
                        <a href="{{ route('clientes.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __("Ver Clientes") }}
                        </a>
                    </div>
                </div>

                <!-- Card Gerir Atividades -->
                <div class="card-green overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-3">{{ __("Gerir Atividades") }}</h3>
                        <p class="mb-4 opacity-90">{{ __("Gerencie as atividades do sistema.") }}</p>
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __("Gerir Atividades") }}
                        </a>
                    </div>
                </div>

                <!-- Card Gerir Consumo -->
                <div class="card-yellow overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-3">{{ __("Gerir Consumo") }}</h3>
                        <p class="mb-4 opacity-90">{{ __("Gerencie o consumo no sistema.") }}</p>
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-yellow-700 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __("Gerir Consumo") }}
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Segunda linha de cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Card Pagamentos -->
                <div class="card-red overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-3">{{ __("Pagamentos") }}</h3>
                        <p class="mb-4 opacity-90">{{ __("Gerencie os pagamentos no sistema.") }}</p>
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __("Ver Pagamentos") }}
                        </a>
                    </div>
                </div>

                <!-- Card Faturas -->
                <div class="card-blue overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-3">{{ __("Faturas") }}</h3>
                        <p class="mb-4 opacity-90">{{ __("Visualize e gerencie as faturas do sistema.") }}</p>
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __("Ver Faturas") }}
                        </a>
                    </div>
                </div>

                <!-- Card Relatórios -->
                <div class="card-green overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-3">{{ __("Relatórios") }}</h3>
                        <p class="mb-4 opacity-90">{{ __("Acesse os relatórios do sistema.") }}</p>
                        <div class="space-y-2">
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __("Relatórios de Consumo") }}
                            </a>
                            <div class="block"></div>
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __("Relatórios Financeiros") }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seção de atividades recentes -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">{{ __("Atividades Recentes") }}</h3>
                    <p class="text-gray-600">{{ __("Aqui serão exibidas suas atividades recentes no sistema.") }}</p>
                    
                    <div class="mt-4 border-t pt-4">
                        <p class="text-sm text-gray-500">{{ __("Nenhuma atividade recente para exibir.") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
