@extends('Front.Base.internas')
@section('body')
    <div class="blog-area1 section-light-blog mb6" id="blog" style="margin-top: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title light">
                        <h1 class="text-uppercase">Todos os <span>Vídeos</span></h1>
                        <img src="/img/icon/title-bg.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    {!! Breadcrumbs::render('videos') !!}
                </div>
            </div>
            @if(count($videos) > 0)
                @foreach($videos as $item)
                    <div class="row ">
                        <div class="news">
                            <div class="col-md-4 mt mb">
                                <img src="https://img.youtube.com/vi/{{ $item->link }}/0.jpg" class="img-responsive"
                                     alt="{{ $item->titulo }}">
                            </div>
                            <div class="col-md-8 mt mb">
                                <h1>
                                    {{ $item->titulo }}
                                </h1>
                                <p>{{ $item->resumo }}</p>
                                <a href="{{ route('video.show', [ 'slug' => $item->slug ]) }}"
                                   class="button mt">
                                    Assista Agora <i class="fa fa-caret-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="mb6 page">
                    {!! $videos->links() !!}
                </div>
            @else
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Atenção</strong> Não há postagens para essa seção até o momento. <a
                            href="javascript:window.history.go(-1)"><i class="fa fa-arrow-left"></i> Voltar</a>
                </div>
            @endif
        </div>
    </div>
@endsection