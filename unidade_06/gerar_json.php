<?php
    //configuracoes gerais
    //Determina que qualquer dominio pode executar esta consulta
    header('Access-Control-Allow-Origin:*');

    //abrir conexao
    $conexao = mysqli_connect("localhost", "root", "admin","andes");

    //query para fazer o select do dados
    $selecao = "SELECT nomeproduto, precounitario, imagempequena FROM produtos";
    //função que executa a query
    $produtos = mysqli_query($conexao, $selecao);

    $retorno = array();
    // Pega os dados da tabela produtos
    while($linha = mysqli_fetch_object($produtos)) {

        $retorno[] = $linha;

    }

    //exibe em formato json
    echo json_encode($retorno);

    //fehar conexao
    mysqli_close($conexao);