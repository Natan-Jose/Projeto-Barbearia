<?php
include("conexao.php");

echo '<body style="color: white;">';
echo '<h1 id="titulo"></h1>';
// Outro conteúdo PHP aqui
echo '</body>';

// Verifica se o formulário foi submetido
if (isset($_POST['Enviar'])) {

 // Sanitização e validação dos dados de entrada
 $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
 $contato = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_STRING);
 $dia = filter_input(INPUT_POST, 'dia', FILTER_SANITIZE_STRING);
 $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);

  // Validação do campo "Nome"
  if (empty($nome)) {
    $erroNome = "O campo Nome é obrigatório.";
  } elseif (!preg_match("/^[A-Za-zÀ-ú\s]+$/", $nome)) {
    $erroNome = "O campo Nome só pode conter letras e espaços em branco.";
  } elseif (strlen($nome) > 50) {
    $erroNome = "O campo Nome não pode ter mais de 50 caracteres.";
  }

/*
    // Validação do campo "Contato"
  if (strlen($contato) !== 15) {
    $erroContato = "O campo Contato deve ter exatamente 15 caracteres.";
  } elseif (!preg_match("/^\(\d{2}\)\s?\d{4}-\d{4}$/", $contato)) {
    $erroContato = "O campo Contato deve estar no formato (00) 0000-0000.";
  } else {
    // O campo "contato" é válido, continue com o restante do código aqui
  }
*/

// Validação do campo "Dia"
if (empty($dia)) {
  $erroDia = "O campo Dia é obrigatório.";
} elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $dia)) {
  $erroDia = "O campo Dia deve estar no formato AAAA-MM-DD.";
} else {
  $dataAtual = date('Y-m-d');
  if ($dia < $dataAtual) {
    $erroDia = "Selecione uma data futura para o campo Dia.";
  } elseif (strtotime($dia) === false) {
    $erroDia = "A data informada é inválida.";
  }
}


// Validação do campo "Hora"
if (empty($hora)) {
  $erroHora = "O campo Hora é obrigatório.";
} else {
  $horariosFuncionamento = [
    '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30',
    '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30',
    '18:00', '18:30'
  ];
  
  if (!in_array($hora, $horariosFuncionamento)) {
    $erroHora = "Selecione um horário válido para o campo Hora.";
  }
}

  // Verifica se há erros de validação
  if (isset($erroNome) || isset($erroDia) || isset($erroHora)) {
    // Exibe os erros para o usuário
    echo "Houve erros no preenchimento do formulário:";
    echo "<ul>";

    if (isset($erroNome)) {
      echo "<li>$erroNome</li>";
    }

    
    if (isset($erroDia)) {
      echo "<li>$erroDia</li>";
    }
    if (isset($erroHora)) {
      echo "<li>$erroHora</li>";
    }
    echo "</ul>";

  } else {

    // Verificar a disponibilidade do horário
    $disponivel = verificarDisponibilidade($conexao, $dia, $hora);

    if ($disponivel) {
      // Horário está disponível, realizar a inserção no banco de dados
      
      // Escapar os valores dos campos do formulário
      $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
      $contato = mysqli_real_escape_string($conexao, $_POST['contato']);
      $dia = mysqli_real_escape_string($conexao, $_POST['dia']);
      $hora = mysqli_real_escape_string($conexao, $_POST['hora']);
      
      // Remover caracteres especiais dos valores
      $nome = htmlspecialchars($nome);
      $contato = htmlspecialchars($contato);
      $dia = htmlspecialchars($dia);
      $hora = htmlspecialchars($hora);
      
      // Inserir os valores no banco de dados
      $query = "INSERT INTO cadastro (nome, contato, dia, hora) VALUES (?, ?, ?, ?)";
      $stmt = $conexao->prepare($query);
      $stmt->bind_param("ssss", $nome, $contato, $dia, $hora);
      $stmt->execute();
      
      // Redirecionar para outra página com as informações
      $url = "finalizado.php?nome=" . urlencode($nome) . "&contato=" . urlencode($contato) . "&dia=" . urlencode($dia) . "&hora=" . urlencode($hora);
      header("Location: $url");
      exit;
    } else {
      echo "Desculpe, o horário selecionado já está preenchido. Por favor, escolha outro horário. <br>";
    }
  }
}

