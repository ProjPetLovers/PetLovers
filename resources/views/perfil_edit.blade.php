<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                
                <!-- Header -->
                <div class="bg-gradient-to-r from-[#e3967d] to-[#57342d] p-8">
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <h1 class="text-3xl font-bold text-white">Editar Perfil</h1>
                    </div>
                </div>
                

                @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <strong>Erro!</strong> Verifique os campos abaixo:
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



                <!-- Formulário -->
                <div class="p-8">
                    <form action="{{ route('profile.update-details') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- Seção de Fotos -->
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                <svg class="inline w-5 h-5 mr-2 text-[#e3967d]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Fotos do Perfil
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Foto do Perfil -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Foto do Perfil
                                    </label>
                                    <div class="flex items-center space-x-4">
                                        <div class="w-20 h-20 rounded-full overflow-hidden bg-gray-100 dark:bg-gray-600">
                                            @if($userData['foto_url'])
                                                <img src="{{ $userData['foto_url'] }}" alt="Foto atual" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <input type="file" name="foto" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#e3967d] file:text-white hover:file:bg-[#d68a6a]">
                                    </div>
                                </div>

                                <!-- Foto de Fundo -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Foto de Fundo
                                    </label>
                                    <div class="flex items-center space-x-4">
                                        <div class="w-20 h-12 rounded overflow-hidden bg-gray-100 dark:bg-gray-600">
                                            @if($userData['fundo_url'])
                                                <img src="{{ $userData['fundo_url'] }}" alt="Fundo atual" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full bg-gradient-to-r from-[#e3967d] to-[#57342d]"></div>
                                            @endif
                                        </div>
                                        <input type="file" name="photo_fundo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#e3967d] file:text-white hover:file:bg-[#d68a6a]">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informações Pessoais -->
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                <svg class="inline w-5 h-5 mr-2 text-[#9dbfa4]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                Informações Pessoais
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nome -->
                                <div>
                                    <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Nome Completo
                                    </label>
                                    <input 
                                        type="text" 
                                        id="nome" 
                                        name="nome" 
                                        value="{{ old('nome', $userData['name']) }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-[#e3967d] focus:border-[#e3967d] dark:bg-gray-800 dark:text-white"
                                        required
                                    >
                                    @error('nome')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Apelido -->
                                <div>
                                    <label for="apelido" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Apelido
                                    </label>
                                    <input 
                                        type="text" 
                                        id="apelido" 
                                        name="apelido" 
                                        value="{{ old('apelido', $userData['apelido']) }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-[#e3967d] focus:border-[#e3967d] dark:bg-gray-800 dark:text-white"
                                    >
                                    @error('apelido')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                

                                <!-- Data de Nascimento -->
                                <div>
                                    <label for="data_nascimento" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Data de Nascimento
                                    </label>
                                    <input 
                                        type="date" 
                                        id="data_nascimento" 
                                        name="data_nascimento" 
                                        value="{{ old('data_nascimento', $detalhes?->data_nascimento) }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-[#e3967d] focus:border-[#e3967d] dark:bg-gray-800 dark:text-white"
                                    >
                                    @error('data_nascimento')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Localização -->
                                <div class="md:col-span-2">
                                    <label for="localizacao" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Localização
                                    </label>
                                    <input 
                                        type="text" 
                                        id="localizacao" 
                                        name="localizacao" 
                                        value="{{ old('localizacao', $userData['localizacao']) }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-[#e3967d] focus:border-[#e3967d] dark:bg-gray-800 dark:text-white"
                                        placeholder="Ex: São Paulo, SP"
                                    >
                                    @error('localizacao')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Bio e Intenção -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Bio -->
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    <svg class="inline w-5 h-5 mr-2 text-[#e3967d]" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                    </svg>
                                    Sobre Mim
                                </h3>
                                <textarea 
                                    id="bio" 
                                    name="bio" 
                                    rows="4"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-[#e3967d] focus:border-[#e3967d] dark:bg-gray-800 dark:text-white"
                                    placeholder="Conte um pouco sobre você..."
                                >{{ old('bio', $userData['bio']) }}</textarea>
                                @error('bio')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Intenção -->
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    <svg class="inline w-5 h-5 mr-2 text-[#f7e3b2]" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                    </svg>
                                    Intenção
                                </h3>
                                <select 
                                    id="cod_intencao" 
                                    name="cod_intencao"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-[#e3967d] focus:border-[#e3967d] dark:bg-gray-800 dark:text-white"
                                >
                                    <option value="">Selecione uma intenção</option>
                                    @foreach($intencoes as $intencao)
                                        <option value="{{ $intencao->cod_intencao }}" 
                                                {{ old('cod_intencao', $detalhes?->cod_intencao) == $intencao->cod_intencao ? 'selected' : '' }}>
                                            {{ $intencao->descricao }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('cod_intencao')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Botões de Ação -->
                        <div class="flex flex-wrap gap-4 justify-center pt-6 border-t border-gray-200 dark:border-gray-600">
                            <button 
                                type="submit" 
                                class="inline-flex items-center px-6 py-3 bg-[#e3967d] hover:bg-[#d68a6a] text-white font-medium rounded-lg transition duration-150 ease-in-out"
                            >
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Salvar Alterações
                            </button>
                            
                            <a href="{{ route('profile.show') }}" 
                               class="inline-flex items-center px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition duration-150 ease-in-out">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para preview das imagens -->
    <script>
        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(previewId).src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.querySelector('input[name="foto"]').addEventListener('change', function() {
            previewImage(this, 'foto-preview');
        });

        document.querySelector('input[name="photo_fundo"]').addEventListener('change', function() {
            previewImage(this, 'fundo-preview');
        });
    </script>
</x-app-layout>