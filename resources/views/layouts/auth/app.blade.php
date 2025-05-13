<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href='{{ asset('auth/css/styles.css') }}' />
    <link rel="stylesheet" href='{{ asset('auth/css/sign_up.css') }}' />
    <livewire:styles />
</head>
<body>

    {{ $slot }}
    <livewire:scripts />
    <script src='{{ asset('global/js/sweetalert.js') }}'></script>
</body>
</html>
