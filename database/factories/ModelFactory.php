<?php

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});



$factory->define(App\Models\SobreNos::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->word,
        'descricao' => $faker->title,
        'icone' => 'fa-plus',
    ];
});


$factory->define(App\Models\Pagina::class, function (Faker\Generator $faker) {
    $titulo = $faker->sentence;
    return [
        'retranca' => $faker->word,
        'titulo' => $titulo,
        'slug' => str_slug($titulo),
        'resumo' => $faker->sentence,
        'texto' => $faker->text,
        'credito' => 'Divulgação',
        'imagem' => '2.png',
        'legenda' => $faker->sentence,
    ];
});

$factory->define(App\Models\Noticia::class, function (Faker\Generator $faker) {
    $titulo = $faker->sentence;
    return [
        'retranca' => $faker->word,
        'titulo' => $titulo,
        'slug' => str_slug($titulo),
        'resumo' => $faker->sentence,
        'texto' => $faker->text,
        'credito' => 'Divulgação',
        'imagem' => '1759.png',
        'legenda' => $faker->sentence,
    ];
});

$factory->define(App\Models\PaginaCaracteristica::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->word,
        'descricao' => $faker->title,
        'icone' => 'fa-plus',
    ];
});

$factory->define(App\Models\Banner::class, function (Faker\Generator $faker) {
    return [
        'retranca' => $faker->word,
        'titulo' => $faker->word,
        'resumo' => $faker->sentence,
        'link' => '#',
        'imagem_destaque' => '8282.png',
        'imagem_fundo' => '8116.png',
    ];
});

$factory->define(\App\Models\PaginaVideo::class, function (Faker\Generator $faker) {
    return [
        'link' => 'BHWAxAbgyc4',
        'largura' => 1280,
        'altura' => 720,
    ];
});

$factory->define(\App\Models\PaginaProduto::class, function (Faker\Generator $faker) {
    $titulo = $faker->sentence;

    return [
        'retranca' => $faker->word,
        'titulo' => $titulo,
        'slug' => str_slug($titulo),
        'resumo' => $faker->paragraph,
        'texto' => $faker->text,
        'credito' => 'Divulgação',
        'legenda' => $faker->sentence,
        'imagem_capa' => '3007.png',
        'imagem_pagina' => '1832.png',
        'destaque'  => 0,
    ];
});

$factory->define(App\Models\Config::class, function (Faker\Generator $faker) {
    return [
        'nome' => 'Sied Sistemas',
        'email' => 'odair@siedsistemas.com.br',
        'telefone' => '(63)3214-3108',
        'cep' => '77023044',
        'logradouro' => '804 Sul Alameda 14',
        'complemento' => 'Lote 71',
        'numero' => 'S/N',
        'bairro' => 'Plano Diretor Sul',
        'localidade' => 'Palmas',
        'uf' => 'TO',
        'logo' => 'LogoWeb.png',
        'status' => 1,
    ];
});

$factory->define(\App\Models\Menu::class, function(Faker\Generator $faker){
    return [
        'parent_id' => 0,
        'tipo' => 1,
        'nome' => $faker->word,
        'link' => '#',
        'posicao' => 0,
        'status' => 1
    ];
});

$factory->define(\App\Models\PaginaCliente::class, function(Faker\Generator $faker){
    return [
        'nome' => $faker->word,
        'imagem' => 'logo.png',
    ];
});

$factory->define(App\Models\FaleConoscoAssunto::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->word,
        'email' => $faker->email,
    ];
});

$factory->define(App\Models\FaleConosco::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->word,
        'telefone' => $faker->phoneNumber,
        'email' => $faker->email,
        'mensagem' => $faker->sentence,
        'status' => random_int(1, 2)
    ];
});

