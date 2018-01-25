<?php
  require 'config/config.php';
  include 'cliente.online.php';

  $orcamento_item = OrcamentoItem::find($_REQUEST['id']);
  $orcamento_item->delete();
  header("Location: cliente.novo_orcamento.php?id=".$orcamento_item->orcamento_id);
?>
