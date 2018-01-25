<?php
  include 'base.php';
  include 'cliente.online.php';
  include 'topo.php';
  echo "<div style='text-align:center;'>Bem-vindo(a) {$_COOKIE['cliente']}</div>";
  include('cliente.menu.php');

  echo "<div id='base_corpo'>";
    echo "<h3>ORÇAMENTOS</h3>";
    echo "<table style='border: 1px black inset; border-radius: 5px; width: 100%;'>";
      echo "<tr><td style='text-align: center;'>";
        echo "<a href='cliente.orcamentos_abertos.php'>";
          echo "<img src='".$img."folder_open.png' title='Abertos' alt='Abertos' />";
        echo "</a>";
        echo "&nbsp;&nbsp;&nbsp;";
        echo "<a href='cliente.orcamentos_fechados.php'>";
          echo "<img src='".$img."folder_closed.png' title='Fechados' alt='Fechados' />";
        echo "</a>";
      echo "</td></tr>";
    echo "</table>";
  echo "</div>";

  include 'rodape.php';
?>
