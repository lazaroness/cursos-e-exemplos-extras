<?php
  echo "<h4>Olá {$obj->nome_fantasia} você solicitou a redefinição de senha!</h4>";
  echo "<h4>Para efetuar a redefinição clique <a href='http://{$obj->config()->web_site}/empresa.link_reset.php?linkid={$obj->token}' style='color: #ff0000;'>aqui</a></h4>";
?>
