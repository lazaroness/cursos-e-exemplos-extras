<?php
  include 'base.php';
  include 'topo.php';
  include 'menu.php';

  echo "<div id='base_corpo'>";
    $linkid = $_GET['linkid'];
    if(!empty($linkid)):
      $empresa = Empresa::find('last', array('conditions' => array('token = ?', $linkid)));
      if(!empty($empresa)):
        echo "<h2>Redefinição de Senha!</h2>";
        echo "<h4>{$empresa->nome_fantasia} informe a sua nova Senha.</h4>";
        echo "<form id='form' method='post' action='empresa.link_reset_do.php'>";
          echo "<label>Senha:</label>";
          echo "<input name='senha' id='senha' type='password' required />";
          echo "<label>Confirmação Senha:</label>";
          echo "<input name='confirmacao_senha' id='confirmacao_senha' type='password' required />";
          echo "<input name='empresa_id' id='cliente_id' type='hidden' value='{$empresa->id}' required />";
          echo "<input class='button' name='save' id='save' type='submit' value='Atualizar' />";
        echo "</form>";
      else:
        $errors = "Link invalido!";
        header("Location: login.php?errors={$errors}");
      endif;
    else:
      header("Location: index.php");
    endif;

  echo "</div>";

  include 'rodape.php';
?>
