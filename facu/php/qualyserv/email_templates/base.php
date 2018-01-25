<?php
  echo "<div id='corpo' style='width: 600px; height: auto; border: 1px solid #1a1a1a; border-radius: 10px; padding: 10px;' >";
    echo "<div id='logo' style='float: left;' >";
      echo "<a href='http://{$obj->config()->web_site}' style='text-decoration:none; color: #262626;'>";
      echo "<img src='img/QualyServ.png' alt='{$obj->config()->system_name}' title='{$obj->config()->system_name}' />";
      echo "</a>";
    echo "</div>";
    echo "<div id='contato' style='padding-top: 10px; text-align: center; height: 94px;' >";
      echo "<font size='6'>{$obj->config()->system_name}</font><br />";
      echo "<a href='http://{$obj->config()->web_site}' style='text-decoration:none; color: #262626'>{$obj->config()->web_site}</a><br />";
      echo "<a href='mailto:qualyserv2016@gmail.com' style='text-decoration:none; color: #262626'>E-mail: qualyserv2016@gmail.com</a>";
    echo "</div>";
    echo "<hr style='color: #262626; height: 1px;' />";
    echo "<div id='conteudo' style='text-align: left;' >";
      include $template;
    echo "</div>";
    echo "<hr style='color: #262626; height: 1px;' />";
    echo "<div id='rodape' style='text-align: center; color: #595959' >";
      echo "Favor não responder esse e-mail.";
    echo "</div>";
  echo "</div>";
?>
