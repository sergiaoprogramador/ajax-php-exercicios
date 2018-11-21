<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
    </head>

    <body>

        <div id="nome"></div>
        <div id="mensagem"></div>

        <script src="jquery.js"></script>
        <script>

            $.ajax({
                url:'nome.php'
                //função sucesso e falha

                //função do sucesso
            }).done(function(valor) {
                $('#nome').html(valor);

                //função da flaha
            }).fail(function(){
                $('#nome').html("Falha no carregamanento!");

                //always faz uma chamada idependente se deu sucesso ou falha
            }).always(function() {
                $('#mensagem').html("Mensagem de qualquer coisa");
            })

        </script>
    </body>
</html>