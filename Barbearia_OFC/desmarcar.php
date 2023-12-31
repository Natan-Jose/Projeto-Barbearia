<?php
include("conexao.php");

$conteudo="";

if (isset($_POST["contato"])) {
  $contato = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_STRING);

  // Verifica se o botão Excluir foi pressionado
  if (isset($_POST["excluir"])) {
    // Prepara a consulta de exclusão
    $query = "DELETE FROM cadastro WHERE contato = :contato LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":contato", $contato);

    // Execute a consulta
    if ($stmt->execute()) {
      $conteudo .= "<script>alert(\"Registro excluído com sucesso.\")</script>";
    } else {
      $conteudo .= "<script>alert(\"Erro ao excluir o registro.\")</script>";
    }
  }

  // Prepara a consulta de busca
  $query = "SELECT * FROM cadastro WHERE contato = :contato";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(":contato", $contato);
  $stmt->execute();

  // Exibe as informações
  if ($stmt->rowCount() > 0) {
    $conteudo .= "<br><br>Registros encontrados:<br><br>";

    while ($linha = $stmt->fetch()) {
      $conteudo .= "<p>Nome: " . $linha["nome"] . "</p>";
      $conteudo .= "<p>Dia: " . $linha["dia"] . "</p>";
      $conteudo .= "<p>Hora: " . $linha["hora"] . "</p>";
      $conteudo .= "<form method='POST' action=''>";
      $conteudo .= "<input type='hidden' name='contato' value='" . $linha["contato"] . "'>";
      $conteudo .= "<button type='submit' name='excluir'>Excluir</button>";
      $conteudo .= "</form>";
      $conteudo .= "<br>";
    }

  } else {
    $conteudo .= "<script>alert(\"Nenhum registro encontrado para o número de contato informado.\")</script>";
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
 
  <script src="script_preloader2.js"></script>

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

  <form method="POST" action="desmarcar.php">

    <label for="contato">Digite seu telefone:</label>

    <input type="text" name="contato" id="contato" placeholder="" >
    
    <button type="submit">Desmarcar</button>
    
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

<br>
<br><br><br><br><br><br><br><br><br>

<p class="new-paragraph">&copy; 2023 BARBERSHOP COR E ARTE. Todos os direitos reservados.</p>

</body>

</html>