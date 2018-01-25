<?php
  require 'config/config.php';

  $cliente = Cliente::find($_POST['cliente_id']);

  $dados = array('senha' => md5($_POST['senha']), 'confirmacao' => md5($_POST['confirmacao_senha']));
  if($cliente->trocar_senha($dados) == true):
    include('librarys/enviar_email.php');
    enviar_email($cliente, array('assunto' => "{$cliente->nome}: Senha atualizada com sucesso!!!", 'template' => 'cliente.password_reset'));
    $errors = "Atualização efetuada com sucesso!!!";
    header("Location: login.php?errors={$errors}");
  else:
    $errors = "Dados invalidos!";
    header("Location: login.php?errors={$errors}");
  endif;
?>
