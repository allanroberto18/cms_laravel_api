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