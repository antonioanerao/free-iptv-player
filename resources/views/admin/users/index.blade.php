@extends('layouts.painel.main')

@section('css')
    {{ Html::style('https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css') }}
    {{ Html::script('https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js') }}
    <script type="text/javascript">
        $(document).ready( function () {
            $('#tabelaVitimas').DataTable();
        } );
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Users</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ env('APP_NAME') . ' ' . env('APP_VERSION') }}</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Users list</h4>
                <p class="text-muted m-b-30 font-14"></p>

                <table id="tabelaVitimas" class="table align-center display"  role="grid">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>IPTV Login</th>
                        <th>IPTV Password</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                       @foreach($users as $user)
                           <tr>
                               <td>{{ $user->id }}</td>
                               <td>{{ $user->name }}</td>
                               <td>{{ $user->email }}</td>
                               <td>{{ $user->iptv_login }}</td>
                               <td>{{ $user->iptv_password }}</td>
                               <td><a href="{{ route('admin.users.edit', $user->id) }}">[Edit]</a></td>
                           </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Jquery DataTable Plugin Js -->

    <!-- Custom Js -->
    <script src="{{ url('assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ url('assets/plugins/tables/jquery-datatable.js') }}"></script>
@endsection
