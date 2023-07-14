<!DOCTYPE html>
<html lang="pt-br">

<head>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="imagens/android-chrome-192x192.png" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
  <title>BARBERSHOP</title>
  <script>
    hoje = new Date();
    document.write("Data e hora completa: " + hoje);
  </script>

</head>

<body>

  <center>

    <hr>

    <img src="imagens/tópico1.png" width="1300" height="300" alt="topo do rodapé">
    <hr>
    <br>

    <h1 id="titulo"> BARBERSHOP COR E ARTE </h1>

    <br>
    <hr>
    <a class="btn btn-outline-warning" href="index.php" role="button">Página Inicial</a>
    <a class="btn btn-outline-warning" href="foto.php" role="button">Estilo de Cortes</a>
    <a class="btn btn-outline-warning" href="agendamento.php" role="button">Agendamento</a>
    <a class="btn btn-outline-warning" href="contato.php" role="button">Contato</a>

    <hr>

    <h3>Confira o corte especial para você!</h3>

    <hr>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
          aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
          aria-label="Slide 5"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5"
          aria-label="Slide 6"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6"
          aria-label="Slide 7"></button>

      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">

          <img src="imagens/fenomeno.jpg" class="d-block w-40" alt="Corte fenomeno" width="500" height="500">
          <div class="carousel-caption d-none d-md-block">
            <h4 id="r9">Corte Fenômeno</h4>
            <h4 id="r9">Valor: R$ 100,00</h4>


          </div>
        </div>


        <div class="carousel-item">
          <img src="imagens/Calvo de Cria.jpg" class="d-block w-40" alt="Corte Calvo de Cria" width="500" height="500">
          <div class="carousel-caption d-none d-md-block">
            <h4 id="r9">Corte Calvo de Cria </h4>
            <h4 id="r9">Valor: R$ 50,00</h4>

          </div>
        </div>



        <div class="carousel-item">
          <img src="imagens/volverine.jpg" class="d-block w-35" alt="Corte volverine" width="500" height="500">
          <div class="carousel-caption d-none d-md-block">
            <h4 id="r9">Corte Volverine </h4>
            <h4 id="r9">Valor: R$ 35,00</h4>

          </div>
        </div>

        <div class="carousel-item">
          <img src="imagens/naregua.jpg" class="d-block w-40" alt="corte na régua">
          <div class="carousel-caption d-none d-md-block">
            <h4 id="r9">Corte Naregua</h4>
            <h4 id="r9">Valor: R$ 50,00</h4>

          </div>
        </div>

        <div class="carousel-item">
          <img src="imagens/Corte abacaxi.jpg" class="d-block w-35" alt="Corte Abacaxi" width="500" height="500">
          <div class="carousel-caption d-none d-md-block">
            <h4 id="r9">Corte Abacaxi </h4>
            <h4 id="r9">Valor: R$ 30,00</h4>

          </div>
        </div>

        <div class="carousel-item">
          <img src="imagens/Luzes.jpg" class="d-block w-35" alt="Corte na Luzes" width="500" height="500">
          <div class="carousel-caption d-none d-md-block">
            <h4 id="r9">Corte Luzes </h4>
            <h4 id="r9">Valor: R$ 40,00</h4>

          </div>
        </div>

        <div class="carousel-item">
          <img src="imagens/Corte Gilete.jpg" class="d-block w-35" alt="Corte Gilete" width="500" height="500">
          <div class="carousel-caption d-none d-md-block">
            <h4 id="r9">Corte Gilete </h4>
            <h4 id="r9">Valor: R$ 20,00</h4>

          </div>
        </div>

      </div>



      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>

      </button>

    </div>
    <hr>
  </center>
</body>

</html>