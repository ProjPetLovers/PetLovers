<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Etapa Final - Pet Lovers</title>
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
        <div class="max-w-4xl w-full bg-white p-8 rounded-lg shadow-md">
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-dark">Etapa Final: Revisar e Finalizar Cadastro</h2>
                <p class="text-sm text-dark/70">Confirme todos os dados antes de finalizar</p>

                <!-- Barra de progresso -->
                <div class="w-full bg-light rounded-full h-2 mt-4">
                    <div class="bg-primary h-2 rounded-full" style="width: 100%"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                <!-- Dados do Usuário -->
                <div class="bg-light overflow-hidden shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4 text-primary">Dados do Usuário</h3>
                    <div class="space-y-2 text-dark">
                        <div><strong>Nome:</strong> {{ $userData['name'] }}</div>
                        <div><strong>Email:</strong> {{ $userData['email'] }}</div>
                    </div>
                </div>

                <!-- Detalhes -->
                <div class="bg-light overflow-hidden shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4 text-primary">Seus Detalhes</h3>
                    <div class="space-y-2 text-dark">
                        <div><strong>Nome:</strong> {{ $detalhesData['nome'] }}</div>
                        <div><strong>Apelido:</strong> {{ $detalhesData['apelido'] }}</div>
                        <div><strong>Nascimento:</strong> {{ \Carbon\Carbon::parse($detalhesData['data_nascimento'])->format('d/m/Y') }}</div>
                        <div><strong>Localização:</strong> {{ $detalhesData['localizacao'] }}</div>
                        <div><strong>Bio:</strong> {{ $detalhesData['bio'] ?? 'Não informada' }}</div>
                        <div><strong>Foto:</strong> {{ isset($detalhesData['foto']) ? 'Enviada' : 'Não enviada' }}</div>
                    </div>
                </div>

                <!-- Dados do Pet -->
                <div class="bg-light overflow-hidden shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4 text-primary">Dados do Pet</h3>
                    <div class="space-y-2 text-dark">
                        <div><strong>Nome:</strong> {{ $petData['nome'] }}</div>
                        <div><strong>Espécie:</strong> {{ $petData['especie'] }}</div>
                        <div><strong>Raça:</strong> {{ $petData['raca'] }}</div>
                        <div><strong>Sexo:</strong> {{ $petData['sexo'] == 'M' ? 'Macho' : 'Fêmea' }}</div>
                        <div><strong>Peso:</strong> {{ $petData['peso'] }}kg</div>
                        <div><strong>Nascimento:</strong> {{ \Carbon\Carbon::parse($petData['data_nascimento'])->format('d/m/Y') }}</div>
                        <div><strong>Castrado:</strong> {{ $petData['castrado'] ? 'Sim' : 'Não' }}</div>
                        <div><strong>Foto:</strong> {{ isset($petData['foto']) ? 'Enviada' : 'Não enviada' }}</div>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('registration.complete') }}">
                @csrf
                <div class="flex items-center justify-end">
                    <!-- <a href="{{ route('pet.create') }}"
                       class="text-sm text-primary hover:underline">
                        {{ __('Voltar') }}
                    </a> -->
                    <button type="submit"
                            class="px-6 py-2 bg-secondary text-white rounded-md hover:bg-primary transition">
                        {{ __('Finalizar Cadastro') }}
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
