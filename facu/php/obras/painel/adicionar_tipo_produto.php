<?php

    include ('seguranca.php');

    if(isset($_REQUEST['save'])):
        $obj = new TipoProduto();

        $obj->descricao = $_REQUEST['descricao'];
        $obj->save();
        if ($obj->is_valid()):
            // ZERANDO OS VALORES NA SESSION PARA MANTER O S VALORES NO CAMPOS
            $_SESSION['descricao']    = '';
            echo "<script>";
            echo "window.location='adicionar_tipo_produto.php?message=Operação realizada com Sucesso!';";
            echo "</script>";
        else:
            $_REQUEST['message'] = null;
            // GUARDANDO OS VALORES NA SESSION PARA MANTER O S VALORES NO CAMPOS
            $_SESSION['descricao'] = $_REQUEST['descricao'];
            $errors = $obj->errors->on('descricao');
        endif;
    endif;

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $config->empresa; ?></title>

   <!-- ------------------------------------------------------------------- -->
   <!-- CSS                                                                 -->
   <!-- ------------------------------------------------------------------- -->
   <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div id="box_form" name="box_form">
        <form id="form_admin" method="post" action="">
            <div id="erros" name="erros">
        
            </div>
            <fieldset>					
                <legend>ADICIONAR TIPO DE PRODUTO:</legend>
                <?php
                  if(isset($errors)):
                      echo "<font color='#FF0000'>".$errors."</font>";
                  endif;
                  if(isset($_REQUEST['message'])):
                      echo "<font color='#33CC33'>".$_REQUEST['message']."</font>";
                  endif;
                ?>
                <label for="name">Descrição:</label>
                <input type="text" name="descricao" class="text-input small-input" value="<?php echo $_SESSION['descricao'] ?>" autofocus required name=descricao/>
                <br /><br />
                <input id="save" name="save" class="button" type="submit" value="Salvar Dados" />
            </fieldset>
        </form>
    </div>
</body>
</html>