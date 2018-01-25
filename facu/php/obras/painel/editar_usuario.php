<?php

    include ('seguranca.php');

    $obj = Usuario::find($_REQUEST['usuario_id']);

    if(isset($_REQUEST['save'])):
        $obj->nome     = $_REQUEST['nome'];
//        $obj->email    = $_REQUEST['email'];
        $obj->telefone = $_REQUEST['telefone'];
        $obj->celular  = $_REQUEST['celular'];
        $obj->ativo    = $_REQUEST['ativo'];
        $obj->save();
        if ($obj->is_valid()):
            echo "<script>";
            echo "window.location='editar_usuario.php?usuario_id=".$obj->usuario_id."&message=Operação realizada com Sucesso!';";
            echo "</script>";
        else:
            $_REQUEST['message'] = null;
            $errors = $obj->errors->on('nome')." "//.$obj->errors->on('email')." "
                .$obj->errors->on('telefone')." ".$obj->errors->on('celular')." "
                .$obj->errors->on('ativo');
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

   <!-- ------------------------------------------------------------------- -->
   <!-- JS                                                                  -->
   <!-- ------------------------------------------------------------------- -->
   <script src="../js/jquery-1.2.6.pack.js" type="text/javascript"></script>
   <script src="../js/jquery.maskedinput-1.1.4.pack.js" type="text/javascript" /></script>

   <!-- ------------------------------------------------------------------- -->
   <!-- MASCARAS                                                            -->
   <!-- ------------------------------------------------------------------- -->
   <script type="text/javascript">
     $(document).ready(function(){$("#telefone").mask("(99)9999-9999");});
     $(document).ready(function(){$("#celular").mask("(99)99999-9999");});
   </script>
</head>

<body>
    <div id="box_form" name="box_form">
        <form id="form_admin" method="post" action="">
            <div id="erros" name="erros">
        
            </div>
            <fieldset>					
                <legend>EDITAR USUARIO:</legend>
                <?php
                  if(isset($errors)):
                      echo "<font color='#FF0000'>".$errors."</font>";
                  endif;
                  if(isset($_REQUEST['message'])):
                      echo "<font color='#33CC33'>".$_REQUEST['message']."</font>";
                  endif;
                ?>
                <label for="name">Nome:</label>
                <input type="text" name="nome" class="text-input small-input" value="<?php echo $obj->nome; ?>" autofocus required name=nome/>
                <!-- COLOCANDO O EMAIL DESABILITADO PARA EDIÇÃO POIS ELE É
                    UTILIZADO PARA O LOGIN, E LOGIN VOCE NAO PODE FICAR
                    EDITANDO QUANDO NECESSARIO VOCE ALTERA A SENHA.
                -->
                <label for="email">E-mail:</label> 
                <input type="email" name="email" class="text-input small-input" value="<?php echo $obj->email; ?>" required disabled name=email  />
                <label for="telefone">Telefone:</label> 
                <input type="text" id="telefone" name="telefone" class="text-input small-input" value="<?php echo $obj->telefone; ?>" required name=telefone  />
                <label for="telefone">Celular:</label> 
                <input type="text" id="celular" name="celular" class="text-input small-input" value="<?php echo $obj->celular; ?>" name=celular  />
                <label for="status">Status:</label>
                <?php
                    if($obj->ativo == 1):
                        echo "<input type='radio' name='ativo' value='1' checked>Sim";
                        echo "<input type='radio' name='ativo' value='0'>Não";
                    else:
                        echo "<input type='radio' name='ativo' value='1'>Sim";
                        echo "<input type='radio' name='ativo' value='0' checked>Não";
                    endif;
                ?>
                <br /><br />
                <br /><br />
                <input id="save" name="save" class="button" type="submit" value="Salvar Dados" />
            </fieldset>
        </form>
    </div>
</body>
</html>