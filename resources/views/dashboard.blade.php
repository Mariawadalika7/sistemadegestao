<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Gestão Elétrica</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
        <style>
            :root {
                --sidebar-bg: #1e1e2d;
                --sidebar-text: #9899ac;
            }

            body {
                background-color: #f5f5f5;
            }

            /* Sidebar */
            .sidebar {
                background-color: var(--sidebar-bg);
                width: 250px;
                position: fixed;
                height: 100vh;
                left: 0;
                top: 0;
                transition: all 0.3s ease;
                z-index: 1000;
            }

            .sidebar .nav-link {
                color: var(--sidebar-text);
                padding: 0.75rem 1.25rem;
                font-size: 0.9rem;
            }

            .sidebar .nav-link:hover,
            .sidebar .nav-link.active {
                color: #fff;
                background-color: rgba(255,255,255,0.1);
            }

            .sidebar .nav-heading {
                color: #565674;
                font-size: 0.75rem;
                font-weight: 500;
                text-transform: uppercase;
                padding: 1.5rem 1.25rem 0.5rem;
            }

            /* Main Content */
            .main-content {
                margin-left: 250px;
                padding: 2rem;
                transition: all 0.3s ease;
            }

            .main-content-expanded {
                margin-left: 0;
            }

            /* Navbar */
            .top-navbar {
                background-color: #fff;
                border-bottom: 1px solid #eee;
                padding: 0.75rem 2rem;
                margin-left: 250px;
                transition: all 0.3s ease;
            }

            .top-navbar-expanded {
                margin-left: 0;
            }

            /* Cards */
            .metric-card {
                border-radius: 0.5rem;
                border: none;
                box-shadow: 0 0 20px rgba(0,0,0,0.05);
            }

            .metric-card .card-body {
                padding: 1.5rem;
            }

            .metric-value {
                font-size: 2.5rem;
                font-weight: 600;
                line-height: 1.2;
            }

            .metric-label {
                font-size: 0.875rem;
                color: rgba(255,255,255,0.8);
            }

            /* Charts */
            .chart-card {
                background: #fff;
                border-radius: 0.5rem;
                border: none;
                box-shadow: 0 0 20px rgba(0,0,0,0.05);
            }

            .chart-card .card-header {
                background: transparent;
                border-bottom: 1px solid #eee;
                padding: 1rem 1.5rem;
            }

            .chart-title {
                font-size: 1rem;
                font-weight: 500;
                margin: 0;
            }

            .sidebar-collapsed {
                margin-left: -250px;
            }

            @media (max-width: 768px) {
                .sidebar {
                    margin-left: -250px;
                }
                .sidebar.show {
                    margin-left: 0;
                }
                .main-content, .top-navbar {
                    margin-left: 0;
                }
            }
        </style>
    </head>
    <body>
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="d-flex align-items-center px-4 py-3">
                <h4 class="text-white mb-0">EletroGestão</h4>
            </div>
            <nav class="mt-4">
                <div class="nav-heading">PRINCIPAL</div>
                <a href="#dashboard" class="nav-link active d-flex align-items-center">
                    <i class="fas fa-tachometer-alt me-3"></i>
                    Dashboard
                </a>

                <div class="nav-heading">CLIENTES</div>
                <a href="#cadastro-clientes" class="nav-link d-flex align-items-center">
                    <i class="fas fa-user-tie me-3"></i>
                    Cadastro de Clientes
                </a>
             

                <a href="#" class="nav-link d-flex align-items-center">
                    <i class="fas fa-file-invoice me-3"></i>
                    Faturas
                </a>
                <a href="#" class="nav-link d-flex align-items-center">
                    <i class="fas fa-history me-3"></i>
                    Histórico de Consumo
                </a>

                <div class="nav-heading">CONFIGURAÇÕES</div>
                <a href="#" class="nav-link d-flex align-items-center">
                    <i class="fas fa-cog me-3"></i>
                    Configurações
                </a>
                <a href="#" class="nav-link d-flex align-items-center">
                    <i class="fas fa-file-alt me-3"></i>
                    Relatórios
                </a>
            </nav>
        </div>

        <!-- Top Navbar -->
        <nav class="top-navbar">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <button class="btn btn-link text-dark me-3 p-0" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="d-flex align-items-center">
                    <div class="input-group me-3" style="width: 300px;">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                            <i class="fas fa-user"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user-circle me-2"></i>
                                    Perfil
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item d-flex align-items-center text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>
                                        Logout
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Conteúdo dinâmico será carregado aqui -->
            <div id="content-area">
                <!-- Conteúdo padrão do dashboard -->
                <div id="dashboard-content">
                    <h1 class="h3 mb-1">Dashboard</h1>
                    <p class="text-muted mb-4">Visão Geral do Sistema Elétrico</p>

                    <!-- Metric Cards -->
                    <div class="row g-4 mb-4">
                        <div class="col-xl-3 col-md-6">
                            <div class="card metric-card bg-primary text-white">
                                <div class="card-body">
                                    <div class="metric-label">Consumo Total (kWh)</div>
                                    <div class="metric-value">157.892</div>
                                    <div class="small mt-2">
                                        <i class="fas fa-arrow-down"></i>
                                        3% em relação ao mês anterior
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card metric-card bg-warning text-white">
                                <div class="card-body">
                                    <div class="metric-label">Chamados Abertos</div>
                                    <div class="metric-value">23</div>
                                    <div class="small mt-2">
                                        <i class="fas fa-clock"></i>
                                        8 em atendimento
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card metric-card bg-success text-white">
                                <div class="card-body">
                                    <div class="metric-label">Equipes em Campo</div>
                                    <div class="metric-value">12</div>
                                    <div class="small mt-2">
                                        <i class="fas fa-user-check"></i>
                                        5 manutenções em andamento
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card metric-card bg-danger text-white">
                                <div class="card-body">
                                    <div class="metric-label">Ocorrências Críticas</div>
                                    <div class="metric-value">3</div>
                                    <div class="small mt-2">
                                        <i class="fas fa-exclamation-circle"></i>
                                        Requer atenção imediata
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts -->
                    <div class="row g-4">
                        <div class="col-xl-6">
                            <div class="card chart-card">
                                <div class="card-header">
                                    <h6 class="chart-title">Consumo de Energia (últimos 7 dias)</h6>
                                </div>
                                <div class="card-body">
                                    <canvas id="consumoChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card chart-card">
                                <div class="card-header">
                                    <h6 class="chart-title">Ocorrências por Região</h6>
                                </div>
                                <div class="card-body">
                                    <canvas id="ocorrenciasChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabela de Ocorrências Recentes -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="chart-title">Ocorrências Recentes</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tipo</th>
                                                    <th>Local</th>
                                                    <th>Status</th>
                                                    <th>Equipe</th>
                                                    <th>Tempo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#1234</td>
                                                    <td>Queda de Energia</td>
                                                    <td>Setor Norte</td>
                                                    <td><span class="badge bg-warning">Em Atendimento</span></td>
                                                    <td>Equipe A</td>
                                                    <td>23min</td>
                                                </tr>
                                                <tr>
                                                    <td>#1233</td>
                                                    <td>Manutenção Preventiva</td>
                                                    <td>Setor Sul</td>
                                                    <td><span class="badge bg-success">Concluído</span></td>
                                                    <td>Equipe C</td>
                                                    <td>1h 15min</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Área de cadastro de clientes (inicialmente oculta) -->
                <div id="cadastro-clientes-content" style="display: none;">
                    @include('clientes.cadastro')
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Gráfico de Consumo
            const consumoChart = new Chart(document.getElementById('consumoChart'), {
                type: 'line',
                data: {
                    labels: ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
                    datasets: [{
                        label: 'Consumo (kWh)',
                        data: [25000, 28000, 24000, 29000, 27000, 22000, 23000],
                        fill: true,
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Gráfico de Ocorrências
            const ocorrenciasChart = new Chart(document.getElementById('ocorrenciasChart'), {
                type: 'bar',
                data: {
                    labels: ['Norte', 'Sul', 'Leste', 'Oeste', 'Centro'],
                    datasets: [{
                        label: 'Ocorrências',
                        data: [12, 8, 15, 9, 7],
                        backgroundColor: 'rgb(54, 162, 235)'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            document.addEventListener('DOMContentLoaded', function() {
                const sidebarToggle = document.getElementById('sidebarToggle');
                const sidebar = document.querySelector('.sidebar');
                const mainContent = document.querySelector('.main-content');
                const topNavbar = document.querySelector('.top-navbar');

                // Verifica o estado inicial em dispositivos móveis
                function checkWidth() {
                    if (window.innerWidth <= 768) {
                        sidebar.classList.add('sidebar-collapsed');
                        mainContent.classList.add('main-content-expanded');
                        topNavbar.classList.add('top-navbar-expanded');
                    }
                }

                // Executa verificação inicial
                checkWidth();

                // Adiciona evento de clique no botão
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('sidebar-collapsed');
                    mainContent.classList.toggle('main-content-expanded');
                    topNavbar.classList.toggle('top-navbar-expanded');
                });

                // Adiciona evento de redimensionamento da janela
                window.addEventListener('resize', function() {
                    checkWidth();
                });

                // Fecha o menu ao clicar fora em dispositivos móveis
                document.addEventListener('click', function(event) {
                    if (window.innerWidth <= 768) {
                        const isClickInsideSidebar = sidebar.contains(event.target);
                        const isClickInsideToggle = sidebarToggle.contains(event.target);

                        if (!isClickInsideSidebar && !isClickInsideToggle && !sidebar.classList.contains('sidebar-collapsed')) {
                            sidebar.classList.add('sidebar-collapsed');
                            mainContent.classList.add('main-content-expanded');
                            topNavbar.classList.add('top-navbar-expanded');
                        }
                    }
                });

                // Função para mostrar/ocultar conteúdos
                function showContent(contentId) {
                    // Oculta todos os conteúdos
                    document.querySelectorAll('#content-area > div').forEach(div => {
                        div.style.display = 'none';
                    });

                    // Remove a classe active de todos os links
                    document.querySelectorAll('.nav-link').forEach(link => {
                        link.classList.remove('active');
                    });

                    // Mostra o conteúdo selecionado
                    document.getElementById(contentId).style.display = 'block';

                    // Adiciona a classe active ao link clicado
                    event.target.closest('.nav-link').classList.add('active');
                }

                // Adiciona eventos para os links do menu
                document.querySelector('a[href="#dashboard"]').addEventListener('click', function(e) {
                    e.preventDefault();
                    showContent('dashboard-content');
                });

                document.querySelector('a[href="#cadastro-clientes"]').addEventListener('click', function(e) {
                    e.preventDefault();
                    showContent('cadastro-clientes-content');
                });
            });
        </script>
    </body>
</html>
