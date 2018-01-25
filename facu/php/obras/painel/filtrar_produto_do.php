<?php

    include ('seguranca.php');

    $descricao  = $_REQUEST['descricao'];
    $cor = $_REQUEST['cor'];
    $material = $_REQUEST['material'];
    $tipo_produto_id = $_REQUEST['tipo_produto_id'];
    $fornecedor_id = $_REQUEST['fornecedor_id'];

    $sql = "SELECT * FROM tb_produto WHERE produto_id!=''";
    if(!$descricao == ""):
        $sql = $sql." AND descricao='$descricao'";
    endif;
    if(!$cor == ""):
        $sql = $sql." AND cor='$cor'";
    endif;
    if(!$material == ""):
        $sql = $sql." AND material='$material'";
    endif;
    if(!$tipo_produto_id == ""):
        $sql = $sql." AND tipo_produto_id='$tipo_produto_id'";
    endif;
    if(!$fornecedor_id == ""):
        $sql = $sql." AND fornecedor_id='$fornecedor_id'";
    endif;

    $sql = $sql." ORDER BY produto_id ASC";
    $objs = Produto::find_by_sql($sql);

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
        <fieldset>					
            <legend>PRODUTOS ENCONTRADOS:</legend>
            <table>
                <thead>
                <tr>
                    <th>DESCRICAO</th>
                    <th>MATERIAL</th>
                    <th>COR</th>
                    <th>FORNECEDOR</th>
                    <th>FUNÇÕES</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($objs as $obj):  ?>
                    <tr>
                        <td style="text-align: center;">&nbsp;<?php echo $obj->descricao; ?></td>
                        <td style="text-align: center;">&nbsp;<?php echo $obj->material; ?></td>
                        <td style="text-align: center;">&nbsp;<?php echo $obj->cor; ?></td>
                        <td style="text-align: center;">&nbsp;<?php echo $obj->fornecedor->nome; ?></td>
                        <td style="text-align: center;">&nbsp;
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="6" style="text-align: right;">
                            &nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        </form>
    </div>
</body>
</html>