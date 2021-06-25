@extends('layouts.netflix.main')

@section('title')
    {{ request('tvgroup') }}
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpeg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                                {{ request('s') }}
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">
                                        <i class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('movies.groups') }}">Movies Groups</a></li>
                                <li class="breadcrumb-item active">{{ request('tvgroup') }}</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- Section-1 Start -->
    <section class="gen-section-padding-3 mt-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gen-style-1">
                        <div class="row">
                            @foreach($searchSeries as $serie)
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="" onerror="this.src='https://www.leilomaster.com.br/sem-imagem.png'" style="height: 500px; width: 400px; background-color: #fdeccc">
                                                <div class="gen-movie-action">
                                                    <a href="{{ route('series.groups.list', $serie->tvgroup) }}" class="gen-button">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="{{ route('series.groups.list', $serie->tvgroup) }}">{{ $serie->tvgroup }}</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @foreach($searchMovies as $movie)
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="{{ $movie->tvlogo }}" onerror="this.src='https://www.leilomaster.com.br/sem-imagem.png'" style="height: 500px; width: 400px; background-color: #fdeccc">
                                                <div class="gen-movie-action">
                                                    <a href="{{ route('player2', $movie->id) }}" class="gen-button">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="{{ route('player2', $movie->id) }}">{{ $movie->tvtitle }}</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @foreach($searchLiveTv as $live)
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                    <div class="gen-movie-contain">
                                        <div class="gen-movie-img">
                                            <img src="{{ $live->tvlogo }}" onerror="this.src='https://www.leilomaster.com.br/sem-imagem.png'" style="height: 500px; width: 400px; background-color: #fdeccc">
                                            <div class="gen-movie-action">
                                                <a href="{{ route('player2', $live->id) }}" class="gen-button">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="gen-info-contain">
                                            <div class="gen-movie-info">
                                                <h3><a href="{{ route('player2', $live->id) }}">{{ $live->tvtitle }}</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="gen-pagination">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section-1 End -->

@endsection
