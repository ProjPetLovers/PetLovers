<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use function Ramsey\Uuid\v4;

class DetalhesController extends Controller
{
    public function create()
    {
        if (!Session::has('user_registration_data')) {
            return redirect()->route('register')->with('error', 'Complete o registro primeiro.');
        }
        if (Session::has('detalhes_data')) {
            return redirect(route('pet.create', absolute: false));
        }

        // Busca opções de intenção
        $intencoes = DB::table('intencao')->select('cod_intencao', 'descricao')->get();
        return view('auth.detalhes_create', compact('intencoes'));
    }

    public function store(Request $request)
    {
        // Valida e salva na sessão
        $validated = $request->validate([
            'nome' => 'required|string|max:30',
            'apelido' => 'required|string|max:50',
            'bio' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'data_nascimento' => 'required|date',
            'localizacao' => 'required|string|max:255',
            'cod_intencao' => 'required|integer',
            'photo_fundo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Processa uploads se existirem
        $detalhesData['nome'] = $validated['nome'];
        $detalhesData['apelido'] = $validated['apelido'];
        $detalhesData['bio'] = $validated['bio'];
        $detalhesData['data_nascimento'] = $validated['data_nascimento'];
        $detalhesData['localizacao'] = $validated['localizacao'];
        $detalhesData['cod_intencao'] = $validated['cod_intencao'];

        $detalhesData['foto'] = $request->file('foto')->store("foto", 'public');
        $detalhesData['photo_fundo'] = $request->file('photo_fundo')->store("photo_fundo", 'public');

        // Armazena na sessão
        Session::put('detalhes_data', $detalhesData);

        return redirect()->route('pet.create');
    }
}
