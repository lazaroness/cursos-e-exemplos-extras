<?php

    include ('seguranca.php');

    $usuario_id = $_REQUEST['usuario_id'];
    $path       = $_REQUEST['path'];

    $permissao = UsuarioPermissao::find_by_path_and_usuario_id($path, $usuario_id);
    $permissao->delete();

    echo "<script>";
    echo "window.location='permissao_usuario.php?usuario_id=".$usuario_id."&message=Operação realizada com Sucesso!';";
    echo "</script>";

?>