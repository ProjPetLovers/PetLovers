?>
<x-guest-layout>
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Etapa 3 de 3: Dados do Pet</h2>
            <p class="text-gray-600 dark:text-gray-400">Conte-nos sobre seu pet</p>

            <!-- Barra de progresso -->
            <div class="w-full bg-gray-200 rounded-full h-2 mt-4">
                <div class="bg-blue-600 h-2 rounded-full" style="width: 100%"></div>
            </div>
        </div>

        <form method="POST" action="{{ route('pet.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nome do Pet -->
                <div>
                    <x-input-label for="nome" :value="__('Nome do Pet')" />
                    <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome"
                                 :value="old('nome')" required maxlength="30" />
                    <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                </div>

                <!-- Espécie -->
                <div>
                    <x-input-label for="especie" :value="__('Espécie')" />
                    <select id="especie" name="especie"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            required>
                        <option value="">Selecione</option>
                        <option value="Cão" {{ old('especie') == 'Cão' ? 'selected' : '' }}>Cão</option>
                        <option value="Gato" {{ old('especie') == 'Gato' ? 'selected' : '' }}>Gato</option>
                        <option value="Ave" {{ old('especie') == 'Ave' ? 'selected' : '' }}>Ave</option>
                        <option value="Coelho" {{ old('especie') == 'Ave' ? 'selected' : '' }}>Coelho</option>
                        <option value="Peixe" {{ old('especie') == 'Ave' ? 'selected' : '' }}>Peixe</option>
                        <option value="Outro" {{ old('especie') == 'Outro' ? 'selected' : '' }}>Outro</option>
                    </select>
                    <x-input-error :messages="$errors->get('especie')" class="mt-2" />
                </div>

                <!-- Raça -->
                <div>
                    <x-input-label for="raca" :value="__('Raça')" />
                    <x-text-input id="raca" class="block mt-1 w-full" type="text" name="raca"
                                 :value="old('raca')" required maxlength="50" />
                    <x-input-error :messages="$errors->get('raca')" class="mt-2" />
                </div>

                <!-- Sexo -->
                <div>
                    <x-input-label for="sexo" :value="__('Sexo')" />
                    <select id="sexo" name="sexo"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            required>
                        <option value="">Selecione</option>
                        <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Macho</option>
                        <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Fêmea</option>
                    </select>
                    <x-input-error :messages="$errors->get('sexo')" class="mt-2" />
                </div>

                <!-- Peso -->
                <div>
                    <x-input-label for="peso" :value="__('Peso (kg)')" />
                    <x-text-input id="peso" class="block mt-1 w-full" type="number" name="peso"
                                 :value="old('peso')" required step="0.01" min="0.1" max="999.99" />
                    <x-input-error :messages="$errors->get('peso')" class="mt-2" />
                </div>

                <!-- Data de Nascimento -->
                <div>
                    <x-input-label for="data_nascimento" :value="__('Data de Nascimento')" />
                    <x-text-input id="data_nascimento" class="block mt-1 w-full" type="date"
                                 name="data_nascimento" :value="old('data_nascimento')" required />
                    <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
                </div>

                <!-- Castrado -->
                <div>
                    <x-input-label for="castrado" :value="__('Castrado')" />
                    <select id="castrado" name="castrado"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            required>
                        <option value="">Selecione</option>
                        <option value="1" {{ old('castrado') == '1' ? 'selected' : '' }}>Sim</option>
                        <option value="0" {{ old('castrado') == '0' ? 'selected' : '' }}>Não</option>
                    </select>
                    <x-input-error :messages="$errors->get('castrado')" class="mt-2" />
                </div>

                <!-- Socialização -->
                <div>
                    <x-input-label for="cod_socializa" :value="__('Socializa Com')" />
                    <select id="cod_socializa" name="cod_socializa"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            required>
                        <option value="">Selecione uma opção</option>
                        @foreach($socializacoes as $socializacao)
                            <option value="{{ $socializacao->cod_socializa }}" {{ old('cod_socializa') == $socializacao->cod_socializa ? 'selected' : '' }}>
                                {{ $socializacao->descricao }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('cod_socializa')" class="mt-2" />
                </div>
            </div>

            <!-- Foto do Pet -->
            <div class="mt-6">
                <x-input-label for="foto" :value="__('Foto do Pet (Opcional)')" />
                <input id="foto" class="block mt-1 w-full" type="file" name="foto"
                       accept="image/jpeg,image/png,image/jpg,image/gif" />
                <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                <p class="text-sm text-gray-600 mt-1">Máximo: 2MB</p>
            </div>

            <!-- Bio do Pet -->
            <div class="mt-6">
                <x-input-label for="bio" :value="__('Bio do Pet (Opcional)')" />
                <textarea id="bio" name="bio" rows="4"
                         class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                         placeholder="Conte sobre a personalidade do seu pet...">{{ old('bio') }}</textarea>
                <x-input-error :messages="$errors->get('bio')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-8">
                <a href="{{ route('detalhes.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    {{ __('Voltar') }}
                </a>

                <x-primary-button>
                    {{ __('Revisar Dados') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>

<?php
