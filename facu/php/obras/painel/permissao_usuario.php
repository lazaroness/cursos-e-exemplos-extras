<?php

    include ('seguranca.php');

    $usuario    = Usuario::find($_REQUEST['usuario_id']);
    $permissoes = Permissoes::find('all');

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
            <legend>USUARIO PERMISSÕES:</legend>
            <?php
                if(isset($_REQUEST['message'])):
                    echo "<font color='#33CC33'>".$_REQUEST['message']."</font>";
                endif;
            ?>
            <table>
                <thead>
                    <tr>
                        <td colspan="3">
                            USUARIO:&nbsp;&nbsp;<font color='#0066FF'><?php echo strtoupper($usuario->nome); ?></font>
                        </td>
                    </tr>
                    <tr>
                        <th>DESCRIÇÃO</th>
                        <th>POSSUE</th>
                        <th>FUNÇÕES</th>
                    </tr>
                </thead>
                <?php foreach ($permissoes as $permissao):  ?>
                    <tr>
                        <td style="text-align: left;">&nbsp;<?php echo strtoupper($permissao->descricao); ?></td>
                            <?php
                                $existe = UsuarioPermissao::find_by_path_and_usuario_id($permissao->path, $usuario->usuario_id);
                                if ($existe != ""):
                                    echo "<td style='text-align: center;'><font color='#FF0000'>SIM<font color='#FF0000'></td>";
                                    echo "<td style='text-align: center;'>&nbsp;";
                                    if($online->permission('deletar_permissao')):
                                        echo "<a href='deletar_permissao.php?usuario_id=".$usuario->usuario_id."&path=".$permissao->path."' />";
                                        echo "<img src='../icons/excluir.png' title='Retirar Permissão' alt='Retirar Permisão' />";
                                        echo "</a>";
                                    endif;
                                    echo "</td>";
                                else:
                                    echo "<td style='text-align: center;'><font color='#33CC33'>NAO<font color='#33CC33'></td>";
                                    echo "<td style='text-align: center;'>&nbsp;";
                                    if($online->permission('adicionar_permissao')):
                                        echo "<a href='adicionar_permissao.php?usuario_id=".$usuario->usuario_id."&path=".$permissao->path."' />";
                                        echo "<img src='../icons/add.png' title='Liberar Permissão' alt='Liberar Permisão' />";
                                        echo "</a>";
                                    endif;
                                    echo "</td>";
                                endif;
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
        </fieldset>
        </form>
    </div>
</body>
</html>