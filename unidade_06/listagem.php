<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
        
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>
        <button id="botao">Carregar JSON</button>
        <div id="listagem"></div>
        <script src="jquery.js"></script>
        <script>
            //evento de clique do botao
            $('button#botao').click(function() {
                //Seleciona div que vai conter os dados, atribui css display
                $('div#listagem').css('display','block');
                //chama função para carregar os dados que serão exibido na tela
                carregarDados();
            }); 
            
            //Função para gerar carregar os dados do json
            function carregarDados() {
                //pega o json, primeiro passa o caminho expecifico, depois passa a função com o parametro que contémm os dados
                $.getJSON('gerar_json.php', function(data) {
                    var elemento;

                    //Cria listagem de dados
                    elemento = "<ul>";
                    //Função que coleta e percorre os dados do array
                    $.each(data, function(i, valor) {
                        //cria elemnto lista passando os dados de nome do produto
                        elemento += "<li class='nome'>" + valor.nomeproduto + "</li>";
                        //cria elemnto lista passando os dados de preco  
                        elemento += "<li class='preco'>" + valor.precounitario + "</li>";
                        //cria elemento lista passando o caminho da imagem para a tag img src
                        elemento += "<li class='imagem'><img src=" + valor.imagempequena + "></li>";
                    });
                    elemento += "</ul>";
                    
                    //carrega na div listagem e renderiza o html da variavel elemento
                    $('div#listagem').html(elemento);
                });
            }
        </script>
    </body>
</html>