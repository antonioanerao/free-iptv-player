<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="{{ env('APP_URL') }}/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">

    <title>@yield('title')</title>

    <script src="{{ asset('assets/dashboard/assets/js/jquery-3.4.0.min.js') }}"></script>

    <link href="{{ asset('assets/dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/dashboard/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/dashboard/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('assets/dashboard/assets/js/modernizr.min.js') }}"></script>
    <link href="{{ asset('assets/dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/dashboard/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/dashboard/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    @yield('css')
</head>


<body class="fixed-left">

@include('layouts.painel.header')
@include('layouts.painel.sidebar')

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
           @yield('content')
        </div>
    </div>

    <footer class="footer">
        2019 - {{ date('Y') }} © {{ env('APP_NAME') }}
    </footer>

</div>

<script>
    var resizefunc = [];
</script>


<script src="{{ asset('assets/dashboard/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/js/jquery.core.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/js/jquery.app.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/js/detect.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/js/fastclick.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/js/waves.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/js/wow.min.js') }}"></script>

</body>
</html>
