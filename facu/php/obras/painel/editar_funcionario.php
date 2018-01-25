<?php

    include ('seguranca.php');

    $obj = Funcionario::find($_REQUEST['funcionario_id']);
    if(isset($_REQUEST['save'])):
        $obj->nome     = $_REQUEST['nome'];
        $obj->cargo    = $_REQUEST['cargo'];
        $obj->telefone = $_REQUEST['telefone'];
        $obj->celular  = $_REQUEST['celular'];
        $obj->cpf      = $_REQUEST['cpf'];
        $obj->ativo    = $_REQUEST['ativo'];
        $obj->cep      = $_REQUEST['cep'];
        $obj->numero   = $_REQUEST['numero'];
        $obj->rua      = $_REQUEST['rua'];
        $obj->bairro   = $_REQUEST['bairro'];
        $obj->cidade   = $_REQUEST['cidade'];
        $obj->estado   = $_REQUEST['estado'];
        $obj->save();
        if ($obj->is_valid()):
            echo "<script>";
            echo "window.location='editar_funcionario.php?funcionario_id=".$obj->funcionario_id."&message=Operação realizada com Sucesso!';";
            echo "</script>";
        else:
            $_REQUEST['message'] = null;
            $errors = $obj->errors->on('nome')." ".$obj->errors->on('cargo')." "
                .$obj->errors->on('telefone')." ".$obj->errors->on('celular')." "
                .$obj->errors->on('ativo')." ".$obj->errors->on('cpf')." "
                .$obj->errors->on('cep')." ".$obj->errors->on('numero')." "
                .$obj->errors->on('rua')." ".$obj->errors->on('bairro')." "
                .$obj->errors->on('cidade')." ".$obj->errors->on('estado');
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
   <script src="../js/busca_via_cep.js" type="text/javascript" /></script>

</head>

<body>
    <div id="box_form" name="box_form">
        <form id="form_admin" method="post" action="">
            <div id="erros" name="erros">
        
            </div>
            <fieldset>					
                <legend>EDITAR FUNCIONARIO:</legend>
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
                <label for="cargo">Cargo:</label> 
                <input type="text" name="cargo" class="text-input small-input" value="<?php echo $obj->cargo; ?>" required name=cargo  /> 
                <label for="telefone">Telefone:</label> 
                <input type="text" id="telefone" name="telefone" class="text-input small-input" value="<?php echo $obj->telefone; ?>" required name=telefone  />
                <label for="telefone">Celular:</label> 
                <input type="text" id="celular" name="celular" class="text-input small-input" value="<?php echo $obj->celular; ?>" name=celular  />
                <label for="telefone">CPF:</label> 
                <input type="text" id="cpf" name="cpf" class="text-input small-input" value="<?php echo $obj->cpf; ?>" required name=cpf  />
                <label for="telefone">CEP:</label> 
                <input type="text" id="cep" name="cep" class="text-input small-input" value="<?php echo $obj->cep; ?>" required name=cep  />
                <label for="telefone">Rua:</label> 
                <input type="text" id="rua" name="rua" class="text-input small-input" value="<?php echo $obj->rua; ?>" required name=rua  />
                <label for="telefone">Numero:</label> 
                <input type="text" id="numero" name="numero" class="text-input small-input" value="<?php echo $obj->numero; ?>" required name=numero  />
                <label for="telefone">Bairro:</label> 
                <input type="text" id="bairro" name="bairro" class="text-input small-input" value="<?php echo $obj->bairro; ?>" required name=bairro  />
                <label for="telefone">Cidade:</label> 
                <input type="text" id="cidade" name="cidade" class="text-input small-input" value="<?php echo $obj->cidade; ?>" required name=cidade  />
                <label for="telefone">Estado:</label> 
                <input type="text" id="estado" name="estado" class="text-input small-input" value="<?php echo $obj->estado; ?>" required name=estado  />
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
                <input id="save" name="save" class="button" type="submit" value="Salvar Dados" />
            </fieldset>
        </form>
    </div>
</body>
</html>