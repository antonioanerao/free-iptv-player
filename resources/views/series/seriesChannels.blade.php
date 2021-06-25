@extends('layouts.videostream.main')

@section('title')
    Movies
@endsection

@section('content')
    <!--  ************************* Page Title Starts Here ************************** -->
    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>{{ request('tvgroup') }}</h2>
                <ul>
                    <li> <a href="{{ route('index') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li> <a href="{{ route('movies.groups') }}"><i class="fas fa-home"></i> Movies Groups</a></li>
                    <li><i class="fas fa-angle-double-right"></i> {{ request('tvgroup') }}</li>
                </ul>
            </div>
        </div>
    </div>

    <!--####################### Trending Starts Here ###################-->
    <div class="treanding-video container-fluid">
        <div class="container">
            <div class="row video-title no-margin">
                <h6><i class="fas fa-book"></i> {{ $series->total() }} Episodes found</h6>
            </div>
            <div class="video-row row">
                @foreach($series as $serie)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="video-card">
                            <a href="{{ route('player2', $serie->id) }}">
                                <img src="{{ $serie->tvlogo }}" onerror="this.src='https://www.leilomaster.com.br/sem-imagem.png'" >
                            </a>
                            <div class="row details no-margin">
                                <h6><a href="{{ route('player2', $serie->id) }}">{{ $serie->tvtitle }}</a></h6>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-md-12">
                    {{ $series->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection
