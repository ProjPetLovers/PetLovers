<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Etapa 3 - Pet Lovers</title>
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased bg-light text-dark min-h-screen flex flex-col">

    <header class="bg-dark shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="flex items-center">
                        <img src="{{ asset('imagem/logo.png') }}" alt="Logo Pet Lovers" class="h-8 w-auto">
                        <a href="{{ route('about') }}" class="text-light hover:text-primary transition-colors duration-200">
                            Sobre nós
                        </a>
                    </a>
                </div>
                <div>
                    <a href="{{ route('login') }}" class="px-4 py-2 border border-primary text-primary rounded-md
                              hover:bg-primary hover:text-light transition">
                        Iniciar Sessão
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md mt-12">
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-dark">Etapa 3 de 3: Dados do Pet</h2>
                <p class="text-sm text-dark/70">Conte-nos sobre seu pet</p>

                <!-- Barra de progresso -->
                <div class="w-full bg-light rounded-full h-2 mt-4">
                    <div class="bg-primary h-2 rounded-full" style="width: 100%"></div>
                </div>
            </div>

            <form method="POST" action="{{ route('pet.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nome do Pet -->
                    <div>
                        <x-input-label for="nome" :value="__('Nome do Pet')" class="!text-dark" />
                        <x-text-input id="nome" class="block mt-1 w-full !bg-light border-primary !text-dark" type="text" name="nome"
                                     :value="old('nome')" required maxlength="30" />
                        <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                    </div>

                    <!-- Espécie -->
                    <div>
                        <x-input-label for="especie" :value="__('Espécie')" class="!text-dark" />
                        <select id="especie" name="especie"
                                class="block mt-1 w-full bg-light border-primary rounded-md shadow-sm !text-dark"
                                required>
                            <option value="">Selecione</option>
                            <option value="Cão" {{ old('especie') == 'Cão' ? 'selected' : '' }}>Cão</option>
                            <option value="Gato" {{ old('especie') == 'Gato' ? 'selected' : '' }}>Gato</option>
                            <option value="Ave" {{ old('especie') == 'Ave' ? 'selected' : '' }}>Ave</option>
                            <option value="Coelho" {{ old('especie') == 'Coelho' ? 'selected' : '' }}>Coelho</option>
                            <option value="Peixe" {{ old('especie') == 'Peixe' ? 'selected' : '' }}>Peixe</option>
                            <option value="Outro" {{ old('especie') == 'Outro' ? 'selected' : '' }}>Outro</option>
                        </select>
                        <x-input-error :messages="$errors->get('especie')" class="mt-2" />
                    </div>

                    <!-- Raça -->
                    <div>
                        <x-input-label for="raca" :value="__('Raça')" class="!text-dark" />
                        <x-text-input id="raca" class="block mt-1 w-full !bg-light border-primary !text-dark" type="text" name="raca"
                                     :value="old('raca')" required maxlength="50" />
                        <x-input-error :messages="$errors->get('raca')" class="mt-2" />
                    </div>

                    <!-- Sexo -->
                    <div>
                        <x-input-label for="sexo" :value="__('Sexo')" class="!text-dark" />
                        <select id="sexo" name="sexo"
                                class="block mt-1 w-full bg-light border-primary rounded-md shadow-sm !text-dark"
                                required>
                            <option value="">Selecione</option>
                            <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Macho</option>
                            <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Fêmea</option>
                        </select>
                        <x-input-error :messages="$errors->get('sexo')" class="mt-2" />
                    </div>

                    <!-- Peso -->
                    <div>
                        <x-input-label for="peso" :value="__('Peso (kg)')" class="!text-dark" />
                        <x-text-input id="peso" class="block mt-1 w-full !bg-light border-primary !text-dark" type="number" name="peso"
                                     :value="old('peso')" required step="0.01" min="0.1" max="999.99" />
                        <x-input-error :messages="$errors->get('peso')" class="mt-2" />
                    </div>

                    <!-- Data de Nascimento -->
                    <div>
                        <x-input-label for="data_nascimento" :value="__('Data de Nascimento')" class="!text-dark" />
                        <x-text-input id="data_nascimento" class="block mt-1 w-full !bg-light border-primary !text-dark" type="date"
                                     name="data_nascimento" :value="old('data_nascimento')" required />
                        <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
                    </div>

                    <!-- Castrado -->
                    <div>
                        <x-input-label for="castrado" :value="__('Castrado')" class="!text-dark" />
                        <select id="castrado" name="castrado"
                                class="block mt-1 w-full bg-light border-primary rounded-md shadow-sm !text-dark"
                                required>
                            <option value="">Selecione</option>
                            <option value="1" {{ old('castrado') == '1' ? 'selected' : '' }}>Sim</option>
                            <option value="0" {{ old('castrado') == '0' ? 'selected' : '' }}>Não</option>
                        </select>
                        <x-input-error :messages="$errors->get('castrado')" class="mt-2" />
                    </div>

                    <!-- Socialização -->
                    <div>
                        <x-input-label for="cod_socializa" :value="__('Socializa Com')" class="!text-dark" />
                        <select id="cod_socializa" name="cod_socializa"
                                class="block mt-1 w-full bg-light border-primary rounded-md shadow-sm !text-dark"
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
                    <x-input-label for="foto" :value="__('Foto do Pet (Opcional)')" class="!text-dark" />
                    <label for="foto" class="block mt-1 w-full cursor-pointer bg-light border-primary text-primary font-semibold py-2 px-4 rounded-md shadow-sm hover:bg-primary hover:text-white transition text-center">
                        Escolher arquivo
                        <input id="foto" name="foto" type="file" accept="image/jpeg,image/png,image/jpg,image/gif" class="hidden" />
                    </label>
                    <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    <p class="text-sm text-dark/70 mt-1 font-sans">Máximo: 2MB</p>
                </div>

                <!-- Bio do Pet -->
                <div class="mt-6">
                    <x-input-label for="bio" :value="__('Bio do Pet (Opcional)')" class="!text-dark" />
                    <textarea id="bio" name="bio" rows="4"
                              class="block mt-1 w-full bg-light border-primary rounded-md shadow-sm !text-dark"
                              placeholder="Conte sobre a personalidade do seu pet...">{{ old('bio') }}</textarea>
                    <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-8">
                    <a href="{{ route('detalhes.create') }}"
                       class="text-sm text-primary hover:underline">
                        {{ __('Voltar') }}
                    </a>

                    <button type="submit"
                            class="px-6 py-2 bg-secondary text-white rounded-md hover:bg-primary transition">
                        {{ __('Revisar Dados') }}
                    </button>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-dark py-4">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-light text-sm">
                © {{ date('Y') }} Pet Lovers. Todos os direitos reservados.
            </p>
        </div>
    </footer>

    @vite('resources/js/app.js')
</body>

</html>
