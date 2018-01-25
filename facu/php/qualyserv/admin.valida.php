<?php
  require 'config/config.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST'):
    $login    = (isset($_REQUEST['login'])) ? $_REQUEST['login'] : '';
    $password = (isset($_REQUEST['password'])) ? $_REQUEST['password'] : '';
    $msg      = "Login ou Senha invalida!";

    if(empty($login) OR empty($password)):
      unset($_COOKIE['usuario_id'], $_COOKIE['usuario']);
      header("Location: login.php?msg={$msg}");
    else:
      $usuario = Admin::last(array('conditions' => array('email = ? AND senha = ? AND arquivado = ?', $login, md5($password), 'false')));
      if(!empty($usuario)):
        session_start();
        setcookie("usuario_id", $usuario->id, time()+3600); /* expira em 1 hora */
        setcookie("usuario", $usuario->nome_completo, time()+3600); /* expira em 1 hora */
        header("Location: admin.home.php");
      else:
        unset($_COOKIE['usuario_id'], $_COOKIE['usuario']);
        header("Location: login.php?msg={$msg}");
      endif;
    endif;
  endif;
?>
