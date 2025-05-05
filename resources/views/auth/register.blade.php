<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroManager - Cadastro</title>
    
</head>
<body>
    <div class="register-container">
        <div class="logo">
            <span class="logo-icon">⚡</span>
            ElectroManager
        </div>
        <h1>Crie sua conta</h1>
        <p class="subtitle">Preencha os campos abaixo para se cadastrar</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div class="form-group">
                <label for="name">Nome</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <!-- Password -->
            <div class="form-group">
                <label for="password">Senha</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirmar Senha</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="register-button">
                Cadastrar
            </button>

            <div class="login-link">
                Já tem uma conta?
                <a href="{{ route('login') }}">
                    Faça login
                </a>
            </div>
        </form>
    </div>
</body>
</html>
