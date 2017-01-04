@if(count($sobreNos) > 0)
    <div class="service-area" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title light">
                        <h1>Sobre o <span>Sied Food</span></h1>
                        <p>Algumas características do nosso sistema de automação para bares e restaurantes</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @foreach($sobreNos as $item)
                        <div class="single-service text-center light">
                            <div class="service-border">
                                <div class="service-icon">
                                    <div class="icon-middle">
                                        <i class="fa {{ $item->icone }} fa-2x fa-home"></i>
                                    </div>
                                </div>
                                <div class="service-text">
                                    <h4>{{ $item->titulo }}</h4>
                                    <p>
                                        {{ $item->descricao }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif