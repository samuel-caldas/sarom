<?php
/* Inicia a sessão */
session_start();
/* Destrói toda sessão */
session_destroy();
/* Apaga Varuaveis */
unset($_SESSION);
/* Redireciona */
header('Location: ../?erro=descon');
?>