<?php

    include ('seguranca.php');

    $fornecedores = Fornecedor::find('all');

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
            <legend>FORNECEDOR:</legend>
            <table>
                <thead>
                <tr>
                    <th>NOME</th>
                    <th>CNPJ</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th>
                    <th>FUNÇÕES</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($fornecedores as $fornecedor):  ?>
                    <tr>
                        <td style="text-align: center;">&nbsp;<?php echo $fornecedor->nome; ?></td>
                        <td style="text-align: center;">&nbsp;<?php echo $fornecedor->cnpj; ?></td>
                        <td style="text-align: center;">&nbsp;<?php echo $fornecedor->email; ?></td>
                        <td style="text-align: center;">&nbsp;<?php echo $fornecedor->telefone; ?></td>
                        <td style="text-align: center;">&nbsp;
                            <?php if($online->permission('editar_fornecedor_produto')): ?>
                                <a href="editar_fornecedor_produto.php?fornecedor_id=<?php echo $fornecedor->fornecedor_id; ?>">
                                    <img src="../icons/edit.png" title="Excluir" alt="Excluir" />
                                </a>
                            <?php endif; ?>
                            <?php if($online->permission('deletar_fornecedor_produto')): ?>
                                <a href="deletar_fornecedor_produto.php?fornecedor_id=<?php echo $fornecedor->fornecedor_id; ?>">
                                    <img src="../icons/excluir.png" title="Excluir" alt="Excluir" />
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="7" style="text-align: right;">
                            <?php if($online->permission('exportar_pdf_fornecedor_produto')): ?>
                                <a href="exportar_pdf_tipo_produto.php">
                                    <img src="../icons/pdf.png" title="Exportar PDF" alt="Exportar PDF" />
                                </a>
                            <?php endif; ?>
                            <?php if($online->permission('exportar_xls_fornecedor_produto')): ?>
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
