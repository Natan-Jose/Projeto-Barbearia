<?php

$host = "localhost";
$user = "natan";
$db_password = "123123";
$db_name = "agendamento";

try {
    $conn = new PDO("mysql:host=$host; dbname=" . $db_name, $user, $db_password);
    //echo "conectou";
} catch (PDOException $err) {
    echo "Erro conexão" . $err->getMessage();
}

?>