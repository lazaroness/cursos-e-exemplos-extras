<?php
  include 'base.php';
  include 'topo.php';
  include 'menu.php';

  echo "<div id='base_corpo'>";
    echo "<h3>Não Lembra a sua Senha?</h3>";
    echo "<h5>Informe o CPF/CNPJ cadastrado e você recebera um e-mail com instruções de como efetuar a atualização da senha.</h5>";
    echo "<form id='form' method='post' action='cliente.reset_do.php'>";
      echo "<label>CPF/CNPJ</label>";
      echo "<input name='cpf_cnpj' id='cpf_cnpj' type='text' required />";
      echo "<input class='button' name='save' id='save' type='submit' value='Atualizar' />";
    echo "</form>";
  echo "</div>";

  include 'rodape.php';
?>
