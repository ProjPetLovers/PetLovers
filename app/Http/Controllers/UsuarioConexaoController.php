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
        $user = User::findOrFail($id);
        $detalhesUsuario = $user->detalhesUsuario;
        $intencao = null;
        if ($detalhesUsuario && $detalhesUsuario->cod_intencao) {
            $intencao = Intencao::find($detalhesUsuario->cod_intencao);
        }
        $pets = $user->Pet ?? collect();

        // Busca a conexão entre o usuário autenticado e o perfil visitado
        $conexao = null;
        if (auth()->check() && auth()->id() != $user->id) {
            $conexao = Conexao::where(function ($q) use ($user) {
                $q->where('usuario1_id', auth()->id())
                    ->where('usuario2_id', $user->id);
            })
                ->orWhere(function ($q) use ($user) {
                    $q->where('usuario1_id', $user->id)
                        ->where('usuario2_id', auth()->id());
                })
                ->first();
        }

        $dataNascimento = $user->detalhesUsuario ? $user->detalhesUsuario->data_nascimento : null;
        $idade = $dataNascimento ? Carbon::parse($dataNascimento)->age : null;

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

        return view('usuario_conexao', compact('user', 'userData', 'intencao', 'petsData', 'conexao'));
    }

    public function solicitarConexao($id)
    {
        if (auth()->id() == $id) {
            return back()->with('error', 'Você não pode se conectar consigo mesmo.');
        }

        $existe = Conexao::where(function ($q) use ($id) {
            $q->where('usuario1_id', auth()->id())
                ->where('usuario2_id', $id);
        })
            ->orWhere(function ($q) use ($id) {
                $q->where('usuario1_id', $id)
                    ->where('usuario2_id', auth()->id());
            })
            ->first();

        if (!$existe) {
            Conexao::create([
                'usuario1_id' => auth()->id(),
                'usuario2_id' => $id,
                'pedido_em' => now(),
                'status' => 'pendente'
            ]);
        }

        return back()->with('success', 'Solicitação enviada!');
    }

    public function solicitacoesRecebidas()
    {
        $solicitacoes = Conexao::where('usuario2_id', auth()->id())
            ->where('status', 'pendente')
            ->with('usuario1')
            ->get();

        return view('conexoes_solicitacoes', compact('solicitacoes'));
    }

    public function aprovar($id)
    {
        $conexao = Conexao::findOrFail($id);
        if ($conexao->usuario2_id == auth()->id()) {
            $conexao->status = 'aprovada';
            $conexao->save();
        }
        return back();
    }

    public function rejeitar($id)
    {
        $conexao = Conexao::findOrFail($id);
        if ($conexao->usuario2_id == auth()->id()) {
            $conexao->status = 'rejeitada';
            $conexao->save();
        }
        return back();
    }
}