function verificarDisponibilidade($conexao, $dia, $hora)
{
  // Retorne true se o horário estiver disponível e false caso contrário
  // Verificar se já existe um registro com o horário informado no banco de dados

  $query = "SELECT * FROM cadastro WHERE dia = ? AND hora = ?";
  $stmt = $conexao->prepare($query);
  $stmt->bind_param("ss", $dia, $hora);
  $stmt->execute();
  $result = $stmt->get_result();
  $numRows = $result->num_rows;

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
  <link rel="stylesheet" href="agendamento.css">
  <title>BARBERSHOP</title>

  <script>
    hoje = new Date();
    document.write("Data e hora completa: " + hoje);

  </script>

</head>



<body>

<br>
  <hr>

  <img
    src="https://img.freepik.com/free-vector/barber-shop-hair-styling-tools-supplies-set-realistic-monochrome-top-view-with-shaving-brush-vector-illustration_1284-30216.jpg?w=2000"
    alt="topo do rodapé">
 <br>
  <hr>
  <a class="btn btn-outline-warning" href="index.php" role="button">Página Inicial</a>
  <a class="btn btn-outline-warning" href="foto.php" role="button">Estilo de Cortes</a>
  <a class="btn btn-outline-warning" href="agendamento.php" role="button">Agendamento</a>
  <a class="btn btn-outline-warning" href="contato.php" role="button">Contato</a>

  <hr>
  <h3>Faça seu agendamento</h3>
  

  <form id="formulario" method="POST" action="agendamento.php">

    <p> Nome: </p>
    <input type="text" value="" name="nome" id="" placeholder="Digite o seu nome" pattern="[A-Za-zÀ-ú\s]+" maxlength="50" required>
    <br>

    <p> Contato: </p>
    <input type="" value="" name="contato" id="contato" placeholder="(00) 0000-0000" maxlength="15" required>
    <br>
    
    <label for="dia">Agendar</label>
    <br>
    <input type="date" value="" name="dia" id="dia" min="<?php echo date('Y-m-d'); ?>" required>

    <br>
    <p></p>


    <label for="hora">Hora:</label>
    <select name="hora" required>
      <option value=>Horários</option>
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
  // Função para validar o formulário antes de enviar
  function validarFormulario() {
    var formulario = document.getElementById('formulario');
    var nome = document.getElementsByName('nome')[0].value;
    var contato = document.getElementById('contato').value;
    var dia = document.getElementById('dia').value;
    var hora = document.getElementsByName('hora')[0].value;

    // Verifica se todos os campos foram preenchidos corretamente
    if (nome.trim() === '' || contato.trim() === '' || dia.trim() === '' || hora.trim() === '') {
      formulario.disabled = true; // Desabilita o formulário
    } else {
      formulario.disabled = false; // Habilita o formulário
    }
  }

  
  
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

  // Evento que chama a função validarFormulario ao alterar qualquer campo do formulário
  document.getElementById('formulario').addEventListener('change', validarFormulario);

  // Função para validar o formulário antes de enviar
  function validarFormulario() {
    var formulario = document.getElementById('formulario');
    var contato = document.getElementById('contato').value;

    // Verifica se o campo de contato tem exatamente 15 caracteres
    if (contato.length !== 15) {
      alert("O campo Contato deve ter exatamente 15 caracteres.");
      return false; // Impede o envio do formulário
    }

    
    // Se todas as validações passarem, o formulário pode ser enviado
    return true;
  }
</script>
</body>
</html>
