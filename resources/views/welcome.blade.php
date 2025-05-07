<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="5;url={{ route('login') }}">

        <title>Sistema de Gestão</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #f8fafc;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            .container {
                text-align: center;
                padding: 2rem;
                background-color: white;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                max-width: 800px;
            }
            h1 {
                font-size: 2.5rem;
                color: #1e3a8a;
                margin-bottom: 1rem;
            }
            p {
                margin-bottom: 1.5rem;
                color: #4b5563;
            }
            .progress-container {
                width: 100%;
                background-color: #e5e7eb;
                border-radius: 0.25rem;
                margin: 2rem 0;
            }
            .progress-bar {
                width: 0%;
                height: 1.5rem;
                background-color: #2563eb;
                border-radius: 0.25rem;
                text-align: center;
                line-height: 1.5rem;
                color: white;
                transition: width 5s linear;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Sistema de Gestão Elétrica</h1>
            <p>Bem-vindo ao sistema de gestão para empresas de distribuição de energia elétrica.</p>
            <p>Você será redirecionado para a página de login em instantes...</p>
            
            <div class="progress-container">
                <div id="progress-bar" class="progress-bar">0%</div>
            </div>
        </div>

        <script>
            // Animação da barra de progresso
            document.addEventListener('DOMContentLoaded', function() {
                const progressBar = document.getElementById('progress-bar');
                let width = 0;
                
                const interval = setInterval(function() {
                    if (width >= 100) {
                        clearInterval(interval);
                        window.location.href = "{{ route('login') }}";
                    } else {
                        width++;
                        progressBar.style.width = width + '%';
                        progressBar.textContent = width + '%';
                    }
                }, 50); // 50ms * 100 = 5 segundos aproximadamente
            });
        </script>
    </body>
</html>
