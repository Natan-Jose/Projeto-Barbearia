<?php

//Conexão com o Banco de Dados

$hostname = "localhost";
$bancodedados = "agendamento";
$usuario = "root"; 
$senha = "";

//conexão criada
$conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);

if ($conexao->connect_error) { //Verifica erro
    die("Falha ao conectar ao banco de dados: " . $conexao->connect_error); //Mostra o número do erro e o erro 
} else
    echo "Conectado";