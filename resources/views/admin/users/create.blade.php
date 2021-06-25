@extends('layouts.painel.main')

@section('title')
    New Account
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Create new user</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ env('APP_NAME') . ' ' . env('APP_VERSION') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active">Create</li>
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
                       <div class="card">
                           <div class="card-body">
                               <h4 class="m-t-0 header-title">Create new user</h4>
                               <div>
                                   @if(session()->has('message'))
                                       <div class="alert alert-success">{{ session('message') }}</div>
                                   @endif
                               </div>
                               <form method="POST" action="{{ route('admin.users.store') }}">
                                   @csrf

                                   <div class="form-group row">
                                       <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                       <div class="col-md-6">
                                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                           @error('name')
                                           <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                           @enderror
                                       </div>
                                   </div>

                                   <div class="form-group row">
                                       <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                       <div class="col-md-6">
                                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                           @error('email')
                                           <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                           @enderror
                                       </div>
                                   </div>

                                   <div class="form-group row">
                                       <label for="iptv_login" class="col-md-4 col-form-label text-md-right">IPTV Login</label>

                                       <div class="col-md-6">
                                           <input id="iptv_login" type="text" class="form-control @error('iptv_login') is-invalid @enderror" name="iptv_login" value="{{ old('iptv_login') }}" required autocomplete="iptv_login">

                                           @error('iptv_login')
                                           <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                           @enderror
                                       </div>
                                   </div>

                                   <div class="form-group row">
                                       <label for="iptv_password" class="col-md-4 col-form-label text-md-right">IPTV Password</label>

                                       <div class="col-md-6">
                                           <input id="iptv_password" type="text" class="form-control @error('iptv_password') is-invalid @enderror" name="iptv_password" value="{{ old('iptv_password') }}" required autocomplete="iptv_password">

                                           @error('iptv_password')
                                           <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                           @enderror
                                       </div>
                                   </div>

                                       <div class="form-group row">
                                           <label for="password" class="col-md-4 col-form-label text-md-right">Account Password</label>

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
                                           <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Account Password</label>

                                           <div class="col-md-6">
                                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                           </div>
                                       </div>

                                   <div class="form-group row mb-0">
                                       <div class="col-md-6 offset-md-4">
                                           <button type="submit" class="btn btn-primary">
                                               {{ __('Register') }}
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
@endsection
