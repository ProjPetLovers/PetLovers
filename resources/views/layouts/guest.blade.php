<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pet Lovers</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#FCEEB5] min-h-screen font-sans antialiased text-gray-900 flex flex-col">

    <!-- Header -->
    <header class="bg-[#5A3624] text-white py-3 shadow">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div class="flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('imagem/logo.png') }}" alt="Logo Pet Lovers" class="h-8 w-auto">

                    </a>
                    <a href="{{ route('about') }}" class="text-white hover:text-[#f28a49] transition-colors duration-200">
                        Sobre nós
                    </a>
                </div>
            </div>
            <a href="{{ route('login') }}" class="text-sm px-4 py-2 border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white transition rounded">
                Iniciar Sessão
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center p-6">
        {{ $slot }}
    </main>

</body>
</html>
