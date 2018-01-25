<?php

    include ('seguranca.php');

    $obj = Funcionario::find($_REQUEST['funcionario_id']);
    $obj->delete();

    echo "<script>";
    echo "window.location='filtrar_funcionario.php?message=Operação realizada com Sucesso!';";
    echo "</script>";

?>