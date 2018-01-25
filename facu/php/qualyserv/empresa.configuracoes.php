<?php
  include 'base.php';
  include 'empresa.online.php';
  include 'topo.php';
  include 'empresa.menu.php';

  echo "<div id='base_corpo'>";
    echo "<h1>Configurações</h1>";
    if(isset($_REQUEST['msg'])):
      echo "<div id='msg'>";
      echo "<img src='{$img}alerta.png' />&nbsp;&nbsp;{$_REQUEST['msg']}";
      echo "</div>";
      echo "<script>";
        echo "$('#msg').effect('pulsate');";
      echo "</script>";
    endif;

    # SERVIÇOS PRESTADOS
    echo "<h2 style='text-align: left;'>Serviçõs Prestados:</h2>";
    echo "<form id='form' method='post' action='empresa.configuracoes_do.php'>";
      echo "<table id='servicos_prestados'>";
        echo "<tr><th colspan='2'>Serviço</th></tr>";
        $servicos   = Servicos::find('all');
        $empresa_id = $_COOKIE['empresa_id'];
        foreach($servicos as $servico):
          echo "<tr>";
            echo "<td>";
              $empresa_servico = EmpresaServicos::find('last', array('conditions' => array('servico_id = ? and empresa_id = ?', $servico->id, $empresa_id)));
              if(is_blank($empresa_servico) == 'sim'):
                echo "<input type='checkbox' name='servico_{$servico->id}' value='{$servico->id}' />";
              else:
                echo "<input type='checkbox' name='servico_{$servico->id}' value='{$servico->id}' checked />";
              endif;
            echo "</td>";
            echo "<td style='text-align: left;'>{$servico->descricao}</td>";
          echo "</tr>";
        endforeach;
        echo "<tr>";
          echo "<td colspan='2' style='text-align=center;'>";
            echo "<input class='button' name='save' id='save' type='submit' value='GRAVAR' />";
          echo "</td>";
        echo "</tr>";
      echo "</table>";
    echo "</form>";
  echo "</div>";

  include 'rodape.php';
?>
