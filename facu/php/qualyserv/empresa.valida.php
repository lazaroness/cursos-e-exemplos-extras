<?php
  require 'config/config.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST' OR $_GET['new_cadastro']):
    $login    = (isset($_REQUEST['login'])) ? $_REQUEST['login'] : '';
    $password = (isset($_REQUEST['password'])) ? $_REQUEST['password'] : '';
    $msg      = "Login ou Senha invalida!";

    if(is_blank($login) == 'sim' OR is_blank($password) == 'sim'):
      unset($_COOKIE['empresa_id'], $_COOKIE['empresa'], $_COOKIE['cnpj']);
      header("Location: login.php?msg={$msg}");
    else:
      $empresa = Empresa::last(array('conditions' => array('email = ? AND senha = ?', $login, md5($password))));
      if(is_blank($empresa) == 'nao'):
        session_start();
        setcookie("empresa_id", $empresa->id, time()+3600); /* expira em 1 hora */
        setcookie("empresa", $empresa->nome_fantasia, time()+3600); /* expira em 1 hora */
        setcookie("cnpj", $empresa->cnpj, time()+3600); /* expira em 1 hora */
        header("Location: empresa.home.php");
      else:
        unset($_COOKIE['empresa_id'], $_COOKIE['empresa'], $_COOKIE['cnpj']);
        header("Location: login.php?msg={$msg}");
      endif;
    endif;
  endif;
?>
