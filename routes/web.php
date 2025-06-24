<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DetalhesController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UsuarioConexaoController;
use App\Models\Pet;
use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return redirect()->route('usuarios');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Rotas para o perfil do laravel de usuário autenticado
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Rota para exibir a tela do perfil do usuário
    Route::get('/perfil', [ProfileController::class, 'show'])->name('profile.show');
    // Novas rotas para editar detalhes do perfil e remover foto
    Route::get('/perfil/editar', [ProfileController::class, 'editDetails'])->name('profile.edit-details');
    Route::put('/perfil/atualizar', [ProfileController::class, 'updateDetails'])->name('profile.update-details');
    Route::delete('/perfil/foto', [ProfileController::class, 'removePhoto'])->name('profile.remove-photo');
    // Perfil de qualquer usuário pelo id
    Route::get('/perfil/{id}', [ProfileController::class, 'showUser'])->name('profile.user');
    //Lista de usuários
    Route::get('/usuarios', [ProfileController::class, 'index'])->name('usuarios');
    //Rota para criar um novo pet
    Route::get('profile/pet/create', [PetController::class, 'createForProfile'])->name('profile.pet.create');
    //Rota para armazenar os dados do pet
    Route::post('/profile/pet/store', [PetController::class, 'storeForProfile'])->name('profile.pet.storeForProfile');
    //Rota para editar os dados do pet
    Route::get('/profile/pet/{id}/edit', [PetController::class, 'edit'])->name('profile.pet.edit');
    //Rota para atualizar os dados do pet
    Route::put('/profile/pet/{id}', [PetController::class, 'update'])->name('profile.pet.update');
    // Rota para deletar pet
    Route::delete('/profile/pet/{id}', [PetController::class, 'destroy'])->name('profile.pet.destroy');
    //Rota para softDelete de usuário
    Route::delete('/perfil/desativar', [ProfileController::class, 'softDeleteAccount'])->name('profile.softDeleteAccount');


    // Rota para exibir o perfil do usuário após o registro
    Route::get('usuario_conexao/{id}', [UsuarioConexaoController::class, 'usuarioConexao'])->name('usuario_conexao');
    // Rota para solicitar conexão com outro usuário
    Route::post('/conexao/solicitar/{id}', [UsuarioConexaoController::class, 'solicitarConexao'])->name('conexao.solicitar');
    // Rota para aceitar uma solicitação de conexão
    Route::get('/conexoes_solicitacoes', [UsuarioConexaoController::class, 'solicitacoesRecebidas'])->name('conexoes_solicitacoes');
    // Rota para aprovar
    Route::post('/conexoes/aprovar/{id}', [UsuarioConexaoController::class, 'aprovar'])->name('conexoes.aprovar');
    // Rota para rejeitar
    Route::post('/conexoes/rejeitar/{id}', [UsuarioConexaoController::class, 'rejeitar'])->name('conexoes.rejeitar');
    //Rota para mensagens -> substituir pelo controller de mensagens que Amanda vai subir
    Route::get('/mensagem/nova/{id}', [MensagemController::class, 'nova'])->name('mensagem.nova');
});

// ROTAS DO ADMIN - PROTEGIDAS E COM PREFIXO
    Route::middleware('can:manage-users')->prefix('admin')->name('admin.')->group(function () {

        // Rota para a lista de usuários do painel administrativo
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');

        // Rota para reativar um usuário soft-deletado
        Route::post('/users/{user}/restore', [AdminUserController::class, 'restoreUser'])->name('users.restore');

        // Rota para soft delete de um usuário ativo (admin desativa)
        Route::delete('/users/{user}/soft-delete', [AdminUserController::class, 'softDelete'])->name('users.soft-delete');

        // Rota para exclusão permanente de um usuário
        Route::delete('/users/{user}/force-delete', [AdminUserController::class, 'forceDelete'])->name('users.force-delete');

        // Rotas para editar usuário (formulário e atualização)
        Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');

    });


// Rotas de registro em etapas (apenas para usuários não autenticados)
Route::middleware('guest')->group(function () {
    // Etapa 1: Dados básicos do usuário
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // Etapa 2: Detalhes do usuário
    Route::get('detalhes/create', [DetalhesController::class, 'create'])->name('detalhes.create');
    Route::post('detalhes', [DetalhesController::class, 'store'])->name('detalhes.store');

    // Etapa 3: Dados do pet
    Route::get('pet/create', [PetController::class, 'create'])->name('pet.create');
    Route::post('pet', [PetController::class, 'store'])->name('pet.store');

    // Etapa 4: Finalização do registro
    Route::get('registration/complete', [RegistrationController::class, 'showComplete'])->name('registration.complete');
    Route::post('registration/complete', [RegistrationController::class, 'complete']);
});

Route::get('about', function () {
    return view('about');
})->name('about');

//Route::get('usuario_conexao', [ProfileController::class, 'usuarioConexao'])->name('usuario_conexao');



require __DIR__ . '/auth.php';
