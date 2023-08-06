<?php
include("conexao.php");
include("excluir_agendamentos.php");
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
    <link rel="shortcut icon" href="imagens/android-chrome-192x192.png" type="image/x-icon">
    <link rel="stylesheet" href=" style0.css">
    <title>BARBERSHOP</title>
    <!-- <script>
        hoje = new Date();
        document.write("Data e hora completa: " + hoje);
    </script> -->
</head>

<body>
    <a class="btn btn-outline-warning" href="index.php" role="button">Página Inicial</a>
    <a class="btn btn-outline-warning" href="foto.php" role="button">Estilo de Cortes</a>
    <a class="btn btn-outline-warning" href="agendamento.php" role="button">Agendamento</a>
    <a class="btn btn-outline-warning" href="contato.php" role="button">Contato</a>

    <br>

    <picture>
        <source media="(max-width: 750px)" width="320" height="320" srcset="imagens/Logo.jpeg" type="image/png">
        <source media="(max-width: 1050px)" width="700" height="350" srcset="imagens/Logo.jpeg" type="image/
            png">
        <img src="imagens/Logo.jpeg" width="750" height="390" alt="Logo">
    </picture>


    <div class="container">

        <h1>Nossa Barbearia: Tradição e Estilo Contemporâneo</h1>
        <p>
            Bem-vindo à nossa barbearia! Somos um espaço que resgata a tradição clássica da barbearia e a combina
            com um estilo
            moderno. Nossa equipe talentosa de barbeiros proporciona uma experiência única e personalizada,
            oferecendo cortes de
            cabelo, barboterapia, aparos de barba e tratamentos capilares.

        <p>
            Aqui, cuidamos não só do seu visual, mas também do seu bem-estar. Valorizamos cada cliente e estamos
            sempre buscando
            inovar. Venha nos visitar e redescubra a verdadeira essência da masculinidade.

        <p>
            <em>Agende agora mesmo o seu horário e permita-nos cuidar do seu estilo com maestria!</em>

            <hr>

            <br>

</body>

</html>