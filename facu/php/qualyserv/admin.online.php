<?php
  if(!isset($_COOKIE['usuario_id']) OR $_COOKIE['usuario_id'] == '.'):
    $msg = "Seção invalida!";
    header("Location: login.php?msg=".$msg);
  else:
    $usuario = Admin::find($_COOKIE['usuario_id']);
  endif;
?>
