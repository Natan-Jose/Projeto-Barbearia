<?php
include("conexao.php");

$conteudo = "";

if (isset($_POST["contato"])) {
  $contato = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_STRING);


  // Prepara a consulta
  $query = "SELECT * FROM cadastro WHERE contato = :contato";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(":contato", $contato);
  $stmt->execute();

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
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="imagens/android-chrome-192x192.png" type="image/x-icon">
  <link rel="stylesheet" href="consultar.css">
  <title>BARBERSHOP</title>

</head>

<body>

  <picture>
    <source media="(max-width: 750px)" width="320" height="320" srcset="imagens/Logo.jpeg" type="image/png">
    <source media="(max-width: 1050px)" width="700" height="350" srcset="imagens/Logo.jpeg" type="image/
            png">
    <img src="imagens/Logo.jpeg" width="750" height="390" alt="Logo">
  </picture>

  <form method="POST" action="consultar.php">

    <label for="contato">Digite seu telefone:</label>

    <input type="text" name="contato" id="contato" placeholder="" required>

    <button type="submit">Consultar</button>

   
    <?= $conteudo ?>
  
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

<p class="new-paragraph">&copy; 2023 BARBERSHOP COR E ARTE. Todos os direitos reservados.</p>

</body>

</html>