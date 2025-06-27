<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pet Lovers</title>
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased bg-light text-dark min-h-screen flex flex-col">




    <header class="bg-dark shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <div class="flex items-center space-x-8">

                    <a href="{{ url('/') }}" class="flex items-center">
                        <img src="{{ asset('imagem/logo.png') }}" alt="Logo Pet Lovers" class="h-8 w-auto">
                        {{-- <span class="ml-2 text-light font-semibold text-xl">Sobre nós</span> --}}
                    </a>
                    <a href="{{ route('about') }}" class="text-light hover:text-primary transition-colors duration-200">
                        Sobre nós
                    </a>
                </div>

                <div>
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 border border-primary text-primary rounded-md
                              hover:bg-primary hover:text-light transition">
                        Iniciar Sessão
                    </a>
                </div>
            </div>
        </div>
    </header>



    <main class="relative flex-grow flex items-center justify-center">
        <div class="text-center px-4">



            <h1 class="text-4xl md:text-5xl font-bold text-dark mb-8">
                Onde humanos e pets se encontram
            </h1>


            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">

                <a href="{{ route('register') }}"
                    class="px-6 py-3 border border-primary text-light rounded-md
                          bg-primary hover:text-dark transition w-full sm:w-auto text-center">
                    Criar Conta
                </a>


                {{-- <a href="{{ route('login') }}"
                   class="px-6 py-3 border border-primary text-primary rounded-md
                          hover:bg-primary hover:text-light transition w-full sm:w-auto text-center">
                    Login
                </a> --}}
            </div>

            <div class="absolute inset-0 z-0 bg-center bg-no-repeat bg-contain opacity-5 pointer-events-none"
                style="background-image: url('{{ asset('imagem/fundo.jpg') }}');">
            </div>
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
