<?php
  $helper = true;
  require 'config/config.php';

  if(isset($_POST['save'])):
    $cnpj = $_POST['cnpj'];
    $empresa = Empresa::find('last', array('conditions' => array('cnpj = ?', $cnpj)));
    if(!empty($empresa)):
      $empresa->reset();
      #------------------------------------------
      # ENVIANDO O EMAIL COM O LINK
      #------------------------------------------
      include('librarys/enviar_email.php');
      enviar_email($empresa, array('assunto' => "{$empresa->nome_fantasia}: Solicitação de redefinição de senha!!!", 'template' => 'empresa.link_reset2'));
      $msg = "Enviamos um e-mail para você com as instruções.";
      header("Location: login.php?msg={$msg}");
    else:
      $msg = "Não foi encontrado nenhum cadastro com o CPF/CNPJ: {$cnpj}";
      header("Location: login.php?msg={$msg}");
    endif;
  else:
    header("Location: index.php");
  endif;
?>
