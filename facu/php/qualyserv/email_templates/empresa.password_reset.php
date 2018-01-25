<?php
  echo "<h4>Olá {$obj->nome_fantasia} você efetuou a atualização de senha em nosso sistema.</h4>";
  echo "<h6>Para acessar o nosso <a href='http://{$obj->config()->web_site}'>site</a> utilize o seu e-mail de cadastro({$obj->email}) e a sua nova senha!</h6>";
?>
