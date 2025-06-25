<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
 /**
     * Exibe a lista de usuários para o admin, incluindo soft-deletados.
     */
    public function index(Request $request): View
    {
        $query = User::withTrashed() // incluindo soft-deletados
            ->with(['DetalhesUsuario', 'Pet'])
            ->latest();

        // Filtros
        if ($request->filled('nome')) {
            $query->whereHas('DetalhesUsuario', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->input('nome') . '%');
            })->orWhere('name', 'like', '%' . $request->input('nome') . '%');
        }


        $usuarios = $query->paginate(15);

        return view('admin.users.index', compact('usuarios'));
    }

//reativa a conta de um usuario
    public function restoreUser($id): RedirectResponse
    {
        // Busca o usuário, incluindo aqueles que foram soft-deletados
        $user = User::withTrashed()->find($id);

        // Verifica se o usuário existe e se ele realmente está soft-deletado
        if (!$user) {
            return back()->with('error', 'Usuário não encontrado.');
        }

        if (!$user->trashed()) {
            // Se o usuário não estiver soft-deletado, não há o que restaurar
            return back()->with('warning', 'A conta deste usuário já está ativa.');
        }

        // Realiza a restauração da conta
        $user->restore(); // Define 'deleted_at' como NULL

        return back()->with('success', 'Conta do usuário reativada com sucesso!');
    }

//Exclui permanentemente a conta de um usuário
public function forceDelete(Request $request, User $user): RedirectResponse
    {
        
        $user = User::withTrashed()->find($user->id); // Busca o usuário, incluindo soft-deletados

        if (!$user) {
            return back()->with('error', 'Usuário não encontrado para exclusão permanente.');
        }

        // Se o usuário que está sendo deletado permanentemente for o próprio admin logado,
        // ele precisa ser deslogado antes de ser deletado.
        if (Auth::id() === $user->id) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        $user->forceDelete(); // Exclui permanentemente

        return redirect()->route('admin.users.index')->with('success', 'Usuário ' . $user->name . ' excluído permanentemente.');
    }

    //Soft delete de um usuário ativo
    public function softDelete(User $user): RedirectResponse
        {
            if ($user->trashed()) {
                return back()->with('warning', 'A conta deste usuário já está desativada (soft-deletada).');
            }

            // Se o usuário que está sendo soft-deletado for o próprio admin logado,
            // ele precisa ser deslogado antes.
            if (Auth::id() === $user->id) {
                Auth::logout();
                // Invalida a sessão e regenera o token por segurança, como feito no destroy do perfil
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }

            $user->delete(); // Realiza o soft delete

            return back()->with('success', 'Conta do usuário ' . $user->name . ' desativada com sucesso (soft-deletada).');
        }

    //Edita dados de um usuário
        public function edit(User $user): View
            {
                // Certifique-se de carregar os detalhes do usuário se necessário para a edição
                $user->load('DetalhesUsuario');
                return view('admin.users.edit', compact('user')); // Você precisará criar esta view
            }




}
