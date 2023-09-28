<?php

$dataAtual = date("Y-m-d");

$dataAnterior = date("Y-m-d", strtotime("-1 day"));

$query = "DELETE FROM cadastro WHERE dia = :dataAnterior";

// Prepara a query
$stmt = $conn->prepare($query);

// Atribui o valor do parâmetro da data anterior
$stmt->bindValue(':dataAnterior', $dataAnterior);

// Executa a query preparada
$stmt->execute();

// Fecha a conexão com o banco de dados 
$conn = null;

?>