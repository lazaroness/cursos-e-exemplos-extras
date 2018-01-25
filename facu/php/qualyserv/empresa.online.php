<?php
  if(!isset($_COOKIE['empresa_id']) OR $_COOKIE['empresa_id'] == '.'):
    $errors = "Seção invalida!";
    header("Location: login.php?errors=".$errors);
  else:
    #require 'config/config.php';
    $empresa = Empresa::find($_COOKIE['empresa_id']);
  endif;
?>
