<?php
include("conexao.php");

if (isset($_POST['Enviar'])) {
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $rating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_STRING);
  $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);

    $query = "INSERT INTO feedback (nome, email, rating, comments) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $rating);
    $stmt->bindParam(4, $comments);
    $stmt->execute();

    echo "<script>alert(\"Feedback enviado com sucesso!\")</script>";
  }

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
                <input type="text" name="nome" placeholder="Seu nome" required>
                <br>
                <br>


                <label for="email">Email:</label>
                <input type="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}"placeholder="exemplo@dominio.com" required>
                <br>
                <br>

                <label for="rating">Avaliação:</label>
                <select  name="rating" required>
                <option value="">----</option>
                    <option value="5">5 estrelas</option>
                    <option value="4">4 estrelas</option>
                    <option value="3">3 estrelas</option>
                    <option value="2">2 estrelas</option>
                    <option value="1">1 estrela</option>
                </select>
                <br>
                

                <br>
                <label for="comments">Comentários:</label>
                <br>
                <textarea  name="comments" rows="4" placeholder="Digite aqui..." required></textarea>
                <br>
                <br>
                <input type="submit" value="Enviar" name="Enviar">
            </form>
        
    

    <p>&copy; 2023 BARBERSHOP COR E ARTE. Todos os direitos reservados.</p>

</body>
</html>
