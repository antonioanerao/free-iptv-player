@extends('layouts.netflix.main')

@section('title')
    Player
@endsection

@section('css')
    {{ Html::style('https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css') }}
    {{ Html::script('https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js') }}
    <script type="text/javascript">
        $(document).ready( function () {
            $('#tabelaVitimas').DataTable();
        } );
    </script>

    <!-- video stuff -->
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
@endsection

@section('content')
    <section class="gen-section-padding-3 gen-single-movie mt-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <div class="gen-single-movie-wrapper style-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="gen-video-holder">
                                    <h2 class="gen-title">{{ $video->tvtitle }}</h2>
                                    @if($video->maingroup == 'live')
                                        <video id="video" width="100%" controls></video>
                                        <script>
                                            if(Hls.isSupported())
                                            {
                                                var video = document.getElementById('video');
                                                var hls = new Hls();
                                                hls.loadSource('{{ env('IPTV_URL') .':'.env('IPTV_PORT').'/'.$video->maingroup.'/'.auth()->user()->iptv_login.'/'.auth()->user()->iptv_password.'/'.$video->tvmedia }}');
                                                hls.attachMedia(video);
                                                hls.on(Hls.Events.MANIFEST_PARSED,function()
                                                {
                                                    video.play();
                                                });
                                            }
                                            else if (video.canPlayType('application/vnd.apple.mpegurl'))
                                            {
                                                video.src = '{{ env('IPTV_URL') .':'.env('IPTV_PORT').'/'.$video->maingroup.'/'.auth()->user()->iptv_login.'/'.auth()->user()->iptv_password.'/'.$video->tvmedia }}';
                                                video.addEventListener('canplay',function()
                                                {
                                                    video.play();
                                                });
                                            }
                                        </script>
                                    @else
                                        <iframe src="{{ env('IPTV_URL') .':'.env('IPTV_PORT').'/'.$video->maingroup.'/'.auth()->user()->iptv_login.'/'.auth()->user()->iptv_password.'/'.$video->tvmedia }}" width="100%" height="100%" frameborder="0"></iframe>
                                    @endif

                                </div>

                                <div class="gen-single-movie-info">
                                    @if($video->maingroup == 'live')
                                        @foreach($video->epg as $epg)
                                            @if(date('Y-m-d H:i:s', strtotime($epg->start)) < \Carbon\Carbon::now(env('APP_TIMEZONE')) && date('Y-m-d H:i:s', strtotime($epg->stop)) > \Carbon\Carbon::now(env('APP_TIMEZONE')))
                                                <div class="alert alert-info">
                                                    <h3>Now</h3>
                                                    {!! $epg->title . ' ['.date('H:m Y-m-d', strtotime($epg->start)).'] to ['.date('H:m Y-m-d', strtotime($epg->stop))    . ']<br>' . $epg->desc !!}
                                                </div>
                                            @endif

                                            @if(date('Y-m-d H:i:s', strtotime($epg->start)) > \Carbon\Carbon::now(env('APP_TIMEZONE')))
                                                <div class="alert alert-warning">
                                                    {!! $epg->title . ' ['.date('H:m Y-m-d', strtotime($epg->start)).'] to ['.date('H:m Y-m-d', strtotime($epg->stop))    . ']<br>' . $epg->desc . '<br>' !!}
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
