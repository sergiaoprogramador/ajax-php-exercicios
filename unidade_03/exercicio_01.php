<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>

        <style>
            .curso {
                color: #f00;
            }
        </style>
    </head>

    <body>
        <div class="curso"></div>

        <script src="jquery.js"></script>

        <script>
            // Carrega arquivo, função load
            $('.curso').load('dados.txt');
        </script>

    </body>
</html>