<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="{{ env('LOGIN_DESCRIPTION') }}">
    <meta name="author" content="{{ env('AUTHOR') }}">
    <meta name="robots" content="{{ env('ROBOTS_LOGIN') }}" />

    <title>Login at {{ env('APP_NAME') }}</title>

    <link href="assets/dashboard/plugins/switchery/switchery.min.css" rel="stylesheet" />

    <link href="assets/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/dashboard/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/dashboard/assets/css/style.css" rel="stylesheet" type="text/css">

    <script src="assets/dashboard/assets/js/modernizr.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>

<div class="wrapper-page">

    <div class="text-center">
        <a href="{{ route('home') }}" class="logo-lg">
            {{ env('APP_NAME') }}
        </a> <br> <br>
    </div>

    @if (session('message'))
        <div class="alert alert-danger text-center">{{ session('message') }}</div>
    @endif

    <form name="pms_login" id="pms_login" action="{{ route('login') }}"  method="post">
        @csrf
        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif


        <div class="form-group row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                    </div>
                    <input type="text" name="login" required value="{{ old('login') }}" class="form-control{{ $errors->any() ? ' is-invalid' : '' }}" placeholder="Email">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="mdi mdi-lock"></i></span>
                    </div>
                    <input id="password" type="password" required placeholder="Password" class="form-control{{ $errors->any() ? ' is-invalid' : '' }}" name="password" />
                </div>
            </div>
        </div>

        <div class="form-group text-right m-t-20">
            <button class="btn btn-primary btn-custom w-md waves-effect waves-light btn-block" type="submit"><span class="fa fa-user-circle"></span> Login</button> <br> <br>
            <a href="{{ route('password.request') }}" class="text-muted text-center"><i class="fa fa-lock m-r-5"></i> Have you lost your password?</a>
        </div>
    </form>
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

<!-- Notification js -->
<script src="{{ asset('assets/dashboard/plugins/notifyjs/dist/notify.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/notifications/notify-metro.js') }}"></script>


@if(session()->get('erro'))
    <script>
        window.onload = notify;
        function notify(){$.Notification.notify('error','botton right', 'ATENÇÃO', '{{ session()->get('erro') }}')}
    </script>
@endif

</body>
</html>
