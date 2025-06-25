<?php

namespace App\Events;

use App\Models\Mensagem;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NovaMensagem implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public function __construct(public Mensagem $mensagem)
    {
        $this->mensagem = $mensagem->load(['remetente', 'conexao']);
    }


    public function broadcastOn(): array
    {
        return [
            new PrivateChannel("conversa.{$this->mensagem->id_conexao}"),
        ];
    }

    public function broadcastwith(): array
    {
        $data = [
            'mensagem' =>  [
                'id_mensagem' => $this -> mensagem -> id_mensagem,
                'id_conexao' => $this -> mensagem -> id_conexao,
                'destinatario_id' => $this -> mensagem -> destinario_id,
                'remetente_id' => $this -> mensagem -> remetente_id,
                'conteudo' => $this -> mensagem -> conteudo,
                'criado_em' => $this -> mensagem -> criado_em,
            ]

            ];
        return $data;
    }

    public function broadcastAs(): string
    {
        return 'nova-mensagem';
    }

    public function broadcastWhen()
    {
        return true;
    }


}
