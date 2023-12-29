<?php

require 'conexao.php';
require './configuracao_cookies/agendamento_cookies.php';

if (isset($_POST['Enviar'])) {
    $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
    $contato = htmlspecialchars($_POST['contato'], ENT_QUOTES, 'UTF-8');
    $dia = htmlspecialchars($_POST['dia'], ENT_QUOTES, 'UTF-8');
    $hora = htmlspecialchars($_POST['hora'], ENT_QUOTES, 'UTF-8');

    setAgendamentoCookie($nome, $contato, $dia, $hora);

    // Verifique se os cookies estão definidos antes de tentar acessá-los
    if (isset($_COOKIE['agendamento_nome']) && isset($_COOKIE['agendamento_contato']) && isset($_COOKIE['agendamento_dia']) && isset($_COOKIE['agendamento_hora'])) {
        echo "<script>alert('Recuperamos seus dados');</script>";
    }

    $query = "SELECT * FROM cadastro WHERE dia = ? AND hora = ?";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $dia);
    $stmt->bindParam(2, $hora);
    $stmt->execute();
    $result = $stmt->fetchAll();

    //var_dump($result);

    if (count($result) > 0) {
        echo "<script>alert(\"Horário já reservado\")</script>";
    } else {

        $query = "INSERT INTO cadastro (nome, contato, dia, hora) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $contato);
        $stmt->bindParam(3, $dia);
        $stmt->bindParam(4, $hora);
        $stmt->execute();

        echo "<script>alert(\"Cadastrado\")</script>";
    }
}

// Verifique se os cookies estão definidos antes de tentar acessá-los
if (isset($_COOKIE['agendamento_nome']) && isset($_COOKIE['agendamento_contato']) && isset($_COOKIE['agendamento_dia']) && isset($_COOKIE['agendamento_hora'])) {
    echo "<script>alert('Recuperamos seus dados');</script>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/icon-web.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="agendamento.css">
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
            <source media="(max-width: 1050px)" width="700" height="350" srcset="imagens/Logo.png" type="image/png">
            <img src="imagens/Logo.png" width="750" height="390" alt="Logo">
        </picture>

        <hr>
        <h3>Faça seu agendamento</h3>
        <br>

        <form method="POST" action="agendamento.php">

            <p> Nome: </p>
            <input type="text" name="nome" id="nome" placeholder="Nome e Sobrenome" maxlength="50" required value="<?php echo isset($_COOKIE['agendamento_nome']) ? $_COOKIE['agendamento_nome'] : ''; ?>">
            <!--oninput="uppercaseSEN(this)-->
            <br>

            <p> Contato: </p>
            <input type="text" name="contato" id="contato" placeholder="(00) 0000-0000" maxlength="15" required value="<?php echo isset($_COOKIE['agendamento_contato']) ? $_COOKIE['agendamento_contato'] : ''; ?>">
            <br>

            <label for="dia">Agende seu Dia</label>
            <br>

            <input type="date" name="dia" min="<?php echo date('Y-m-d'); ?>" required value="<?php echo isset($_COOKIE['agendamento_dia']) ? $_COOKIE['agendamento_dia'] : ''; ?>">

            <br>
            <p></p>

            <select name="hora" required>
                <option value="">Horários</option>
                <?php
                $opcoesHoras = [
                    "09:00", "09:30", "10:00", "10:30", "11:00", "11:30",
                    "12:00", "12:30", "14:00", "14:30", "15:00", "15:30",
                    "16:00", "16:30", "17:00", "17:30", "18:00", "18:30"
                ];

                foreach ($opcoesHoras as $opcao) {
                    $selecionada = (isset($_COOKIE['agendamento_hora']) && $_COOKIE['agendamento_hora'] === $opcao) ? 'selected' : '';
                    $periodo = '';

                    if (strtotime($opcao) >= strtotime('09:00') && strtotime($opcao) <= strtotime('11:30')) {
                        $periodo = 'Manhã';
                    } elseif (strtotime($opcao) >= strtotime('12:00') && strtotime($opcao) <= strtotime('16:30')) {
                        $periodo = 'Tarde';
                    } elseif (strtotime($opcao) >= strtotime('17:00') && strtotime($opcao) <= strtotime('18:30')) {
                        $periodo = 'Noite';
                    }

                    echo "<option value=\"$opcao\" $selecionada>$opcao $periodo</option>";
                }
                ?>

                <br>
                <p></p>

                <input type="reset" value="Limpar">
                <br>
                <p></p>
                <input type="submit" value="Enviar" name="Enviar">
                <p>

                <div class="my-links">
                    <a href="consultar.php" target="_blank">Consultar</a>
                    <a href="desmarcar.php" target="_blank">Desmarcar</a>
                    <a href="feedback.php" target="_blank">Feedback</a>
                </div>

                <hr>

                <h3>Horário de funcionamento</h3>
                <hr>

                <table>
                    <tr>
                        <th>Dias</th>
                        <th>Horário</th>
                    </tr>

                    <tr>
                        <td>Terça-feira</td>
                        <td>9:00 - 19:00</td>
                    </tr>
                    <tr>
                        <td>Quarta-feira</td>
                        <td>9:00 - 19:00</td>
                    </tr>
                    <tr>
                        <td>Quinta-feira</td>
                        <td>9:00 - 19:00</td>
                    </tr>
                    <tr>
                        <td>Sexta-feira</td>
                        <td>9:00 - 19:00</td>
                    </tr>
                    <tr>
                        <td>Sábado</td>
                        <td>9:00 - 17:00</td>
                    </tr>
                    <tr>
                        <td>Domingo</td>
                        <td>Fechado</td>
                    </tr>
                    <tr>
                        <td>Segunda-feira</td>
                        <td>Fechado</td>
                    </tr>
                </table>
                <hr>

        </form>

        <script>
            /* Função que converte o valor do campo em letras maiúsculas
            function uppercaseSEN(element) {
                element.value = element.value.toUpperCase();
            }*/

            // Referencia o campo de nome
            var nomeInput = document.getElementsByName('nome')[0];

            // Adiciona um listener para o evento 'input' (quando o usuário digita algo)
            nomeInput.addEventListener('input', function() {
                // Obtém o valor atual do campo de nome
                var nomeValue = nomeInput.value;

                // Remove os espaços em branco no início e no fim do valor
                var nomeTrimmed = nomeValue.trim();

                // Verifica se o nome possui pelo menos um espaço em branco, indicando que é um nome completo
                var nomeValido = nomeTrimmed.includes(' ');

                // Define a validade do campo
                nomeInput.setCustomValidity(nomeValido ? '' : 'Digite seu nome completo (Nome e Sobrenome).');
                // nomeInput.setCustomValidity(nomeValido ? '' : 'Digite seu nome completo');

                // Atualiza a aparência do campo de acordo com a validade
                nomeInput.reportValidity();
            });



            // Referencia o campo de contato
            var contatoInput = document.getElementById('contato');

            // Adiciona um listener para o evento 'input' (quando o usuário digita algo)
            contatoInput.addEventListener('input', function() {
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

        <div class="new-paragraph">&copy; 2023 BARBERSHOP CORTE E ARTE. Todos os direitos reservados. </div>

        <br>

</body>

</html>