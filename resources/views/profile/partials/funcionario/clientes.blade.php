<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestão de Clientes</title>
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
        <li class="nav-item"><a class="nav-link active" href="#">Clientes</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Pagamentos</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Relatórios</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Suporte</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Formulário de Cadastro de Cliente -->
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card p-4">
        <h4 class="mb-4">Cadastrar Novo Cliente</h4>
        <form>
          <div class="mb-3">
            <label for="nome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nome" placeholder="Digite o nome completo">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="exemplo@email.com">
          </div>
          <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" placeholder="Ex: 923-456-789">
          </div>
          <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" placeholder="Rua, bairro, cidade">
          </div>
          <button type="submit" class="btn btn-success w-100">Salvar Cliente</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Tabela de Clientes -->
<div class="container pb-5">
  <h4 class="mb-3">Lista de Clientes</h4>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Endereço</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Ana Cristina</td>
        <td>ana@gmail.com</td>
        <td>922-111-222</td>
        <td>Rua Principal, Luanda</td>
      </tr>
      <tr>
        <td>Carlos Manuel</td>
        <td>carlosm@yahoo.com</td>
        <td>923-333-444</td>
        <td>Bairro Azul, Benguela</td>
      </tr>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
