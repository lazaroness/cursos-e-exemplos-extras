<?php
  include 'base.php';
  include('empresa.online.php');
  include('topo.php');
  echo "<div style='text-align:center;'>Bem-vindo(a) ".$_COOKIE['empresa']."</div>";
  include('empresa.menu.php');

  if(is_blank($_REQUEST['id']) == 'nao'):
    $orcamento = Orcamento::find($_REQUEST['id']);
  elseif(is_blank($_POST['orcamento_id']) == 'nao'):
    $orcamento = Orcamento::find($_POST['orcamento_id']);
  endif;

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
    echo "<h3>Orçamento Detalhes</h3>";
    echo "<hr />";
    echo "<div style='width: 100%; height: auto;'>";
      if(is_blank($orcamento) == 'sim'):
        echo "<div id='orcamento' style='width: 100%; color: #ff0000;'>Nenhum registro encontrado.</div>";
      else:
        echo "<div id='endereco' style='width: 100%;'>";
          echo "<b>Numero:</b> <font color='#ff0000'>{$orcamento->id}</font>";
        echo "</div>";
        echo "<div id='endereco' style='width: 100%;'>";
          echo "<b>Cliente:</b> <font color='#3d5c5c'>{$orcamento->cliente()->to_s()}</font>";
        echo "</div>";
        echo "<div id='endereco' style='width: 100%;'>";
          echo "<b>Endereço:</b> {$orcamento->endereco()->to_s()}";
        echo "</div>";
        echo "<br />";
        echo "<div style='border: 1px solid #000000; padding: 5px; margin-bottom: 5px;'>";
          echo "ITENS";
        echo "</div>";
        foreach($orcamento->itens() as $item):
          echo "<div id='endereco' style='width: 100%;'>";
            echo $item->to_s();
            echo "<hr />";
          echo "</div>";
        endforeach;
      endif;
    echo "</div>";

    echo "<br />";
    echo "<div style='border: 1px solid #000000; color: #ffffff; background-color: #595959; padding: 5px; margin-bottom: 5px;'>";
      echo "PROPOSTA";
    echo "</div>";
    include 'empresa.form_proposta.php';

  echo "</div>";

  include 'rodape.php';
?>
