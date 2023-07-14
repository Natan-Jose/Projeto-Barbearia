<?php
$nome = $_GET['nome'];
$contato = $_GET['contato'];
$agendar = $_GET['agendar'];
$hora = $_GET['hora'];

// Exibir as informações na página
echo "Nome: $nome";
print_r('<br>');
echo "Contato: $contato";
print_r('<br>');
echo "Data: $agendar";
print_r('<br>');
echo "Hora: $hora";
print_r('<br>');

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BARBERSHOP</title>
</head>

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
<link rel="stylesheet" href="style.css">
<title>BARBERSHOP</title>
<script>
    hoje = new Date();
    document.write("Data e hora completa: " + hoje);
</script>


<body>

    <center>

        <hr>

        <img src="imagens/tópico1.png" width="1300" height="300" alt="topo do rodapé">
        <hr>
        <br>

        <h1 id="titulo"> BARBERSHOP COR E ARTE </h1>
        <br>
        <hr>

        <h1 id="ok">Cadastro realizado com sucesso!</h1>

        <hr>

        <a href="index.php">Clique aqui</a> Para voltar a página inicial.

        <hr>

        

    </center>
</body>

</html>
