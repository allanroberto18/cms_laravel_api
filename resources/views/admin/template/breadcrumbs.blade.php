<!-- breadcrumb -->
<div ng-controller="SobreNosController">
    <section class="content-header">
        <h1>
            {{ $titulo }}
            <small>{{ $subtitulo }}</small>
        </h1>
        @yield('breadcrumbs')
    </section>
</div>
