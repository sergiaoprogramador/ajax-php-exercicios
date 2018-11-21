  <?php
    $conexao = mysqli_connect("localhost","root","admin","andes");
    if ( mysqli_connect_errno()  ) {
        die("Conexao falhou: " . mysqli_connect_errno());
    }

    if(isset($_POST["nometransportadora"])) {
        $nome       = utf8_decode($_POST["nometransportadora"]);
        $endereco   = utf8_decode($_POST["endereco"]);
        $cidade     = utf8_decode($_POST["cidade"]);
        $estado     = $_POST["estados"];
        
        $inserir    = "INSERT INTO transportadoras ";
        $inserir    .= "(nometransportadora,endereco,cidade,estadoID) ";
        $inserir    .= "VALUES ";
        $inserir    .= "('$nome','$endereco','$cidade', $estado)";

        $operacao_insercao = mysqli_query($conexao, $inserir);

        $retorno = array();

        if($operacao_insercao) {
            $retorno["sucesso"] = true;
            $retorno["mensagem"] = "Transportadora inserida com sucesso";
        } else {
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "Falha na inserção dos dados";
        }

        echo json_encode($retorno);
    }