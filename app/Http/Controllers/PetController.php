<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Pet;


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

    public function createForProfile()
{
    $socializacoes = DB::table('socializa_com')->select('cod_socializa', 'descricao')->get();
    return view('profile.pet.create', compact('socializacoes'));
}
public function storeForProfile(Request $request)
{
    // Validação igual ao seu método store
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

  $petData = $validated;
    $petData['usuario_id'] = Auth::id();  // Associa o pet ao usuário logado

    if ($request->hasFile('foto')) {
        $petData['foto'] = $request->file('foto')->store('fotopet', 'public');
    } else {
        $petData['foto'] = null;
    }

    Pet::create($petData);

    return redirect()->route('profile.show')  
                     ->with('success', 'Pet cadastrado com sucesso!');
}

public function edit($id)
{
    // Busca o pet pelo ID
    $pet = Pet::where('id_pet', $id)
               ->where('usuario_id', Auth::id()) // Garante que só pode editar seus próprios pets
               ->firstOrFail();
    
    // Busca opções de socialização
    $socializacoes = DB::table('socializa_com')->select('cod_socializa', 'descricao')->get();
    
    return view('profile.pet.edit', compact('pet', 'socializacoes'));
}

public function update(Request $request, $id)
{
    // Busca o pet e verifica se pertence ao usuário logado
    $pet = Pet::where('id_pet', $id)
               ->where('usuario_id', Auth::id())
               ->firstOrFail();
    
    // Validação dos dados
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
    
    // Prepara os dados para atualização
    $petData = $validated;
    
    // Verifica se uma nova foto foi enviada
    if ($request->hasFile('foto')) {
        // Remove a foto antiga se existir
        if ($pet->foto && \Storage::disk('public')->exists($pet->foto)) {
            \Storage::disk('public')->delete($pet->foto);
        }
        
        // Salva a nova foto
        $petData['foto'] = $request->file('foto')->store('fotopet', 'public');
    }
    // Se não foi enviada nova foto, mantém a atual (remove 'foto' do array se não foi enviada)
    elseif (!$request->hasFile('foto')) {
        unset($petData['foto']);
    }
    
    // Atualiza os dados do pet
    $pet->update($petData);
    
    return redirect()->route('profile.show')
                     ->with('success', 'Pet atualizado com sucesso!');
}
public function destroy($id)
{
    // Busca o pet e verifica se pertence ao usuário logado
    $pet = Pet::where('id_pet', $id)
               ->where('usuario_id', Auth::id())
               ->firstOrFail();
    
    // Remove a foto se existir
    if ($pet->foto && \Storage::disk('public')->exists($pet->foto)) {
        \Storage::disk('public')->delete($pet->foto);
    }
    
    // Deleta o pet
    $pet->delete();
    
    return redirect()->route('profile.show')
                     ->with('success', 'Pet removido com sucesso!');

}
}