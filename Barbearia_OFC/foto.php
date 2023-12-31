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
  <link rel="stylesheet" href="foto0.css">
  <link rel="stylesheet" href="preloader.css">
  <title>BARBERSHOP</title>

  <script src="script_preloader2.js"></script>

</head>

<body onLoad="loading()">

    <div class="box-load">
<div class="pre"></div>
</div>

<div class="content">

  <br>
  <a class="btn btn-outline-warning" href="index.php" role="button">Página Inicial</a>
  <a class="btn btn-outline-warning" href="foto.php" role="button">Estilo de Cortes</a>
  <a class="btn btn-outline-warning" href="agendamento.php" role="button">Agendamento</a>
  <a class="btn btn-outline-warning" href="contato.php" role="button">Contato</a>
  <br>

    <picture>
      <source media="(max-width: 750px)" width="320" height="320" srcset="imagens/Logo.jpeg" type="image/png">
      <source media="(max-width: 1050px)" width="700" height="350" srcset="imagens/Logo.jpeg" type="image/png">
      <img src="imagens/Logo.jpeg" width="750" height="390" alt="Logo">
    </picture>

  <hr>


  <h3>Confira o corte especial para você!</h3>

  <hr>

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"> <!--"false"-->
   
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

       <!--h4 = "d-none d-md-block"  -->    
        
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">

        <img src="imagens/Corte  Militar.jpg" class="image1" alt="Corte Militar">
        <div class="carousel-caption d-block">
          <h4>Corte Militar </h4>


        </div>
      </div>


      <div class="carousel-item">
        <img src="imagens/Corte Surfista.jpg" class="image1" alt="Corte Surfista">
        <div class="carousel-caption d-block">
          <h4>Corte Surfista </h4>
        </div>
      </div>



      <div class="carousel-item">
        <img src="imagens/Corte Quiff.jpg" class="image1" alt="Corte Quiff">
        <div class="carousel-caption d-block">
          <h4>Corte Quiff</h4>

        </div>
      </div>

      <div class="carousel-item">
        <img src="imagens/Corte Slicked Back.png" class="image1" alt="Corte Slicked Back">
        <div class="carousel-caption d-block">
          <h4>Corte Slicked Back</h4>


        </div>
      </div>

      <div class="carousel-item">
        <img src="imagens/Corte Dreadlock.jpg" class="image1" alt="Corte Drealock">
        <div class="carousel-caption d-block">
          <h4>Corte Dreadlock </h4>


        </div>
      </div>

      <div class="carousel-item">
        <img src="imagens/Corte Faux Hawk.jpg" class="image1" alt="Corte Faux Hawk">
        <div class="carousel-caption d-block">
          <h4>Corte Faux Hawk </h4>


        </div>
      </div>

      <div class="carousel-item">
        <img src="imagens/Corte Mullet.jpg" class="image1" alt="Corte Mullet">
        <div class="carousel-caption d-block">
          <h4>Corte Mullet</h4>


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

     <script>
      // Função para avançar automaticamente o carrossel
      function autoAdvanceCarousel() {
        const carousel = new bootstrap.Carousel(document.getElementById('carouselExampleCaptions'), {
          interval: 2000, // Intervalo em milissegundos entre os slides (2 segundos neste caso)
       
          pause: 'hover', // Pausar a rolagem quando o mouse estiver sobre o carrossel
        });
      }

      // Chame a função quando o documento estiver carregado
      document.addEventListener('DOMContentLoaded', autoAdvanceCarousel);
    </script>

<p class="new-paragraph">&copy; 2023 BARBERSHOP COR E ARTE. Todos os direitos reservados.</p>
</body>

</html>