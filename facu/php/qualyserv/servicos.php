<?php
  include 'base.php';
  include 'topo.php';
  include 'menu.php';
?>
<div id='base_corpo'>
  <table id='servicos'>
   <tr>
     <th style='text-align: center;'>Serviços Prestados</th>
   </tr>
   <?php
     $servicos = Servicos::find('all');
     foreach ($servicos as $servico):
       echo "<tr><td>".$servico->descricao."</td></tr>";
       #echo $servico->to_json();
       #echo $servico->to_xml();
     endforeach;
   ?>
  </table>
</div>
<?php
  include 'rodape.php';
  echo "</html>";
?>
