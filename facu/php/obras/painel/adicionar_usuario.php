<?php

    include ('seguranca.php');

    if(isset($_REQUEST['save'])):
        $obj = new Usuario();

        $obj->nome     = $_REQUEST['nome'];
        $obj->email    = $_REQUEST['email'];
        $obj->telefone = $_REQUEST['telefone'];
        $obj->celular  = $_REQUEST['celular'];
        $obj->senha    = $_REQUEST['senha'];
        $obj->ativo    = $_REQUEST['ativo'];
        $obj->save();
        if ($obj->is_valid()):
            $_SESSION['nome']     = '';
            $_SESSION['email']    = '';
            $_SESSION['telefone'] = '';
            $_SESSION['celular']  = '';
            echo "<script>";
            echo "window.location='adicionar_usuario.php?message=Operação realizada com Sucesso!';";
            echo "</script>";
        else:
            $_REQUEST['message'] = null;
            $_SESSION['nome']     = $_REQUEST['nome'];
            $_SESSION['email']    = $_REQUEST['email'];
            $_SESSION['telefone'] = $_REQUEST['telefone'];
            $_SESSION['celular']  = $_REQUEST['celular'];
            $errors = $obj->errors->on('nome')." ".$obj->errors->on('email')." "
                .$obj->errors->on('telefone')." ".$obj->errors->on('celular')." "
                .$obj->errors->on('ativo')." ".$obj->errors->on('senha');
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
                <legend>ADICIONAR USUARIO:</legend>
                <?php
                  if(isset($errors)):
                      echo "<font color='#FF0000'>".$errors."</font>";
                  endif;
                  if(isset($_REQUEST['message'])):
                      echo "<font color='#33CC33'>".$_REQUEST['message']."</font>";
                  endif;
                ?>
                <label for="name">Nome:</label>
                <input type="text" name="nome" class="text-input small-input" value="<?php echo $_REQUEST['nome']; ?>" autofocus required name=nome/>
                <label for="email">E-mail:</label>
                <input type="email" name="email" class="text-input small-input" value="<?php echo $_REQUEST['email']; ?>" required name=email  />
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" class="text-input small-input" value="<?php echo $_REQUEST['telefone']; ?>" required name=telefone  />
                <label for="telefone">Celular:</label>
                <input type="text" id="celular" name="celular" class="text-input small-input" value="<?php echo $_REQUEST['celular']; ?>" name=celular  />
                <label for="status">Status:</label>
                <input type='radio' name='ativo' value='1' checked>Ativo
                <input type='radio' name='ativo' value='0'>Inativo
                <br /><br />
                <label for="senha">Senha:</label>
                <input type="password" name="senha" class="text-input small-input" required name=senha/>
                <br /><br />
                <input id="save" name="save" class="button" type="submit" value="Salvar Dados" />
            </fieldset>
        </form>
    </div>
</body>
</html>

