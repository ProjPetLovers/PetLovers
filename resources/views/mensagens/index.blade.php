<x-app-layout>

    <div class="container mx-auto max-w-2xl px-4 py-6">
        <div class="bg-white rounded-xl shadow-lg border border-gray-100">
            <div class="border-b px-6 py-4 bg-dark rounded-t-xl">
                <h1 class="text-2xl font-bold text-light">Mensagens</h1>
            </div>

            <div class="divide-y">
                @php $authId = auth()->id(); @endphp

                @if ($hasUsers)
                    @foreach ($conexoes as $conexao)
                        @php
                            // Descobre quem é o outro usuário na conexão
                            $user = $conexao->usuario1_id == $authId ? $conexao->usuario2 : $conexao->usuario1;
                        @endphp

                        <a href="{{ route('chat', $user->id) }}"
                            class="flex items-center gap-4 p-4 hover:bg-primary hover:text-white transition duration-150 ease-in-out rounded-lg group"
                            title="Abrir Chat com {{ $user->name }}">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-lg font-semibold text-dark group-hover:text-white">
                                        {{ $user->name }}
                                    </h2>
                                    {{-- Exemplo de data da última mensagem, se existir --}}
                                    @if (isset($conexao->last_message_time))
                                        <span class="text-sm text-accent group-hover:text-white">
                                            {{ $conexao->last_message_time->diffForHumans() }}
                                        </span>
                                    @endif
                                </div>
                                {{-- Exemplo de última mensagem, se quiser exibir --}}
                                <p class="text-accent text-sm truncate group-hover:text-white">
                                    {{ $conexao->last_message_content ?? '' }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="text-center text-gray-500 my-10">
                        <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="#CCCCCC" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235..." />
                        </div>
                        <div class="text-center">
                            <p class="text-lg md:text-2xl font-medium">Sem conversas no momento.</p>
                            <p class="text-xl text-gray-400 mt-1">Pesquise um contato.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
