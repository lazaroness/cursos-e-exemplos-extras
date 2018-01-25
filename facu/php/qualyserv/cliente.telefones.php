<?php
  echo "<div style='width: 100%; height: auto;'>";
    echo "<div style='border: 1px solid #000000; padding: 5px; margin-bottom: 5px;'>";
      echo "TELEFONES:&nbsp;";
      echo "<a href='cliente.form_telefone.php'>";
        echo "<img src='{$img}add.gif' title='Adicionar' alt='Adicionar' />";
      echo "</a>";
    echo "</div>";
    if(is_blank($cliente->telefones()) == 'sim'):
      echo "<div id='endereco' style='width: 100%; color: #ff0000;'>Nenhum registro encontrado.</div>";
    endif;
    foreach ($cliente->telefones() as $telefone):
      echo "<div id='endereco' style='width: 100%;'>";
        echo "{$telefone->to_s()}";
        echo "&nbsp;&nbsp;<a href='cliente.form_telefone.php?id={$telefone->id}'><img src='{$img}editar.png' alt='Editar' title='Editar' /></a>";
        echo "<hr />";
      echo "</div>";
    endforeach;
  echo "</div>";
?>
