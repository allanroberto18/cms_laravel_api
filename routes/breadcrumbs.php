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

Breadcrumbs::register('pagina', function($breadcrumbs, $entity)
{
    $breadcrumbs->push('Home', route('admin.dashboard'));
    $breadcrumbs->push($entity->titulo, route('pagina.show', [ 'id' => $entity->id ]));
});

Breadcrumbs::register('downloads', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Downloads', route('downloads'));
});

Breadcrumbs::register('noticias', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Notícias', route('noticia.index'));
});

Breadcrumbs::register('noticia', function($breadcrumbs, $entity)
{
    $breadcrumbs->parent('noticias');
    $breadcrumbs->push($entity->titulo, route('noticia.show', ['id' => $entity->id ]));
});


Breadcrumbs::register('produtos', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Produtos', route('produto.index'));
});

Breadcrumbs::register('produto', function($breadcrumbs, $entity)
{
    $breadcrumbs->parent('produtos');
    $breadcrumbs->push($entity->titulo, route('produto.show', ['id' => $entity->id ]));
});

Breadcrumbs::register('videos', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Videos', route('video.index'));
});

Breadcrumbs::register('video', function($breadcrumbs, $entity)
{
    $breadcrumbs->parent('videos');
    $breadcrumbs->push($entity->titulo, route('video.show', ['slug' => $entity->slug ]));
});