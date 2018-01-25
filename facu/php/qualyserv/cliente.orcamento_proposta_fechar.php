<?php
  require 'config/config.php';
  include 'cliente.online.php';

  $proposta = Proposta::find($_REQUEST['id']);
  if(is_blank($proposta) == 'sim'):
    echo "Registro não encontrado.";
  else:
    $proposta->fechado = 'true';
    $proposta->save();
    $orcamento = $proposta->orcamento();
    $orcamento->fechado = 'true';
    $orcamento->save();
    include('librarys/enviar_email.php');
    enviar_email($orcamento->cliente(), array('assunto' => "{$orcamento->cliente()->to_s()}: você aceitou a proposta!!!", 'template' => 'cliente.proposta_aceita'));
    enviar_email($proposta->empresa(), array('assunto' => "{$proposta->empresa()->to_s()}: sua proposta foi aceita!!!", 'template' => 'empresa.proposta_aceita', 'carregar' => 'false'));
    $msg = "Operação efetuada com sucesso.";
    header("Location: cliente.orcamentos_fechados.php?msg={$msg}");
  endif;
?>
