<?php

use App\Models\Conexao;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

Broadcast::channel('conversa.{id_conexao}', function ($user, $id_conexao) {
    $conexao =  Conexao::find($id_conexao);
    Log::info("Tentativa de autorização - User: {$user->id}, Conexao: {$id_conexao}");
    return $conexao && (
        $user->id == $conexao->usuario1_id ||
        $user->id == $conexao->usuario2_id
    );
});
