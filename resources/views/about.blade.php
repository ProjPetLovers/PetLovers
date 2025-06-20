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

                    </a>
                    <a href="{{ route('welcome') }}"
                        class="text-light hover:text-primary transition-colors duration-200">
                        Voltar à página Inicial
                    </a>
                </div>

                <div class="flex items-center gap-4">
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 border border-primary text-primary rounded-md
                              hover:bg-primary hover:text-light transition text-center">
                        Criar Conta
                    </a>

                    <a href="{{ route('login') }}"
                        class="px-4 py-2 border border-primary text-primary rounded-md
                              hover:bg-primary hover:text-light transition text-center">
                        Iniciar Sessão
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow flex items-center justify-center px-4">
        <div class="w-full max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-dark mb-8">
                Quem somos nós?
            </h1>
            <p class="text-lg text-gray-700 mb-6">
                </h1>

            <p class="text-lg mb-6 text-justify leading-relaxed">
                Bem-vindo ao Pet Lovers, a rede social que une apaixonados por animais e seus companheiros de quatro
                patas.
                Aqui, donos e pets encontram oportunidades de convivência, amizade e diversão em encontros presenciais e
                virtuais, criando memórias inesquecíveis para todas as espécies.
            </p>

            <p class="text-lg mb-6 text-justify leading-relaxed">
                Nossa plataforma oferece perfis personalizados para cada pet, onde é possível compartilhar fotos,
                curiosidades
                e preferências individuais. Com ferramentas de busca, você encontra facilmente companheiros de
                brincadeiras por
                bairro, participa de passeios em grupo e reserva horários em cafés pet-friendly, e futuramente acompanha
                rodadas
                de adoção para oferecer um lar amoroso a quem precisa. Além disso, contamos com recomendações de
                especialistas
                e relatos inspiradores de amizades que se formaram a partir de um simples “olá”.
            </p>

            <p class="text-lg mb-6 text-justify leading-relaxed">
                Na Pet Lovers, acreditamos que o amor pelos animais pode transformar comunidades. Por isso, criamos um
                ambiente
                seguro e acolhedor, onde cada latido e cada miado são celebrados. Junte-se a nós e descubra novas formas
                de
                explorar o universo pet, fazer amigos e deixar o mundo um lugar mais alegre para todos.
            </p>
        </div>
    </main>
    <footer class="bg-dark text-light py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; {{ date('Y') }} Pet Lovers. Todos os direitos reservados.</p>
        </div>
    </footer>
    @vite('resources/js/app.js')
</body>

</html>
