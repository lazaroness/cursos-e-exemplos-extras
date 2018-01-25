<?php
  include 'base.php';
  include 'cliente.online.php';
  include 'topo.php';
  echo "<div style='text-align:center;'>Bem-vindo(a) ".$_COOKIE['cliente']."</div>";
  include('cliente.menu.php');

  echo "<div id='base_corpo'>";
    echo "<div style='border: 1px solid #000000; padding: 5px; margin-bottom: 5px;'>";
      echo "ORÇAMENTOS EM FECHADOS";
    echo "</div>";
    if(is_blank($cliente->orcamentos_fechados()) == 'sim'):
      echo "<div id='orcamentos_fechados' style='width: 100%; color: #ff0000;'>Nenhum registro encontrado.</div>";
    endif;
    foreach ($cliente->orcamentos_fechados() as $orcamento):
      echo "<div id='orcamentos_fechados' style='width: 100%;'>";
        echo "{$orcamento->to_s()}&nbsp;";
        echo "<a href='cliente.orcamento_detalhes.php?id={$orcamento->id}'>";
          echo "<img src='{$img}detalhes.png' alt='Detalhes' title='Detalhes' />";
        echo "</a>";
        echo "<hr />";
      echo "</div>";
    endforeach;
  echo "</div>";

  include 'rodape.php';
?>
