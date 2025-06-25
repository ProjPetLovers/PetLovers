<?php
namespace App\Service;

use App\Models\Conexao;

class ConversaService
{
    /* Retorna as conversas do usuário logado */

    public function getUsersChats (int $user_id)
    {
        return Conexao::where('usuario1_id', $user_id)
            ->orWhere('usuario2_id', $user_id)
            ->get();
    }

    //retorna a conversa entre dois usuários
    public function getChatBetweenUsers(int $user1_id, int $user2_id)
    {
        return Conexao::where(function ($query) use ($user1_id, $user2_id) {
                $query->where('usuario1_id', $user1_id)
                      ->where('usuario2_id', $user2_id);
            })
            ->orWhere(function ($query) use ($user1_id, $user2_id) {
                $query->where('usuario1_id', $user2_id)
                      ->where('usuario2_id', $user1_id);
            })
            ->first();
    }





}
