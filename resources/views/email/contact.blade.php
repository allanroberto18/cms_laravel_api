<html>
<head></head>
<body>
<a href="http://siedsistemas.com.br">
    <img src="http://www.siedsistemas.com.br/img/config/6300.png" alt="">
</a>

<h1>Contato através do fale conosco</h1>
<p>
    {{ $content->mensagem }}
</p>
<p>
    <br>
    Atencionsamente,
    <br><br><br>
    {{ $content->nome }} <br>
    {{ $content->email }} <br>
    {{ $content->telefone }}
</p>
</body>
</html>