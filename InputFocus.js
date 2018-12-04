//Adiciona propriedade focus a div pai do input
$(document).ready(function() {
    $("input").focus(function() {
        $(this).parent().addClass("focoAtual");
    });

    $("input").blur(function() {
        $(this).parent().removeClass("focoAtual");
    });
});