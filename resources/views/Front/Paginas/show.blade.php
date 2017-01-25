@extends('Front.Base.internas')
@section('body')
    <div class="feature-area section-light-text mt3">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {!! Breadcrumbs::render('pagina', $pagina) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="feature-text">
                        <p class="p-title">
                            {{ $pagina->retranca }}
                        </p>
                        <h2>{{ $pagina->titulo }}</h2>

                        <br/>
                        <img src="/img/pagina/{{ $pagina->imagem }}" alt="{{ $pagina->legenda }} - {{ $pagina->credito }}" class="foto">
                        {!!  $pagina->texto !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('LandPage.produtos')

    @include('LandPage.testimonial')

    <!--Blog Area Start-->
    @include('LandPage.news')
    <!--End of Blog Area-->



@endsection