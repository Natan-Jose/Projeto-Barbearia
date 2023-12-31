<?php

require 'conexao.php';
require './configuracao_cookies/feedback_cookies.php';

if (isset($_POST['Enviar'])) {
    $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
    $avaliacao = htmlspecialchars($_POST['avaliacao'], ENT_QUOTES, 'UTF-8');
    $mensagem = htmlspecialchars($_POST['mensagem'], ENT_QUOTES, 'UTF-8');


    $query = "INSERT INTO feedback (nome, avaliacao, mensagem) VALUES ( ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $avaliacao);
    $stmt->bindParam(3, $mensagem);
    $stmt->execute();

   setFeedbackCookie($nome, $avaliacao, $mensagem);

    echo "<script>alert(\"Feedback enviado com sucesso!\")</script>";
}

// Recupera os dados de feedback do banco de dados
$query = "SELECT * FROM feedback";
$stmt = $conn->prepare($query);
$stmt->execute(); // Executa a consulta
$feedback_data = $stmt->fetchAll();

// Verifique se os cookies estão definidos antes de tentar acessá-los
if (isset($_COOKIE['feedback_nome']) && isset($_COOKIE['feedback_avaliacao']) && isset($_COOKIE['feedback_mensagem'])) {
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
    <link rel="stylesheet" href="feedback.css">
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

        <h1>Feedback da Barbearia</h1>

        <form method="POST" action="feedback.php">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="name" placeholder="Seu nome" maxlength="50" required value="<?php echo isset($_COOKIE['feedback_nome']) ? $_COOKIE['feedback_nome'] : ''; ?>">

            <br><br>

            <label for="avaliacao">Avaliação:</label>
            <select name="avaliacao" required>
                <option value="">----</option>
                <option value="1" <?php echo (isset($_COOKIE['feedback_avaliacao']) && $_COOKIE['feedback_avaliacao'] == '1') ? 'selected' : ''; ?>>⭐</option>
                <option value="2" <?php echo (isset($_COOKIE['feedback_avaliacao']) && $_COOKIE['feedback_avaliacao'] == '2') ? 'selected' : ''; ?>>⭐⭐</option>
                <option value="3" <?php echo (isset($_COOKIE['feedback_avaliacao']) && $_COOKIE['feedback_avaliacao'] == '3') ? 'selected' : ''; ?>>⭐⭐⭐</option>
                <option value="4" <?php echo (isset($_COOKIE['feedback_avaliacao']) && $_COOKIE['feedback_avaliacao'] == '4') ? 'selected' : ''; ?>>⭐⭐⭐⭐</option>
                <option value="5" <?php echo (isset($_COOKIE['feedback_avaliacao']) && $_COOKIE['feedback_avaliacao'] == '5') ? 'selected' : ''; ?>>⭐⭐⭐⭐⭐</option>
            </select>

            <br><br>

            <label for="mensagem">Comentários:</label>
            <br>
            <textarea name="mensagem" rows="4" placeholder="Digite aqui..." maxlength="" required><?php echo isset($_COOKIE['feedback_mensagem']) ? $_COOKIE['feedback_mensagem'] : ''; ?></textarea>
            <br><br>

            <input type="submit" value="Enviar" name="Enviar" class="botao-enviar">

        </form>

        <h2>Avaliações</h2>

        <?php foreach ($feedback_data as $feedback) : ?>

            <div class="feedback">

                <p><strong>Data de Lançamento:</strong>
                    <?php echo date('d/m/Y'); ?>

                <p><strong>Nome:</strong>
                    <?php echo $feedback['nome']; ?>
                </p>

                <p><strong>Avaliação:</strong>
                    <?php
                    $avaliacao = $feedback['avaliacao'];
                    $estrelas = str_repeat('⭐', $avaliacao);
                    echo $estrelas;
                    ?>

                </p>
                </p>

                <p><strong>Comentário:</strong>

                    <?php echo $feedback['mensagem']; ?>

                </p>
            </div>

        <?php endforeach; ?>

        <script>
            // Referencia do campo de nome
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
        </script>

        <div class="new-paragraph"> &copy; 2023 BARBERSHOP CORTE E ARTE. Todos os direitos reservados.</div>

        <br>

</body>

</html>