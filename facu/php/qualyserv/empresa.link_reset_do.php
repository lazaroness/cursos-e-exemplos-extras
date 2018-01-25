<?php
  require 'config/config.php';

  $empresa = Empresa::find($_POST['empresa_id']);

  $dados = array('senha' => md5($_POST['senha']), 'confirmacao' => md5($_POST['confirmacao_senha']));
  if($empresa->trocar_senha($dados) == true):
    include('librarys/enviar_email.php');
    enviar_email($empresa, array('assunto' => "{$empresa->nome_fantasia}: Senha atualizada com sucesso!!!", 'template' => 'empresa.password_reset'));
    $errors = "Atualização efetuada com sucesso!!!";
    header("Location: login.php?errors={$errors}");
  else:
    $errors = "Dados invalidos!";
    header("Location: login.php?errors={$errors}");
  endif;
?>
