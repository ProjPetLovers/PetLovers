<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - Pet Lovers</title>
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
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-md">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-dark">Criar Conta</h2>
                <p class="mt-2 text-sm text-gray-600">Junte-se à comunidade Pet Lovers</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Nome -->
                <div>
                    <x-input-label for="name" :value="__('Nome')" />
                    <x-text-input id="name" class="block mt-1 w-full bg-light text-light" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full bg-light" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Palavra-passe -->
                <div>
                    <x-input-label for="password" :value="__('Palavra-passe')" />
                    <x-text-input id="password" class="block mt-1 w-full bg-light" type="password" name="password"
                        required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirmação -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirma Palavra-Passe')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full bg-light" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Ações -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('login') }}" class="text-sm text-primary hover:underline">
                        Já tenho registro
                    </a>
                    <button type="submit"

                        class="px-6 py-2 bg-secondary text-light rounded-md hover:bg-secondary/90 transition">
                        Continuar
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
