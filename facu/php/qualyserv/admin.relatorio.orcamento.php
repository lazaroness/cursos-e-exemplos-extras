<?php
  include('base.php');
  include('admin.online.php');
  include('topo.php');
  echo "<div style='text-align:center;'>Bem-vindo(a) ".$_COOKIE['usuario']."</div>";
  include('admin.menu.php');

  echo "<div id='base_corpo'>";
    echo "Orçamento";
  echo "</div>";

  include 'rodape.php';
?>
