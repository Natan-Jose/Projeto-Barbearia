<?php
function setAgendamentoCookie($nome, $contato, $dia, $hora) {
    setcookie('agendamento_nome', $nome, time() + 3600, '/'); 
    setcookie('agendamento_contato', $contato, time() + 3600, '/'); 
    setcookie('agendamento_dia', $dia, time() + 3600, '/'); 
    setcookie('agendamento_hora', $hora, time() + 3600, '/'); 
}

?>
