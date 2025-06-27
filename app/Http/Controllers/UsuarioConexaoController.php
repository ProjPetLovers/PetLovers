<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Intencao;
use App\Models\Pet;
use Carbon\Carbon;
use App\Models\DetalhesUsuario;
use App\Models\Conexao;



class UsuarioConexaoController extends Controller
{
    public function usuarioConexao($id)
    {
        // 1. Busca o usuário do perfil pelo ID recebido na rota
        $user = User::findOrFail($id);

        // 2. Busca os detalhes adicionais do usuário (relacionamento DetalhesUsuario)
        $detalhesUsuario = $user->detalhesUsuario;

        // 3. Busca a intenção do usuário (relacionamento Intencao)
        $intencao = null;
        if ($detalhesUsuario && $detalhesUsuario->cod_intencao) {
            $intencao = Intencao::find($detalhesUsuario->cod_intencao);
        }

        // 4. Busca os pets do usuário (relacionamento Pet)
        $pets = $user->Pet ?? collect();

        // 5. Busca a conexão entre o usuário autenticado e o perfil visitado
        $conexao = null;
        if (auth()->check() && auth()->id() != $user->id) {
            // Procura conexão onde o usuário autenticado é usuario1 e o perfil é usuario2
            $conexao = Conexao::where(function ($q) use ($user) {
                $q->where('usuario1_id', auth()->id())
                    ->where('usuario2_id', $user->id);
            })
            // Ou onde o perfil é usuario1 e o autenticado é usuario2 (bidirecional)
                ->orWhere(function ($q) use ($user) {
                    $q->where('usuario1_id', $user->id)
                        ->where('usuario2_id', auth()->id());
                })
                ->first();  // Pega a primeira conexão encontrada (se existir)
        }

        // 6. Calcula a idade do usuário a partir da data de nascimento (se existir)
        $dataNascimento = $user->detalhesUsuario ? $user->detalhesUsuario->data_nascimento : null;
        $idade = $dataNascimento ? Carbon::parse($dataNascimento)->age : null;

        // 7. Monta um array com os dados do usuário para facilitar o uso na view
        $userData = [
            'name' => $user->name,
            'apelido' => $user->apelido,
            'email' => $user->email,
            'localizacao' => $user->localizacao,
            'foto_url' => $user->detalhesUsuario ? $user->detalhesUsuario->foto : null,
            'fundo_url' => $user->detalhesUsuario ? $user->detalhesUsuario->photo_fundo : null,
            'bio' => $user->detalhesUsuario ? $user->detalhesUsuario->bio : null,
            'data_nascimento' => $user->detalhesUsuario ? $user->detalhesUsuario->data_nascimento : null,
            'idade' => $idade,
        ];

         // 8. Monta um array com os dados dos pets do usuário para facilitar o uso na view
        $petsData = $pets->map(function ($pet) {
            return [
                'id' => $pet->id_pet ?? $pet->id,
                'nome' => $pet->nome,
                'especie' => $pet->especie,
                'raca' => $pet->raca,
                'sexo' => $pet->sexo == 'M' ? 'Macho' : 'Fêmea',
                'peso' => $pet->peso,
                'idade' => $pet->data_nascimento ? Carbon::parse($pet->data_nascimento)->age : null,
                'castrado' => $pet->castrado ? 'Sim' : 'Não',
                'foto_url' => $pet->foto,
                'bio' => $pet->bio,
            ];
        });

        // 9. Retorna a view 'usuario_conexao' passando todas as informações necessárias
        return view('usuario_conexao', compact('user', 'userData', 'intencao', 'petsData', 'conexao'));
    }

    public function solicitarConexao($id)
    {
        // 1. Impede que o usuário envie solicitação para si mesmo
        if (auth()->id() == $id) {
            // Retorna para a página anterior com uma mensagem de erro
            return back()->with('error', 'Você não pode se conectar consigo mesmo.');
        }

        // 2. Verifica se já existe uma conexão entre os dois usuários (em qualquer direção)
        $existe = Conexao::where(function ($q) use ($id) {
            $q->where('usuario1_id', auth()->id())
                ->where('usuario2_id', $id);
        })
            ->orWhere(function ($q) use ($id) {
                $q->where('usuario1_id', $id)
                    ->where('usuario2_id', auth()->id());
            })
            ->first();

        // 3. Se não existe conexão, cria uma nova solicitação
        if (!$existe) {
            Conexao::create([
                'usuario1_id' => auth()->id(),
                'usuario2_id' => $id,
                'pedido_em' => now(),
                'status' => 'pendente'
            ]);
        }
        // 4. Retorna para a página anterior com mensagem de sucesso
        return back()->with('success', 'Solicitação enviada!');
    }

    public function solicitacoesRecebidas()
    {
        // 1. Busca todas as conexões recebidas pelo usuário autenticado que estão pendentes
        $solicitacoes = Conexao::where('usuario2_id', auth()->id())
            ->where('status', 'pendente')
            ->with('usuario1') // Carrega os dados do usuário que enviou a solicitação
            ->get();

            // 2. Retorna a view com as solicitações recebidas
        return view('conexoes_solicitacoes', compact('solicitacoes'));
    }

    public function aprovar($id)
    {
        // 1. Busca a conexão pelo ID
        $conexao = Conexao::findOrFail($id);
        // 2. Só permite aprovar se o usuário autenticado for o destinatário da solicitação
        if ($conexao->usuario2_id == auth()->id()) {
            $conexao->status = 'aceito'; // Atualiza status para aceito
            $conexao->save(); // Salva no banco
        }
        // 3. Retorna para a página anterior
        return back();
    }

    public function rejeitar($id)
    {
        // 1. Busca a conexão pelo ID
        $conexao = Conexao::findOrFail($id);
         // 2. Só permite rejeitar se o usuário autenticado for o destinatário da solicitação
        if ($conexao->usuario2_id == auth()->id()) {
            $conexao->status = 'rejeitada'; // Atualiza status para rejeitada
            $conexao->save(); // Salva no banco
        }
        // 3. Retorna para a página anterior
        return back();
    }
}
