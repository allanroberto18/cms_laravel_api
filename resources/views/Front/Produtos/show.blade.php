@extends('Front.Base.internas')
@section('body')
<div class="feature-area section-light-text mt3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                {!! Breadcrumbs::render('produto', $entity) !!}
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="feature-text">
                    <p class="p-title">
                        {{ $entity->retranca }}
                    </p>
                    <h2>{{ $entity->titulo }}</h2>

                    <br/>
                    <img src="/img/pagina/produto/{{ $entity->imagem_pagina }}" alt="{{ $entity->legenda }} - {{ $entity->credito }}" class="foto">

                    {{--@if(count($entity->caracteristicas) > 0)--}}
                        {{--<div class="blog_feature">--}}
                            {{--<div class="feature-list">--}}
                                {{--<h4>Características</h4>--}}
                                {{--@foreach($entity->caracteristicas as $item)--}}
                                    {{--@if($item->status == 1)--}}
                                        {{--<div class="single-feature">--}}
                                            {{--<span class="fa {{ $item->icone }} fa-2x"></span>--}}
                                            {{--<span>--}}
                                            {{--<span class="fa {{ $item->icone }} fa-2x"></span>--}}
                                            {{--</span>--}}
                                            {{--<div class="single-feature-text">--}}
                                                {{--<h5>{{ $item->titulo }}</h5>--}}
                                                {{--<p>--}}
                                                    {{--{{ $item->descricao }}--}}
                                                {{--</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--@endif--}}
                    {!!  $entity->texto !!}
                </div>
            </div>
       </div>
    </div>
</div>

<!--Blog Area Start-->
@include('LandPage.produtos')
<!--End of Blog Area-->

@endsection