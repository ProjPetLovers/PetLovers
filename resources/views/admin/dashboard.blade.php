<x-app-layout>
    {{-- Slot Header: Ideal para o título da página --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard do Administrador') }}
        </h2>
    </x-slot>

    {{-- CSS personalizado para isolar os gráficos --}}
    <style>
        /* Isolamento específico para os containers dos gráficos */
        .chart-container {
            position: relative !important;
            width: 100% !important;
            box-sizing: border-box !important;
        }
        
        .chart-container canvas {
            max-width: 100% !important;
            height: auto !important;
            display: block !important;
        }
        
        /* Reset de estilos que podem interferir */
        .dashboard-content * {
            box-sizing: border-box;
        }
        
        .dashboard-content {
            all: initial;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
        }
        
        /* Garantir que o Tailwind funcione corretamente */
        .dashboard-content .bg-white { background-color: #ffffff !important; }
        .dashboard-content .p-6 { padding: 1.5rem !important; }
        .dashboard-content .rounded-xl { border-radius: 0.75rem !important; }
        .dashboard-content .shadow-md { box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1) !important; }
        .dashboard-content .grid { display: grid !important; }
        .dashboard-content .gap-6 { gap: 1.5rem !important; }
        .dashboard-content .mb-8 { margin-bottom: 2rem !important; }
        .dashboard-content .mb-4 { margin-bottom: 1rem !important; }
        .dashboard-content .text-3xl { font-size: 1.875rem !important; line-height: 2.25rem !important; }
        .dashboard-content .font-bold { font-weight: 700 !important; }
        .dashboard-content .text-gray-900 { color: #111827 !important; }
        .dashboard-content .text-gray-600 { color: #4b5563 !important; }
        .dashboard-content .text-gray-500 { color: #6b7280 !important; }
        .dashboard-content .text-sm { font-size: 0.875rem !important; line-height: 1.25rem !important; }
        .dashboard-content .font-medium { font-weight: 500 !important; }
        .dashboard-content .text-4xl { font-size: 2.25rem !important; line-height: 2.5rem !important; }
        .dashboard-content .font-semibold { font-weight: 600 !important; }
        .dashboard-content .text-lg { font-size: 1.125rem !important; line-height: 1.75rem !important; }
        
        /* Cores específicas */
        .dashboard-content .text-indigo-600 { color: #4f46e5 !important; }
        .dashboard-content .text-amber-600 { color: #d97706 !important; }
        .dashboard-content .text-teal-600 { color: #0d9488 !important; }
        .dashboard-content .text-rose-600 { color: #e11d48 !important; }
        
        /* Grid responsivo */
        .dashboard-content .grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)) !important; }
        
        /* Cards sempre em 4 colunas - ajustando para telas menores */
        .dashboard-content .cards-grid { 
            grid-template-columns: repeat(4, minmax(0, 1fr)) !important; 
            gap: 0.75rem !important; /* gap menor em telas pequenas */
        }
        
        @media (min-width: 640px) {
            .dashboard-content .sm\\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)) !important; }
            .dashboard-content .cards-grid { gap: 1.5rem !important; } /* gap normal em telas médias */
        }
        @media (min-width: 1024px) {
            .dashboard-content .lg\\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)) !important; }
            .dashboard-content .lg\\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)) !important; }
            .dashboard-content .lg\\:col-span-2 { grid-column: span 2 / span 2 !important; }
        }
        @media (min-width: 1280px) {
            .dashboard-content .xl\\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)) !important; }
            .dashboard-content .xl\\:col-span-3 { grid-column: span 3 / span 3 !important; }
        }
        
        /* Flexbox */
        .dashboard-content .flex { display: flex !important; }
        .dashboard-content .flex-col { flex-direction: column !important; }
        .dashboard-content .justify-between { justify-content: space-between !important; }
        
        /* Alturas específicas para os gráficos */
        .dashboard-content .h-96 { height: 24rem !important; }
        .dashboard-content .h-80 { height: 20rem !important; }
        .dashboard-content .relative { position: relative !important; }
        
        /* Padding responsivo */
        .dashboard-content .px-4 { padding-left: 1rem !important; padding-right: 1rem !important; }
        @media (min-width: 768px) {
            .dashboard-content .md\\:px-8 { padding-left: 2rem !important; padding-right: 2rem !important; }
        }
        .dashboard-content .py-12 { padding-top: 3rem !important; padding-bottom: 3rem !important; }
        /* Ajustes adicionais para cards pequenos */
        .dashboard-content .card-content {
            padding: 1rem !important; /* padding menor em telas pequenas */
        }
        
        .dashboard-content .card-title {
            font-size: 0.75rem !important; /* texto menor em telas pequenas */
            line-height: 1rem !important;
        }
        
        .dashboard-content .card-value {
            font-size: 1.5rem !important; /* valor menor em telas pequenas */
            line-height: 2rem !important;
        }
        
        @media (min-width: 640px) {
            .dashboard-content .card-content {
                padding: 1.5rem !important; /* padding normal em telas médias */
            }
            
            .dashboard-content .card-title {
                font-size: 0.875rem !important;
                line-height: 1.25rem !important;
            }
            
            .dashboard-content .card-value {
                font-size: 2.25rem !important;
                line-height: 2.5rem !important;
            }
        }
    </style>

    {{-- Área de Conteúdo Principal com isolamento --}}
    <div class="dashboard-content">
        <div class="py-12">
            <div class="w-full px-4 md:px-8">

                {{-- CDN do Chart.js --}}
                <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>

                <header class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">Visão geral da plataforma PetLovers.</h1>
                    <p class="text-gray-600">Métricas e gráficos detalhados.</p>
                </header>

                {{-- Cards de métricas - sempre em 4 colunas --}}
                <div class="grid cards-grid mb-8">
                    <div class="bg-white card-content rounded-xl shadow-md flex flex-col justify-between">
                        <h2 class="card-title font-medium text-gray-500">Total de Usuários Ativos</h2>
                        <p class="card-value font-bold text-indigo-600">{{ $totalUsers ?? 0 }}</p>
                    </div>
                    <div class="bg-white card-content rounded-xl shadow-md flex flex-col justify-between">
                        <h2 class="card-title font-medium text-gray-500">Usuários Inativos</h2>
                        <p class="card-value font-bold text-amber-600">{{ $inactiveUsers ?? 0 }}</p>
                    </div>
                    <div class="bg-white card-content rounded-xl shadow-md flex flex-col justify-between">
                        <h2 class="card-title font-medium text-gray-500">Total de Pets Cadastrados</h2>
                        <p class="card-value font-bold text-teal-600">{{ $petsBySpecies->sum('total') ?? 0 }}</p>
                    </div>
                    <div class="bg-white card-content rounded-xl shadow-md flex flex-col justify-between">
                        <h2 class="card-title font-medium text-gray-500">Total de Conexões</h2>
                        <p class="card-value font-bold text-rose-600">{{ $totalConnections ?? 0 }}</p>
                    </div>
                </div>

                {{-- Grid de gráficos --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
                    
                    {{-- Gráfico de progressão de usuários --}}
                    <div class="bg-white p-6 rounded-xl shadow-md lg:col-span-2 xl:col-span-3">
                        <h3 class="font-semibold text-lg mb-4">Novos Usuários (Últimos 30 Dias)</h3>
                        <div class="chart-container h-96">
                            <canvas id="userProgressionChart"></canvas>
                        </div>
                    </div>
                    
                    {{-- Gráfico de pets por espécie --}}
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h3 class="font-semibold text-lg mb-4">Pets por Espécie</h3>
                        <div class="chart-container h-80">
                            <canvas id="petsBySpeciesChart"></canvas>
                        </div>
                    </div>

                    {{-- Gráfico de usuários por intenção --}}
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h3 class="font-semibold text-lg mb-4">Usuários por Intenção</h3>
                        <div class="chart-container h-80">
                            <canvas id="usersByIntentionChart"></canvas>
                        </div>
                    </div>

                    {{-- Gráfico de usuários por localização --}}
                    <div class="bg-white p-6 rounded-xl shadow-md lg:col-span-2 xl:col-span-3">
                        <h3 class="font-semibold text-lg mb-4">Top 10 Localizações de Usuários</h3>
                        <div class="chart-container h-80">
                            <canvas id="usersByLocationChart"></canvas>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-- Script JavaScript para os gráficos --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Aguardar um pouco para garantir que tudo está carregado
            setTimeout(() => {
                // Configurações globais do Chart.js para melhor compatibilidade
                if (typeof Chart !== 'undefined') {
                    Chart.defaults.responsive = true;
                    Chart.defaults.maintainAspectRatio = false;
                }

                // 1. Gráfico de Progressão de Usuários (Linha)
                const userProgressionCtx = document.getElementById('userProgressionChart');
                if (userProgressionCtx) {
                    const userProgressionData = @json($userProgressionData ?? ['labels' => [], 'data' => []]);
                    
                    new Chart(userProgressionCtx.getContext('2d'), {
                        type: 'line',
                        data: {
                            labels: userProgressionData.labels || [],
                            datasets: [{
                                label: 'Novos Usuários por Dia',
                                data: userProgressionData.data || [],
                                fill: true,
                                borderColor: 'rgb(79, 70, 229)',
                                backgroundColor: 'rgba(79, 70, 229, 0.1)',
                                tension: 0.3,
                                borderWidth: 2,
                                pointRadius: 4,
                                pointHoverRadius: 6
                            }]
                        },
                        options: { 
                            responsive: true,
                            maintainAspectRatio: false,
                            interaction: {
                                intersect: false,
                                mode: 'index'
                            },
                            plugins: {
                                legend: { 
                                    display: false, 
                                    position: 'top',
                                    labels: { font: { size: 12 } }
                                },
                                title: { 
                                    display: false, 
                                    text: 'Progressão de Novos Usuários (Últimos 30 Dias)', 
                                    font: { size: 16, weight: 'bold' }, 
                                    padding: { top: 10, bottom: 20 } 
                                },
                                tooltip: {
                                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                    titleColor: 'white',
                                    bodyColor: 'white',
                                    callbacks: { 
                                        label: function(context) { 
                                            return context.dataset.label + ': ' + context.parsed.y + ' usuários'; 
                                        } 
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    title: { display: true, text: 'Data', font: { size: 14 } },
                                    grid: { display: false }
                                },
                                y: {
                                    beginAtZero: true,
                                    title: { display: true, text: 'Número de Usuários', font: { size: 14 } },
                                    ticks: { precision: 0, stepSize: 1 },
                                    grid: {
                                        drawBorder: false,
                                        color: 'rgba(0, 0, 0, 0.1)'
                                    }
                                }
                            }
                        }
                    });
                }

                // 2. Gráfico de Pets por Espécie (Pizza)
                const petsBySpeciesCtx = document.getElementById('petsBySpeciesChart');
                if (petsBySpeciesCtx) {
                    const petsBySpeciesData = @json($petsBySpecies ?? []);
                    
                    new Chart(petsBySpeciesCtx.getContext('2d'), {
                        type: 'doughnut',
                        data: {
                            labels: petsBySpeciesData.map ? petsBySpeciesData.map(item => item.especie) : [],
                            datasets: [{
                                label: 'Quantidade',
                                data: petsBySpeciesData.map ? petsBySpeciesData.map(item => item.total) : [],
                                backgroundColor: ['#14b8a6', '#f97316', '#ec4899', '#8b5cf6', '#facc15', '#06b6d4', '#ef4444'],
                                hoverOffset: 8,
                                borderWidth: 0
                            }]
                        },
                        options: { 
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { 
                                    display: true, 
                                    position: 'right', 
                                    labels: { 
                                        font: { size: 12 }, 
                                        boxWidth: 20,
                                        padding: 15
                                    } 
                                },
                                title: { 
                                    display: false, 
                                    text: 'Distribuição de Pets por Espécie', 
                                    font: { size: 16, weight: 'bold' }, 
                                    padding: { top: 10, bottom: 20 } 
                                },
                                tooltip: {
                                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                    titleColor: 'white',
                                    bodyColor: 'white',
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.label || '';
                                            if (label) { label += ': '; }
                                            if (context.parsed !== null) {
                                                const total = context.dataset.data.reduce((sum, val) => sum + val, 0);
                                                const percentage = total > 0 ? (context.parsed / total * 100).toFixed(1) : 0;
                                                label += context.parsed + ' (' + percentage + '%)';
                                            }
                                            return label;
                                        }
                                    }
                                }
                            }
                        }
                    });
                }

                // 3. Gráfico de Usuários por Intenção (Barra)
                const usersByIntentionCtx = document.getElementById('usersByIntentionChart');
                if (usersByIntentionCtx) {
                    const usersByIntentionData = @json($usersByIntention ?? []);
                    
                    new Chart(usersByIntentionCtx.getContext('2d'), {
                        type: 'bar',
                        data: {
                            labels: usersByIntentionData.map ? usersByIntentionData.map(item => item.descricao) : [],
                            datasets: [{
                                label: 'Total de Usuários',
                                data: usersByIntentionData.map ? usersByIntentionData.map(item => item.total) : [],
                                backgroundColor: '#6366f1',
                                borderColor: '#4f46e5',
                                borderWidth: 1,
                                borderRadius: 4
                            }]
                        },
                        options: { 
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { 
                                    display: false, 
                                    position: 'top', 
                                    labels: { font: { size: 12 } } 
                                },
                                title: { 
                                    display: false, 
                                    text: 'Usuários por Tipo de Intenção', 
                                    font: { size: 16, weight: 'bold' }, 
                                    padding: { top: 10, bottom: 20 } 
                                },
                                tooltip: {
                                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                    titleColor: 'white',
                                    bodyColor: 'white',
                                    callbacks: { 
                                        label: function(context) { 
                                            return context.dataset.label + ': ' + context.parsed.y; 
                                        } 
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    title: { display: true, text: 'Intenção', font: { size: 14 } },
                                    grid: { display: false }
                                },
                                y: {
                                    beginAtZero: true,
                                    title: { display: true, text: 'Número de Usuários', font: { size: 14 } },
                                    ticks: { precision: 0, stepSize: 1 },
                                    grid: {
                                        drawBorder: false,
                                        color: 'rgba(0, 0, 0, 0.1)'
                                    }
                                }
                            }
                        }
                    });
                }

                // 4. Gráfico de Usuários por Localização (Barra)
                const usersByLocationCtx = document.getElementById('usersByLocationChart');
                if (usersByLocationCtx) {
                    const usersByLocationData = @json($usersByLocation ?? []);
                    
                    new Chart(usersByLocationCtx.getContext('2d'), {
                        type: 'bar',
                        data: {
                            labels: usersByLocationData.map ? usersByLocationData.map(item => item.localizacao) : [],
                            datasets: [{
                                label: 'Total de Usuários',
                                data: usersByLocationData.map ? usersByLocationData.map(item => item.total) : [],
                                backgroundColor: '#0d9488',
                                borderColor: '#0f766e',
                                borderWidth: 1,
                                borderRadius: 4
                            }]
                        },
                        options: { 
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { 
                                    display: false, 
                                    position: 'top', 
                                    labels: { font: { size: 12 } } 
                                },
                                title: { 
                                    display: false, 
                                    text: 'Top 10 Localizações de Usuários', 
                                    font: { size: 16, weight: 'bold' }, 
                                    padding: { top: 10, bottom: 20 } 
                                },
                                tooltip: {
                                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                    titleColor: 'white',
                                    bodyColor: 'white',
                                    callbacks: { 
                                        label: function(context) { 
                                            return context.dataset.label + ': ' + context.parsed.y; 
                                        } 
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    title: { display: true, text: 'Localização', font: { size: 14 } },
                                    grid: { display: false }
                                },
                                y: {
                                    beginAtZero: true,
                                    title: { display: true, text: 'Número de Usuários', font: { size: 14 } },
                                    ticks: { precision: 0, stepSize: 1 },
                                    grid: {
                                        drawBorder: false,
                                        color: 'rgba(0, 0, 0, 0.1)'
                                    }
                                }
                            }
                        }
                    });
                }
            }, 200); // Aguarda 200ms para garantir que tudo está pronto
        });
    </script>
</x-app-layout>