<?php
function setTelefoneCookie($contato) {
    setcookie('telefone_contato', $contato, time() + 3600, '/'); // Cookie válido por 1 hora
}
?>
