<?php
  include 'base.php';
  include 'empresa.online.php';
  include 'topo.php';
  echo "<div style='text-align:center;'>Bem-vindo(a) {$_COOKIE['empresa']}</div>";
  include 'empresa.menu.php';

  echo "<div id='base_corpo'>";
    echo "<hr />";
    echo "<h4>ORÇAMENTOS DISPONIVEIS</h4>";
    echo "<hr />";
    echo "<div style='width: 100%; height: auto;'>";
      if(is_blank($empresa->orcamentos_disponiveis()) == 'sim'):
        echo "<div id='endereco' style='width: 100%;'>";
          echo "<font color='#ff0000'>Nenhum registro encontrado</font>";
        echo "</div>";
      endif;
      foreach($empresa->orcamentos_disponiveis() as $orcamento):
        echo "<div id='endereco' style='width: 100%;'>";
          echo $orcamento->to_s();
          echo "&nbsp;<a href='empresa.orcamento_detalhes.php?id={$orcamento->id}'>";
            echo "<img src='{$img}detalhes.png' alt='Detalhes' title='Detalhes' />";
          echo "</a>";
          echo "<hr />";
        echo "</div>";
      endforeach;
    echo "</div>";
  echo "</div>";

  include 'rodape.php';
?>
