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

<body class="font-sans antialiased bg-light text-dark">
    <div class="min-h-screen">
        {{-- Navegação --}}
        <nav class="bg-dark border-b border-secondary" x-data="{ open: false }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    {{-- Logo / Nome da App --}}
                    <div class="flex-shrink-0 flex items-center gap-4"">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />


                        @if (
                            !request()->routeIs('mensagens.index') &&
                                !request()->routeIs('chat') &&
                                !request()->routeIs('usuario_conexao') &&
                                !request()->routeIs('profile.show') &&
                                !request()->routeIs('conexoes_solicitacoes'))
                            <a href="{{ url('mensagens/index') }}" class=" text-light text-lg font-semibold ml-2">
                                Mensagens</a>
                        @endif


                        @if (
                            !request()->routeIs('usuarios') &&
                                !request()->routeIs('chat') &&
                                !request()->routeIs('usuario_conexao') &&
                                !request()->routeIs('profile.show') &&
                                !request()->routeIs('conexoes_solicitacoes'))
                            <a href="{{ url('usuarios') }}" class="text-light text-lg font-semibold ml-2">
                                Feed
                            </a>
                        @endif

                        @if (
                            !request()->routeIs('usuarios') &&
                                !request()->routeIs('mensagens.index') &&
                                !request()->routeIs('usuario_conexao') &&
                                !request()->routeIs('profile.show'))
                            <a href="{{ url('mensagens/index') }}" class="text-light text-lg font-semibold ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                </svg>
                            </a>
                        @endif



                    </div>

                    <div>




                    </div>


                    {{-- Links Desktop --}}
                    <div class="hidden sm:flex sm:items-center sm:space-x-6">
                        {{-- Dropdown do usuário --}}
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-light hover:text-primary focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                @can('manage-users')
                                    <x-dropdown-link :href="route('admin.users.index')">
                                        {{ __('Gerenciar Usuários') }}
                                    </x-dropdown-link>
                                @endcan

                                <x-dropdown-link :href="route('profile.show')">
                                    {{ __('Perfil') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('dashboard')">
                                    {{ __('Painel de Usuários') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('conexoes_solicitacoes')">
                                    {{ __('Conexões') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Sair') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    {{-- Botão mobile --}}
                    <div class="sm:hidden">
                        <button @click="open = ! open" type="button"
                            class="text-light hover:text-primary focus:outline-none focus:ring-2 focus:ring-secondary rounded-md">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Menu Mobile --}}
                <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        @can('manage-users')
                            <a href="{{ route('admin.users.index') }}"
                                class="block px-3 py-2 text-light hover:text-primary">
                                {{ __('Gerenciar Usuários') }}
                            </a>
                        @endcan

                        <a href="{{ route('profile.show') }}" class="block px-3 py-2 text-light hover:text-primary">
                            {{ __('Perfil') }}
                        </a>

                        <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-light hover:text-primary">
                            {{ __('Painel de Usuários') }}
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-3 py-2 text-light hover:text-primary">
                                {{ __('Sair') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        {{-- Cabeçalho da página (opcional) --}}
        {{--
        @isset($header)
            <header class="bg-primary shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-light text-2xl font-semibold leading-tight">
                        {{ $header }}
                    </h1>
                </div>
            </header>
        @endisset
        --}}

        {{-- Conteúdo principal --}}
        <main class="{{ isset($header) ? 'py-6' : 'py-0' }} mt-0">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white border border-secondary rounded-lg shadow-sm p-6">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
    {{-- Scripts necessários --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
