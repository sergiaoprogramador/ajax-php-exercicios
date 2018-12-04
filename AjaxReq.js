
//  Método jQuery.ajax
$.ajax({
    //informamos qual método/verbo HTTP será utilizado na requisição;
    method: "POST",
    //informamos a URL para a qual enviaremos a requisição;
    url: "cadastrar.php",
    //enviamos alguma informação no corpo da requisição.
    data: { nome: "Pedro", email: "pedro@email.com" }
})

$.ajax({
    url : "cadastrar.php",
    type : 'post',
    data : {
        nome : "Maria Fernanda",
        salario :'3500'
    },
    // o argumento beforeSend recebe uma função que é executada antes da requisição ser enviada. Nesse caso, exibimos o texto “ENVIANDO” em um elemento da página;
    beforeSend : function(){
        $("#resultado").html("ENVIANDO...");
    }

// a função de callback done é executada quando a requisição é finalizada com sucesso e nos permite tratar o retorno do servidor, que é recebido por meio do parâmetro msg;
}).done(function(msg) {
    
    $("#resultado").html(msg);

// a função de callback fail, por sua vez, é executada quando ocorre algum erro na requisição. De modo semelhante, a mensagem de erro é recebida no parâmetro msg.
}).fail(function(jqXHR, textStatus, msg) {
    
    alert(msg);

}); 

//  Método jQuery.get

$.get("listar_dados.php", function(resultado){
    $("#mensagem").html(resultado);
})

//Nesse caso, informamos primeiramente a URL que receberá a requisição, e como segundo parâmetro, uma função que tratará seu retorno. 
//Nessa função, o argumento resultado será preenchido com o conteúdo retornado pelo servidor.

//  Método jQuery.post

//informamos a URL que receberá a requisição;
$.post("salvar_dados.php", {

    //passamos dados em formato de objeto JavaScript no corpo da requisição;
    nome : "Maria Fernanda", salario : "3000"

    //adicionamos uma função de callback que será executada quando a requisição for finalizada, e receberá o retorno do servidor no parâmetro msg.
}, function(msg){
    $("#resultado").html(msg);
})

