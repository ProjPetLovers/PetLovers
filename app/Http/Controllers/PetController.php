<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PetController extends Controller
{
    public function create()
    {
        // Verifica se etapas anteriores foram completadas
        if (!Session::has('user_registration_data') || !Session::has('detalhes_data')) {
            return redirect()->route('register')->with('error', 'Complete todas as etapas anteriores.');
        }
        if (Session::has('pet_data')) {
            return redirect(route('registration.complete', absolute: false));
        }

        // Busca opções de socialização
        $socializacoes = DB::table('socializa_com')->select('cod_socializa', 'descricao')->get();

        return view('auth.pet_create', compact('socializacoes'));
    }

    public function store(Request $request)
    {
        // Valida dados do pet
        $validated = $request->validate([
            'nome' => 'required|string|max:30',
            'especie' => 'required|string|max:30',
            'raca' => 'required|string|max:50',
            'sexo' => 'required|in:M,F',
            'peso' => 'required|numeric|min:0.1|max:999.99',
            'data_nascimento' => 'required|date|before:today',
            'castrado' => 'required|boolean',
            'cod_socializa' => 'required|exists:socializa_com,cod_socializa',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string'
        ]);

        $petData['nome'] = $validated['nome'];
        $petData['especie'] = $validated['especie'];
        $petData['raca'] = $validated['raca'];
        $petData['sexo'] = $validated['sexo'];
        $petData['peso'] = $validated['peso'];
        $petData['data_nascimento'] = $validated['data_nascimento'];
        $petData['castrado'] = $validated['castrado'];
        $petData['cod_socializa'] = $validated['cod_socializa'];
        $petData['bio'] = $validated['bio'];

        $petData['foto'] = $request->file('foto')->store("fotopet", 'public');

        // Armazena na sessão
        Session::put('pet_data', $petData);

        return redirect()->route('registration.complete');
    }
}
