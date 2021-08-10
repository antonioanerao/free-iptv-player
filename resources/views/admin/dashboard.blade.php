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
                <h4 class="page-title">Dashboard</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ env('APP_NAME') . ' ' . env('APP_VERSION') }}</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="clearfix"></div>
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
