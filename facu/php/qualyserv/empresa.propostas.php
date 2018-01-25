<?php
  include 'base.php';
  include 'empresa.online.php';
  include 'topo.php';
  echo "<div style='text-align:center;'>Bem-vindo(a) {$_COOKIE['empresa']}</div>";
  include 'empresa.menu.php';

  echo "<div id='base_corpo'>";
    echo "<h3>PROPOSTAS</h3>";
    echo "<table style='border: 1px black inset; border-radius: 5px; width: 100%;'>";
      echo "<tr><td style='text-align: center;'>";
        echo "<a href='empresa.propostas_abertas.php'>";                  
          echo "<img src='".$img."folder_open.png' title='Abertas' alt='Abertas' />";
        echo "</a>";
        echo "&nbsp;&nbsp;&nbsp;";
        echo "<a href='empresa.propostas_fechadas.php'>";
          echo "<img src='".$img."folder_closed.png' title='Fechadas' alt='Fechadas' />";
        echo "</a>";
      echo "</td></tr>";
    echo "</table>";
  echo "</div>";

  include 'rodape.php';
?>
