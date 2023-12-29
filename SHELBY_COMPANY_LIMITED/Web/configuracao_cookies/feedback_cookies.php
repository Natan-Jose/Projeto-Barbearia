<?php
function setFeedbackCookie($nome, $avaliacao, $mensagem) {
    setcookie('feedback_nome', $nome, time() + 3600, '/'); 
    setcookie('feedback_avaliacao', $avaliacao, time() + 3600, '/'); 
    setcookie('feedback_mensagem', $mensagem, time() + 3600, '/'); 
}
?>
