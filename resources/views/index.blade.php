@extends('layouts.videostream.main')

@section('title')
    {{ env('APP_NAME') }}
@endsection

@section('title')
    Filmes e Series
@endsection

@section('css')
   <style>
       .center-cropped {
           width: 100%;
           height: 162px;
           background-position: center center;
           background-repeat: no-repeat;
       }</style>
@endsection

@section('content')
    <!--####################### Slider Starts Here ###################-->
    <div class="banner-card container-fluid">
        <div class="container">
            <div class="row no-margin">
                <div class="col-md-9 banner-slid">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach($slides as $slide)
                                <div class="carousel-item @if($slide->id == env('IPTV_SLIDE_01')) active @endif">
                                    <a href="{{ route('player2', $slide->id) }}">
                                        <img src="{{ $slide->tvlogo }}" class="d-block w-100"  style="max-height: 340px">
                                        <div class="detail-card">
                                            <p>{{ $slide->tvtitle }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a
                            class="carousel-control-prev"
                            href="#carouselExampleIndicators"
                            role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a
                            class="carousel-control-next"
                            href="#carouselExampleIndicators"
                            role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
                <div class="col-md-3 vgbh">
                    <div class="row">
                        @foreach($slideSide as $side)
                            <div class="video-card col-md-12 col-sm-6">
                                <a href="{{ route('player2', $side->id) }}">
                                    <img class="center-cropped" src="{{ $side->tvlogo }}" alt="">
                                    <div class="detail-card">
                                        <p>{{ $side->tvtitle }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--####################### Top channels Starts Here ###################-->
    <div class="treanding-video container-fluid">
        <div class="container">
            <div class="row video-title no-margin">
                <h6>
                    <i class="fas fa-book"></i>
                    Top Channels
                </h6>
            </div>
            <div class="video-row row">
                @foreach($channels as $channel)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="video-card">
                            <a href="{{ route('player2', $channel->id) }}">
                                <img src="{{ $channel->tvlogo }}" style="height: 180px; width: 100%; background-color: #cccccc" alt="">

                                <div class="row details no-margin">
                                    <h6>{{ $channel->tvtitle }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--####################### Top Movies Starts Here ###################-->
    <div class="latest-video latest-video container-fluid">
        <div class="container">
            <div class="row no-margin video-title">
                <h6>
                    <i class="fas fa-book"></i>
                    Top Movies
                </h6>
            </div>
            <div class="video-row row">
                @foreach($movies as $movie)
                <div class="col-lg-3 col-md-4 col-sm-6 ">
                    <a href="{{ route('player2', $movie->id) }}">
                        <div class="video-card">
                            <img src="{{ $movie->tvlogo }}" alt="">

                            <div class="row details no-margin">
                                <h6>{{ $movie->tvtitle }}</h6>
                            </div>

                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!--####################### Top Series Starts Here ###################-->
    <div class="video-blog container-fluid">
        <div class="container">
            <div class="row no-margin video-title">
                <h6>
                    <i class="fas fa-book"></i>
                    Top Series
                </h6>
            </div>
            <div class="video-row row">
                @foreach($series as $serie)
                    <div class="col-lg-3 col-md-4 col-sm-6 ">
                        <a href="{{ route('series.groups.list', $serie->tvgroup) }}">
                            <div class="video-card">
                                <img src="{{ $serie->tvlogo }}" alt="">

                                <div class="row details no-margin">
                                    <h6>{{ $serie->tvgroup }}</h6>
                                </div>

                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
