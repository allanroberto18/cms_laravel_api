<div class="slider-area layout-two-slider" id="slider">
    <div class="preview-2">
        <div id="nivoslider" class="slides">
            @foreach($banners as $banner)
                <a href="#"><img src="/img/banner/{{ $banner->imagem_fundo }}" alt="{{ $banner->titulo }}" title="#slider-{{ $loop->index }}-caption"/></a>
            @endforeach
        </div>
        @foreach($banners as $banner)
        <div id="slider-{{$loop->index}}-caption" class="nivo-html-caption nivo-caption">
            <div class="layer-1">
                <img src="/img/banner/{{ $banner->imagem_destaque }}" alt="{{ $banner->titulo }}"/>
            </div>
            <div class="banner-content slider-1">
                <div class="text-content container">
                    {{--<h1 class="title1 hidden-xs"><span>{{ $banner->retranca }}</span></h1>--}}
                    {{--<h2 class="title2"><span>{{ $banner->titulo }}</span></h2>--}}
                    {{--<h3 class="title3 hidden-xs">with AppRobic</h3>--}}
                    {{--<p class="hidden-sm hidden-xs">--}}
                        {{--{{ $banner->resumo }}--}}
                    {{--</p>--}}
                    @if ($banner->link != '#')
                    <div class="banner-button">
                        <a href="{{$banner->link}}">Clique Aqui</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>