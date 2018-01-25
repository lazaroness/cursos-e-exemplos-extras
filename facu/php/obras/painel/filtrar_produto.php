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
   <!-- JS                                                                  -->
   <!-- ------------------------------------------------------------------- -->
   <link href="../librarys/jquery-ui-1.11.4/jquery-ui.css" rel="stylesheet">
   <script src="../librarys/jquery-ui-1.11.4/external/jquery/jquery.js"></script>
   <script src="../librarys/jquery-ui-1.11.4/jquery-ui.js"></script>
   <script type="text/javascript">
     jQuery(document).ready(function(){

       $('#descricao').autocomplete({
         source: "../autocomplete/produto_descricao.php",
         minLength: 2
       });

       $('#cor').autocomplete({
         source: "../autocomplete/produto_cor.php",
         minLength: 2
       });

       $('#material').autocomplete({
         source: "../autocomplete/produto_material.php",
         minLength: 2
       });

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
        <form id="form_admin" method="post" action="filtrar_produto_do.php">
            <fieldset>
                <legend>FILTRAR PRODUTO:</legend>
                <label for="name">Descrição:</label>
                <input type="text" id="descricao" name="descricao" class="text-input small-input" autofocus />
                <label for="cargo">Cor:</label>
                <input type="text" id="cor" name="cor" class="text-input small-input" />
                <label for="email">Material:</label>
                <input type="text" id="material" name="material" class="text-input small-input" />
                <label for="telefone">Tipo Produto:</label>
                <input type="text" id="tipo_produto" name="tipo_produto" class="text-input small-input" />
                <input type='hidden' id='tipo_produto_id' name='tipo_produto_id' value='' />
                <label for="telefone">Fornecedor:</label>
                <input type="text" id="fornecedor" name="fornecedor" class="text-input small-input" />
                <input type='hidden' id='fornecedor_id' name='fornecedor_id' value='' />
                <br /><br />
                <input id="save" name="save" class="button" type="submit" value="Buscar" />
            </fieldset>
        </form>
    </div>
</body>
</html>