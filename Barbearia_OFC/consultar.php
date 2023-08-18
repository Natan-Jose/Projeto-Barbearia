<?php
include("conexao.php");

if (isset($_POST["contato"])) {
  $contato = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_STRING);


    // Prepara a consulta
    $query = "SELECT * FROM cadastro WHERE contato = :contato";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":contato", $contato);
    $stmt->execute();

       // Exibe as informações
    if ($stmt->rowCount() > 0) {
      echo "Agendamentos:<br>"; 

      while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<p>Nome: " . $linha["nome"] . "</p>";
          echo "<p>Dia: " . $linha["dia"] . "</p>";
          echo "<p>Hora: " . $linha["hora"] . "</p>";
          echo "<br>"; 

      }
  } else {
    echo "<script>alert(\"Nenhum agendamento encontrado para o telefone informado.\")</script>";
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

    <form method="POST" action="consultar.php">

        <label for="contato">Digite seu telefone:</label>

        <input type="text" name="contato" id="contato" placeholder="" required>

        <button type="submit">Consultar</button>

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

</body>
</html>