@extends('layouts.videostream.main')

@section('title')
    Player
@endsection

@section('css')
    {{ Html::style('https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css') }}
    {{ Html::script('https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js') }}
@endsection

@section('content')
    <section class="gen-section-padding-3 gen-single-movie mt-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <div class="gen-single-movie-wrapper style-1">
                        <div class="row">
                            <div class="col-md-8 offset-md-2 col-lg-12 offset-lg-0">
                                <div class="gen-video-holder">
                                    <h2 class="gen-title">{{ $video->tvtitle }}</h2>

                                    <div id="livevideo" class="mt-4 mb-2">
                                        <div data-player="" tabindex="" class="" ></div>
                                    </div>

                                </div>

                                <div class="gen-single-movie-info">
                                    @if($video->maingroup == 'live')
                                        @foreach($video->epg as $epg)
                                            @if(date('Y-m-d H:i', strtotime($epg->start)) < \Carbon\Carbon::now(env('APP_TIMEZONE')) && date('Y-m-d H:i', strtotime($epg->stop)) > \Carbon\Carbon::now(env('APP_TIMEZONE')))
                                                <div class="alert alert-info">
                                                    <h3>Now</h3>
                                                    {!! $epg->title . ' ['.date('H:s', strtotime($epg->start)).'] to ['.date('H:i', strtotime($epg->stop)) . ']<br>' . $epg->desc !!}
                                                </div>
                                            @endif

                                            @if(date('Y-m-d H:i:s', strtotime($epg->start)) > \Carbon\Carbon::now(env('APP_TIMEZONE')))
                                                <div class="alert alert-warning">
                                                    {!! $epg->title . ' ['.date('H:i', strtotime($epg->start)).'] to ['.date('H:i', strtotime($epg->stop))    . ']<br>' . $epg->desc . '<br>' !!}
                                                </div>
                                            @endif
                                        @endforeach
                                    @elseif($video->maingroup == 'movie')
                                        @if($desc)
                                            <div class="alert alert-info">
                                                {{ $desc }}
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single movie End -->
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/clappr.chromecast-plugin/latest/clappr-chromecast-plugin.min.js"></script>

    <script>
        $(".nav .dropdown").hover(function() {
            $(this).find(".dropdown-toggle").dropdown("toggle");
        });
        $(document).ready(function(){
            $("#busca").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#resultados *").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <style>
        [data-player] {
            position: relative;
            width: 100%;
            height: auto;
            margin: 0;
        }
        [data-player] .container[data-container] {
            width: 100%;
            height: auto;
            position: relative;
        }
        [data-player] .media-control[data-media-control] {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }
        [data-player] video {
            position: relative;
            display: block;
            width: 100%;
            height: auto;
        }
    </style>
    <script>
        var playerobj = new Clappr.Player(
            {
                source: "{{ env('IPTV_URL') .':'.env('IPTV_PORT').'/'.$video->maingroup.'/'.session('login').'/'.session('password').'/'.$video->tvmedia }}",                parentId: "#livevideo",
                autoPlay: true,
                height: 'auto',
                width: '100%',
                poster: "{{ $video->tvlogo }}",
                //watermark: "assets/blue/img/main-logo.png",
                //watermarkLink: "#",
                //position: 'bottom-right'
            }
        );
    </script>

    <script>
        var video_player = document.querySelector('#livevideo');
        var button = document.getElementById("fullscreen");
        button.addEventListener('click', function () {
            if(video_player.requestFullScreen){
                video_player.requestFullScreen();
            } else if(video_player.webkitRequestFullScreen){
                video_player.webkitRequestFullScreen();
            } else if(video_player.mozRequestFullScreen){
                video_player.mozRequestFullScreen();
            }
        });
    </script>

@endsection
