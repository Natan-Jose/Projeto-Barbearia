<?php

// Obtém a data atual no formato "Y-m-d"
$dataAtual = date("Y-m-d"); 

// Obtém a data do dia anterior
$dataAnterior = date("Y-m-d", strtotime("-12 day")); 

// Query para excluir os agendamentos do dia anterior
$query = "DELETE FROM cadastro WHERE dia = '$dataAnterior'"; 


// Executa a query no banco de dados
$resultado = mysqli_query($conexao, $query); 

if ($resultado) {
    echo "Os agendamentos do dia anterior foram deletados com sucesso.<br>"; 
} else {
    echo "Ocorreu um erro ao deletar os agendamentos do dia anterior.<br>"; 
}
?>