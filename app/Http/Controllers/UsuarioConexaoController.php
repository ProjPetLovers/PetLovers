<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Intencao;
use App\Models\Pet;
use Carbon\Carbon;

class UsuarioConexaoController extends Controller
{


    public function usuarioConexao($id)
    {
        $user = User::findOrFail($id);
        $intencao = $user->intencao;
        $pets = $user->Pet ?? collect();

        $dataNascimento = $user->detalhesUsuario ? $user->detalhesUsuario->data_nascimento : null;
        $idade = $dataNascimento ? Carbon::parse($dataNascimento)->age : null;


        $userData = [
            'name' => $user->name,
            'apelido' => $user->apelido,
            'email' => $user->email,
            'localizacao' => $user->localizacao,
            'foto_url' => $user->detalhesUsuario ? $user->detalhesUsuario->foto_url : null,
            'fundo_url' => $user->detalhesUsuario ? $user->detalhesUsuario->fundo_url : null,
            'bio' => $user->detalhesUsuario ? $user->detalhesUsuario->bio : null,
            'data_nascimento' => $user->detalhesUsuario ? $user->detalhesUsuario->data_nascimento : null,
            'idade' => $idade,
        ];

        return view('usuario_conexao', compact('user', 'userData', 'intencao', 'pets'));
    }
}
