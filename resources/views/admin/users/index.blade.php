<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Header da Página -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="relative p-8" style="background: linear-gradient(to right, #e3967d, #f28a49);">
                    <div class="text-center text-white">
                        <h1 class="text-4xl font-bold mb-2 flex items-center justify-center">
                            Painel de Administração de Usuários
                        </h1>
                        <p class="text-xl opacity-90">Gerencie todos os usuários da Comunidade Pet</p>
                        <div class="flex items-center justify-center mt-4 space-x-6 text-sm">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                </svg>
                                {{ $usuarios->total() }} usuários (incluindo desativados)
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filtros -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-[#8dafa0]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.414A1 1 0 013 6.707V4z" />
                        </svg>
                        Filtros de Busca
                    </h2>

                    <form method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">ID</label>
                            <input type="number" name="id" placeholder="Digite o ID..." value="{{ request('id') }}"
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm focus:border-[#e3967d] focus:ring-[#e3967d] dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nome</label>
                            <input type="text" name="nome" placeholder="Digite o nome..." value="{{ request('nome') }}"
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm focus:border-[#e3967d] focus:ring-[#e3967d] dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                            <input type="email" name="email" placeholder="Digite o email..." value="{{ request('email') }}"
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm focus:border-[#e3967d] focus:ring-[#e3967d] dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
                            <select name="status" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm focus:border-[#e3967d] focus:ring-[#e3967d] dark:bg-gray-700 dark:text-white">
                                <option value="">Todos os status</option>
                                <option value="ativo" {{ request('status') == 'ativo' ? 'selected' : '' }}>Ativo</option>
                                <option value="inativo" {{ request('status') == 'inativo' ? 'selected' : '' }}>Inativo</option>
                            </select>
                        </div>

                        <div class="lg:col-span-4 flex gap-3 mt-4">
                            <button type="submit" class="inline-flex items-center px-6 py-2 bg-[#8dafa0] hover:bg-[#e3967d] text-white font-medium rounded-lg transition duration-150 ease-in-out">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Filtrar
                            </button>

                            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition duration-150 ease-in-out">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Limpar
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Lista de Usuários -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($usuarios as $usuario)
                        @php
                            $detalhes = $usuario->DetalhesUsuario;
                        @endphp

                        <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                            <div class="flex items-center justify-between">
                                <!-- Seção Esquerda: Foto, ID, Nome, Email -->
                                <div class="flex items-center space-x-4 flex-1">
                                    <!-- Foto -->
                                    <div class="flex-shrink-0">
                                        @if ($detalhes?->foto)
                                            @if (Str::startsWith($detalhes->foto, ['http://', 'https://']))
                                                <img src="{{ $detalhes->foto }}" alt="Foto de {{ $detalhes?->nome ?? $usuario->name }}"
                                                    class="w-16 h-16 rounded-full object-cover border-2 border-gray-200 dark:border-gray-600">
                                            @else
                                                <img src="{{ asset('storage/' . $detalhes->foto) }}" alt="Foto de {{ $detalhes?->nome ?? $usuario->name }}"
                                                    class="w-16 h-16 rounded-full object-cover border-2 border-gray-200 dark:border-gray-600">
                                            @endif
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($detalhes?->nome ?? $usuario->name) }}&background=e3967d&color=fff&size=64"
                                                alt="Foto de {{ $detalhes?->nome ?? $usuario->name }}"
                                                class="w-16 h-16 rounded-full object-cover border-2 border-gray-200 dark:border-gray-600">
                                        @endif
                                    </div>

                                    <!-- Informações do Usuário -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center space-x-3">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white truncate">
                                                {{ $detalhes?->nome ?? $usuario->name }}
                                            </h3>
                                            
                                            <!-- Status Badge -->
                                            @if ($usuario->trashed())
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Inativo
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Ativo
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                            <p><span class="font-medium">ID:</span> {{ $usuario->id }}</p>
                                            <p><span class="font-medium">Email:</span> {{ $usuario->email }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">
                                                Membro desde {{ $usuario->created_at->format('d/m/Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Seção Direita: Botões de Ação -->
                                <div class="flex items-center space-x-2 ml-4">
                                    <!-- Botão de Reativar (apenas para usuários desativados) -->
                                    @if ($usuario->trashed())
                                        <form action="{{ route('admin.users.restore', $usuario->id) }}" method="POST" 
                                              onsubmit="return confirm('Tem certeza que deseja reativar a conta de {{ $usuario->name }}?');" 
                                              class="inline">
                                            @csrf
                                            <button type="submit" 
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-lg bg-green-500 hover:bg-green-600 text-white transition duration-150 ease-in-out">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                </svg>
                                                Reativar
                                            </button>
                                        </form>
                                    @endif

                                    <!-- Botão de Soft Delete (apenas para usuários ativos) -->
                                    @if (!$usuario->trashed())
                                        <form action="{{ route('admin.users.soft-delete', $usuario->id) }}" method="POST" 
                                              onsubmit="return confirm('Tem certeza que deseja desativar a conta de {{ $usuario->name }} (soft delete)?');" 
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-lg bg-yellow-500 hover:bg-yellow-600 text-white transition duration-150 ease-in-out">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728" />
                                                </svg>
                                                Soft Delete
                                            </button>
                                        </form>
                                    @endif

                                    <!-- Botão de Exclusão Permanente -->
                                    <form action="{{ route('admin.users.force-delete', $usuario->id) }}" method="POST" 
                                          onsubmit="return confirm('ATENÇÃO: Tem certeza que deseja EXCLUIR PERMANENTEMENTE a conta de {{ $usuario->name }}? Esta ação é irreversível!');" 
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-lg bg-red-600 hover:bg-red-700 text-white transition duration-150 ease-in-out">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Estado Vazio -->
                        <div class="p-12 text-center">
                            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Nenhum usuário encontrado</h3>
                            <p class="text-gray-500 dark:text-gray-400 mb-6">Tente ajustar os filtros de busca ou explore outros usuários.</p>
                            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-6 py-3 bg-[#e3967d] hover:bg-[#8dafa0] text-white font-medium rounded-lg transition duration-150 ease-in-out">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Ver todos os usuários
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Paginação -->
            @if ($usuarios->hasPages())
                <div class="mt-8">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                        {{ $usuarios->withQueryString()->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>