<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Header do Perfil -->
                @php
                    $fundoUrl = $userData['fundo_url'] ?? '';
                    // Remove prefixo 'photo_fundo/' se já existir
                    if (Str::startsWith($fundoUrl, 'photo_fundo/')) {
                        $fundoUrl = Str::after($fundoUrl, 'photo_fundo/');
                    }

                    if (Str::startsWith($userData['fundo_url'], ['http://', 'https://'])) {
                        $fundo = $userData['fundo_url'];
                    } elseif (file_exists(public_path('storage/photo_fundo/' . $fundoUrl))) {
                        $fundo = asset('storage/photo_fundo/' . $fundoUrl);
                    } elseif (file_exists(public_path('photo_fundo/' . $fundoUrl))) {
                        $fundo = asset('photo_fundo/' . $fundoUrl);
                    } else {
                        $fundo = '';
                    }
                @endphp

                <div class="relative p-8"
                    @if ($fundo) style="background-image: url('{{ $fundo }}'); background-size: cover; background-position: center;"
                    @else
                        style="background: linear-gradient(to right, #e3967d, #57342d);" @endif>

                    <div class=" flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6">
                        <!-- Foto do Usuário -->
                        <div class="relative">
                            @if (!empty($userData['foto_url']))
                                @php
                                    $fotoUrl = $userData['foto_url'];
                                    // Remove prefixo 'foto/' se já existir
                                    if (Str::startsWith($fotoUrl, 'foto/')) {
                                        $fotoUrl = Str::after($fotoUrl, 'foto/');
                                    }
                                    if (Str::startsWith($userData['foto_url'], ['http://', 'https://'])) {
                                        $foto = $userData['foto_url'];
                                    } elseif (file_exists(public_path('storage/foto/' . $fotoUrl))) {
                                        $foto = asset('storage/foto/' . $fotoUrl);
                                    } elseif (file_exists(public_path('foto/' . $fotoUrl))) {
                                        $foto = asset('foto/' . $fotoUrl);
                                    } else {
                                        $foto = '';
                                    }
                                @endphp

                                @if ($foto)
                                    <img src="{{ $foto }}" alt="Foto do usuário"
                                        class="w-40 h-40 rounded-full border-4 border-white shadow-lg object-cover">
                                @else
                                    <div
                                        class="w-40 h-40 rounded-full border-4 border-white shadow-lg bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                        </svg>
                                    </div>
                                @endif
                            @else
                                <div
                                    class="w-40 h-40 rounded-full border-4 border-white shadow-lg bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Informações Principais -->
                        <div class="text-center md:text-left text-white">
                            <h1 class="text-3xl font-bold">{{ $userData['name'] }}</h1>
                            @if ($userData['apelido'])
                                <p class="text-xl opacity-90">"{{ $userData['apelido'] }}"</p>
                            @endif

                            @if ($userData['localizacao'])
                                <p class="text-sm opacity-75 flex items-center justify-center md:justify-start mt-2">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                    </svg>
                                    {{ $userData['localizacao'] }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Conteúdo Principal -->
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                        <!-- Coluna da Esquerda - Informações Pessoais -->
                        <div class="lg:col-span-1 space-y-6">

                            <!-- Bio -->
                            @if ($userData['bio'])
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                                        <svg class="inline w-5 h-5 mr-2 text-[#e3967d]" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                        </svg>
                                        Sobre mim
                                    </h3>
                                    <p class="text-gray-700 dark:text-gray-300">{{ $userData['bio'] }}</p>
                                </div>
                            @endif



                            <!-- Intenção -->
                            @if ($userData['bio'] && $intencao && isset($intencao->descricao))
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">

                                        Intenção
                                    </h3>
                                    <p class="text-gray-700 dark:text-gray-300">{{ $intencao->descricao }}</p>
                                </div>
                            @endif



                            <!-- Informações Pessoais -->
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    <svg class="inline w-5 h-5 mr-2 text-[#9dbfa4]" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                    </svg>
                                    Informações Pessoais
                                </h3>
                                <div class="space-y-3">
                                    @if ($userData['data_nascimento'])
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-3 text-gray-500" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z" />
                                            </svg>
                                            <span class="text-gray-700 dark:text-gray-300">
                                                {{ $userData['data_nascimento'] }}
                                                ({{ $userData['idade'] }} anos)
                                            </span>
                                        </div>
                                    @endif

                                </div>


                            </div>

                            <!-- Conexão e mensagem -->
                            @if (auth()->check() && auth()->id() != $user->id)
                                @if (!$conexao)
                                    <form method="POST" action="{{ route('conexao.solicitar', $user->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="inline-flex items-center px-6 py-2 bg-[#8dafa0] hover:bg-[#e3967d] text-white font-medium rounded-lg transition duration-150 ease-in-out">
                                            Conectar
                                        </button>
                                    </form>
                                    <button disabled
                                        class="inline-flex items-center px-6 py-2 bg-gray-400 text-white font-medium rounded-lg">
                                        Enviar Mensagem
                                    </button>
                                @elseif($conexao->status == 'pendente')
                                    <button disabled
                                        class="inline-flex items-center px-6 py-2 bg-gray-400 text-white font-medium rounded-lg">
                                        Solicitação pendente
                                    </button>
                                    <button disabled
                                        class="inline-flex items-center px-6 py-2 bg-gray-400 text-white font-medium rounded-lg">
                                        Enviar Mensagem
                                    </button>
                                @elseif($conexao->status == 'aceito')
                                    <button disabled
                                        class="inline-flex items-center px-6 py-2 bg-green-600 text-white font-medium rounded-lg">
                                        Conectado
                                    </button>
                                    <a href="{{ route('chat', $user->id) }}"
                                        class="inline-flex items-center px-6 py-2 bg-[#8dafa0] hover:bg-[#e3967d] text-white font-medium rounded-lg transition duration-150 ease-in-out">
                                        Enviar Mensagem
                                    </a>
                                @endif
                            @endif




                        </div>

                        <!-- Coluna da Direita - petsData -->
                        <div class="lg:col-span-2">
                            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                <h2
                                    class="text-2xl font-bold text-gray-900 dark:text-white flex items-center mb-2 sm:mb-0">
                                    <svg class="w-6 h-6 mr-2 text-[#f28a49]" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M4.5 12.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5S6.83 11 6 11s-1.5.67-1.5 1.5zM9 16c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5S11.33 14.5 10.5 14.5 9 15.17 9 16zm4.5-3c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5-1.5.67-1.5 1.5zM16 7c0 .83.67 1.5 1.5 1.5S19 7.83 19 7s-.67-1.5-1.5-1.5S16 6.17 16 7zM7 7c0 .83.67 1.5 1.5 1.5S10 7.83 10 7s-.67-1.5-1.5-1.5S7 6.17 7 7z" />
                                    </svg>
                                    Meus petsData
                                </h2>
                            </div>

                            <!-- Grid de petsData -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @forelse($petsData as $pet)
                                    <div
                                        class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-gray-200 dark:border-gray-700">
                                        <!-- Foto do Pet -->
                                        <div class="aspect-square bg-gray-100 dark:bg-gray-600 relative">
                                            @php
                                                $petFotoUrl = $pet['foto_url'] ?? '';
                                                // Remove prefixo 'fotopet/' se já existir
                                                if (Str::startsWith($petFotoUrl, 'fotopet/')) {
                                                    $petFotoUrl = Str::after($petFotoUrl, 'fotopet/');
                                                }

                                                if (Str::startsWith($pet['foto_url'], ['http://', 'https://'])) {
                                                    $petFoto = $pet['foto_url'];
                                                } elseif (file_exists(public_path('storage/fotopet/' . $petFotoUrl))) {
                                                    $petFoto = asset('storage/fotopet/' . $petFotoUrl);
                                                } elseif (file_exists(public_path('fotopet/' . $petFotoUrl))) {
                                                    $petFoto = asset('fotopet/' . $petFotoUrl);
                                                } else {
                                                    $petFoto = '';
                                                }
                                            @endphp

                                            @if ($petFoto)
                                                <img src="{{ $petFoto }}" alt="Foto de {{ $pet['nome'] }}"
                                                    class="w-full h-full object-cover">
                                            @endif
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-50">
                                            </div>
                                        </div>
                                        <!-- Informações do Pet -->
                                        <div class="p-4">
                                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                                                {{ $pet['nome'] }}</h3>
                                            <div class="space-y-2 text-sm">
                                                @if (isset($pet['bio']) && $pet['bio'])
                                                    <div class="flex items-center">
                                                        <span
                                                            class="font-medium text-gray-600 dark:text-gray-400 w-20">Bio:</span>
                                                        <span
                                                            class="text-gray-900 dark:text-white">{{ $pet['bio'] }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="space-y-2 text-sm">
                                                <div class="flex items-center">
                                                    <span
                                                        class="font-medium text-gray-600 dark:text-gray-400 w-20">Espécie:</span>
                                                    <span
                                                        class="text-gray-900 dark:text-white">{{ $pet['especie'] }}</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <span
                                                        class="font-medium text-gray-600 dark:text-gray-400 w-20">Raça:</span>
                                                    <span
                                                        class="text-gray-900 dark:text-white">{{ $pet['raca'] }}</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <span
                                                        class="font-medium text-gray-600 dark:text-gray-400 w-20">Sexo:</span>
                                                    <span
                                                        class="text-gray-900 dark:text-white">{{ $pet['sexo'] }}</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <span
                                                        class="font-medium text-gray-600 dark:text-gray-400 w-20">Peso:</span>
                                                    <span
                                                        class="text-gray-900 dark:text-white">{{ $pet['peso'] }}kg</span>
                                                </div>
                                                @if ($pet['idade'])
                                                    <div class="flex items-center">
                                                        <span
                                                            class="font-medium text-gray-600 dark:text-gray-400 w-20">Idade:</span>
                                                        <span class="text-gray-900 dark:text-white">{{ $pet['idade'] }}
                                                            anos</span>
                                                    </div>
                                                @endif
                                                <div class="flex items-center">
                                                    <span
                                                        class="font-medium text-gray-600 dark:text-gray-400 w-20">Castrado:</span>
                                                    <span
                                                        class="text-gray-900 dark:text-white">{{ $pet['castrado'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-span-2 text-center py-8">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Nenhum pet
                                            cadastrado</h3>
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Comece adicionando um
                                            pet ao seu perfil.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
