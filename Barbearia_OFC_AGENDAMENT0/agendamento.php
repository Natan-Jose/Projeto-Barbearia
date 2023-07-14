<?php
include("conexao.php");

// Definir a hora limite para deletar os agendamentos (por exemplo, 23:59:59)
$horaLimite = "23:59:59";

// Obter a data atual
$dataAtual = date("Y-m-d");

// Obter a hora atual
$horaAtual = date("H:i:s");

// Executar a query para deletar os agendamentos
$query = "DELETE FROM cadastro WHERE agendar = '$dataAtual' AND hora = '$horaLimite' = '$horaAtual'";

$resultado = mysqli_query($conexao, $query);


if ($resultado) {
    echo "Os agendamentos foram deletados com sucesso.";
} else {
    echo "Ocorreu um erro ao deletar os agendamentos.";
}


if (isset($_POST['Enviar'])) {

    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $agendar = $_POST['agendar'];
    $hora = $_POST['hora'];

    // Verificar a disponibilidade do horário
    $disponivel = verificarDisponibilidade($conexao, $agendar, $hora);

    if ($disponivel) {
        // Horário está disponível, realizar a inserção no banco de dados
        $resul = mysqli_query($conexao, "INSERT INTO cadastro(nome, contato, agendar, hora) VALUES ('$nome', '$contato', '$agendar', '$hora')");
        if ($resul) {
            echo "Agendamento realizado com sucesso!";
            
            // Redirecionar para outra página com as informações
            $url = "Finalizado.php?nome=" . urlencode($nome) . "&contato=" . urlencode($contato) . "&agendar=" . urlencode($agendar) . "&hora=" . urlencode($hora);
            header("Location: $url");
            exit;
        } else {
            echo "Ocorreu um erro ao realizar o agendamento. Por favor, tente novamente.";
        }
    } else {
        echo "Desculpe, o horário selecionado já está preenchido. Por favor, escolha outro horário.";
    }
}

// Função para verificar a disponibilidade do horário
function verificarDisponibilidade($conexao, $agendar, $hora) {
    // Retorne true se o horário estiver disponível e false caso contrário
    // Verificar se já existe um registro com o horário informado no banco de dados

    $query = "SELECT * FROM cadastro WHERE agendar = '$agendar' AND hora = '$hora'";
    $result = mysqli_query($conexao, $query);
    $numRows = mysqli_num_rows($result);

    if ($numRows > 0) {
        return false; // Horário já preenchido
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
    <h3 id="desconto"> 10% </h3>
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
<input type="date" id="agendar" name="agendar" min="<?php echo date('Y-m-d'); ?>">
  
        <br>
      <p></p>

   
      <label for="hora">Hora:</label>
            <select name="hora" required>
            <option value="09:00">----</option>
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
                <option value="17:30">17:00 Noite</option>
                <option value="18:00">18:00 Noite</option>
                <option value="18:30">18:30 Noite</option>


      <br>
      <p></p>

      
      
      <input type="reset" value="Limpar">
      <br>
      <p></p>
      <input type="submit" value="Enviar" name="Enviar">
      <hr>
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


    </form>
</body>

</html>