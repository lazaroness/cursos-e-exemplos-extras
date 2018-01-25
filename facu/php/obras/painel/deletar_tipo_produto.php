<?php

    include ('seguranca.php');

    $obj = TipoProduto::find($_REQUEST['tipo_produto_id']);
    $obj->delete();

    echo "<script>";
    echo "window.location='list_tipo_produto.php?message=Operação realizada com Sucesso!';";
    echo "</script>";

?>