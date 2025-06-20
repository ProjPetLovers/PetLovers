<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Header -->
                <div class="bg-gradient-to-r from-[#e3967d] to-[#57342d] p-8">
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4.354a4.354 4.354 0 100 8.708 4.354 4.354 0 000-8.708zM12 14a8.354 8.354 0 100 16.708A8.354 8.354 0 0012 14z"/>
                        </svg>
                        <h1 class="text-3xl font-bold text-white">Cadastrar Novo Pet</h1>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded m-6">
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
                    <form method="POST" action="{{ route('profile.pet.storeForProfile') }}" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nome -->
                            <div>
                                <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome do Pet</label>
                                <input type="text" id="nome" name="nome" value="{{ old('nome') }}"
                                       class="w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white"
                                       maxlength="30" required>
                            </div>

                            <!-- Espécie -->
                            <div>
                                <label for="especie" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Espécie</label>
                                <select id="especie" name="especie"
                                        class="w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white"
                                        required>
                                    <option value="">Selecione</option>
                                    @foreach(['Cão', 'Gato', 'Ave', 'Coelho', 'Peixe', 'Outro'] as $especie)
                                        <option value="{{ $especie }}" {{ old('especie') == $especie ? 'selected' : '' }}>{{ $especie }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Raça -->
                            <div>
                                <label for="raca" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Raça</label>
                                <input type="text" id="raca" name="raca" value="{{ old('raca') }}"
                                       class="w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white"
                                       maxlength="50" required>
                            </div>

                            <!-- Sexo -->
                            <div>
                                <label for="sexo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sexo</label>
                                <select id="sexo" name="sexo"
                                        class="w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white"
                                        required>
                                    <option value="">Selecione</option>
                                    <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Macho</option>
                                    <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Fêmea</option>
                                </select>
                            </div>

                            <!-- Peso -->
                            <div>
                                <label for="peso" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Peso (kg)</label>
                                <input type="number" id="peso" name="peso" step="0.01" min="0.1" max="999.99"
                                       value="{{ old('peso') }}"
                                       class="w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white"
                                       required>
                            </div>

                            <!-- Data de Nascimento -->
                            <div>
                                <label for="data_nascimento" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de Nascimento</label>
                                <input type="date" id="data_nascimento" name="data_nascimento"
                                       value="{{ old('data_nascimento') }}"
                                       class="w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white"
                                       required>
                            </div>

                            <!-- Castrado -->
                            <div>
                                <label for="castrado" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Castrado</label>
                                <select id="castrado" name="castrado"
                                        class="w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white"
                                        required>
                                    <option value="">Selecione</option>
                                    <option value="1" {{ old('castrado') == '1' ? 'selected' : '' }}>Sim</option>
                                    <option value="0" {{ old('castrado') == '0' ? 'selected' : '' }}>Não</option>
                                </select>
                            </div>

                            <!-- Socializa -->
                            <div>
                                <label for="cod_socializa" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Socializa com</label>
                                <select id="cod_socializa" name="cod_socializa"
                                        class="w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white"
                                        required>
                                    <option value="">Selecione</option>
                                    @foreach($socializacoes as $item)
                                        <option value="{{ $item->cod_socializa }}" {{ old('cod_socializa') == $item->cod_socializa ? 'selected' : '' }}>
                                            {{ $item->descricao }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Foto do Pet -->
                        <div>
                            <label for="foto" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Foto do Pet (opcional)</label>
                            <input type="file" id="foto" name="foto" accept="image/*"
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                   file:rounded-full file:border-0 file:text-sm file:font-semibold
                                   file:bg-[#e3967d] file:text-white hover:file:bg-[#d68a6a]">
                            <p class="text-sm text-gray-500 mt-1">Máximo: 2MB</p>
                        </div>

                        <!-- Bio -->
                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bio do Pet (opcional)</label>
                            <textarea id="bio" name="bio" rows="4"
                                      class="w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white"
                                      placeholder="Conte sobre a personalidade do seu pet...">{{ old('bio') }}</textarea>
                        </div>

                        <!-- Botões -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('dashboard') }}"
                               class="inline-flex items-center px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg">
                                Cancelar
                            </a>
                            <button type="submit"
                                    class="inline-flex items-center px-6 py-3 bg-[#e3967d] hover:bg-[#d68a6a] text-white font-medium rounded-lg">
                                Salvar Pet
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>