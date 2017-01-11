@extends('Front.Base.internas')
@section('body')
    @if(count($downloads) > 0)
        <div class="blog-area1 section-light-blog mb6" id="blog" style="margin-top: 120px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title light">
                            <h1 class="text-uppercase">Arquivos <span>para Download</span></h1>
                            <img src="/img/icon/title-bg.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {!! Breadcrumbs::render('downloads') !!}
                    </div>
                </div>
                @foreach($downloads as $item)
                    <div class="row">
                        <div class="news">
                            <div class="col-md-8 mt mb">
                                <h4>
                                    {{ $item->titulo }}
                                </h4>
                                <p>{{ $item->resumo }}</p>
                            </div>
                            <div class="col-md-4 mt mb">
                                <a href="{{ $item->link }}" class="btn btn-default btn-flat">
                                    <i class="fa fa-download"></i> Baixar Arquivo
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mb6 page">
                    {!! $downloads->links() !!}
                </div>
            </div>
        </div>
    @endif
@endsection