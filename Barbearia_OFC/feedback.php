<?php
include("conexao.php");

if (isset($_POST['Enviar'])) {
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $avaliacao = filter_input(INPUT_POST, 'avaliacao', FILTER_SANITIZE_STRING);
  $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

    $query = "INSERT INTO feedback (nome, email, avaliacao, mensagem) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $avaliacao);
    $stmt->bindParam(4, $mensagem);
    $stmt->execute();

    echo "<script>alert(\"Feedback enviado com sucesso!\")</script>";
  }

  // Recupera os dados de feedback do banco de dados
$query = "SELECT * FROM feedback";
$stmt = $conn->prepare($query);
$stmt->execute(); // Executa a consulta
$feedback_data = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/android-chrome-192x192.png" type="image/x-icon">
    <link rel="stylesheet" href="feedback0.css">
    <link rel="stylesheet" href="preloader.css">
    <title>BARBERSHOP</title>

    <script src="script_preloader.js"></script>
</head>

<body onLoad="loading()">

    <div class="box-load">
        <div class="pre"></div>
    </div>

    <div class="content">

    <picture>
            <source media="(max-width: 750px)" width="320" height="320" srcset="imagens/Logo.jpeg" type="image/png">
            <source media="(max-width: 1050px)" width="700" height="350" srcset="imagens/Logo.jpeg" type="image/
            png">
            <img src="imagens/Logo.jpeg" width="750" height="390" alt="Logo">
        </picture>

            <h1>Feedback da Barbearia</h1>
        
            
    <form method="POST" action="feedback.php">
        
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="name" placeholder="Seu nome" maxlength="50" required>
                <br>
                <br>


                <label for="email">Email:</label>
                <input type="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}"placeholder="exemplo@dominio.com" required>
                <br>
                <br>

                <label for="avaliacao">Avaliação:</label>
                <select  name="avaliacao" required>
                <option value="">----</option>
                    <option value="5">5 estrelas</option>
                    <option value="4">4 estrelas</option>
                    <option value="3">3 estrelas</option>
                    <option value="2">2 estrelas</option>
                    <option value="1">1 estrelas</option>
                </select>
                <br>
                

                <br>
                <label for="mensagem">Comentários:</label>
                <br>
                <textarea name="mensagem" rows="4" placeholder="Digite aqui..." maxlength="300" required></textarea>
                <br>
                <br>
                <input type="submit" value="Enviar" name="Enviar">
            </form>


            <h2>Avaliações</h2>
    
            <?php foreach ($feedback_data as $feedback): ?>
        <div class="feedback">
            <p><strong>Nome:</strong> <?php echo $feedback['nome']; ?></p>
            <p><strong>Email:</strong> <?php echo $feedback['email']; ?></p>
            <p><strong>Avaliação:</strong> <?php echo $feedback['avaliacao']; ?></p>
            <p><strong>Comentário:</strong> <?php echo $feedback['mensagem']; ?></p>
        </div>
    <?php endforeach; ?>


<script>
// Referencia o campo de nome
var nomeInput = document.getElementsByName('nome')[0];

// Adiciona um listener para o evento 'input' (quando o usuário digita algo)
nomeInput.addEventListener('input', function () {
  // Obtém o valor atual do campo de nome
  var nomeValue = nomeInput.value;

  // Remove os espaços em branco no início e no fim do valor
  var nomeTrimmed = nomeValue.trim();

  // Verifica se o nome possui pelo menos um espaço em branco, indicando que é um nome completo
  var nomeValido = nomeTrimmed.includes(' ');

  // Define a validade do campo
  nomeInput.setCustomValidity(nomeValido ? '' : 'Digite seu nome completo (nome e sobrenome).');
  // nomeInput.setCustomValidity(nomeValido ? '' : 'Digite seu nome completo');

  // Atualiza a aparência do campo de acordo com a validade
  nomeInput.reportValidity();
});
</script>


    <p class="new-paragraph"> &copy; 2023 BARBERSHOP COR E ARTE. Todos os direitos reservados.</p>

</body>
</html>
