<?php

    include ('seguranca.php');

    if(isset($_REQUEST['save'])):
        $obj = new Produto();

        $obj->descricao       = $_REQUEST['descricao'];
        $obj->cor             = $_REQUEST['cor'];
        $obj->material        = $_REQUEST['material'];
        $obj->preco_compra    = $_REQUEST['preco_compra'];
        $obj->preco_venda     = $_REQUEST['preco_venda'];
        $tipo_produto = TipoProduto::find_by_descricao($_REQUEST['tipo_produto']);
        if ($tipo_produto != '' && $tipo_produto->tipo_produto_id == $_REQUEST['tipo_produto_id']):
            $obj->tipo_produto_id = $_REQUEST['tipo_produto_id'];
        endif;
        $fornecedor = Fornecedor::find_by_nome($_REQUEST['fornecedor']);
        if ($fornecedor != '' && $fornecedor->fornecedor_id == $_REQUEST['fornecedor_id']):
            $obj->fornecedor_id   = $_REQUEST['fornecedor_id'];
        endif;
        $obj->save();
        if ($obj->is_valid()):
            $_SESSION['descricao']    = '';
            $_SESSION['cor']          = '';
            $_SESSION['material']     = '';
            $_SESSION['preco_compra'] = '';
            $_SESSION['preco_venda']  = '';
            $_SESSION['tipo_produto'] = '';
            $_SESSION['fornecedor']   = '';

            echo "<script>";
            echo "window.location='adicionar_produto.php?message=Operação realizada com Sucesso!';";
            echo "</script>";
        else:
            $_REQUEST['message'] = null;
            $_SESSION['descricao']    = $_REQUEST['descricao'];
            $_SESSION['cor']          = $_REQUEST['cor'];
            $_SESSION['material']     = $_REQUEST['material'];
            $_SESSION['preco_compra'] = $_REQUEST['preco_compra'];
            $_SESSION['preco_venda']  = $_REQUEST['preco_venda'];
            $_SESSION['tipo_produto'] = $_REQUEST['tipo_produto'];
            $_SESSION['fornecedor']   = $_REQUEST['fornecedor'];

            $errors = $obj->errors->on('descricao')." ".$obj->errors->on('cor')." "
                .$obj->errors->on('material')." ".$obj->errors->on('preco_compra')." "
                .$obj->errors->on('preco_venda')." ".$obj->errors->on('tipo_produto_id')." "
                .$obj->errors->on('fornecedor_id');
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
   <link href="../librarys/jquery-ui-1.11.4/jquery-ui.css" rel="stylesheet">
   <script src="../librarys/jquery-ui-1.11.4/external/jquery/jquery.js"></script>
   <script src="../librarys/jquery-ui-1.11.4/jquery-ui.js"></script>
   <script type="text/javascript">
     jQuery(document).ready(function(){

       $('#tipo_produto').autocomplete({
         source: "../autocomplete/tipo_produto.php",
         minLength: 2,
         select: function(event, ui){
             var id = ui.item.tipo_produto_id;
             jQuery("#tipo_produto_id").val(id);
         }
       });

       $('#fornecedor').autocomplete({
         source: "../autocomplete/fornecedor.php",
         minLength: 2,
         select: function(event, ui){
             var id = ui.item.fornecedor_id;
             jQuery("#fornecedor_id").val(id);
         }
       });
     });
   </script>

</head>

<body>
    <div id="box_form" name="box_form">
        <form id="form_admin" method="post" action="">
            <fieldset>
                <legend>ADICIONAR PRODUTO:</legend>
                <?php
                  if(isset($errors)):
                      echo "<font color='#FF0000'>".$errors."</font>";
                  endif;
                  if(isset($_REQUEST['message'])):
                      echo "<font color='#33CC33'>".$_REQUEST['message']."</font>";
                  endif;
                ?>
                <label for="name">Descrição:</label>
                <input type="text" id="descricao" name="descricao" class="text-input small-input" value="<?php echo $_SESSION['descricao'] ?>" autofocus required />
                <label for="cargo">Cor:</label>
                <input type="text" id="cor" name="cor" class="text-input small-input" value="<?php echo $_SESSION['cor'] ?>" required />
                <label for="email">Material:</label>
                <input type="text" id="material" name="material" class="text-input small-input" value="<?php echo $_SESSION['material'] ?>" required />
                <label for="telefone">Preco Compra:</label>
                <input type="text" id="preco_compra" name="preco_compra" class="text-input small-input" value="<?php echo $_SESSION['preco_compra'] ?>" required />
                <label for="telefone">Preco Venda:</label>
                <input type="text" id="preco_venda" name="preco_venda" class="text-input small-input" value="<?php echo $_SESSION['preco_venda'] ?>" required />
                <label for="telefone">Tipo Produto:</label>
                <input type="text" id="tipo_produto" name="tipo_produto" class="text-input small-input" value="<?php echo $_SESSION['tipo_produto'] ?>" required />
                <input type='hidden' id='tipo_produto_id' name='tipo_produto_id' value='' required />
                <label for="telefone">Fornecedor:</label>
                <input type="text" id="fornecedor" name="fornecedor" class="text-input small-input" value="<?php echo $_SESSION['fornecedor'] ?>" required />
                <input type='hidden' id='fornecedor_id' name='fornecedor_id' value='' required />
                <br /><br />
                <input id="save" name="save" class="button" type="submit" value="Salvar Dados" />
            </fieldset>
        </form>
    </div>
</body>
</html>