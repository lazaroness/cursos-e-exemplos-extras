<?php
  include 'base.php';
  include 'cliente.online.php';
  include 'topo.php';
  include 'cliente.menu.php';

  if(isset($_REQUEST['id'])):
    $empresa = Empresa::find($_REQUEST['id']);
  endif;

  echo "<div id='base_corpo'>";
    if(empty($empresa)):
      echo "<font color='#ff0000'>Nenhum registro encontrado!</font>";
    else:
      echo "<div style='width: 100%; height: auto;'>";
        echo "<div style='width: 100%; height: auto; text-align: right;'>";
          echo "<a href='javascript:history.back()' style='text-decoration: none; color: #8aac64;'>";
            echo "<img src='{$img}voltar.png' alt='Voltar' title='Voltar' />&nbsp;Voltar";
          echo "</a>";
        echo "</div>";
        echo "<div style='border: 1px solid #000000; padding: 5px; margin-bottom: 5px;'>";
          echo "DETALHES EMPRESA";
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
        echo "<hr />";
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
        echo "<div style='border: 1px solid #000000; padding: 5px; margin-bottom: 5px;'>";
          echo "AVALIAÇÕES";
        echo "</div>";
        if(empty($empresa->avaliacoes())):
          echo "<div id='perfil' style='width: 100%; text-align: left; color: #ff0000;'>Nenhum registro encontrado.</div>";
        endif;
        foreach($empresa->avaliacoes() as $avaliacao):
          echo "<div id='perfil' style='width: 100%; text-align: left;'>";
            echo "<b>Cliente:</b>&nbsp;{$avaliacao->orcamento()->cliente()->to_s()},&nbsp;";
            echo "<b>Avaliação:</b>&nbsp;{$avaliacao->to_s()}";
          echo "</div>";
        endforeach;
      echo "</div>";
    endif;
  echo "</div>";
  include 'rodape.php';
?>
