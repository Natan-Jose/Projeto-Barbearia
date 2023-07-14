<?php
include("conexao.php");

echo '<body style="color: white;">';
echo '<h1 id="titulo"></h1>';
// Outro conteúdo PHP aqui
echo '</body>';

if (isset($_POST['Enviar'])) {

    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $dia = $_POST['dia'];
    $hora = $_POST['hora'];

    // Verificar a disponibilidade do horário
    $disponivel = verificarDisponibilidade($conexao, $dia, $hora);

    if ($disponivel) {
        // Horário está disponível, realizar a inserção no banco de dados
        $resul = mysqli_query($conexao, "INSERT INTO cadastro(nome, contato, dia, hora) VALUES ('$nome', '$contato', '$dia', '$hora')");
        if ($resul) {
            echo "Agendamento realizado com sucesso!";
            
            // Redirecionar para outra página com as informações
            $url = "finalizado.php?nome=" . urlencode($nome) . "&contato=" . urlencode($contato) . "&dia=" . urlencode($dia) . "&hora=" . urlencode($hora);
            header("Location: $url");
            exit;
        } else {
            echo "Ocorreu um erro ao realizar o agendamento. Por favor, tente novamente. <br>";
        }
   
    }
}

function verificarDisponibilidade($conexao, $dia, $hora) {
  
  // Retorne true se o horário estiver disponível e false caso contrário
  // Verificar se já existe um registro com o horário informado no banco de dados

  $query = "SELECT * FROM cadastro WHERE dia = '$dia' AND hora = '$hora'";
  $result = mysqli_query($conexao, $query);
  $numRows = mysqli_num_rows($result);

  if ($numRows > 0) {
      return false; // Horário indisponível
  } else {
      return true; // Horário disponível
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
  <link rel="stylesheet" href="agendamentocss.css">
  <title>BARBERSHOP</title>

  <script>
    hoje = new Date();
    document.write("Data e hora completa: " + hoje);

  </script>

</head>

<body>


    <hr>

    <img src="https://img.freepik.com/free-vector/barber-shop-hair-styling-tools-supplies-set-realistic-monochrome-top-view-with-shaving-brush-vector-illustration_1284-30216.jpg?w=2000" alt="topo do rodapé">
    <hr>
    <br>

    <h1 id="titulo"> BARBERSHOP COR E ARTE </h1>

    <br>
    <hr>
    <a class="btn btn-outline-warning" href="index.php" role="button">Página Inicial</a>
    <a class="btn btn-outline-warning" href="foto.php" role="button">Estilo de Cortes</a>
    <a class="btn btn-outline-warning" href="agendamento.php" role="button">Agendamento</a>
    <a class="btn btn-outline-warning" href="contato.php" role="button">Contato</a>

    <hr>
    <h3>Faça seu agendamento e receba </h3>
    <h3> 10% </h3>
    <h3>em seu corte</h3>

    <hr>

    <form method="POST" action="agendamento.php">

    <p> Nome: </p>
      <input type="text" name="nome" value="" placeholder="Digite o seu nome " required>
      <br>

    <p> Contato: </p> 
      <input type="number" name="contato" value="" placeholder="Digite seu número" required>
      <br>
      <label for="agendar">Agendar</label>
<br>
<input type="date" id="dia" name="dia" min="<?php echo date('Y-m-d'); ?>">
  
        <br>
      <p></p>

      <label for="hora">Hora:</label>
      <select name="hora" required>
        <option value="09:00" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '09:00')) ? '' : 'disabled'; ?>>09:00 Manhã</option>
        <option value="09:30" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '09:30')) ? '' : 'disabled'; ?>>09:30 Manhã</option>
        <option value="10:00" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '10:00')) ? '' : 'disabled'; ?>>10:00 Manhã</option>
        <option value="10:30" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '10:30')) ? '' : 'disabled'; ?>>10:30 Manhã</option>
        <option value="11:00" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '11:00')) ? '' : 'disabled'; ?>>11:00 Manhã</option>
        <option value="11:30" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '11:30')) ? '' : 'disabled'; ?>>11:30 Manhã</option>
        <option value="12:00" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '12:00')) ? '' : 'disabled'; ?>>12:00 Tarde</option>
        <option value="12:30" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '12:30')) ? '' : 'disabled'; ?>>12:30 Tarde</option>
        <option value="14:00" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '14:00')) ? '' : 'disabled'; ?>>14:00 Tarde</option>
        <option value="14:30" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '14:30')) ? '' : 'disabled'; ?>>14:30 Tarde</option>
        <option value="15:00" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '15:00')) ? '' : 'disabled'; ?>>15:00 Tarde</option>
        <option value="15:30" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '15:30')) ? '' : 'disabled'; ?>>15:30 Tarde</option>
        <option value="16:00" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '16:00')) ? '' : 'disabled'; ?>>16:00 Tarde</option>
        <option value="16:30" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '16:30')) ? '' : 'disabled'; ?>>16:30 Tarde</option>
        <option value="17:00" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '17:00')) ? '' : 'disabled'; ?>>17:00 Noite</option>
        <option value="17:30" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '17:30')) ? '' : 'disabled'; ?>>17:30 Noite</option>
        <option value="18:00" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '18:00')) ? '' : 'disabled'; ?>>18:00 Noite</option>
        <option value="18:30" <?php echo (verificarDisponibilidade($conexao, date('Y-m-d'), '18:30')) ? '' : 'disabled'; ?>>18:30 Noite</option>
        <!-- Resto das opções do select com a lógica de disponibilidade -->
       
        
     

      <br>
      <p></p>

      <input type="reset" value="Limpar">
      <br>
      <p></p>
      <input type="submit" value="Enviar" name="Enviar">
      <hr>

      
    </form>
    
    <h3>Horário de funcionamento</h3>
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
        <hr>
        

      </table>
      <hr>


</body>

</html>
