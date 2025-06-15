<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\DetalhesUsuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use App\Models\Intencao;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Display the user's profile page.
     */
    public function show()
    {
        $user = auth()->user();
        $detalhes = $user->DetalhesUsuario;
        $intencao = $detalhes?->cod_intencao()->first();

        // Processa dados do usuário
        $userData = $this->processUserData($user, $detalhes);

        // Processa pets do usuário
        $pets = $this->processPetsData($user->Pet ?? collect());

        return view('perfil', compact('userData', 'pets', 'intencao'));
    }

    private function processUserData($user, $detalhes)
    {
        $userData = [
            'name' => $detalhes->nome ?? $user->name,
            'email' => $user->email,
            'apelido' => $detalhes?->apelido,
            'localizacao' => $detalhes?->localizacao,
            'bio' => $detalhes?->bio,
            'data_nascimento' => null,
            'idade' => null,
            'foto_url' => $this->processImageUrl($detalhes?->foto),
            'fundo_url' => $this->processImageUrl($detalhes?->photo_fundo),
        ];

        // Processa data de nascimento se existir
        if ($detalhes?->data_nascimento) {
            $dataNascimento = Carbon::parse($detalhes->data_nascimento);
            $userData['data_nascimento'] = $dataNascimento->format('d/m/Y');
            $userData['idade'] = $dataNascimento->age;
        }

        return $userData;
    }

    private function processPetsData($pets)
    {
        return $pets->map(function ($pet) {
            return [
                'id' => $pet->id,
                'nome' => $pet->nome,
                'especie' => $pet->especie,
                'raca' => $pet->raca,
                'sexo' => $pet->sexo == 'M' ? 'Macho' : 'Fêmea',
                'peso' => $pet->peso,
                'idade' => $pet->data_nascimento ? Carbon::parse($pet->data_nascimento)->age : null,
                'castrado' => $pet->castrado ? 'Sim' : 'Não',
                'foto_url' => $this->processImageUrl($pet->foto),
            ];
        });
    }

    private function processImageUrl($imagePath)
    {
        if (!$imagePath) {
            return null;
        }

        // Verifica se é uma URL completa
        if (Str::startsWith($imagePath, ['http://', 'https://'])) {
            return $imagePath;
        }

        // Verifica se o arquivo existe no storage
        if (Storage::exists($imagePath)) {
            return Storage::url($imagePath);
        }

        // Fallback para asset público
        return asset('storage/' . $imagePath);
    }

    /**
     * Exibe o formulário de edição do perfil detalhado
     */
    /**
     * Exibe o formulário de edição do perfil detalhado
     */
    public function editDetails()
    {
        $user = auth()->user();
        $detalhes = $user->DetalhesUsuario;
        $intencoes = Intencao::all();

        // Processa dados do usuário para o formulário
        $userData = $this->processUserData($user, $detalhes);

        return view('perfil_edit', compact('userData', 'detalhes', 'intencoes'));
    }

    /**
     * Atualiza os detalhes do perfil do usuário
     */
    public function updateDetails(Request $request)
    {
        $user = auth()->user();


        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:30',
            'apelido' => 'nullable|string|max:50',
            'bio' => 'nullable|string|max:1000',
            'localizacao' => 'nullable|string|max:255',
            'data_nascimento' => 'nullable|date|before:today',
            'cod_intencao' => 'nullable|exists:intencao,cod_intencao',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_fundo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'nome.max' => 'O nome não pode ter mais de 30 caracteres.',
            'bio.max' => 'A bio não pode ter mais de 1000 caracteres.',
            'data_nascimento.date' => 'Por favor, insira uma data válida.',
            'data_nascimento.before' => 'A data de nascimento deve ser anterior a hoje.',
            'cod_intencao.exists' => 'Intenção selecionada inválida.',
            'foto.image' => 'O arquivo deve ser uma imagem.',
            'foto.mimes' => 'A foto deve ser nos formatos: jpeg, png, jpg ou gif.',
            'foto.max' => 'A foto não pode ser maior que 2MB.',
            'photo_fundo.image' => 'O arquivo deve ser uma imagem.',
            'photo_fundo.mimes' => 'A foto de fundo deve ser nos formatos: jpeg, png, jpg ou gif.',
            'photo_fundo.max' => 'A foto de fundo não pode ser maior que 2MB.',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            // DB::beginTransaction();

            // Busca ou cria o registro de detalhes do usuário
            $detalhes = $user->DetalhesUsuario;

            if (!$detalhes) {
                $detalhes = DetalhesUsuario::update(
                    ['id_detalhes_usuario' => $user->id], // Condição para encontrar (ou criar)
                    $detalhes // Dados para preencher/atualizar
                );
            }

            // Processa upload da foto do perfil
            if ($request->hasFile('foto')) {
                // Remove foto anterior se existir
                if ($detalhes->foto && Storage::disk('public')->exists($detalhes->foto)) {
                    Storage::disk('public')->delete($detalhes->foto);
                }

                $fotoPath = $request->file('foto')->store('foto', 'public');
                $detalhes->foto = $fotoPath;
            }

            // Processa upload da foto de fundo
            if ($request->hasFile('photo_fundo')) {
                // Remove foto anterior se existir
                if ($detalhes->photo_fundo && Storage::disk('public')->exists($detalhes->photo_fundo)) {
                    Storage::disk('public')->delete($detalhes->photo_fundo);
                }

                $fundoPath = $request->file('photo_fundo')->store('photo_fundo', 'public');
                $detalhes->photo_fundo = $fundoPath;
            }




            // Atualiza os outros campos
            $detalhes->fill([
                'nome' => $request->nome,
                'apelido' => $request->apelido,
                'bio' => $request->bio,
                'localizacao' => $request->localizacao,
                'data_nascimento' => $request->data_nascimento,
                'cod_intencao' => $request->cod_intencao,
            ]);

            $result = $detalhes->save();

            //DB::commit();

            return redirect()->route('profile.show')
                ->with('success', 'Perfil atualizado com sucesso!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            //  DB::rollback();
            dd($e);

            return back()->with('error', 'Ocorreu um erro ao atualizar o perfil. Tente novamente.');
        }
    }

    /**
     * Remove uma foto do perfil (foto principal ou de fundo)
     */
    public function removePhoto(Request $request): RedirectResponse
    {
        $user = auth()->user();
        $detalhes = $user->DetalhesUsuario;

        if (!$detalhes) {
            return back()->with('error', 'Perfil não encontrado.');
        }

        $photoType = $request->input('type'); // 'foto' ou 'photo_fundo'

        if (!in_array($photoType, ['foto', 'photo_fundo'])) {
            return back()->with('error', 'Tipo de foto inválido.');
        }

        try {
            // Remove o arquivo do storage se existir
            if ($detalhes->$photoType && Storage::exists($detalhes->$photoType)) {
                Storage::delete($detalhes->$photoType);
            }

            // Remove a referência do banco
            $detalhes->$photoType = null;
            $detalhes->save();

            $photoName = $photoType === 'foto' ? 'foto do perfil' : 'foto de fundo';

            return back()->with('success', 'A ' . $photoName . ' foi removida com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Ocorreu um erro ao remover a foto. Tente novamente.');
        }
    }
    public function showUser($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $detalhes = $user->DetalhesUsuario;
        $intencao = $detalhes?->cod_intencao;
        $userData = $this->processUserData($user, $detalhes);
        $pets = $this->processPetsData($user->Pet ?? collect());

        return view('perfil', compact('userData', 'pets', 'intencao'));
    }

    public function index(Request $request)
    {
        $query = \App\Models\User::with(['DetalhesUsuario', 'DetalhesUsuario.cod_intencao', 'Pet', 'Pet.socializaCom']);

        // Filtros
        if ($request->filled('nome')) {
            $query->whereHas('DetalhesUsuario', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->nome . '%');
            });
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('localizacao')) {
            $query->whereHas('DetalhesUsuario', function ($q) use ($request) {
                $q->where('localizacao', 'like', '%' . $request->localizacao . '%');
            });
        }
        if ($request->filled('intencao')) {
            $query->whereHas('DetalhesUsuario.cod_intencao', function ($q) use ($request) {
                $q->where('descricao', 'like', '%' . $request->intencao . '%');
            });
        }
        if ($request->filled('socializa_com')) {
            $query->whereHas('Pet.socializaCom', function ($q) use ($request) {
                $q->where('descricao', 'like', '%' . $request->socializa_com . '%');
            });
        }
        if ($request->filled('especie')) {
            $query->whereHas('Pet', function ($q) use ($request) {
                $q->where('especie', 'like', '%' . $request->especie . '%');
            });
        }

        $usuarios = $query->paginate(12);

        return view('usuarios', compact('usuarios'));
    }

    public function usuarioConexao()
    {
        $user = auth()->user();
        $detalhes = $user->DetalhesUsuario;
        $intencao = $detalhes?->cod_intencao()->first();

        // Processa dados do usuário
        $userData = $this->processUserData($user, $detalhes);

        // Processa pets do usuário
        $pets = $this->processPetsData($user->Pet ?? collect());

        return view('usuario_conexao', compact('user'));
    }
}
