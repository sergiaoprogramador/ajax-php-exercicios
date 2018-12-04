<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
        <link rel="stylesheet" href="_css/estilo.css">
    </head>

    <body>

        <button id="botao">Carregar JSON</button>

        <div id="listagem"></div>

        <script src="jquery.js"></script>

        <script>

            $('button#botao').click(function() {
                $('div#listagem').css('display', 'block');
                carregarDados();
            });

            function carregarDados() {
                $.getJSON('_json/produtos.json', function(dados) {

                    //mostra dados do json no console log
                    // console.log(dados);
                    
                    var elemento;

                    elemento = "<ul>";
                    // Função parecida com foreach do php, para listar todos os valores do array json
                    $.each(dados, function(i, valor) {
                        elemento += "<li class='nome'>" + valor.nomeproduto + "</li>";
                        elemento += "<li class='preco'>" + valor.precounitario + "</li>";
                    });
                    elemento += "</ul>"

                    $('div#listagem').html(elemento);
                });
            }

        </script>
    </body>
</html>