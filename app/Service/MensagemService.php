<?php

namespace App\Service;

use App\Models\Mensagem;

class MensagemService
{
    //Retorna todas as mensagens de uma conexão, ordenadas.

    public function openAndReadAll($conexao, int $remetente_id)
    {
        return Mensagem::with('remetente.detalhesusuario')
            ->where('id_conexao', $conexao->id_conexao)
            ->orderBy('criado_em')
            ->get();
    }

    //Cria uma nova mensagem.
    public function create(int $id_conexao, int $remetente_id, int $destinatario_id, string $conteudo)
    {
        return Mensagem::create([
            'id_conexao' => $id_conexao,
            'remetente_id' => $remetente_id,
            'destinatario_id' => $destinatario_id,
            'conteudo' => $conteudo,
            'criado_em' => now(),
        ]);
    }
}
