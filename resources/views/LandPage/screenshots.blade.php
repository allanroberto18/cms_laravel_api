<div class="features-carousel-area section-light-text hidden-sm" id="screenshot">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7 col-sm-9">
                <div class="features-list">
                    <h1>Telas do Sistema</h1>
                    <div class="feature-list-carousel">
                        @for($i = 0; $i < $totalCaracteristicas; $i++)
                            <div class="feature-list-carousel-item">
                                @foreach($caracteristicas[$i] as $item)
                                    <div class="single-features-list">
                                        <div class="feature-list-img">
                                    <span>
                                        <div class="icon-middle">
                                            <span style="color: #c9634c">
                                                <span class="fa {{ $item->icone }} fa-2x"></span>
                                            </span>
                                        </div>
                                    </span>
                                        </div>
                                        <div class="feature-list-text">
                                            <h4>{{ $item->titulo }}</h4>
                                            <p>
                                                {{ $item->descricao }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-3 mb6">
                <div class="feature-app">
                    <img src="/img/pagina/{{ $pagina->imagem  }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>