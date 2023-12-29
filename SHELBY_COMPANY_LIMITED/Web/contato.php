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
    <link rel="stylesheet" href="contato.css">
    <link rel="stylesheet" href="preloader.css">
    <title>BARBERSHOP</title>

    <script src="script_preloader.js"></script>

</head>

<body onLoad="loading()">

    <div class="box-load">
        <div class="pre"></div>
    </div>

    <div class="content">

        <header class="black-bar">

            <br>
            <a class="Menus" href="index.php" role="button">Página Inicial</a>
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

        <h3>Localização</h3>

        <p>Rua Vinte e Um de Abril, 3460 - San Martim - Recife - PE</p>

        <hr>

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1689.6877895252405!2d-34.934619!3d-8.068775!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfd16c1eb23448018!2sFarm%C3%A1cia%20Shalon!5e1!3m2!1spt-BR!2sbr!4v1667059146850!5m2!1spt-BR!2sbr"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>

        <hr>

        <br>

        <h3>Contato</h3>

        <p>"Para esclarecer qualquer dúvida, estamos à disposição em nossas redes sociais.<br> Sinta-se à vontade para
            entrar em contato conosco."</p>



        <div class="social-icon">
            <a href="https://wa.me/558185230542" target="_blank">
                <img src="imagens/Zap-icon.png" alt="Ícone do WhatsApp">
            </a>
            <a href="https://www.instagram.com/corteartebarber/#" target="_blank">
                <img src="imagens/Insta-icon.png" alt="Ícone do Instagram">
            </a>
        </div>

        <hr>

        <div class="new-paragraph">&copy; 2023 BARBERSHOP CORTE E ARTE. Todos os direitos reservados.</div>

        <br>

</body>

</html>