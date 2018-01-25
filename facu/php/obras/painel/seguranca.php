<?php
    session_start();
    $acesso = $_SESSION["acesso"];
    if($acesso != 'true'):
        header("Location: index.php?erro=Acesso Negado!");
    endif;

    require '../config/config.php';
    $online = Usuario::find($_SESSION['usuario_id']);
?>