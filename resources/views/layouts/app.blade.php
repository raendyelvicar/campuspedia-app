<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Campuspedia Assignment Test | Raendy Andhika El Vicar</title>

    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/colors.css') }}">

    @yield('extra-css')
    @yield('extra-js')

    <script src="https://kit.fontawesome.com/0f2732326e.js" crossorigin="anonymous"></script>
</head>
<body>

    <main class="py-4">
        @yield('content')
    </main>


    <!-- Core JavaScript
    ================================================== -->

    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/tether.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/custom.js')}}"></script>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
            })
    </script>
    @stack('ajax_crud')
</body>
</html>
