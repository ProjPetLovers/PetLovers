<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Header do Perfil -->
                <div
                    class="relative p-8"
                    @if($userData['fundo_url'])
                        style="background-image: url('{{ $userData['fundo_url'] }}'); background-size: cover; background-position: center;"
                    @else
                        style="background: linear-gradient(to right, #e3967d, #57342d);"
                    @endif>
                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6">
                        <!-- Foto do Usuário -->
                        <div class="relative">
                            @if($userData['foto_url'])
                                <img src="{{ $userData['foto_url'] }}"
                                    alt="Foto do usuário"
                                    class="w-40 h-40 rounded-full border-4 border-white shadow-lg object-cover">
                            @else
                                <div class="w-40 h-40 rounded-full border-4 border-white shadow-lg bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Informações Principais -->
                        <div class="text-center md:text-left text-white">
                            <h1 class="text-3xl font-bold">{{ $userData['name'] }}</h1>
                            @if($userData['apelido'])
                                <p class="text-xl opacity-90">"{{ $userData['apelido'] }}"</p>
                            @endif
                            <p class="text-lg opacity-75">{{ $userData['email'] }}</p>
                            @if($userData['localizacao'])
                                <p class="text-sm opacity-75 flex items-center justify-center md:justify-start mt-2">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
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
                            @if($userData['bio'])
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                                        <svg class="inline w-5 h-5 mr-2 text-[#e3967d]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                        Sobre mim
                                    </h3>
                                    <p class="text-gray-700 dark:text-gray-300">{{ $userData['bio'] }}</p>
                                </div>
                            @endif

                             <!-- Bio -->
                            @if($userData['bio'])
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                                        <svg class="inline w-5 h-5 mr-2 text-[#f7e3b2]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                        Intenção
                                    </h3>
                                    <p class="text-gray-700 dark:text-gray-300">{{ $intencao->descricao}}</p>
                                </div>
                            @endif

                            <!-- Informações Pessoais -->
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    <svg class="inline w-5 h-5 mr-2 text-[#9dbfa4]" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                    </svg>
                                    Informações Pessoais
                                </h3>
                                <div class="space-y-3">
                                    @if($userData['data_nascimento'])
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-3 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                                            </svg>
                                            <span class="text-gray-700 dark:text-gray-300">
                                                {{ $userData['data_nascimento'] }}
                                                ({{ $userData['idade'] }} anos)
                                            </span>
                                        </div>
                                    @endif
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-3 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                        </svg>
                                        <span class="text-gray-700 dark:text-gray-300">{{ $userData['email'] }}</span>
                                    </div>

                                </div>

                            </div>
                                               <!-- Botões de Ação -->
                    <div class="mt-8 flex flex-wrap gap-4 justify-center">
    <a href="{{ route('profile.edit-details') }}"
       class="inline-flex items-center px-6 py-3 bg-[#e3967d] hover:bg-[#8dafa0] text-white font-medium rounded-lg transition duration-150 ease-in-out" title:"Editar perfil">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
        Editar Perfil
    </a>


                    </div>
                        </div>

                        <!-- Coluna da Direita - Pets -->
                        <div class="lg:col-span-2">
                            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center mb-2 sm:mb-0">
        <svg class="w-6 h-6 mr-2 text-[#f28a49]" fill="currentColor" viewBox="0 0 24 24">
            <path d="M4.5 12.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5S6.83 11 6 11s-1.5.67-1.5 1.5zM9 16c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5S11.33 14.5 10.5 14.5 9 15.17 9 16zm4.5-3c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5-1.5.67-1.5 1.5zM16 7c0 .83.67 1.5 1.5 1.5S19 7.83 19 7s-.67-1.5-1.5-1.5S16 6.17 16 7zM7 7c0 .83.67 1.5 1.5 1.5S10 7.83 10 7s-.67-1.5-1.5-1.5S7 6.17 7 7z"/>
        </svg>
        Meus Pets
    </h2>

    <a href="{{ route('profile.pet.create') }}"
       class="text-white bg-[#f28a49] hover:bg-[#8dafa0] p-2 rounded-full transition duration-150 ease-in-out w-10 h-10 flex items-center justify-center"
       title="Adicionar novo pet">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 4v16m8-8H4"/>
        </svg>
    </a>
