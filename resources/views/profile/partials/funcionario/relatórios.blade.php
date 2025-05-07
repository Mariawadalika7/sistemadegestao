<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Relatórios - Gestão Elétrica</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f4f6f8;
    }
    .card {
      border-radius: 1rem;
      transition: transform 0.2s ease;
    }
    .card:hover {
      transform: scale(1.02);
    }
    .icon-box {
      font-size: 2.5rem;
      color: #0d6efd;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Gestão Elétrica</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#">Página Inicial</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Clientes</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Pagamentos</a></li>
        <li class="nav-item"><a class="nav-link active" href="#">Relatórios</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Suporte</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Conteúdo -->
<div class="container py-5">
  <h3 class="mb-4 text-center">Relatórios do Sistema</h3>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card p-4 text-center">
        <div class="icon-box mb-2">
          <i class="bi bi-person-lines-fill"></i>
        </div>
        <h5>Relatório por Cliente</h5>
        <p class="text-muted">Visualize todos os pagamentos de um cliente específico.</p>
        <button class="btn btn-primary w-100">Gerar</button>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-4 text-center">
        <div class="icon-box mb-2">
          <i class="bi bi-calendar-event-fill"></i>
        </div>
        <h5>Relatório por Data</h5>
        <p class="text-muted">Veja os pagamentos realizados em um determinado período.</p>
        <button class="btn btn-primary w-100">Gerar</button>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-4 text-center">
        <div class="icon-box mb-2">
          <i class="bi bi-receipt-cutoff"></i>
        </div>
        <h5>Pagamentos Pendentes</h5>
        <p class="text-muted">Clientes que ainda não efetuaram o pagamento.</p>
        <button class="btn btn-primary w-100">Gerar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
