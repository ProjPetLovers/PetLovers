<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Header da Página -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="relative p-8" style="background: linear-gradient(to right, #e3967d, #f28a49);">
                    <div class="text-center text-white">
                        <h1 class="text-4xl font-bold mb-2 flex items-center justify-center">
                            {{-- <img src="{{ asset('imagem/logo.png') }}" alt="Logo" class="w-20 h-30 mr-3" /> --}}
                            Comunidade Pet
                        </h1>
                        <p class="text-xl opacity-90">Conecte-se com outros amantes de pets</p>
                        <div class="flex items-center justify-center mt-4 space-x-6 text-sm">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                </svg>
                                {{ $usuarios->total() }} usuários
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M4.5 12.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5S6.83 11 6 11s-1.5.67-1.5 1.5zM9 16c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5S11.33 14.5 10.5 14.5 9 15.17 9 16zm4.5-3c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5-1.5.67-1.5 1.5z" />
                                </svg>
                                Encontre seu match
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seção dos Filtros Modificada -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="p-6">
                    <!-- Header dos filtros com botão para mobile -->
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                            <svg class="w-5 h-5 mr-2 text-[#8dafa0]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.414A1 1 0 013 6.707V4z" />
                            </svg>
                            <span class="hidden sm:inline">Filtros de Busca</span>
                            <span class="sm:hidden">Filtros</span>
                        </h2>
                        <!-- Botão para abrir/fechar filtros no mobile -->
                        <button id="toggle-filters"
                            class="sm:hidden inline-flex items-center px-3 py-2 bg-[#8dafa0] hover:bg-[#e3967d] text-white rounded-lg transition duration-150 ease-in-out"
                            onclick="toggleFilters()">
                            <svg id="filter-icon-closed" class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                            <svg id="filter-icon-open" class="w-5 h-5 hidden" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                    </div>

                    <!-- Container dos filtros - oculto por padrão no mobile -->
                    <div id="filters-container" class="hidden sm:block">
                        <form method="GET"
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
                            <!-- Seus campos de filtro existentes permanecem iguais -->
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nome</label>
                                <input type="text" name="nome" placeholder="Digite o nome..."
                                    value="{{ request('nome') }}"
                                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm focus:border-[#e3967d] focus:ring-[#e3967d] dark:bg-gray-700 dark:text-white">
                            </div>

                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Conexões</label>
                                <select name="conexao"
                                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm focus:border-[#e3967d] focus:ring-[#e3967d] dark:bg-gray-700 dark:text-white">
                                    <option value="">Todas as conexões</option>
                                    <option value="aceito" {{ request('conexao') == 'aceito' ? 'selected' : '' }}>
                                        Aceitas</option>
                                    <option value="pendente" {{ request('conexao') == 'pendente' ? 'selected' : '' }}>
                                        Pendentes</option>
                                </select>
                            </div>

                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Localização</label>
                                <input type="text" name="localizacao" placeholder="Cidade, estado..."
                                    value="{{ request('localizacao') }}"
                                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm focus:border-[#e3967d] focus:ring-[#e3967d] dark:bg-gray-700 dark:text-white">
                            </div>

                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Intenção</label>
                                <select name="intencao"
                                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm focus:border-[#e3967d] focus:ring-[#e3967d] dark:bg-gray-700 dark:text-white">
                                    <option value="">Todas as intenções</option>
                                    <option value="Namoro" {{ request('intencao') == 'Namoro' ? 'selected' : '' }}>
                                        Namoro</option>
                                    <option value="Amizade" {{ request('intencao') == 'Amizade' ? 'selected' : '' }}>
                                        Amizade</option>
                                    <option value="Passeio" {{ request('intencao') == 'Passeio' ? 'selected' : '' }}>
                                        Passeio</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Socializa
                                    com</label>
                                <select name="socializa_com"
                                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm focus:border-[#e3967d] focus:ring-[#e3967d] dark:bg-gray-700 dark:text-white">
                                    <option value="">Todas as opções</option>
                                    <option value="Adulto" {{ request('socializa_com') == 'Adulto' ? 'selected' : '' }}>
                                        Adulto</option>
                                    <option value="Criança"
                                        {{ request('socializa_com') == 'Criança' ? 'selected' : '' }}>Criança</option>
                                    <option value="Outros pets"
                                        {{ request('socializa_com') == 'Outros pets' ? 'selected' : '' }}>Outros pets
                                    </option>
                                    <option value="Não socializa"
                                        {{ request('socializa_com') == 'Não socializa' ? 'selected' : '' }}>Não
                                        socializa</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Espécie
                                    do Pet</label>
                                <select name="especie"
                                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm focus:border-[#e3967d] focus:ring-[#e3967d] dark:bg-gray-700 dark:text-white">
                                    <option value="">Todas as espécies</option>
                                    <option value="Cão" {{ request('especie') == 'Cão' ? 'selected' : '' }}>Cão
                                    </option>
                                    <option value="Gato" {{ request('especie') == 'Gato' ? 'selected' : '' }}>Gato
                                    </option>
                                    <option value="Pássaro" {{ request('especie') == 'Pássaro' ? 'selected' : '' }}>
                                        Pássaro</option>
                                    <option value="Peixe" {{ request('especie') == 'Peixe' ? 'selected' : '' }}>Peixe
                                    </option>
                                    <option value="Roedor" {{ request('especie') == 'Roedor' ? 'selected' : '' }}>
                                        Roedor</option>
                                    <option value="Réptil" {{ request('especie') == 'Réptil' ? 'selected' : '' }}>
                                        Réptil</option>
                                    <option value="Outro" {{ request('especie') == 'Outro' ? 'selected' : '' }}>Outro
                                    </option>
                                </select>
                            </div>

                            <div class="xl:col-span-6 flex gap-3 mt-4">
                                <button type="submit"
                                    class="inline-flex items-center px-6 py-2 bg-[#8dafa0] hover:bg-[#e3967d] text-white font-medium rounded-lg transition duration-150 ease-in-out">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                    Filtrar
                                </button>

                                <a href="{{ route('usuarios') }}"
                                    class="inline-flex items-center px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition duration-150 ease-in-out">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Limpar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- JavaScript para controlar os filtros -->
            <script>
                function toggleFilters() {
                    const container = document.getElementById('filters-container');
                    const iconClosed = document.getElementById('filter-icon-closed');
                    const iconOpen = document.getElementById('filter-icon-open');
                    if (container.classList.contains('hidden')) {
                        container.classList.remove('hidden');
                        iconClosed.classList.add('hidden');
                        iconOpen.classList.remove('hidden');
                    } else {
                        container.classList.add('hidden');
                        iconClosed.classList.remove('hidden');
                        iconOpen.classList.add('hidden');
                    }
                }
            </script>

            <!-- Cards de Usuários -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($usuarios as $usuario)
                    @php
                        $detalhes = $usuario->DetalhesUsuario;
                        $pets = $usuario->Pet; // Todos os pets do usuário
                        $pet = $pets->first(); // Primeiro pet para compatibilidade
                    @endphp

                    <a href="{{ route('usuario_conexao', ['id' => $usuario->id]) }}"
                        class="block bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 dark:border-gray-700 transform hover:-translate-y-1">

                        <!-- Header do Card com Gradiente -->
                        <div class="relative p-4" style="background: linear-gradient(135deg, #f7e3b2, #e3967d);">
                            <div class="flex items-center space-x-4">
                                <div class="relative">
                                    @if ($detalhes?->foto)
                                        @if (Str::startsWith($detalhes->foto, ['http://', 'https://']))
                                            <img src="{{ $detalhes->foto }}"
                                                alt="Foto de {{ $detalhes?->nome ?? $usuario->name }}"
                                                class="w-20 h-20 rounded-full object-cover border-3 border-white shadow-lg">
                                        @else
                                            <img src="{{ asset('storage/' . $detalhes->foto) }}"
                                                alt="Foto de {{ $detalhes?->nome ?? $usuario->name }}"
                                                class="w-20 h-20 rounded-full object-cover border-3 border-white shadow-lg">
                                        @endif
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($detalhes?->nome ?? $usuario->name) }}&background=e3967d&color=fff&size=80"
                                            alt="Foto de {{ $detalhes?->nome ?? $usuario->name }}"
                                            class="w-20 h-20 rounded-full object-cover border-3 border-white shadow-lg">
                                    @endif
                                </div>

                                <div class="text-white flex-1">
                                    <h2 class="text-xl font-bold">{{ $detalhes?->nome ?? $usuario->name }}</h2>
                                    <p></p>
                                    @if ($detalhes?->localizacao)
                                        <p class="text-xs opacity-75 flex items-center mt-1">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                            </svg>
                                            {{ $detalhes->localizacao }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Fotos dos Pets -->
                        @if ($pets->count() > 0)
                            <div
                                class="px-4 py-3 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                                <div class="flex items-center justify-between mb-2">
                                    <h3
                                        class="text-sm font-semibold text-gray-700 dark:text-gray-300 flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-[#e3967d]" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M4.5 12.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5S6.83 11 6 11s-1.5.67-1.5 1.5zM9 16c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5S11.33 14.5 10.5 14.5 9 15.17 9 16zm4.5-3c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5-1.5.67-1.5 1.5z" />
                                        </svg>
                                        {{ $pets->count() == 1 ? 'Meu Pet' : 'Meus Pets' }}
                                    </h3>
                                    @if ($pets->count() > 1)
                                        <span class="text-xs bg-[#e3967d] text-white px-2 py-1 rounded-full">
                                            {{ $pets->count() }} pets
                                        </span>
                                    @endif
                                </div>

                                <!-- Grid de fotos dos pets -->
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($pets->take(4) as $petItem)
                                        <div class="relative group">
                                            @if ($petItem->foto)
                                                @if (Str::startsWith($petItem->foto, ['http://', 'https://']))
                                                    <img src="{{ $petItem->foto }}"
                                                        alt="Foto de {{ $petItem->nome }}"
                                                        class="w-12 h-12 rounded-lg object-cover border-2 border-white shadow-sm group-hover:scale-105 transition-transform duration-200">
                                                @else
                                                    <img src="{{ asset('storage/' . $petItem->foto) }}"
                                                        alt="Foto de {{ $petItem->nome }}"
                                                        class="w-12 h-12 rounded-lg object-cover border-2 border-white shadow-sm group-hover:scale-105 transition-transform duration-200">
                                                @endif
                                            @else
                                                <div
                                                    class="w-12 h-12 rounded-lg bg-gradient-to-br from-[#e3967d] to-[#f28a49] flex items-center justify-center border-2 border-white shadow-sm group-hover:scale-105 transition-transform duration-200">
                                                    <svg class="w-6 h-6 text-white" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M4.5 12.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5S6.83 11 6 11s-1.5.67-1.5 1.5zM9 16c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5S11.33 14.5 10.5 14.5 9 15.17 9 16zm4.5-3c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5-1.5.67-1.5 1.5z" />
                                                    </svg>
                                                </div>
                                            @endif

                                            <!-- Tooltip com nome e espécie -->
                                            <div
                                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block z-10">
                                                <div
                                                    class="bg-gray-900 text-white text-xs rounded py-1 px-2 whitespace-nowrap">
                                                    {{ $petItem->nome }}
                                                    @if ($petItem->especie)
                                                        <span class="text-gray-300">• {{ $petItem->especie }}</span>
                                                    @endif
                                                    <div
                                                        class="absolute top-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-900">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!-- Indicador de mais pets -->
                                    @if ($pets->count() > 4)
                                        <div
                                            class="w-12 h-12 rounded-lg bg-gray-300 dark:bg-gray-600 flex items-center justify-center border-2 border-white shadow-sm">
                                            <span class="text-xs font-semibold text-gray-600 dark:text-gray-300">
                                                +{{ $pets->count() - 4 }}
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Nomes dos pets -->
                                <div class="mt-2 flex flex-wrap gap-1">
                                    @foreach ($pets->take(3) as $petItem)
                                        <span class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $petItem->nome }}@if (!$loop->last && $pets->count() <= 3)
                                                ,
                                            @endif
                                        </span>
                                    @endforeach
                                    @if ($pets->count() > 3)
                                        <span class="text-xs text-gray-500 dark:text-gray-400">
                                            e mais {{ $pets->count() - 3 }}...
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <!-- Conteúdo do Card -->
                        <div class="p-4">
                            <!-- Tags/Badges -->
                            <div class="flex flex-wrap gap-2 mb-3">
                                @if ($detalhes && is_numeric($detalhes->cod_intencao))
                                    @php
                                        $descricao = '';
                                        switch ($detalhes->cod_intencao) {
                                            case 1:
                                                $descricao = 'Namoro';
                                                break;
                                            case 2:
                                                $descricao = 'Amizade';
                                                break;
                                            case 3:
                                                $descricao = 'Passeio';
                                                break;
                                            default:
                                                $descricao = 'Intenção não encontrada';
                                        }
                                    @endphp
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#f7e3b2] text-[#57342d]">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm3.5 6L12 10.5 8.5 8 12 5.5 15.5 8zM12 13.5L8.5 16 12 18.5 15.5 16 12 13.5z" />
                                        </svg>
                                        {{ $descricao }}
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#f7e3b2] text-[#57342d]">
                                        Sem intenção
                                    </span>
                                @endif


                                @if ($pets && count($pets) > 0)
                                    @foreach ($pets as $pet)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#9dbfa4] text-white">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M4.5 12.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5S6.83 11 6 11s-1.5.67-1.5 1.5zM9 16c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5S11.33 14.5 10.5 14.5 9 15.17 9 16z" />
                                            </svg>
                                            {{ $pet->especie }}
                                        </span>
                                    @endforeach
                                @else
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#9dbfa4] text-white">
                                        Nenhum pet encontrado
                                    </span>
                                @endif

                                @if ($detalhes?->socializa_com)
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#f28a49] text-white">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63c-.24-.74-.9-1.27-1.71-1.27h-5.5c-.8 0-1.47.53-1.71 1.27L9 16h2.5v6h8z" />
                                        </svg>
                                        {{ $detalhes->socializa_com }}
                                    </span>
                                @endif
                            </div>

                            <!-- Bio -->
                            @if ($detalhes?->bio)
                                <div class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                                    <p class="line-clamp-3">{{ $detalhes->bio }}</p>
                                </div>
                            @else
                                <div class="text-gray-500 dark:text-gray-400 text-sm italic">
                                    Usuário ainda não adicionou uma biografia.
                                </div>
                            @endif

                            <!-- Footer do Card -->
                            <div
                                class="mt-4 pt-3 border-t border-gray-200 dark:border-gray-600 flex items-center justify-between">
                                <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                    </svg>
                                    Membro desde {{ $usuario->created_at->format('M Y') }}
                                </div>

                                <div class="text-xs font-medium text-[#e3967d]">
                                    Ver perfil →
                                </div>
                            </div>
                        </div>
                    </a>
                    @empty
                        <!-- Estado Vazio -->
                        <div class="col-span-full">
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-12 text-center">
                                <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Nenhum usuário
                                    encontrado</h3>
                                <p class="text-gray-500 dark:text-gray-400 mb-6">Tente ajustar os filtros de busca ou
                                    explore outros usuários.</p>
                                <a href="{{ route('usuarios') }}"
                                    class="inline-flex items-center px-6 py-3 bg-[#e3967d] hover:bg-[#8dafa0] text-white font-medium rounded-lg transition duration-150 ease-in-out">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Ver todos os usuários
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Paginação -->
                @if ($usuarios->hasPages())
                    <div class="mt-12">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                            {{ $usuarios->withQueryString()->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </x-app-layout>
