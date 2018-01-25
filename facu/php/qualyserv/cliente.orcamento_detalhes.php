<?php
  include 'base.php';
  include('cliente.online.php');
  include('topo.php');
  echo "<div style='text-align:center;'>Bem-vindo(a) ".$_COOKIE['cliente']."</div>";
  include('cliente.menu.php');

  if(is_blank($_REQUEST['id']) == 'nao'):
    $orcamento = Orcamento::find($_REQUEST['id']);
  endif;

  echo "<div id='base_corpo'>";
    echo "<div style='width: 100%; height: auto; text-align: right;'>";
      echo "<a href='javascript:history.back()' style='text-decoration: none; color: #8aac64;'>";
        echo "<img src='{$img}voltar.png' alt='Voltar' title='Voltar' />&nbsp;Voltar";
      echo "</a>";
    echo "</div>";
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
          if(is_blank($orcamento->endereco_id) == 'sim'):
            echo "<b>Endereço:</b>&nbsp;<font color='#ff0000'>Nenhum registro encontrado.</font>";
          else:
            echo "<b>Endereço:</b>&nbsp;{$orcamento->endereco()->to_s()}";
          endif;
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

    echo "<div style='width: 100%; height: auto;'>";
      echo "<div style='border: 1px solid #000000; padding: 5px; margin-bottom: 5px;'>";
        echo "PROPOSTAS";
      echo "</div>";
      if(is_blank($orcamento->propostas()) == 'sim'):
        echo "<div id='proposta' style='width: 100%; color: #ff0000;'>Nenhum registro encontrado.</div>";
      endif;
      if(empty($orcamento->proposta())):
        foreach($orcamento->propostas() as $proposta):
          echo "<div id='proposta' style='width: 100%'>";
            echo $proposta->to_s();
            echo "&nbsp;&nbsp;<a href='cliente.orcamento_proposta_fechar.php?id={$proposta->id}'>";
              echo "<img src='{$img}concluir.png' alt='Concluir' title='Concluir' />";
            echo "</a>";
            echo "&nbsp;<a href='cliente.empresa_detalhes.php?id={$proposta->empresa_id}'>";
              echo "<img src='{$img}detalhes.png' alt='Detalhes Empresa' title='Detalhes Empresa' />";
            echo "</a>";
          echo "</div>";
          echo "<hr />";
        endforeach;
      else:
        foreach($orcamento->propostas() as $proposta):
          echo "<div id='proposta' style='width: 100%'>";
            echo $proposta->to_s();
            echo "&nbsp;<a href='cliente.empresa_detalhes.php?id={$proposta->empresa_id}'>";
              echo "<img src='{$img}detalhes.png' alt='Detalhes Empresa' title='Detalhes Empresa' />";
            echo "</a>";
            if($proposta->fechado == 'true'):
              if(empty($proposta->avaliacao())):
                echo "&nbsp;<a href='cliente.orcamento_avaliacao.php?id={$proposta->id}'>";
                  echo "<img src='{$img}star.png' alt='Avaliar Empresa' title='Avaliar Empresa' />";
                echo "</a>";
              else:
                echo "&nbsp;<a href='cliente.orcamento_avaliacao_detalhes.php?id={$proposta->id}'>";
                  echo "<img src='{$img}info.png' alt='Detalhes Avaliação' title='Detalhes Avaliação' />";
                echo "</a>";
              endif;
            endif;
          echo "</div>";
          echo "<hr />";
        endforeach;
      endif;
    echo "</div>";

  echo "</div>";

  include 'rodape.php';
?>
