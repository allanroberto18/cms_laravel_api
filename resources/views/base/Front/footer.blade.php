<!--Footer Area Start-->
<script src="{{ asset('js/front/app.js') }}"></script>
<footer class="section-dark-two">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-title">
                    <h1>Fale <span>Conosco</span></h1>
                    <p>Envie sua pergunta, solicite um orçamento</p>
                </div>
                <div class="contact-address">
                    <ul>
                        <li>
                            <span class="icon-img"><img src="/img/icon/phone.png" alt=""></span>
                            <span class="information">{{ $config->telefone }}</span>
                        </li>
                        <li>
                            <span class="icon-img"><img src="/img/icon/envelope.png" alt=""></span>
                            <span class="information">{{ $config->email }}</span>
                        </li>
                        <li>
                            <span class="icon-img"><img src="/img/icon/map.png" alt=""></span>
                            <span class="information">
                                {{ $config->logradouro }} - {{ $config->complemento }}
                                @if ($config->numero)
                                    - {{ $config->numero }}
                                @endif
                                - {{ $config->cep }} <br>
                                {{ $config->localidade }} - {{ $config->uf }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6" ng-app="app" ng-controller="FaleConoscoController" ng-init="init()">
                <div class="row">
                    <div class="form-group col-md-12">
                        <div ng-show="showErrors">
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <strong>Atenção!</strong> Corrija as informações abaixo.
                                <ul ng-repeat="item in erros">
                                    <li>@{{ item[0] }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form name="form" novalidate ng-submit="salvar(entity)" id="contact-form">
                        <div class="form-top">
                            <div class="form-group col-md-12">
                                <select name="fale_conosco_assunto_id" class="form-control" ng-options="item.id as item.titulo for item in assuntos" ng-model="entity.fale_conosco_assunto_id" required >
                                    <option value="">Selecionar Assunto</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <input name="nome" type="text" class="form-control" placeholder="Insira o seu Nome"
                                       ng-model="entity.nome"
                                       required
                                >
                            </div>
                            <div class="form-group col-md-12">
                                <input name="telefone" type="text" class="form-control"
                                       placeholder="Insira o seu Telefone"
                                       ng-model="entity.telefone"
                                       required
                                >
                            </div>
                            <div class="form-group col-md-12">
                                <input name="email" type="email" class="form-control" placeholder="Insira o seu E-mail"
                                       ng-model="entity.email"
                                       required
                                >
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="mensagem" class="yourmessage form-control"
                                          placeholder="Insira a sua Mensagem" ng-model="entity.mensagem"
                                          required
                                >
                                </textarea>
                            </div>
                        </div>
                        <div class="submit-form form-group col-sm-4">
                            <button class="button" ng-disabled="isDisabled" type="submit"><i
                                        class="fa fa-envelope-o"></i>
                                <span>Enviar</span>
                            </button>
                        </div>
                        <div class="submit-form form-group col-sm-4">
                            <div ng-show="loading">
                                <div style="margin-top: 5px">
                                    <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt2">
                <div class="footer-area text-center">
                    {{--<div class="footer-logo">--}}
                    {{--<a href="/"><img src="/img/config/{{ $config->logo }}" alt=""></a>--}}
                    {{--</div>--}}
                    {{--<div class="social-link">--}}
                        {{--<a href="#"><i class="fa fa-facebook"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-twitter"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-linkedin"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-instagram"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-dribbble"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-instagram"></i></a>--}}
                    {{--</div>--}}
                    <br>
                    <span>Copyright © 2016 Sied Sistemas. Todos os Direitos Reservados</span>
                </div>
            </div>
        </div>
    </div>
</footer>