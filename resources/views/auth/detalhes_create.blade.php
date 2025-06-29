<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Etapa 2 - Pet Lovers</title>
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased bg-light text-[#57342d] min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-[#57342d] shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('imagem/logo.png') }}" alt="Logo Pet Lovers" class="h-8 w-auto">

                    </a>
                    <a href="{{ route('about') }}" class="text-white hover:text-[#f28a49] transition-colors duration-200">
                        Sobre nós
                    </a>
                </div>
                <div>
                    <a href="{{ route('login') }}"
                       class="px-4 py-2 border border-[#f28a49] text-[#f28a49] rounded-md hover:bg-[#f28a49] hover:text-white transition">
                        Iniciar Sessão
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full bg-white p-8 rounded-lg shadow-md mt-12">
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-[#57342d]">Etapa 2 de 3: Seus Detalhes</h2>
                <p class="text-sm text-[#57342d]/70">Conte-nos mais sobre você</p>

                <!-- Barra de progresso -->
                <div class="w-full bg-[#f7e3b2] rounded-full h-2 mt-4">
                    <div class="bg-[#f28a49] h-2 rounded-full" style="width: 66.66%"></div>
                </div>
            </div>

            <form method="POST" action="{{ route('detalhes.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nome -->
                    <div>
                        <x-input-label for="nome" :value="__('Nome')" class="!text-[#57342d]" />
                        <x-text-input id="nome" class="block mt-1 w-full !bg-[#f7e3b2] border-[#f28a49] !text-[#57342d]" type="text" name="nome"
                                      :value="old('nome')" required maxlength="30" />
                        <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                    </div>

                    <!-- Apelido -->
                    <div>
                        <x-input-label for="apelido" :value="__('Apelido')" class="!text-[#57342d]" />
                        <x-text-input id="apelido" class="block mt-1 w-full !bg-[#f7e3b2] border-[#f28a49] !text-[#57342d]" type="text" name="apelido"
                                      :value="old('apelido')" required maxlength="50" />
                        <x-input-error :messages="$errors->get('apelido')" class="mt-2" />
                    </div>

                    <!-- Data de Nascimento -->
                    <div>
                        <x-input-label for="data_nascimento" :value="__('Data de Nascimento')" class="!text-[#57342d]" />
                        <x-text-input id="data_nascimento" class="block mt-1 w-full !bg-[#f7e3b2] border-[#f28a49] !text-[#57342d]" type="date"
                                      name="data_nascimento" :value="old('data_nascimento')" required />
                        <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
                    </div>

                    <!-- Localização -->
                    <div>
                        <x-input-label for="localizacao" :value="__('Localização')" class="!text-[#57342d]" />
                        <x-text-input id="localizacao" class="block mt-1 w-full !bg-[#f7e3b2] border-[#f28a49] !text-[#57342d]" type="text"
                                      name="localizacao" :value="old('localizacao')" required maxlength="255" placeholder="Ex: Braga" />
                        <x-input-error :messages="$errors->get('localizacao')" class="mt-2" />
                    </div>

                    <!-- Intenção -->
                    <div class="md:col-span-2">
                        <x-input-label for="cod_intencao" :value="__('Sua Intenção')" class="!text-[#57342d]" />
                        <select id="cod_intencao" name="cod_intencao"
                                class="block mt-1 w-full bg-[#f7e3b2] border-[#f28a49] text-[#57342d] rounded-md shadow-sm"
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
                    <x-input-label for="bio" :value="__('Bio')" class="!text-[#57342d]" />
                    <textarea id="bio" name="bio" rows="4"
                              class="block mt-1 w-full bg-[#f7e3b2] border-[#f28a49] text-[#57342d] rounded-md shadow-sm"
                              placeholder="Conte um pouco sobre você...">{{ old('bio') }}</textarea>
                    <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                </div>

                <!-- Fotos -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-input-label for="foto" :value="__('Foto de Perfil')" class="!text-[#57342d]" />
                        <label for="foto"
                               class="block mt-1 w-full cursor-pointer bg-[#f7e3b2] border-[#f28a49] text-[#f28a49] font-semibold py-2 px-4 rounded-md shadow-sm hover:bg-[#f28a49] hover:text-white transition text-center">
                            Escolher arquivo
                            <input id="foto" name="foto" type="file" accept="image/jpeg,image/png,image/jpg,image/gif" class="hidden" />
                        </label>
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                        <p class="text-sm text-[#57342d]/70 mt-1 font-sans">Máximo: 2MB</p>
                    </div>

                    <div>
                        <x-input-label for="photo_fundo" :value="__('Foto de Fundo')" class="!text-[#57342d]" />
                        <label for="photo_fundo"
                               class="block mt-1 w-full cursor-pointer bg-[#f7e3b2] border-[#f28a49] text-[#f28a49] font-semibold py-2 px-4 rounded-md shadow-sm hover:bg-[#f28a49] hover:text-white transition text-center">
                            Escolher arquivo
                            <input id="photo_fundo" name="photo_fundo" type="file" accept="image/jpeg,image/png,image/jpg,image/gif" class="hidden" />
                        </label>
                        <x-input-error :messages="$errors->get('photo_fundo')" class="mt-2" />
                        <p class="text-sm text-[#57342d]/70 mt-1 font-sans">Máximo: 2MB</p>
                    </div>
                </div>

                <!-- Ações -->
                <div class="flex items-center justify-end mt-8">
                    <!-- <a href="{{ route('register') }}"
                       class="text-sm text-[#f28a49] hover:underline">
                        {{ __('Voltar') }}
                    </a> -->

                    <button type="submit"
                            class="px-6 py-2 bg-[#e3967d] text-white rounded-md hover:bg-[#d48067] transition">
                        {{ __('Próximo: Dados do Pet') }}
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[#57342d] py-4">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-white text-sm">
                © {{ date('Y') }} Pet Lovers. Todos os direitos reservados.
            </p>
        </div>
    </footer>

    @vite('resources/js/app.js')
</body>

</html>
