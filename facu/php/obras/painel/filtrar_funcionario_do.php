<?php

    include ('seguranca.php');

    $nome  = $_REQUEST['nome'];
    $cargo = $_REQUEST['cargo'];
    $cpf   = $_REQUEST['cpf'];
    $ativo = $_REQUEST['ativo'];

    $sql = "SELECT * FROM tb_funcionario WHERE ativo=$ativo";
    if(!$cargo == ""):
        $sql = $sql." AND cargo='$cargo'";
    endif;
    if(!$cpf == ""):
        $sql = $sql." AND cpf='$cpf'";
    endif;
    if(!$nome == ""):
        $sql = $sql." AND nome='$nome'";
    endif;

    $sql = $sql." ORDER BY funcionario_id ASC";
    $funcionarios = Funcionario::find_by_sql($sql);

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
                    <th>CARGO</th>
                    <th>CPF</th>
                    <th>TELEFONE</th>
                    <th>CELULAR</th>
                    <th>STATUS</th>
                    <th>FUNÇÕES</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($funcionarios as $funcionario):  ?>
                    <tr>
                        <td style="text-align: center;">&nbsp;<?php echo $funcionario->nome; ?></td>
                        <td style="text-align: center;">&nbsp;<?php echo $funcionario->cargo; ?></td>
                        <td style="text-align: center;">&nbsp;<?php echo $funcionario->cpf; ?></td>
                        <td style="text-align: center;">&nbsp;<?php echo $funcionario->telefone; ?></td>
                        <td style="text-align: center;">&nbsp;<?php echo $funcionario->celular; ?></td>
                        <td style="text-align: center;">
                            <?php
                                if($funcionario->ativo == 1){ echo "Ativo"; } else { echo "Inativo"; };
                            ?>
                        </td>
                        <td style="text-align: center;">&nbsp;
                            <?php if($online->permission('editar_funcionario')): ?>
                                <a href="editar_funcionario.php?funcionario_id=<?php echo $funcionario->funcionario_id; ?>">
                                    <img src="../icons/edit.png" title="Editar" alt="Editar" />
                                </a>
                            <?php endif; ?>
                            <?php if($online->permission('deletar_funcionario')): ?>
                                <a href="deletar_funcionario.php?funcionario_id=<?php echo $funcionario->funcionario_id; ?>">
                                    <img src="../icons/excluir.png" title="Excluir" alt="Excluir" />
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="7" style="text-align: right;">
                            <?php if($online->permission('exportar_pdf_funcionario')): ?>
                                <a href="exportar_pdf_funcionario.php?ativo=<?php echo $ativo; ?>&nome=<?php echo $nome; ?>&cpf=<?php echo $cpf; ?>&cargo=<?php echo $cargo; ?>">
                                    <img src="../icons/pdf.png" title="Exportar PDF" alt="Exportar PDF" />
                                </a>
                            <?php endif; ?>
                            <?php if($online->permission('exportar_xls_funcionario')): ?>
                                <a href="exportar_xls_funcionario.php?ativo=<?php echo $ativo; ?>&nome=<?php echo $nome; ?>&cpf=<?php echo $cpf; ?>&cargo=<?php echo $cargo; ?>">
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