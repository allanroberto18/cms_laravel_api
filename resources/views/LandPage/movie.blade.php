@if ($video != null)
    <div class="video-area mt6" id="video">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="video_box">
                        <a class="box_video fancybox.iframe"
                           href="https://www.youtube.com/embed/{{ $video->link }}?autoplay=1">
                            <img id="image" src="http://img.youtube.com/vi/{{ $video->link }}/0.jpg" alt="">
                            <div id="play"></div>
                        </a>
                    </div>
                    <div class="pagina-text">
                        <p class="p-title">
                            {{ $pagina->retranca }}
                        </p>
                        <h2 style="color: #959595">{{ $pagina->titulo }}</h2>
                        {{--<h1>Features</h1>--}}
                        <br>
                        <i>{{ $pagina->resumo }}</i> <br><br>
                        {!! $pagina->texto !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="pagina-list">
                        @foreach($pagina->caracteristicas as $item)
                            @if ($loop->index < 4)
                                <div class="single-feature">
                                    <span class="fa {{ $item->icone }} fa-2x"></span>
                                    {{--<span>--}}
                                    {{--<span class="fa {{ $item->icone }} fa-2x"></span>--}}
                                    {{--</span>--}}
                                    <div class="single-feature-text" >
                                        <h5>{{ $item->titulo }}</h5>
                                        <p>
                                            {{ $item->descricao }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif