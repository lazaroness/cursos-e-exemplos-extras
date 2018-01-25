<?php

    include ('seguranca.php');

    $nome  = $_REQUEST['usuario'];
    $ativo = $_REQUEST['ativo'];
    $email = $_REQUEST['email'];

    $sql = "SELECT * FROM tb_usuario WHERE ativo=$ativo";
    if(!$nome == ""):
        $sql = $sql." AND nome='$nome'";
    endif;
    if(!$email == ""):
        $sql = $sql." AND email='$email'";
    endif;

    $sql = $sql." ORDER BY usuario_id ASC";
    $usuarios = Usuario::find_by_sql($sql);

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
            <legend>USUARIOS ENCONTRADOS:</legend>
            <table>
                <thead>
                <tr>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th>
                    <th>CELULAR</th>
                    <th>STATUS</th>
                    <th>FUNÇÕES</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($usuarios as $usuario):  ?>
                    <tr>
                        <td style="text-align: center;">&nbsp;<?php echo $usuario->nome; ?></td>
                        <td style="text-align: center;">&nbsp;<?php echo $usuario->email; ?></td>
                        <td style="text-align: center;">&nbsp;<?php echo $usuario->telefone; ?></td>
                        <td style="text-align: center;">&nbsp;<?php echo $usuario->celular; ?></td>
                        <td style="text-align: center;">
                            <?php
                                if($usuario->ativo == 1){ echo "Ativo"; } else { echo "Inativo"; };
                            ?>
                        </td>
                        <td style="text-align: center;">&nbsp;
                            <?php if($online->permission('editar_usuario')): ?>
                                <a href="editar_usuario.php?usuario_id=<?php echo $usuario->usuario_id; ?>">
                                    <img src="../icons/edit.png" title="Editar" alt="Editar" />
                                </a>
                            <?php endif; ?>
                            <?php if($online->permission('deletar_usuario')): ?>
                            <a href="deletar_usuario.php?usuario_id=<?php echo $usuario->usuario_id; ?>">
                                <img src="../icons/excluir.png" title="Excluir" alt="Excluir" />
                            </a>
                            <?php endif; ?>
                            <?php if($online->permission('permissao_usuario')): ?>
                                <a href="permissao_usuario.php?usuario_id=<?php echo $usuario->usuario_id; ?>">
                                    <img src="../icons/permissao.png" title="Permissão" alt="Permissão" />
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="6" style="text-align: right;">
                            <?php if($online->permission('exportar_pdf_usuario')): ?>
                                <a href="exportar_pdf_usuario.php?ativo=<?php echo $ativo; ?>&nome=<?php echo $nome; ?>">
                                    <img src="../icons/pdf.png" title="Exportar PDF" alt="Exportar PDF" />
                                </a>
                            <?php endif; ?>
                            <?php if($online->permission('exportar_xls_usuario')): ?>
                                <a href="exportar_xls_usuario.php?ativo=<?php echo $ativo; ?>&nome=<?php echo $nome; ?>">
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