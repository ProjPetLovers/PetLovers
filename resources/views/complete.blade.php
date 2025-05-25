?>
<x-guest-layout>
    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Revisar e Finalizar Cadastro</h2>
            <p class="text-gray-600 dark:text-gray-400">Confirme todos os dados antes de finalizar</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Dados do Usuário -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4 text-blue-600">Dados do Usuário</h3>
                <div class="space-y-2">
                    <div><strong>Nome:</strong> {{ $userData['name'] }}</div>
                    <div><strong>Email:</strong> {{ $userData['email'] }}</div>
                </div>
            </div>

            <!-- Detalhes -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4 text-green-600">Seus Detalhes</h3>
                <div class="space-y-2">
                    <div><strong>Nome:</strong> {{ $detalhesData['nome'] }}</div>
                    <div><strong>Apelido:</strong> {{ $detalhesData['apelido'] }}</div>
                    <div><strong>Nascimento:</strong> {{ \Carbon\Carbon::parse($detalhesData['data_nascimento'])->format('d/m/Y') }}</div>
                    <div><strong>Localização:</strong> {{ $detalhesData['localizacao'] }}</div>
                    <div><strong>Bio:</strong> {{ $detalhesData['bio'] ?? 'Não informada' }}</div>
                    <div><strong>Foto:</strong> {{ isset($detalhesData['foto']) ? 'Enviada' : 'Não enviada' }}</div>
                </div>
            </div>

            <!-- Dados do Pet -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4 text-purple-600">Dados do Pet</h3>
                <div class="space-y-2">
                    <div><strong>Nome:</strong> {{ $petData['nome'] }}</div>
                    <div><strong>Espécie:</strong> {{ $petData['especie'] }}</div>
                    <div><strong>Raça:</strong> {{ $petData['raca'] }}</div>
                    <div><strong>Sexo:</strong> {{ $petData['sexo'] == 'M' ? 'Macho' : 'Fêmea' }}</div>
                    <div><strong>Peso:</strong> {{ $petData['peso'] }}kg</div>
                    <div><strong>Nascimento:</strong> {{ \Carbon\Carbon::parse($petData['data_nascimento'])->format('d/m/Y') }}</div>
                    <div><strong>Castrado:</strong> {{ $petData['castrado'] ? 'Sim' : 'Não' }}</div>
                    <div><strong>Foto:</strong> {{ isset($petData['foto']) ? 'Enviada' : 'Não enviada' }}</div>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('registration.complete') }}">
            @csrf

            <div class="flex items-center justify-between">
                <a href="{{ route('pet.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    {{ __('Voltar') }}
                </a>

                <x-primary-button class="bg-green-600 hover:bg-green-700">
                    {{ __('Finalizar Cadastro') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>

<?php
