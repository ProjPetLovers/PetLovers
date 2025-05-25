?>
<x-guest-layout>
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Etapa 2 de 3: Seus Detalhes</h2>
            <p class="text-gray-600 dark:text-gray-400">Conte-nos mais sobre você</p>

            <!-- Barra de progresso -->
            <div class="w-full bg-gray-200 rounded-full h-2 mt-4">
                <div class="bg-blue-600 h-2 rounded-full" style="width: 66.66%"></div>
            </div>
        </div>

        <form method="POST" action="{{ route('detalhes.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nome -->
                <div>
                    <x-input-label for="nome" :value="__('Nome')" />
                    <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome"
                                 :value="old('nome')" required maxlength="30" />
                    <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                </div>

                <!-- Apelido -->
                <div>
                    <x-input-label for="apelido" :value="__('Apelido')" />
                    <x-text-input id="apelido" class="block mt-1 w-full" type="text" name="apelido"
                                 :value="old('apelido')" required maxlength="50" />
                    <x-input-error :messages="$errors->get('apelido')" class="mt-2" />
                </div>

                <!-- Data de Nascimento -->
                <div>
                    <x-input-label for="data_nascimento" :value="__('Data de Nascimento')" />
                    <x-text-input id="data_nascimento" class="block mt-1 w-full" type="date"
                                 name="data_nascimento" :value="old('data_nascimento')" required />
                    <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
                </div>

                <!-- Localização -->
                <div>
                    <x-input-label for="localizacao" :value="__('Localização')" />
                    <x-text-input id="localizacao" class="block mt-1 w-full" type="text"
                                 name="localizacao" :value="old('localizacao')"
                                 required maxlength="255" placeholder="Ex: Braga" />
                    <x-input-error :messages="$errors->get('localizacao')" class="mt-2" />
                </div>

                <!-- Intenção -->
                <div class="md:col-span-2">
                    <x-input-label for="cod_intencao" :value="__('Sua Intenção')" />
                    <select id="cod_intencao" name="cod_intencao"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            required>
                        <option value="">Selecione uma opção</option>
                        @foreach($intencoes as $intencao)
                            <option value="{{ $intencao->cod_intencao }}" {{ old('cod_intencao') == $intencao->cod_intencao ? 'selected' : '' }}>
                                {{ $intencao->descricao }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('cod_intencao')" class="mt-2" />
                </div>
            </div>

            <!-- Bio -->
            <div class="mt-6">
                <x-input-label for="bio" :value="__('Bio (Opcional)')" />
                <textarea id="bio" name="bio" rows="4"
                         class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                         placeholder="Conte um pouco sobre você...">{{ old('bio') }}</textarea>
                <x-input-error :messages="$errors->get('bio')" class="mt-2" />
            </div>

            <!-- Fotos -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <!-- Foto de Perfil -->
                <div>
                    <x-input-label for="foto" :value="__('Foto de Perfil (Opcional)')" />
                    <input id="foto" class="block mt-1 w-full" type="file" name="foto"
                           accept="image/jpeg,image/png,image/jpg,image/gif" />
                    <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    <p class="text-sm text-gray-600 mt-1">Máximo: 2MB</p>
                </div>

                <!-- Foto de Fundo -->
                <div>
                    <x-input-label for="photo_fundo" :value="__('Foto de Fundo (Opcional)')" />
                    <input id="photo_fundo" class="block mt-1 w-full" type="file" name="photo_fundo"
                           accept="image/jpeg,image/png,image/jpg,image/gif" />
                    <x-input-error :messages="$errors->get('photo_fundo')" class="mt-2" />
                    <p class="text-sm text-gray-600 mt-1">Máximo: 2MB</p>
                </div>
            </div>

            <div class="flex items-center justify-between mt-8">
                <a href="{{ route('register') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    {{ __('Voltar') }}
                </a>

                <x-primary-button>
                    {{ __('Próximo: Dados do Pet') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>

<?php
