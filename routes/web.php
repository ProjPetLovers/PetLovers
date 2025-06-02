<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DetalhesController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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

    //Rota para exibir a tela inicial
    Route::get('welcome', function () {
        return view('welcome');
    });
});

require __DIR__.'/auth.php';
