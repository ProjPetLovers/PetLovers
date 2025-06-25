<?php

namespace App\Http\Controllers;

use App\Events\NovaMensagem;
use App\Models\Mensagem;
use App\Models\User;
use App\Service\ConversaService;
use App\Service\MensagemService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MensagemController extends Controller
{

    protected $conversa_service;
    protected $mensagem_service;


    public function __construct(ConversaService $conversa_service, MensagemService $mensagem_service)
    {
        $this->conversa_service = $conversa_service;
        $this->mensagem_service = $mensagem_service;
    }

    //index será responsavel por exibir a lista de conversas do utilizador autenticado
    public function index()
    {
        $authId = Auth::id();
        $conexoes = $this->conversa_service->getUsersChats($authId);
        $hasUsers = !$conexoes -> isEmpty();
        return view('mensagens.index', compact('conexoes', 'hasUsers'));
    }

    //Exibe a conversa entre dois usuário que já possuem conexao
    public function getChat($user_id)
    {
        $authId = Auth::id();
        $conexao = $this->conversa_service->getChatBetweenUsers($authId, $user_id);

        if (!$conexao) {
            abort(403, 'Você não tem permissão para conversar com este usuário.');
        }

        $mensagens = $this->mensagem_service->openAndReadAll($conexao, $user_id);
        $receiver = User::find($user_id);

        return view('mensagens.chat', compact('mensagens', 'conexao', 'receiver'));
    }

    //Envia uma mensagem para usuário já conectado
    public function enviar(Request $request)
    {
        $request->validate([
            'id_conexao' => 'required|exists:conexao,id_conexao',
            'conteudo' => 'required|string|max:1000',
            'destinatario_id' => 'required|exists:users,id',
        ]);

        try {
            $mensagem = $this->mensagem_service->create(
                $request->id_conexao,
                Auth::id(),
                $request->destinatario_id,
                $request->conteudo
            );

            broadcast(new NovaMensagem($mensagem))->toOthers();

            return response()->json([
                'success' => true,
                'mensagem' => [
                    'id_mensagem' => $mensagem->id_mensagem,
                    'conteudo' => $mensagem->conteudo,
                    'criado_em' => $mensagem->criado_em,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
