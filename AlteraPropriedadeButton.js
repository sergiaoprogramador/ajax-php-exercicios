//          GET

$(document).ready(function() {
    
    var botaoSalvar = $( "#botaoSalvar" );
   
    botaoSalvar.click(function() {
        
        botaoSalvar.html('Aguarde...');
        botaoSalvar.prop('disabled', true);
   
        $.get( "sorteio.php" )
         .done(function(resultado) {
   
            $("#resultadoSorteio").html(resultado);
   
            botaoSalvar.html('Sortear Número');
            botaoSalvar.prop('disabled', false);
   
        });
   
   
    });
});

// Linha 01: É utilizada a função ready para executar o código dentro dela apenas quando o documento todo for carregado. Isso é importante para evitar a execução da função que não foi iniciada.

// Linha 03: Iniciamos uma variável recebendo o objeto jQuery do botão.

// Linha 05: Iniciamos a função click e passamos como parâmetro uma função anônima que vai executar uma ação quando o evento for acionado através do clique do botão.

// Linha 07: Agora efetuamos a mudança do texto do botão com a função html(), responsável por pegar o conteúdo de texto do elemento que, neste caso, “<button>Conteúdo<button/>”.

// Linha 08: Alteramos a propriedade disabled para true para transformar em um botão desabilitado.

// Linha 10: Efetuamos uma requisição HTTP para buscar o resultado em um servidor web.

// Linha 11: O manipulador .done() será chamado no caso de um retorno com sucesso, e será executada uma função anônima para processar o resultado que, pelo parâmetro da função, é nomeado de resultado.

// Linha 13: Através do .html() adicionamos em uma tag <span/> o texto que retornou da requisição HTTP.

// Linha 14: Alteramos o texto do botão novamente com a função .html() retornando o valor anterior.

// Linha 15: Voltamos a propriedade disabled para o seu estado inicial, liberando o acesso ao botão.

//          POST

$(document).ready(function() {
    
    var botaoSalvar = $( "#botaoSalvar" );
    var inputSenha = $( "#senha" );
   
    botaoSalvar.click(function() {
   
        botaoSalvar.html('Aguarde...');
        botaoSalvar.prop('disabled', true);
   
        $.post( "senha.php" ,{ senha: $("#senha").val() } )
        .done(function(data) {
   
            $("#resultadoAtualizacao").html(data);
   
            botaoSalvar.html('Atualizar Senha');
            botaoSalvar.prop('disabled', false);
            inputSenha.val('');
   
        });
    });
});

// Linha 01: É utilizada a função ready para executar o código dentro dela apenas quando o documento todo for carregado. Isso é importante para evitar a execução da função que não foi iniciada.

// Linha 03: Iniciamos uma variável recebendo o objeto jQuery do botão.

// Linha 04: Temos uma variável inputSenha para receber o objeto do campo input identificado como senha.

// Linha 06: Iniciamos a função click e passamos como parâmetro uma função anônima que vai executar uma ação quando o evento for acionado através do clique do botão.

// Linha 08: Agora efetuamos a mudança do texto do botão com a função html(), responsável por pegar o conteúdo de texto do elemento ”<button>Conteúdo<button/>”

// Linha 09: Alteramos a propriedade disabled para true, transformando em um botão desabilitado.

// Linha 11: Efetuamos uma requisição HTTP através do método POST para enviar informações ao servidor web. Estamos enviando como parâmetro a informação preenchida no campo senha.

// Linha 12: O manipulador .done() será chamado no caso de um retorno com sucesso, e será executada uma função anônima para processar o resultado que, pelo parâmetro da função é nomeado resultado.

// Linha 14: Através do .html() adicionamos em uma tag <span/> o texto que retornou da requisição HTTP.

// Linha 15: Alteramos o texto do botão novamente com a função .html() retornando o valor anterior.

// Linha 16: Voltamos a propriedade disabled para o seu estado inicial liberando o acesso ao botão.