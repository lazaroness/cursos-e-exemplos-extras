<?php

    include ('seguranca.php');

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $config->empresa; ?></title>

   <!-- ------------------------------------------------------------------- -->
   <!-- CSS                                                                 -->
   <!-- ------------------------------------------------------------------- -->
   <link rel="stylesheet" href="../css/style.css">

   <!-- ------------------------------------------------------------------- -->
   <!-- AUTOCOMPLETE                                                        -->
   <!-- ------------------------------------------------------------------- -->
   <link href="../librarys/jquery-ui-1.11.4/jquery-ui.css" rel="stylesheet">
   <script src="../librarys/jquery-ui-1.11.4/external/jquery/jquery.js"></script>
   <script src="../librarys/jquery-ui-1.11.4/jquery-ui.js"></script>

   <script type="text/javascript">
       jQuery(document).ready(function(){
          $('#usuario').autocomplete({
             source: "../autocomplete/usuario_nome.php",
             minLength: 2
          });

          $('#email').autocomplete({
             source: "../autocomplete/usuario_email.php",
             minLength: 2
          });
       });
   </script>

</head>

<body>
    <div id="box_form" name="box_form">
        <form id="form_admin" method="post" action="filtrar_usuario_do.php">
            <div id="erros" name="erros">
        
            </div>
            <fieldset>					
                <legend>FILTRAR USUARIO:</legend>
                <?php
                    if(isset($_REQUEST['message'])):
                        echo "<font color='#33CC33'>".$_REQUEST['message']."</font>";
                    endif;
                ?>
                <label for="name">Nome:</label>
                <div><input type="text" id="usuario" name="usuario" class="text-input small-input" autofocus /></div>
                <label for="name">Email:</label>
                <div><input type="text" id="email" name="email" class="text-input small-input" /></div>
                <label for="status">Status:</label>
                <input type='radio' name='ativo' value='1' checked>Ativo
                <input type='radio' name='ativo' value='0'>Inativo
                <br /><br />
                <input id="save" name="save" class="button" type="submit" value="Buscar" />
            </fieldset>
        </form>
    </div>
</body>
</html>