<?php

    include ('seguranca.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $config->empresa; ?></title>
</head>

<body>
    <!-- ------------------------------------------------------------------ -->
    <!-- MENU                                                               -->
    <!-- ------------------------------------------------------------------ -->
    <?php
        include('menu.php');
    ?>

    <!-- ------------------------------------------------------------------ -->
    <!-- FRAME PARA O CARREGAMENTO DAS PAGINAS                              -->
    <!-- ------------------------------------------------------------------ -->
    <iframe id='conteudo' name="conteudo" src="" style="width: 100%; height: 600px; border: 0px; text-align: center;" scrolling="Auto" />
</body>
</html>