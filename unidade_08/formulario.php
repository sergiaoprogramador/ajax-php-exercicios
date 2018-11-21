<?php
    // Criar objeto de conexao
    $conecta = mysqli_connect("localhost","root","admin","andes");
    if ( mysqli_connect_errno()  ) {
        die("Conexao falhou: " . mysqli_connect_errno());
    }

    // selecao de estados
    $select = "SELECT estadoID, nome ";
    $select .= "FROM estados ";
    $lista_estados = mysqli_query($conecta, $select);
    if(!$lista_estados) {
        die("Erro no banco");
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title> 
        
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>
        <main>  
            <div id="janela_formulario">
                
                <form id="formulario_transportadora">
                    <label for="nometransportadora">Nome da Transportadora</label>
                    <input type="text" name="nometransportadora" id="nometransportadora">

                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco">

                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade">

                    <select name="estados">
                        <?php
                            while($linha = mysqli_fetch_assoc($lista_estados)) {
                        ?>
                            <option value="<?php echo $linha["estadoID"];  ?>">
                                <?php echo utf8_encode($linha["nome"]);  ?>
                            </option>
                        <?php
                            }
                        ?>                        
                    </select>
                    
                    <input type="submit" value="Confirmar inclusão">  
                    
                    <div id="mensagem">
                        <p></p>
                    </div>
                </form> 
                
            </div>
        </main>
        
        <script src="jquery.js"></script>
        <script>
            //identifica quando o botão submit foi clicado no form
            $('#formulario_transportadora').submit(function(e) {
                //desativar a action do formulario
                e.preventDefault();
                
                //atribui a variavel formulario os dados submetidos nele
                var formulario = $(this);
                var retorno = inserirFormulario(formulario);
            });

            function inserirFormulario(dados) {
                //função de requisição ajax
                $.ajax({
                    //metodo
                    type: "POST",
                    //dados
                    data: dados.serialize(),
                    //url
                    url:"inserir_transportador.php",
                    //função é assincrona?
                    async: false
                }).then(sucesso).catch(falha);

                function sucesso(response) {
                    //resposta caso sucesso
                    // console.log(response);

                    //atribui a variavel sucesso o valor de reponse[sucesso]
                    $sucesso = $.parseJSON(response)["sucesso"];
                    $mensagem = $.parseJSON(response)["mensagem"];
                    
                    //faz aparecer o elemento, muda o atributo display none para block
                    $('#mensagem').show();

                    if($sucesso) {
                        //renderiza o html do id mensagem com o valor de response[mensagem]
                        $('#mensagem p').html($mensagem);
                    } else {
                        //renderiza o html do id mensagem com o valor de response[mensagem]
                        $('#mensagem p').html($mensagem); 
                    }
                }

                function falha() {
                    console.error("erro");
                }
            };

        </script>
    </body>
</html>