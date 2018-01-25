<?php
  include('base.php');
  include('empresa.online.php');
  include('topo.php');
  echo "<div style='text-align:center;'>Bem-vindo(a) ".$_COOKIE['empresa']."</div>";
  include('empresa.menu.php');

  echo "<div id='base_corpo'>";
    echo "<div style='width: 100%; height: auto;'>";
      echo "<div style='border: 1px solid #000000; padding: 5px; margin-bottom: 5px;'>";
        echo "PERFIL:&nbsp;";
        echo "<a href='empresa.form.php'>";
          echo "<img src='{$img}editar.png' title='Editar' alt='Editar' />";
        echo "</a>";
      echo "</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Razão Social:</strong>&nbsp;{$empresa->razao_social}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Nome Fantasia:</strong>&nbsp;{$empresa->nome_fantasia}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>CNPJ:</strong>&nbsp;{$empresa->cnpj}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>IE:</strong>&nbsp;{$empresa->inscricao_estadual}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Data Fundação:</strong>&nbsp;{$empresa->data_fundacao}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Email:</strong>&nbsp;{$empresa->email}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Site:</strong>&nbsp;";
        echo "<a href='http://{$empresa->site}' target='_blank' style='text-decoration: none; color: #333333;'>{$empresa->site}</a>";
      echo "</div>";
      echo "<div id='perfil' style='width: 100%; text-align: center;'><strong>Endereço</strong></div>";
      echo "<hr />";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>CEP:</strong>&nbsp;{$empresa->cep}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Logradouro:</strong>&nbsp;{$empresa->logradouro}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Número:</strong>&nbsp;{$empresa->numero}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Cidade:</strong>&nbsp;{$empresa->cidade}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Bairro:</strong>&nbsp;{$empresa->bairro}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Complemento:</strong>&nbsp;{$empresa->complemento}</div>";
      echo "<div id='perfil' style='width: 100%; text-align: left;'><strong>Estado:</strong>&nbsp;{$empresa->estado}</div>";
      echo "<br />";
    echo "</div>";

    include 'empresa.telefones.php';

  echo "</div>";

  include 'rodape.php';
?>
