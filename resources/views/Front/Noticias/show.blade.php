@extends('Front.Base.internas')
@section('body')
<div class="feature-area section-light-text mt3">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    {!! Breadcrumbs::render('noticia', $entity) !!}
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="feature-text">
                    <p class="p-title">
                        {{ $entity->retranca }}
                    </p>
                    <h2>{{ $entity->titulo }}</h2>

                    <br/>
                    <img src="/img/noticia/{{ $entity->imagem }}" alt="{{ $entity->legenda }} - {{ $entity->credito }}" class="foto">
                    {!!  $entity->texto !!}
                </div>
            </div>
       </div>
    </div>
</div>

<!--Blog Area Start-->
@include('LandPage.news')
<!--End of Blog Area-->

@endsection