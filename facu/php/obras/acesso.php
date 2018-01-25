<?php
  session_start();
  require 'config/config_login.php';

  $email = $_REQUEST['email'];
  $senha = $_REQUEST['senha'];

  if($email == "" or $senha == ""):
    header("location: index.php?erro=Login ou senha incorreta!");
  else:
    $senha = md5($senha);
  endif;

  $cliente = Cliente::find_by_email_and_senha_and_ativo($email, $senha, 1);
  if($cliente == ""):
    header("location: index.php?erro=Login ou senha incorreta!");
  else:
    $_SESSION["cliente_id"]  = $cliente->cliente_id;
    $_SESSION["email"]       = $cliente->email;
    $_SESSION["acesso"]      = 'true';
    $_SESSION['data_inicio'] = date(DATE_W3C);
    header("location: cliente/home.php");
  endif;

?>