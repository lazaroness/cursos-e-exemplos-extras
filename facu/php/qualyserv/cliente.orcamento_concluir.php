<?php
  require 'config/config.php';
  include 'cliente.online.php';

  $orcamento = Orcamento::find($_REQUEST['id']);
  if(is_blank($orcamento->endereco_id) == 'sim'):
    $msg = "Orçamento não possui endereço.";
    header("Location: cliente.novo_orcamento.php?id={$orcamento->id}&msg={$msg}");
  else:
    $orcamento->concluido = 'true';
    $orcamento->save();
    include('librarys/enviar_email.php');
    enviar_email($cliente, array('assunto' => "{$cliente->nome}: seu orçamento foi concluido!!!", 'template' => 'cliente.orcamento_concluido'));
    header("Location: cliente.orcamento_detalhes.php?id=".$orcamento->id);
  endif;
?>
