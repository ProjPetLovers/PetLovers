<x-guest-layout>
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md mt-12">
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-dark">Etapa 2 de 3: Seus Detalhes</h2>
            <p class="text-sm text-gray-600">Conte-nos mais sobre você</p>

            <!-- Barra de progresso -->
            <div class="w-full bg-[#e2d5aa] rounded-full h-2 mt-4">
                <div class="bg-[#d98028] h-2 rounded-full" style="width: 66.66%"></div>
            </div>
        </div>

        <form method="POST" action="{{ route('detalhes.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nome -->
                <div>
                    <x-input-label for="nome" :value="__('Nome')" class="!text-dark"/>
                    <x-text-input id="nome" class="block mt-1 w-full !bg-[#f6e6aa] border-[#e5a04b] !text-dark" type="text" name="nome"
                                 :value="old('nome')" required maxlength="30" />
                    <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                </div>

                <!-- Apelido -->
                <div>
                    <x-input-label for="apelido" :value="__('Apelido')" class="!text-dark" />
                    <x-text-input id="apelido" class="block mt-1 w-full !bg-[#f6e6aa] border-[#e5a04b] !text-dark" type="text" name="apelido"
                                 :value="old('apelido')" required maxlength="50" />
                    <x-input-error :messages="$errors->get('apelido')" class="mt-2" />
                </div>

                <!-- Data de Nascimento -->
                <div>
                    <x-input-label for="data_nascimento" :value="__('Data de Nascimento')"class="!text-dark" />
                    <x-text-input id="data_nascimento" class="block mt-1 w-full !bg-[#f6e6aa] border-[#e5a04b] !text-dark" type="date"
                                 name="data_nascimento" :value="old('data_nascimento')" required />
                    <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
                </div>

                <!-- Localização -->
                <div>
                    <x-input-label for="localizacao" :value="__('Localização')"class="!text-dark" />
                    <x-text-input id="localizacao" class="block mt-1 w-full !bg-[#f6e6aa] border-[#e5a04b] !text-dark" type="text"
                                 name="localizacao" :value="old('localizacao')"
                                 required maxlength="255" placeholder="Ex: Braga" />
                    <x-input-error :messages="$errors->get('localizacao')" class="mt-2" />
                </div>

                <!-- Intenção -->
                <div class="md:col-span-2">
                    <x-input-label for="cod_intencao" :value="__('Sua Intenção')" class="!text-dark"/>
                    <select id="cod_intencao" name="cod_intencao"
                            class="block mt-1 w-full bg-[#f6e6aa] border-[#e5a04b] rounded-md shadow-sm "
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
            <div>
                <x-input-label for="bio" :value="__('Bio (Opcional)')"class="!text-dark" />
                <textarea id="bio" name="bio" rows="4"
                         class="block mt-1 w-full bg-[#f6e6aa] border-[#e5a04b] rounded-md shadow-sm"
                         placeholder="Conte um pouco sobre você...">{{ old('bio') }}</textarea>
                <x-input-error :messages="$errors->get('bio')" class="mt-2" />
            </div>

            <!-- Fotos -->
           <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <x-input-label for="foto" :value="__('Foto de Perfil')" class="!text-dark"/>
        <label for="foto" class="block mt-1 w-full cursor-pointer bg-[#f6e6aa] border-[#e5a04b] text-[#d98028] font-semibold py-2 px-4 rounded-md shadow-sm hover:bg-[#e5a04b] hover:text-white transition text-center">
            Escolher arquivo
            <input id="foto" name="foto" type="file" accept="image/jpeg,image/png,image/jpg,image/gif" class="hidden" />
        </label>
        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
        <p class="text-sm text-gray-600 mt-1 font-sans">Máximo: 2MB</p>
    </div>

    <div>
        <x-input-label for="photo_fundo" :value="__('Foto de Fundo')" class="!text-dark"/>
        <label for="photo_fundo" class="block mt-1 w-full cursor-pointer bg-[#f6e6aa] border-[#e5a04b] text-[#d98028] font-semibold py-2 px-4 rounded-md shadow-sm hover:bg-[#e5a04b] hover:text-white transition text-center">
            Escolher arquivo
            <input id="photo_fundo" name="photo_fundo" type="file" accept="image/jpeg,image/png,image/jpg,image/gif" class="hidden" />
        </label>
        <x-input-error :messages="$errors->get('photo_fundo')" class="mt-2" />
        <p class="text-sm text-gray-600 mt-1 font-sans">Máximo: 2MB</p>
    </div>
</div>

            <div class="flex items-center justify-between mt-8">
                <a href="{{ route('register') }}"
                   class="text-sm text-[#d85b1f] hover:underline">
                    {{ __('Voltar') }}
                </a>

                <button type="submit"
                        class="px-6 py-2 bg-[#d98028] text-white rounded-md hover:bg-[#cc7324] transition">
                    {{ __('Próximo: Dados do Pet') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
