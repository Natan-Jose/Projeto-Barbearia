<?php
include("conexao.php");

if (isset($_POST['Enviar'])) {
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $contato = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_STRING);
  $dia = filter_input(INPUT_POST, 'dia', FILTER_SANITIZE_STRING);
  $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);

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
  <link rel="stylesheet" href="agendamento00.css">
  <link rel="stylesheet" href="preloader.css">  
  <title>BARBERSHOP</title>

  <script src="script_preloader.js"></script>

</head>


<body onLoad="loading()">

    <div class="box-load">
<div class="pre"></div>
</div>

<div class="content">

  <a class="btn btn-outline-warning" href="index.php" role="button">Página Inicial</a>
  <a class="btn btn-outline-warning" href="foto.php" role="button">Estilo de Cortes</a>
  <a class="btn btn-outline-warning" href="agendamento.php" role="button">Agendamento</a>
  <a class="btn btn-outline-warning" href="contato.php" role="button">Contato</a>
  <br>
  
  <picture>
    <source media="(max-width: 750px)" width="320" height="320" srcset="imagens/Logo.jpeg" type="image/png">
    <source media="(max-width: 1050px)" width="700" height="350" srcset="imagens/Logo.jpeg" type="image/png">
    <img src="imagens/Logo.jpeg" width="750" height="390" alt="Logo">
  </picture>
  


  <hr>
  <h3>Faça seu agendamento</h3>

  

  <form method="POST" action="agendamento.php">

    <p> Nome: </p>
    <input type="text" value="" name="nome" id="nome" placeholder="nome e sobrenome" pattern="[A-Za-zÀ-ú\s]+"
      maxlength="50" required>
    <br>

    <p> Contato: </p>
    <input type="text" value="" name="contato" id="contato" placeholder="(00) 0000-0000" maxlength="15" required>
    <br>

    <label for="dia">Agendar</label>
    <br>
    <input type="date" value="" name="dia" min="<?php echo date('Y-m-d'); ?>" required>

    <br>
    <p></p>


    <label for="hora">Hora:</label>
    <select name="hora" required>
      <option value="">Horários</option>
      <option value="09:00">09:00 Manhã</option>
      <option value="09:30">09:30 Manhã</option>
      <option value="10:00">10:00 Manhã</option>
      <option value="10:30">10:30 Manhã</option>
      <option value="11:00">11:00 Manhã</option>
      <option value="11:30">11:30 Manhã</option>
      <option value="12:00">12:00 Tarde</option>
      <option value="12:30">12:30 Tarde</option>
      <option value="14:00">14:00 Tarde</option>
      <option value="14:30">14:30 Tarde</option>
      <option value="15:00">15:00 Tarde</option>
      <option value="15:30">15:30 Tarde</option>
      <option value="16:00">16:00 Tarde</option>
      <option value="16:30">16:30 Tarde</option>
      <option value="17:00">17:00 Noite</option>
      <option value="17:30">17:30 Noite</option>
      <option value="18:00">18:00 Noite</option>
      <option value="18:30">18:30 Noite</option>


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
      
      </div>
      
    <hr>

      <h3>Horário de funcionamento</h3>
      <hr>

      <table>
        <tr>
          <th>Dia da Semana</th>
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
          <td>9:00 - 19:00</td>
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