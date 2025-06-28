<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pet;
use App\Models\Conexao;
use App\Models\DetalhesUsuario;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
   /**
     * Exibe o dashboard de administração com as métricas do sistema.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Métrica 1: Número total de usuários e usuários inativos (soft-deleted)
        $totalUsers = User::count();
        $inactiveUsers = User::onlyTrashed()->count();

        // Métrica 2: Pessoas por localização
        // Agrupa usuários pela localização e conta quantos existem em cada uma.
        // O ->take(10) limita aos 10 locais mais comuns para não poluir o gráfico quando crescermos.
        $usersByLocation = DetalhesUsuario::query()
            ->select('localizacao', DB::raw('COUNT(*) as total'))
            ->whereNotNull('localizacao')
            ->groupBy('localizacao')
            ->orderBy('total', 'desc')
            ->take(10)
            ->get();

        // Métrica 3: Pessoas por intenção
        // Junta com a tabela de intenções para obter a descrição.
        $usersByIntention = DetalhesUsuario::query()
            ->join('intencao', 'detalhes_usuario.cod_intencao', '=', 'intencao.cod_intencao')
            ->select('intencao.descricao', DB::raw('COUNT(*) as total'))
            ->groupBy('intencao.descricao')
            ->orderBy('total', 'desc')
            ->get();

        // Métrica 4: Quantidade de pets por espécie
        $petsBySpecies = Pet::query()
            ->select('especie', DB::raw('COUNT(*) as total'))
            ->whereNotNull('especie')
            ->groupBy('especie')
            ->orderBy('total', 'desc')
            ->get();

        // Métrica 5: Número de conexões
        // Status pode ser 'pendente', 'aceito', etc.
        $totalConnections = Conexao::count();
        $connectionsByStatus = Conexao::query()
            ->select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->get();

        // Métrica 6: Progressão de novos usuários nos últimos 30 dias
        $userProgression = User::query()
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
        
        // Formata os dados de progressão para o gráfico
        $userProgressionData = [
            'labels' => $userProgression->pluck('date')->map(fn ($date) => \Carbon\Carbon::parse($date)->format('d/m')),
            'data' => $userProgression->pluck('count'),
        ];

        // Passa todas as métricas para a view
        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'inactiveUsers' => $inactiveUsers,
            'usersByLocation' => $usersByLocation,
            'usersByIntention' => $usersByIntention,
            'petsBySpecies' => $petsBySpecies,
            'totalConnections' => $totalConnections,
            'connectionsByStatus' => $connectionsByStatus,
            'userProgressionData' => $userProgressionData,
        ]);
    }
}
