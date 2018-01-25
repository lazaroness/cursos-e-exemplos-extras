<?php
  if(!isset($_COOKIE['cliente_id']) OR $_COOKIE['cliente_id'] == '.'):
    $errors = "Seção invalida!";
    header("Location: login.php?errors=".$errors);
  else:
    $cliente = Cliente::find($_COOKIE['cliente_id']);
  endif;
?>
