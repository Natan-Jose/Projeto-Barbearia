<?php
// Obtém a data atual no formato "Y-m-d"
$dataAtual = date("Y-m-d");

// Obtém a data do dia anterior
$dataAnterior = date("Y-m-d", strtotime("-1 day"));

// Query preparada para excluir os agendamentos do dia anterior
$query = "DELETE FROM cadastro WHERE dia = :dataAnterior";

// Prepara a query
$stmt = $conn->prepare($query);

// Verifica se a preparação da query foi bem-sucedida
if ($stmt) {
    // Atribui o valor do parâmetro da data anterior
    $stmt->bindParam(':dataAnterior', $dataAnterior);

    // Executa a query preparada
    $stmt->execute();

    // Verifica se a exclusão foi bem-sucedida
    $numRows = $stmt->rowCount();
  
    $stmt = null;
} else {
    echo "Ocorreu um erro ao preparar a query.<br>";
}

// Fecha a conexão com o banco de dados 
$conn = null;
?>
