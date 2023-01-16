<!doctype html>
<html lang="pt-br">
  <head>
    <title>FSN | API PagCompleto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  </head>
  <body>

    <div class="container">

        <h1 class="text-danger">Tempo de resposta esgotado!</h1>
        <h5 class="text-info">Estamos com problemas de comunicar com o PAGCOMPLETO, por gentileza, tente novamente mais tarde.</h5>
        <span id="time_redirect"></span>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    <script>

        var time_in_seconds = 10;
        setInterval(() => {
            $('#time_redirect').text('Você será redirecionado em ' + time_in_seconds + ' segundos.');
            time_in_seconds--;

            if(time_in_seconds == 0) {
                window.location.href = "/";
            }

        }, 1000);


    </script>
  </body>
</html>