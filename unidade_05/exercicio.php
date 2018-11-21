<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
    </head>

    <body>
        <div id="listagem"></div>

        <script src="jquery.js"></script>

        <script>

            $.getJSON('_json/produtos.json', function(dados) {

                //mostra dados do json no console log
                // console.log(dados);
                
                // Função parecida com foreach do php, para listar todos os valores do array json
                $.each(dados, function(i, valor) {
                    console.log(valor.nomeproduto);
                });
            });

        </script>
    </body>
</html>