<?php
  session_start();
  require '../config/config.php';

  $email = $_REQUEST['email'];
  $senha = $_REQUEST['senha'];

  if($email == "" or $senha == ""):
    header("location: index.php?erro=Login ou senha incorreta!");
  else:
    $senha = md5($senha);
  endif;

  $obj = Usuario::find_by_email_and_senha_and_ativo($email, $senha, 1);
  if($obj == ""):
    header("location: index.php?erro=Login ou senha incorreta!");
  else:
    $_SESSION["usuario_id"]  = $obj->usuario_id;
    $_SESSION["usuario"]     = $obj->nome;
    $_SESSION["email"]       = $obj->email;
    $_SESSION["acesso"]      = 'true';
    $_SESSION['data_inicio'] = date(DATE_W3C);
    header("location: home.php");
  endif;

?>