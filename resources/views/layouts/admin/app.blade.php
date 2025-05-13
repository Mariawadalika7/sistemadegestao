<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
         @assets        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('dashboard/css/styles.css') }}" rel="stylesheet" />
        <link href='{{ asset('global/css/font-awesome.css') }}' rel="stylesheet" />
        <link href='{{ asset('dashboard/css/datatables.css') }}' rel="stylesheet" />
        @endassets
        <livewire:styles />
    </head>
    <body class="sb-nav-fixed">

    {{ $slot }}
    <livewire:scripts />   
    <script src='{{ asset('global/js/sweetalert.js') }}'></script> 
    <script src="{{ asset('dashboard/js/font-awesome-v6.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard/js/vendor.bundle.base.js') }}" ></script>
    <script src="{{ asset('dashboard/js/scripts.js') }}"></script>

    @stack('dashboard-home')
</body>
</html>
