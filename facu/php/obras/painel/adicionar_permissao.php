<?php

    include ('seguranca.php');

    $usuario_id = $_REQUEST['usuario_id'];
    $path       = $_REQUEST['path'];

    $permissao = new UsuarioPermissao();
    $permissao->path       = $path;
    $permissao->usuario_id = $usuario_id;
    $permissao->save();

    if ($permissao->is_valid()):
        echo "<script>";
        echo "window.location='permissao_usuario.php?usuario_id=".$usuario_id."&message=Operação realizada com Sucesso!';";
        echo "</script>";
    endif;

?>