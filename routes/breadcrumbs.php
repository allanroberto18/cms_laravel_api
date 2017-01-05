<?php

Breadcrumbs::register('admin_home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('admin.dashboard'));
});

Breadcrumbs::register('admin_sobre_nos', function($breadcrumbs)
{
    $breadcrumbs->parent('admin_home');
    $breadcrumbs->push('Sobre Nós', route('admin.sobre_nos.index'));
});

Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('noticias', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Notícias', route('noticia.index'));
});

Breadcrumbs::register('noticia', function($breadcrumbs, $entity)
{
    $breadcrumbs->parent('noticias');
    $breadcrumbs->push($entity->titulo, route('noticia.show', ['slug' => $entity->slug ]));
});


Breadcrumbs::register('produtos', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Produtos', route('produto.index'));
});

Breadcrumbs::register('produto', function($breadcrumbs, $entity)
{
    $breadcrumbs->parent('produtos');
    $breadcrumbs->push($entity->titulo, route('produto.show', ['slug' => $entity->slug ]));
});