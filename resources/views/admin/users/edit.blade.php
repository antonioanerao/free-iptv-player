@extends('layouts.painel.main')

@section('title')
    {{ $user->name }}'s account
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ $user->name }}</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ env('APP_NAME') . ' ' . env('APP_VERSION') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active">Edit {{ $user->name }}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-6">
                        <h4 class="m-t-0 header-title">Edit Account</h4>

                        <div>
                            @if(session()->has('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div style="margin-top:15px;margin-bottom:18px;border:2px solid #f1f1f1;border-radius:2px;padding:25px;">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist" style="visibility: visible;">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Update User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu1" role="tab">Update Password</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="home" class="container tab-pane active">
                                    <form method="post" action="{{ route('admin.users.update', $user->id) }}">
                                        @csrf @method('patch')

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                {!! Form::text('name', (!empty($user->name)) ? $user->name : null, ['class'=>'form-control', 'requirded', 'placeholder'=>'']) !!}
                                                @error('name')
                                                <span style="color: red; ">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                {!! Form::text('email', (!empty($user->email)) ? $user->email : null, ['class'=>'form-control', 'required', 'placeholder'=>'']) !!}
                                                @error('email')
                                                <span style="color: red; ">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="iptv_login" class="col-md-4 col-form-label text-md-right">IPTV Login</label>

                                            <div class="col-md-6">
                                                {!! Form::text('iptv_login', (!empty($user->iptv_login)) ? $user->iptv_login : null, ['class'=>'form-control', 'required', 'placeholder'=>'']) !!}
                                                @error('iptv_login')
                                                <span style="color: red; ">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="iptv_password" class="col-md-4 col-form-label text-md-right">IPTV Password</label>

                                            <div class="col-md-6">
                                                {!! Form::text('iptv_password', (!empty($user->iptv_password)) ? $user->iptv_password : null, ['class'=>'form-control', 'required', 'placeholder'=>'']) !!}

                                                @error('iptv_password')
                                                <span style="color: red; ">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Update Account
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div id="menu1" class="container tab-pane fade">
                                    <form method="post" action="{{ route('admin.users.updatePassword', $user->id) }}">
                                        @csrf @method('patch')

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm New Password</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Update Password
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
