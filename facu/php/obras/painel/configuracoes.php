<?php

    include ('seguranca.php');

    if(isset($_REQUEST['save'])):
        $config->empresa        = $_REQUEST['empresa'];
        $config->cor_primaria   = $_REQUEST['cor_primaria'];
        $config->cor_secundaria = $_REQUEST['cor_secundaria'];
        $config->descricao      = $_REQUEST['descricao'];
        $config->usuario_permite_editar_proprio_cadastro = $_REQUEST['permite_editar_proprio_cadastro'];
        $config->save();
        if ($config->is_valid()):
            echo "<script>";
            echo "window.location='configuracoes.php?message=Operação realizada com Sucesso!';";
            echo "</script>";
        else:
            $_REQUEST['message'] = null;
            $errors = $config->errors->on('empresa')." ".$config->errors->on('descricao');
        endif;
    endif;

    //-------------------------------------------------------------------------
    // UPLOAD LOGO
    //-------------------------------------------------------------------------
    if(isset($_REQUEST['upload'])):
        $config->upload_logo($_FILES);
    endif;

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $config->empresa; ?></title>

   <!-- ------------------------------------------------------------------- -->
   <!-- CSS                                                                 -->
   <!-- ------------------------------------------------------------------- -->
   <link rel="stylesheet" href="../css/style.css" />

   <!-- ------------------------------------------------------------------- -->
   <!-- JS                                                                  -->
   <!-- ------------------------------------------------------------------- -->
   <script src="../librarys/ckeditor/ckeditor.js"></script>

</head>

<body>
    <div id="box_form" name="box_form">
        <form id="form_admin" method="post" action="">
            <div id="erros" name="erros">
        
            </div>
            <fieldset>					
                <legend>ADICIONAR USUARIO:</legend>
                <?php
                  if(isset($errors)):
                      echo "<font color='#FF0000'>".$errors."</font>";
                  endif;
                  if(isset($_REQUEST['message'])):
                      echo "<font color='#33CC33'>".$_REQUEST['message']."</font>";
                  endif;
                ?>
                <label>Empresa</label>
                <input name="empresa" type="text" class="text-input medium-input datepicker" id="empresa" value="<?php echo $config->empresa;?>" />
                <label>Cor Primaria</label>
                <input name="cor_primaria" type="color" value="<?php echo $config->cor_primaria;?>">
                <label>Cor Secundaria</label>
                <input name="cor_secundaria" type="color" value="<?php echo $config->cor_secundaria;?>">
                <label>Descri&ccedil;&atilde;o Empresa</label>
                <textarea class="ckeditor" id="editor1"  name="descricao" cols="79" rows="15"><?php echo $config->descricao;?></textarea>
                <br />
                <label>Permite usuario editar proprio cadastro</label>
                <?php
                    if($config->usuario_permite_editar_proprio_cadastro == 1):
                        echo "<input type='radio' name='permite_editar_proprio_cadastro' value=".$config->usuario_permite_editar_proprio_cadastro." checked>Sim";
                        echo "<input type='radio' name='permite_editar_proprio_cadastro' value='0'>Não";
                    else:
                        echo "<input type='radio' name='permite_editar_proprio_cadastro' value='1'>Sim";
                        echo "<input type='radio' name='permite_editar_proprio_cadastro' value=".$config->usuario_permite_editar_proprio_cadastro." checked>Não";
                    endif;
                ?>
                <br /><br />
                <input id="save" name="save" class="button" type="submit" value="Salvar Dados" />
            </form>
        <br /><br />
  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form_anexo">
    <input type="file" name="anexo" id="anexo">								
    <label>Logomarca - Tamanho padr&atilde;o 300px X 60 px</label>
    <label for="imagem"></label>
    <img src="../<?php echo $config->path_logo;?>" width="300" height="60" />
    <br /><br />
    <input id="upload" name="upload" class="button" type="submit" value="Upload" />
  </form>
            </fieldset>
    </div>
</body>
</html>