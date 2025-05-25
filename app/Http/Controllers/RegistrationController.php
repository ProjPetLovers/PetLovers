<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegistrationController extends Controller
{
    public function showComplete()
        {
            // Verifica se todas as etapas foram completadas
            if (!Session::has('user_registration_data') ||
                !Session::has('detalhes_data') ||
                !Session::has('pet_data')) {
                return redirect()->route('register')->with('error', 'Complete todas as etapas do registro.');
            }

            $userData = Session::get('user_registration_data');
            $detalhesData = Session::get('detalhes_data');
            $petData = Session::get('pet_data');

            return view('registration_complete', compact('userData', 'detalhesData', 'petData'));
        }

        public function complete(Request $request)
        {
            // Verifica se todas as etapas foram completadas
            if (!Session::has('user_registration_data') ||
                !Session::has('detalhes_data') ||
                !Session::has('pet_data')) {
                return redirect()->route('register')->with('error', 'Dados incompletos. Reinicie o processo.');
            }

            try {
                DB::beginTransaction();

                // 1. Cria o usuário
                $userData = Session::get('user_registration_data');
                $user = User::create($userData);

                // 2. Cria os detalhes do usuário
                $detalhesData = Session::get('detalhes_data');
                $detalhesData['id_detalhes_usuario'] = $user->id;
                DB::table('detalhes_usuario')->insert($detalhesData);

                // 3. Cria o pet
                $petData = Session::get('pet_data');
                $petData['usuario_id'] = $user->id;
                DB::table('pet')->insert($petData);

                DB::commit();

                // Limpa os dados da sessão
                Session::forget(['user_registration_data', 'detalhes_data', 'pet_data']);

                // Faz login do usuário
                Auth::login($user);

                return redirect()->route('dashboard')->with('success', 'Cadastro realizado com sucesso!');

            } catch (\Exception $e) {
                DB::rollBack();

                return redirect()->back()->with('error', 'Erro ao finalizar cadastro: ' . $e->getMessage());
            }
        }
}
