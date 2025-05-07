<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CentroMulticerviços - Login</title>
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

        .login-container {
            width: 420px; /* Aumentado de 360px para 420px */
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 40px; /* Aumentado de 30px para 40px */
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 24px;
            font-size: 24px; /* Aumentado de 22px para 24px */
            font-weight: bold;
            color: #1a56db;
        }

        .logo-icon {
            color: #ff6b00;
            margin-right: 8px;
            font-size: 20px;
        }

        h1 {
            font-size: 22px; /* Aumentado de 18px para 22px */
            color: #333;
            margin-bottom: 8px;
            font-weight: bold;
        }

        p.subtitle {
            color: #666;
            margin-bottom: 24px;
            font-size: 16px; /* Aumentado de 14px para 16px */
        }

        .form-group {
            margin-bottom: 20px; /* Aumentado de 15px para 20px */
        }

        label {
            display: block;
            margin-bottom: 8px; /* Aumentado de 5px para 8px */
            color: #333;
            font-weight: 500;
            font-size: 16px; /* Aumentado */
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px; /* Aumentado de 10px para 12px */
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px; /* Aumentado */
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #1a56db;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 24px; /* Aumentado */
        }

        .remember-me input {
            margin-right: 8px;
            width: 16px; /* Aumentado */
            height: 16px; /* Aumentado */
        }

        .remember-me label {
            margin-bottom: 0;
            font-size: 16px; /* Aumentado */
        }

        .forgot-password {
            float: right;
            color: #1a56db;
            text-decoration: none;
            font-size: 16px; /* Aumentado */
        }

        .login-button {
            background-color: #1a56db;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 12px; /* Aumentado de 10px para 12px */
            width: 100%;
            cursor: pointer;
            font-size: 16px; /* Aumentado */
            font-weight: 500;
        }

        .login-button:hover {
            background-color: #1e429f;
        }

        .register {
            margin-top: 24px; /* Aumentado */
            text-align: center;
            font-size: 16px; /* Aumentado */
            color: #666;
        }

        .register a {
            color: #1a56db;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <span class="logo-icon">⚡</span>
            CentroMultisserviços
        </div>

        <h1>Bem-vindo de volta!</h1>
        <p class="subtitle">Acesse sua conta para gerenciar o sistema</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                <div class="remember-me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Lembrar-me</label>
                </div>

                @if (Route::has('password.request'))
                    <a class="forgot-password" href="{{ route('password.request') }}">
                        Esqueceu sua senha?
                    </a>
                @endif
            </div>

            <button type="submit" class="login-button">
                Entrar no Sistema
            </button>

            <div class="register">
                Não tem uma conta?
                <a href="{{ route('register') }}">
                    Cadastre-se
                </a>
            </div>
        </form>
    </div>
</body>
</html>
