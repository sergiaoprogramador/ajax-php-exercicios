<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
        <link rel="stylesheet" href="_css/estilo.css">
    </head>

    <body>
        <button id="botao">Carregar Dados do XML</button>
        <div id="listagem"></div>
        <div id="conteudo"></div>
        
        <script src="jquery.js"></script>
        <script>

            $('button#botao').click( function() {
                $('div#listagem').css('display', 'block');
                 carregarDados();
            });

            function carregarDados() {

                $.ajax({
                    url:'_xml/produtos.xml'
                }).then(sucesso, falha);

                // recebe um arquivo da requisição ajax
                function sucesso(arquivo) {
                    // faz uma busca dentro do arquivo procurando elemnto produto e dentro de produto procura o nome po produto, faz listagem desses nome
                    // console.log($(arquivo).find('produto').find('nomeproduto').text());
                    var elemento = "<ul>";
                    
                        $(arquivo).find('produto').each(function() {

                            var nome = $(this).find('nomeproduto').text();
                            var preco = $(this).find('precounitario').text();
                            
                            //Atribui a variavel elemento conteudo da lista
                            elemento += "<li class='nome'>" + nome + "</li>";
                            elemento += "<li class='preco'>" + preco + "</li>";

                        });

                    elemento += "</ul>";

                    //Função correpondente a var_dump(), para fins de debug
                    console.log(elemento);
                        
                    //Exibe listagem de conteudo do xml
                    $('#listagem').html(elemento);
                    
                    //Outra maneira de exibir listagem do conteudo do xml
                    document.getElementById("conteudo").innerHTML = elemento;
                }

                function falha() {

                }
            }
        </script>
    </body>
</html>