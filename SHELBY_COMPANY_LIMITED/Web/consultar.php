<?php

require 'conexao.php';
require './configuracao_cookies/telefone_cookies.php';

$conteudo = "";

if (isset($_POST["contato"])) {
    $contato =  htmlspecialchars($_POST['contato'],ENT_QUOTES, 'UTF-8');

    // Prepara a consulta
    $query = "SELECT * FROM cadastro WHERE contato = :contato";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":contato", $contato);
    $stmt->execute();

    setTelefoneCookie($contato);

    // Exibe as informações
    if ($stmt->rowCount() > 0) {
        $conteudo = "<br><br>Agendamentos:<br><br>";

        while ($linha = $stmt->fetch()) {
            $conteudo .= "<p>Nome: " . $linha["nome"] . "</p>";
            $conteudo .= "<p>Dia: " . $linha["dia"] . "</p>";
            $conteudo .= "<p>Hora: " . $linha["hora"] . "</p>";
            $conteudo .= "<br>";

        }
    } else {

        $conteudo .= "<script>alert(\"Nenhum agendamento encontrado para o telefone informado.\")</script>";
    }
}

// Verifique se os cookies estão definidos antes de tentar acessá-los
if (isset($_COOKIE['agendamento_contato'])) {
    echo "<script>alert('Recuperamos seus dados');</script>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/icon-web.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="consultar.css">
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

        <form method="POST" action="consultar.php">

            <label for="contato">Digite seu telefone:</label>

            <input type="text" name="contato" id="contato" placeholder="(00) 0000-0000" mrequired value="<?php echo isset($_COOKIE['telefone_contato']) ? $_COOKIE['telefone_contato'] : ''; ?>">
          
            <button type="submit">Consultar</button>
            <br><br><br><br>

            <!-- Exibir a div apenas se houver conteúdo -->
            <?php if (!empty($conteudo)) { ?>
                <div class="content-styling">
                    <?= $conteudo ?>
                </div>
            <?php } ?>

        </form>

        <script>

            // Referencia o campo de contato
            var contatoInput = document.getElementById('contato');

            // Adiciona um listener para o evento 'input' (quando o usuário digita algo)
            contatoInput.addEventListener('input', function () {
                // Obtém o valor atual do campo de contato
                var contatoValue = contatoInput.value;

                // Remove todos os caracteres não numéricos
                var contatoNumerico = contatoValue.replace(/\D/g, '');

                // Formata o número com os parênteses e o hífen
                var numeroFormatado = '';
                if (contatoNumerico.length > 0) {
                    numeroFormatado = '(' + contatoNumerico.substring(0, 2);
                    if (contatoNumerico.length > 2) {
                        numeroFormatado += ') ' + contatoNumerico.substring(2, 7);
                        if (contatoNumerico.length > 7) {
                            numeroFormatado += '-' + contatoNumerico.substring(7, 11);
                        }
                    }
                }

                // Define o valor formatado no campo de contato
                contatoInput.value = numeroFormatado;
            });

        </script>

        <br><br><br><br><br><br><br><br><br><br>

        <div class="new-paragraph">&copy; 2023 BARBERSHOP CORTE E ARTE. Todos os direitos reservados.</div>

        <br>

</body>

</html>