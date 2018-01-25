<?php
  $helper = true;
  require 'config/config.php';

  if(isset($_POST['save'])):
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $cliente = Cliente::find('last', array('conditions' => array('cpf_cnpj = ?', $cpf_cnpj)));
    if(!empty($cliente)):
      $cliente->reset();
      #------------------------------------------
      # ENVIANDO O EMAIL COM O LINK
      #------------------------------------------
      include('librarys/enviar_email.php');
      enviar_email($cliente, array('assunto' => "{$cliente->nome}: Solicitação de redefinição de senha!!!", 'template' => 'cliente.link_reset2'));
      $msg = "Enviamos um e-mail para você com as instruções.";
      header("Location: login.php?msg={$msg}");
    else:
      $msg = "Não foi encontrado nenhum cadastro com o CPF/CNPJ: {$cpf_cnpj}";
      header("Location: login.php?msg={$msg}");
    endif;
  else:
    header("Location: index.php");
  endif;
?>
