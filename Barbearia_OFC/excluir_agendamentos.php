<?php
// Obtém a data atual no formato "Y-m-d"
$dataAtual = date("Y-m-d");

// Obtém a data do dia anterior
$dataAnterior = date("Y-m-d", strtotime("-1 day"));

// Query preparada para excluir os agendamentos do dia anterior
$query = "DELETE FROM cadastro WHERE dia = :dataAnterior"; //prevenir ataques de injeção de SQL

// Prepara a query
$stmt = $conn->prepare($query);

// Atribui o valor do parâmetro da data anterior
$stmt->bindValue(':dataAnterior', $dataAnterior);

// Executa a query preparada
$stmt->execute();

// Fecha a conexão com o banco de dados 
$conn = null;
?>