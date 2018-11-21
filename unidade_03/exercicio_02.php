<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
    </head>

    <body>

        <div id="nome"></div>

        <script src="jquery.js"></script>
        <script>

            $.ajax({
                url:'nome.php'
                // Metodo then, função sucesso e falha
            }).then(sucesso, falha);
            
            //sucesso
            function sucesso(valor) {
                 $('#nome').html(valor );
            }

            //falha
            function falha() {
                $('#nome').html("Falha no carregamento");
            }

        </script>
    </body>
</html>