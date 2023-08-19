<?php
include("conexao.php");

if (isset($_POST["contato"])) {
    $contato = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_STRING);

    // Verifica se o botão Excluir foi pressionado
    if (isset($_POST["excluir"])) {
        // Prepara a consulta de exclusão
        $query = "DELETE FROM cadastro WHERE contato = :contato";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":contato", $contato);

      // Execute a consulta
      if ($stmt->execute()) {
        echo "<script>alert(\"Registro excluído com sucesso.\")</script>";
    } else {
        echo "<script>alert(\"Erro ao excluir o registro.\")</script>";
    }
}

    // Prepara a consulta de busca
    $query = "SELECT * FROM cadastro WHERE contato = :contato";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":contato", $contato);
    $stmt->execute();

    // Exibe as informações
    if ($stmt->rowCount() > 0) {
        echo "Registros encontrados:<br>";

        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>Nome: " . $linha["nome"] . "</p>";
            echo "<p>Dia: " . $linha["dia"] . "</p>";
            echo "<p>Hora: " . $linha["hora"] . "</p>";
            echo "<form method='POST' action=''>";
            echo "<input type='hidden' name='contato' value='" . $linha["contato"] . "'>";
            echo "<button type='submit' name='excluir'>Excluir</button>";
            echo "</form>";
            echo "<br>";
        }

    } else {
        echo "<script>alert(\"Nenhum registro encontrado para o número de contato informado.\")</script>";
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
  <link rel="stylesheet" href="desmarcar.css">  
  <link rel="stylesheet" href="preloader.css">
  <title>BARBERSHOP</title>

  <script src="script_preloader.js"></script>

</head>

<body onLoad="loading()">

    <div class="box-load">
<div class="pre"></div>
</div>

<div class="content">

    <form method="POST" action="desmarcar.php">

        <label for="contato">Digite seu telefone:</label>

        <input type="text" name="contato" id="contato" placeholder="" required>

        <button type="submit">Desmarcar</button>

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
