<?php

    include ('seguranca.php');

    $obj = Usuario::find($_REQUEST['usuario_id']);
    $obj->delete();

    echo "<script>";
    echo "window.location='filtrar_usuario.php?message=Operação realizada com Sucesso!';";
    echo "</script>";

?>