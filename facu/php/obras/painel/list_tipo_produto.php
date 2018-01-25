<?php

    include ('seguranca.php');

    $tipos_produto = TipoProduto::find('all');

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
            <legend>TIPOS DE PRODUTO:</legend>
            <table>
                <thead>
                <tr>
                    <th>DESCRIÇÃO</th>
                    <th>FUNÇÕES</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tipos_produto as $tipo_produto):  ?>
                    <tr>
                        <td style="text-align: center;">&nbsp;<?php echo $tipo_produto->descricao; ?></td>
                        <td style="text-align: center;">&nbsp;
                            <?php if($online->permission('deletar_tipo_produto')): ?>
                                <a href="deletar_tipo_produto.php?tipo_produto_id=<?php echo $tipo_produto->tipo_produto_id; ?>">
                                    <img src="../icons/excluir.png" title="Excluir" alt="Excluir" />
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="7" style="text-align: right;">
                            <?php if($online->permission('exportar_pdf_tipo_produto')): ?>
                                <a href="exportar_pdf_tipo_produto.php">
                                    <img src="../icons/pdf.png" title="Exportar PDF" alt="Exportar PDF" />
                                </a>
                            <?php endif; ?>
                            <?php if($online->permission('exportar_xls_tipo_produto')): ?>
                                <a href="exportar_xls_tipo_produto.php">
                                    <img src="../icons/xls.png" title="Exportar XLS" alt="Exportar XLS" />
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        </form>
    </div>
</body>
</html>