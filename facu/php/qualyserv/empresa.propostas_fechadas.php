<?php
  include 'base.php';
  include 'empresa.online.php';
  include 'topo.php';
  echo "<div style='text-align:center;'>Bem-vindo(a) {$_COOKIE['empresa']}</div>";
  include 'empresa.menu.php';

  echo "<div id='base_corpo'>";
    if(isset($_REQUEST['msg'])):
      echo "<div id='msg'>";
      echo "<img src='{$img}alerta.png' />&nbsp;&nbsp;{$_REQUEST['msg']}";
      echo "</div>";
      echo "<script>";
        echo "$('#msg').effect('pulsate');";
      echo "</script>";
    endif;
    echo "<hr />";
    echo "<h3>PROPOSTAS FECHADAS</h3>";
    echo "<hr /><br />";
    echo "<div style='width: 100%; height: auto;'>";
      if(is_blank($empresa->propostas_fechadas()) == 'sim'):
        echo "<div id='endereco' style='width: 100%;'>";
          echo "<font color='#ff0000'>Nenhum registro encontrado</font>";
        echo "</div>";
      endif;
      foreach($empresa->propostas_fechadas() as $proposta):
        echo "<div id='endereco' style='width: 100%;'>";
          echo $proposta->to_s();
          echo "<hr />";
        echo "</div>";
      endforeach;
    echo "</div>";
  echo "</div>";

  include 'rodape.php';
?>