</div>

                            <!-- Grid de Pets -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @forelse($pets as $pet)
                                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-gray-200 dark:border-gray-700">
                                        <!-- Foto do Pet -->

                                        <div class="aspect-square bg-gray-100 dark:bg-gray-600 relative">
                                            @if($pet['foto_url'])
                                                <img
                                                    src="{{ $pet['foto_url'] }}"
                                                    alt="Foto de {{ $pet['nome'] }}"
                                                    class="w-full h-full object-cover"
                                                >
                                            @endif
                                            <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-50"></div>
                                        </div>


                                        <!-- Informações do Pet -->
                                        <div class="p-4">
                                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $pet['nome'] }}</h3>

                                             <div class="space-y-2 text-sm">
                                                @if(isset($pet['bio']) && $pet['bio'])
                                                    <div class="flex items-center">
                                                        <span class="font-medium text-gray-600 dark:text-gray-400 w-20">Bio:</span>
                                                        <span class="text-gray-900 dark:text-white">{{ $pet['bio'] }}</span>
                                                    </div>
                                                @endif
<p></p>

</div>

                                            <div class="space-y-2 text-sm">
                                                <div class="flex items-center">
                                                    <span class="font-medium text-gray-600 dark:text-gray-400 w-20">Espécie:</span>
                                                    <span class="text-gray-900 dark:text-white">{{ $pet['especie'] }}</span>
                                                </div>

                                                <div class="flex items-center">
                                                    <span class="font-medium text-gray-600 dark:text-gray-400 w-20">Raça:</span>
                                                    <span class="text-gray-900 dark:text-white">{{ $pet['raca'] }}</span>
                                                </div>

                                                <div class="flex items-center">
                                                    <span class="font-medium text-gray-600 dark:text-gray-400 w-20">Sexo:</span>
                                                    <span class="text-gray-900 dark:text-white">{{ $pet['sexo'] }}</span>
                                                </div>

                                                <div class="flex items-center">
                                                    <span class="font-medium text-gray-600 dark:text-gray-400 w-20">Peso:</span>
                                                    <span class="text-gray-900 dark:text-white">{{ $pet['peso'] }}kg</span>
                                                </div>

                                                @if($pet['idade'])
                                                    <div class="flex items-center">
                                                        <span class="font-medium text-gray-600 dark:text-gray-400 w-20">Idade:</span>
                                                        <span class="text-gray-900 dark:text-white">{{ $pet['idade'] }} anos</span>
                                                    </div>
                                                @endif

                                                <div class="flex items-center">
                                                    <span class="font-medium text-gray-600 dark:text-gray-400 w-20">Castrado:</span>
                                                    <span class="text-gray-900 dark:text-white">{{ $pet['castrado'] }}</span>
                                                </div>

                                                <div class="flex justify-end gap-2 mt-4">
    <a href="{{ route('profile.pet.edit', ['id' => $pet['id']]) }}"
   class="hover:text-red-800" style="color: #e3967d;"
   title="Editar pet">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M16.414 3.586a2 2 0 112.828 2.828L12.828 13H10v-2.828l6.414-6.414z"/>
    </svg>
</a>

    <form action="{{ route('profile.pet.destroy', ['id' => $pet['id']]) }}" method="POST" data-confirm="true">
        @csrf @method('DELETE') <button type="submit" class="text-red-500 hover:text-red-800"
        title="Excluir pet"> <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-3-3v3"/>
             </svg> </button> </form>
</div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-span-2 text-center py-8">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Nenhum pet cadastrado</h3>
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Comece adicionando um pet ao seu perfil.</p>
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
