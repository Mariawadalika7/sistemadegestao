<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroManager - Cadastro</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f5f5f5;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-container {
            width: 420px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }
        .logo {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 24px;
            font-size: 24px;
            font-weight: bold;
            color: #1a56db;
        }
        .logo-icon {
            color: #ff6b00;
            margin-right: 8px;
            font-size: 20px;
        }
        h1 {
            font-size: 22px;
            color: #333;
            margin-bottom: 8px;
            font-weight: bold;
        }
        p.subtitle {
            color: #666;
            margin-bottom: 24px;
            font-size: 16px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 16px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #1a56db;
        }
        .register-button {
            background-color: #1a56db;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 12px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            margin-top: 12px;
        }
        .register-button:hover {
            background-color: #1e429f;
        }
        .login-link {
            margin-top: 24px;
            text-align: center;
            font-size: 16px;
            color: #666;
        }
        .login-link a {
            color: #1a56db;
            text-decoration: none;
            font-weight: 500;
        }
        .error-message {
            color: #e53e3e;
            font-size: 14px;
            margin-top: 4px;
        }
    </style>
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
