<?php
  require 'config/config.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST' OR $_GET['new_cadastro']):
    $login    = (isset($_REQUEST['login'])) ? $_REQUEST['login'] : '';
    $password = (isset($_REQUEST['password'])) ? $_REQUEST['password'] : '';
    $msg      = "Login ou Senha invalida!";

    if(is_blank($login) == 'sim' OR is_blank($password) == 'sim'):
      unset($_COOKIE['cliente_id'], $_COOKIE['cliente'], $_COOKIE['tipo']);
      header("Location: login.php?msg={$msg}");
    else:
      $cliente = Cliente::last(array('conditions' => array('email = ? AND senha = ?', $login, md5($password))));
      if(is_blank($cliente) == 'nao'):
        session_start();
        setcookie("cliente_id", $cliente->id, time()+3600); /* expira em 1 hora */
        setcookie("cliente", $cliente->nome, time()+3600); /* expira em 1 hora */
        setcookie("tipo", $cliente->tipo, time()+3600); /* expira em 1 hora */
        header("Location: cliente.home.php");
      else:
        unset($_COOKIE['cliente_id'], $_COOKIE['cliente'], $_COOKIE['tipo']);
        header("Location: login.php?msg={$msg}");
      endif;
    endif;
  endif;
?>
