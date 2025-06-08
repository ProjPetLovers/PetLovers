<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind + JS (via Vite) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    {{-- Corpo com fundo claro ("light") e texto principal escuro ("dark") --}}
    <body class="font-sans antialiased bg-light text-dark">
        <div class="min-h-screen">
            {{-- Navegação --}}
            <nav class="bg-dark border-b border-secondary">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">
                        {{-- Logo / Nome da App --}}
                        <div class="flex-shrink-0">
                            {{-- <a href="{{ route('home') }}"
                               class="text-light font-bold text-xl hover:text-primary transition-colors duration-200">
                                {{ config('app.name', 'Laravel') }}
                            </a> --}}
                        </div>
                        {{-- Links --}}
                        <div class="hidden sm:flex sm:space-x-6">
                            {{-- <a href="{{ route('home') }}"
                               class="text-light hover:text-primary px-3 py-2 rounded-md text-sm font-medium">
                                Início
                            </a> --}}
                            <form method="POST" action="{{ route('logout') }}" class="text-light hover:text-primary px-3 py-2 rounded-md text-sm font-medium">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>

                            </a>
                            {{-- <a href="{{ route('contact') }}"
                               class="text-light hover:text-primary px-3 py-2 rounded-md text-sm font-medium">
                                Contato
                            </a> --}}
                        </div>
                        {{-- Botão mobile (exemplo simplificado) --}}
                        <div class="sm:hidden">
                            <button type="button" class="text-light hover:text-primary focus:outline-none focus:ring-2 focus:ring-secondary rounded-md">
                                {{-- ícone de menu (pode ser um svg) --}}
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            {{-- Cabeçalho da página (opcional) --}}
            @isset($header)
                {{-- Aqui usamos "primary" como fundo do header e texto light --}}
                <header class="bg-primary shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h1 class="text-light text-2xl font-semibold leading-tight">
                            {{ $header }}
                        </h1>
                    </div>
                </header>
            @endisset

            {{-- Conteúdo principal --}}
            <main class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {{-- Exemplo de cartão de conteúdo com borda "secondary" e sombra suave --}}
                    <div class="bg-white border border-secondary rounded-lg shadow-sm p-6">
                        {{-- Aqui, o "$slot" renderiza todo o conteúdo da view-filho --}}
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>

        {{-- (Opcional) Scripts adicionais podem ficar aqui --}}
    </body>
</html>

