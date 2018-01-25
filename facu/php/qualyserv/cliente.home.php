<?php
  include('base.php');
  include('cliente.online.php');
  include('topo.php');
  echo "<div style='text-align:center;'>Bem-vindo(a) ".$_COOKIE['cliente']."</div>";
  include('cliente.menu.php');
  
  echo "<div id='base_corpo'>";
    echo "<div style='width: 100%; height: auto;'>";
      echo "<div style='border: 1px solid #000000; padding: 5px; margin-bottom: 5px;'>";
        echo "PERFIL:&nbsp;";
        echo "<a href='cliente.form.php'>";
          echo "<img src='{$img}editar.png' title='Editar' alt='Editar' />";
        echo "</a>";
      echo "</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Nome:</strong>&nbsp;{$cliente->nome}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Tipo:</strong>&nbsp;".ucwords($cliente->tipo)."</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>CPF/CNPJ:</strong>&nbsp;{$cliente->cpf_cnpj}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Data Nasc/Fund:</strong>&nbsp;{$cliente->data_nasc_fund}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Sexo:</strong>&nbsp;".ucwords($cliente->sexo)."</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>E-mail:</strong>&nbsp;{$cliente->email}</div>";
    echo "</div>";

    echo "<br />";

    include 'cliente.telefones.php';

    echo "<br />";

    include 'cliente.enderecos.php';

  echo "</div>";

  include 'rodape.php';
?>
