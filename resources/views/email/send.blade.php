<html>
<head></head>
<body>
<a href="http://siedsistemas.com.br">
    <img src="http://www.siedsistemas.com.br/img/config/6300.png" alt="">
</a>

<h3>Assunto: {{$title}}</h3>
<p>
    {{ $content->mensagem }}
</p>

@if($content->status == 2)
    <hr>
    <h3>Resposta</h3>
    <p>
        {{ $content->resposta }}
    </p>
    <p>
        {{ $content->nome }} <br>
        {{ $content->email }} <br>
        {{ $content->telefone }}
    </p>
@endif

<p>
    <br>
    Atencionsamente,

    <br><br><br>

    <strong>Sied Sistemas</strong>
</p>
</body>
</html>