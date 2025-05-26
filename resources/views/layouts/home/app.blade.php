<!-- CLC Tecnologias  -->
<!DOCTYPE html>
<html lang="pt-AO" class="scroll-smooth">
<head>
    <meta charset="UTF-8"> 
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#40E194">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <script src="{{ url('home/js/script.js') }}" defer></script>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="author" content="CLC Tecnologias Inc.">
    <link rel="stylesheet" href="{{ url('/home/css/style.css') }}">
    <title>@yield('title')</title>
    <livewire:styles />
    <script src='{{ asset('global/js/sweetalert.js') }}'></script> 
    <link rel="shortcut icon" href="{{ url('/home/img/ico.ico') }}" type="image/x-icon">
    <meta name="keywords" content="Centro Multisserviços, centro de serviços elétricos, eletricidade">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta property="og:title" content="Centro Multisserviços - Prestação de Serviços de Instalação e Manutenção Elétrica">
    <meta property="og:description" content="Centro Multisserviços - Prestação de Serviços de Instalação e Manutenção Elétrica na Sapú II e Vila Flor">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

{{$slot}}
<livewire:scripts />
@stack("auth")
</body>
</html>