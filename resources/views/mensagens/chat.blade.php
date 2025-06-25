@php
    use Illuminate\Support\Str;
@endphp
<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.3/dist/echo.iife.js"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark leading-tight">
            {{ __('Conversa com') }} {{ $receiver->name }}
        </h2>
    </x-slot>

    <div class="py-6 bg-light h-[90vh]">
        <div class="container mx-auto h-full max-w-2xl px-4">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    @foreach ($errors->all() as $error)
                        <p class="block sm:inline">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
               {{-- cabeçalho da conversa --}}
            <div class="bg-white rounded-lg shadow-lg h-full flex flex-col">
                <div class="border-b p-4 flex items-center space-x-4">
                @php
                    $foto = $receiver->detalhesUsuario->foto;
                @endphp
                    <img src="{{ Str::startsWith ($foto, 'http') ? $foto : asset('storage/'. $receiver -> foto)}}"
                        alt= {{ $receiver->name }}
                        class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h1 class="text-xl font-semibold text-dark">{{ $receiver->name }}</h1>
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto p-4 space-y-4" id="messages-container">
                    @foreach ($mensagens as $mensagem)
                        @php $isMine = $mensagem->remetente_id === Auth::id(); @endphp
                        <div class="flex items-start {{ $isMine ? 'justify-end' : '' }} space-x-2">


                            <div
                                class="{{ $isMine ? 'bg-primary text-white' : 'bg-light text-dark' }} rounded-lg p-3 max-w-xs">
                                <p>{{ $mensagem->conteudo }}</p>
                                <span class="text-xs {{ $isMine ? 'text-accent' : 'text-dark' }} mt-1 block">
                                    {{ $mensagem->criado_em->setTimezone('Europe/Lisbon')->format('H:i') }}
                                </span>
                            </div>


                        </div>
                    @endforeach
                </div>

                <div class="border-t p-4">
                    <form action="{{ route('mensagens.enviar') }}" method="POST" class="flex w-full gap-2"
                        id="message-form">
                        @csrf
                        <input type="hidden" name="id_conexao" value="{{ $conexao->id_conexao }}">
                        <input type="hidden" name="destinatario_id" value="{{ $receiver->id }}">
                        <input type="text" name="conteudo" required placeholder="Digite sua mensagem..."
                            class="flex-1 rounded-full border border-gray-300 px-6 py-3 focus:outline-none focus:ring-2 focus:ring-dark focus:border-transparent">
                        <button type="submit"
                            class="bg-dark text-white rounded-full px-6 py-3 font-medium focus:outline-none focus:ring-2 focus:ring-dark focus:ring-offset-2 transition-colors">
                            Enviar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        const chatId = {{ $conexao->id_conexao }};
        const currentUserId = {{ auth()->id() }};

        const receiverAvatar = "{{asset ('storage/' . $receiver ->detalhesUsuario ->foto) }}";
        const currentUserAvatar = "{{ asset ('storage/') . Auth::user()->detalhesusuario ->foto }}";

        function setupBroadcast() {
            const channel = window.Echo.private(`conversa.${chatId}`);
            channel.listen('.nova-mensagem', (e) => {
                let mensagem = e.mensagem || e;
                if (mensagem && mensagem.remetente_id !== currentUserId) {
                    addMessage(e.mensagem.conteudo, e.mensagem.criado_em, false);
                }
            });
        }

        document.getElementById('message-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const conteudo = formData.get('conteudo');
            if (!conteudo.trim()) return;

            addMessage(conteudo, new Date().toISOString(), true);
            document.querySelector('input[name="conteudo"]').value = '';

            fetch('{{ route('mensagens.enviar') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    id_conexao: formData.get('id_conexao'),
                    destinatario_id: formData.get('destinatario_id'),
                    conteudo: conteudo
                })
            });
        });

        function addMessage(conteudo, criadoEm, isMine = false) {
            const messagesContainer = document.getElementById('messages-container');
            const messageDiv = document.createElement('div');
            messageDiv.className = `flex items-start ${isMine ? 'justify-end' : ''} space-x-2`;

            const time = new Date(criadoEm).toLocaleTimeString('pt-PT', {
                hour: '2-digit',
                minute: '2-digit'
            });
            let html = isMine ? `
                <div class="bg-primary text-white rounded-lg p-3 max-w-xs">
                    <p>${conteudo}</p>
                    <span class="text-xs text-accent mt-1 block">${time}</span>
                </div>

            ` : `

                <div class="bg-light text-dark rounded-lg p-3 max-w-xs">
                    <p>${conteudo}</p>
                    <span class="text-xs text-dark mt-1 block">${time}</span>
                </div>
            `;

            messageDiv.innerHTML = html;
            messagesContainer.appendChild(messageDiv);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        document.addEventListener("DOMContentLoaded", function() {
            const messagesContainer = document.getElementById('messages-container');
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
            setupBroadcast();
        });
    </script>
</x-app-layout>
