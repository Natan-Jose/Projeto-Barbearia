<?php

// Obtém a data atual no formato "Y-m-d"
$dataAtual = date("Y-m-d");

// Obtém a data do dia anterior
$dataAnterior = date("Y-m-d", strtotime("-1 day"));

// Query preparada para excluir os agendamentos do dia anterior
$query = "DELETE FROM cadastro WHERE dia = ?";

// Prepara a query
$stmt = mysqli_prepare($conexao, $query);

// Verifica se a preparação da query foi bem-sucedida
if ($stmt) {
    // Atribui o valor do parâmetro da data anterior
    mysqli_stmt_bind_param($stmt, "s", $dataAnterior);

    // Executa a query preparada
    mysqli_stmt_execute($stmt);

    // Verifica se a exclusão foi bem-sucedida
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Os agendamentos do dia anterior foram deletados com sucesso.<br>";
    } else {
        echo "Não foram encontrados agendamentos para o dia anterior.<br>";
    }

    // Fecha a declaração preparada
    mysqli_stmt_close($stmt);
} else {
    echo "Ocorreu um erro ao preparar a query.<br>";
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);









