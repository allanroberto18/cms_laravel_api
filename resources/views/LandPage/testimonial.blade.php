@if(count($clientes) > 0)
<div class="blog-area section-light-blog" id="cliente">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title light">
                    <h1 class="text-uppercase">Nossos <span>Clientes</span></h1>
                    <img src="/img/icon/title-bg.png" alt="">
                </div>
            </div>
        </div>
        <div class="clients-area section-light-text" id="cliente">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                        <div class="testimonial-text-slider text-center">
                            @foreach($clientes as $item)
                            <div class="sin-testiText">
                                {{--<div class="client-rating">--}}
                                    {{--<i class="fa fa-star color"></i>--}}
                                    {{--<i class="fa fa-star color"></i>--}}
                                    {{--<i class="fa fa-star color"></i>--}}
                                    {{--<i class="fa fa-star color"></i>--}}
                                    {{--<i class="fa fa-star color"></i>--}}
                                {{--</div>--}}
                                <h2>{{ $item->nome }}</h2>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="testimonial-image-slider text-center">
                                    @foreach($clientes as $item)
                                    <div class="sin-testiImage">
                                        <img src="img/pagina/cliente/{{ $item->imagem }}" alt="{{ $item->nome }}"/>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif