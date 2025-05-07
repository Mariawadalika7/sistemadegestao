<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestão de Pagamentos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border-radius: 1rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-control:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
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
        <li class="nav-item"><a class="nav-link active" href="#">Pagamentos</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Relatórios</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Suporte</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Formulário de Pagamento -->
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card p-4">
        <h4 class="mb-4">Registar Pagamento</h4>
        <form>
          <div class="mb-3">
            <label for="cliente" class="form-label">Nome do Cliente</label>
            <input type="text" class="form-control" id="cliente" placeholder="Digite o nome do cliente">
          </div>
          <div class="mb-3">
            <label for="valor" class="form-label">Valor (Kz)</label>
            <input type="number" class="form-control" id="valor" placeholder="Ex: 15000">
          </div>
          <div class="mb-3">
            <label for="data" class="form-label">Data do Pagamento</label>
            <input type="date" class="form-control" id="data">
          </div>
          <div class="mb-3">
            <label for="referencia" class="form-label">Referência</label>
            <input type="text" class="form-control" id="referencia" placeholder="ID ou descrição do pagamento">
          </div>
          <button type="submit" class="btn btn-primary w-100">Confirmar Pagamento</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Tabela de Pagamentos -->
<div class="container pb-5">
  <h4 class="mb-3">Histórico de Pagamentos</h4>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Cliente</th>
        <th>Valor</th>
        <th>Data</th>
        <th>Referência</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>João Pedro</td>
        <td>12.000 Kz</td>
        <td>2025-04-01</td>
        <td>ENERGIA-MAR-2025</td>
      </tr>
      <tr>
        <td>Maria Luísa</td>
        <td>18.500 Kz</td>
        <td>2025-03-30</td>
        <td>ENERGIA-MAR-2025</td>
      </tr>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

