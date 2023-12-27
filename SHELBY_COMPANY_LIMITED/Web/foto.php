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
    <link rel="shortcut icon" href="imagens/icon-web.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="foto.css">
    <link rel="stylesheet" href="preloader.css">
    <title>BARBERSHOP</title>

    <script src="./scripts/script_preloader.js"></script>

</head>

<body onLoad="loading()">

    <div class="box-load">
        <div class="pre"></div>
    </div>

    <div class="content">

        <header class="black-bar">

            <br>
            <a class="Menus" href="index.php" role="button">Inicio</a>
            <a class="Menus" href="foto.php" role="button">Cortes</a>
            <a class="Menus" href="agendamento.php" role="button">Agendamento</a>
            <a class="Menus" href="contato.php" role="button">Contato</a>
            <br>

        </header>

        <div class="icon-bs">
            <img src="imagens/icon-menu.png" alt="Logo da Empresa">
        </div>

        <picture>
            <source media="(max-width: 750px)" width="320" height="320" srcset="imagens/Logo.png" type="image/png">
            <source media="(max-width: 1050px)" width="700" height="350" srcset="imagens/Logo.png" type="image/png">
            <img src="imagens/Logo.png" width="750" height="390" alt="Logo">
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
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7"
                    aria-label="Slide 8"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="8"
                    aria-label="Slide 9"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="9"
                    aria-label="Slide 10"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="10"
                    aria-label="Slide 11"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="11"
                    aria-label="Slide 12"></button>


                <!--h4 = "d-none d-md-block"  -->

            </div>

            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="imagens/Corte Militar.jpg" class="image1" alt="Corte Militar">
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
                    <img src="imagens/Corte Mullet.jpg" class="image1" alt="Corte Mullet">
                    <div class="carousel-caption d-block">
                        <h4>Corte Mullet</h4>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="imagens/Barba Lenhador.png" class="image1" alt="Barba Lenhador">
                    <div class="carousel-caption d-block">
                        <h4>Barba Lenhador</h4>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="imagens/Barba Degradê.png" class="image1" alt="Barba Degradê">
                    <div class="carousel-caption d-block">
                        <h4>Barba Degradê</h4>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="imagens/Barba Mutton Chops.jpg" class="image1" alt="Barba Mutton Chops">
                    <div class="carousel-caption d-block">
                        <h4>Barba Mutton Chops</h4>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="imagens/Barba Van Dyke.jpg" class="image1" alt="Barba Van Dyke">
                    <div class="carousel-caption d-block">
                        <h4>Barba Van Dyke</h4>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="imagens/Barba Boxed.jpg" class="image1" alt="Barba Boxed">
                    <div class="carousel-caption d-block">
                        <h4>Barba Boxed</h4>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="imagens/Barba Ducktail.jpg" class="image1" alt="Barba Ducktail">
                    <div class="carousel-caption d-block">
                        <h4>Barba Ducktail</h4>
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
                        interval: 2000, // Intervalo em milissegundos entre os slides (2 segundos)

                        pause: 'hover', // Pausar a rolagem quando o mouse estiver sobre o carrossel
                    });
                }

                // Chame a função quando o documento estiver carregado
                document.addEventListener('DOMContentLoaded', autoAdvanceCarousel);

            </script>

            <div class="new-paragraph">&copy; 2023 BARBERSHOP CORTE E ARTE. Todos os direitos reservados.</div>

</body>

</html>