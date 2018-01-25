<?php
  include 'base.php';
  include('cliente.online.php');
  include('topo.php');
  echo "<div style='text-align:center;'>Bem-vindo(a) ".$_COOKIE['cliente']."</div>";
  include('cliente.menu.php');

  if(!empty($_REQUEST['id'])):
    $proposta = Proposta::find($_REQUEST['id']);
  endif;

  echo "<div id='base_corpo'>";
    echo "<div style='width: 100%; height: auto; text-align: right;'>";
      echo "<a href='javascript:history.back()' style='text-decoration: none; color: #8aac64;'>";
        echo "<img src='{$img}voltar.png' alt='Voltar' title='Voltar' />&nbsp;Voltar";
      echo "</a>";
    echo "</div>";
    echo "<hr />";
    echo "<h3>Avaliação Detalhes</h3>";
    echo "<hr />";
    echo "<div style='width: 100%; height: auto;'>";
      if(empty($proposta)):
        echo "<div id='orcamento' style='width: 100%; color: #ff0000;'>Nenhum registro encontrado.</div>";
      elseif(empty($proposta->avaliacao())):
        echo "<div id='orcamento' style='width: 100%; color: #ff0000;'>Nenhum registro encontrado.</div>";
      else:
        echo "<div id='endereco' style='width: 100%;'>";
          echo "<b>Num. Orçamento:</b> <font color='#ff0000'>{$proposta->orcamento_id}</font>";
        echo "</div>";
        echo "<div id='endereco' style='width: 100%;'>";
          echo "<b>Cliente:</b> <font color='#3d5c5c'>{$proposta->orcamento()->cliente()->to_s()}</font>";
        echo "</div>";
        echo "<div id='endereco' style='width: 100%;'>";
          if(empty($proposta->orcamento()->endereco_id)):
            echo "<b>Endereço:</b>&nbsp;<font color='#ff0000'>Nenhum registro encontrado.</font>";
          else:
            echo "<b>Endereço:</b>&nbsp;{$proposta->orcamento()->endereco()->to_s()}";
          endif;
        echo "</div>";
        echo "<br />";
        echo "<div style='border: 1px solid #000000; padding: 5px; margin-bottom: 5px;'>";
          echo "ITENS";
        echo "</div>";
        foreach($proposta->orcamento()->itens() as $item):
          echo "<div id='endereco' style='width: 100%;'>";
            echo $item->to_s();
            echo "<hr />";
          echo "</div>";
        endforeach;
      endif;
    echo "</div>";
    echo "<br />";

    echo "<div style='width: 100%; height: auto;'>";
      echo "<div style='border: 1px solid #000000; padding: 5px; margin-bottom: 5px;'>";
        echo "PROPOSTA FECHADA";
      echo "</div>";
      echo "<div id='proposta' style='width: 100%'>";
        echo $proposta->to_s();
        echo "&nbsp;<a href='cliente.empresa_detalhes.php?id={$proposta->empresa_id}'>";
          echo "<img src='{$img}detalhes.png' alt='Detalhes Empresa' title='Detalhes Empresa' />";
        echo "</a>";
      echo "</div>";
      echo "<hr />";
      echo "<div style='border: 1px solid #000000; padding: 5px; margin-bottom: 5px;'>";
        echo "AVALIAÇÃO";
      echo "</div>";
      echo "<div id='proposta' style='width: 100%'><b>Mensagem:</b>&nbsp;{$proposta->avaliacao()->msg_avaliacao},&nbsp;<b>Data/Hora:</b>&nbsp;{$proposta->avaliacao()->data_avaliacao}</div>";
    echo "</div>";
  echo "</div>";

  include 'rodape.php';
?>
