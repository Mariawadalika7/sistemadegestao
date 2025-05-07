<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Usuários') }}
            </h2>
            <a href="{{ route('user.create') }}" class="px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-blue-800 uppercase tracking-widest hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Adicionar Usuário') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($users->isEmpty())
                        <p class="text-gray-600">{{ __('Nenhum usuário cadastrado.') }}</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Nome') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Email') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Função') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Criado em') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Ações') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="py-4 px-4 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                                            <td class="py-4 px-4 text-sm text-gray-500">{{ $user->email }}</td>
                                            <td class="py-4 px-4 text-sm text-gray-500">
                                                @if($user->role === 'admin')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                        {{ __('Administrador') }}
                                                    </span>
                                                @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ __('Funcionário') }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="py-4 px-4 text-sm text-gray-500">{{ $user->created_at->format('d/m/Y') }}</td>
                                            <td class="py-4 px-4 text-sm font-medium">
                                                <div class="flex space-x-2">
                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">{{ __('Editar') }}</a>
                                                    <a href="#" class="text-red-600 hover:text-red-900">{{ __('Excluir') }}</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 