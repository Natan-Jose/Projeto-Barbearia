<?php

require 'conexao.php';
require 'excluir_agendamentos.php';

?>

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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="preloader.css">
    <title>BARBERSHOP</title>
    <!-- <script>
        hoje = new Date();
        document.write("Data e hora completa: " + hoje);
    </script> -->

    <script src="script_preloader.js"></script>

</head>

<body onLoad="loading()">

    <div class="box-load">
        <div class="pre"></div>
    </div>

    <div class="content">

        <!-- <label for="colorPicker">Escolha a cor do texto: :</label>
        <input type="color" id="colorPicker">

        <label for="bgColorPicker">Escolha a cor de fundo:</label>
        <input type="color" id="bgColorPicker">

        <script src="./scripts/colors.js"></script>
     
     -->

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
            <source media="(max-width: 1050px)" width="700" height="350" srcset="imagens/Logo.png" type="image/
            png">
            <img src="imagens/Logo.png" width="750" height="390" alt="Logo">
        </picture>

        <div class="container">

        <hr>
     <video src="./video/barber.mp4" controls autoplay muted loop width="450" height=""></video>
<hr>

<audio autoplay loop>
  <source src="./sounds/MUSICA DE FUNK PARA BARBEARIA DOS CRIA.mp3" type="audio/mp3">
  Seu navegador não suporta o elemento de áudio.
</audio>

            <!--     <h1>Nossa Barbearia: Corte e Arte</h1>

            <br>

            <h3>Descubra a Essência da Masculinidade</h3>

            <p>Na nossa barbearia, a tradição se mistura ao estilo moderno, proporcionando a você uma experiência única
                e revitalizante. Nossa equipe talentosa de barbeiros é dedicada a resgatar a verdadeira essência da
                masculinidade em cada corte, aparar e tratamento.</p>

                <br>
                
            <h3>Estilo Personalizado ao Seu Gosto</h3>

        <p>Aqui, você é único. Nossa equipe valoriza suas preferências e transforma cada serviço em uma jornada de autodescoberta. Deixe-nos criar um estilo que seja verdadeiramente seu, respeitando sua individualidade.</p>

        <br>

        <h3>Além da Aparência: Uma Experiência Completa</h3>

        <p>Mais do que apenas serviços de beleza, oferecemos uma pausa do dia a dia. Com atenção aos detalhes e um ambiente acolhedor, cada visita é uma experiência memorável que vai além da estética.</p>
    
         <br>
         <h3>Agende Agora e Redefina o Seu Estilo</h3>

        <p>Seu estilo é importante, e nós entendemos isso. Agende seu horário agora mesmo e permita-nos fazer parte da sua jornada de autodescoberta e confiança.</p>

        <em>Agende agora e transforme sua aparência com maestria!</em>

                <hr>
-->
<br><br>
            <div class="new-paragraph">&copy; 2023 BARBERSHOP CORTE E ARTE. Todos os direitos reservados.</div>

</body>

</html>