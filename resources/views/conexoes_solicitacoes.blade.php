<x-app-layout>
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Solicitações de conexões recebidas</h2>
        <ul class="space-y-4">
            @forelse($solicitacoes as $conexao)
                <li class="flex items-center justify-between bg-white dark:bg-gray-800 p-4 rounded shadow">
                    <div>
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $conexao->usuario1->name }}
                        </span>
                        <span class="text-sm text-gray-500 ml-2">
                            ({{ $conexao->usuario1->email ?? '' }})
                        </span>
                    </div>
                    <div class="flex gap-2">
                        <form method="POST" action="{{ route('conexoes.aprovar', $conexao->id_conexao) }}">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded transition">
                                Aprovar
                            </button>
                        </form>
                        <form method="POST" action="{{ route('conexoes.rejeitar', $conexao->id_conexao) }}">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition">
                                Rejeitar
                            </button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="text-gray-600 dark:text-gray-300">Nenhuma solicitação pendente.</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>
