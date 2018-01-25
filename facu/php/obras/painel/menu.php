<!doctype html>
<html lang='pt-br'>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<!--   <meta http-equiv="refresh" content="30">-->
   <link rel="stylesheet" href="../css/menu.css">
   <script src="../js/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../js/script.js"></script>
   <title><?php echo $config->empresa; ?></title>
</head>
<body>

<div id='cssmenu'>
    <ul>
        <li><a href=''>HOME</a></li>
        <li class='active has-sub'><a href='#'>CADASTRO</a>
            <ul>
                <?php if($online->permission('adicionar_usuario')): ?>
                    <li>
                        <a href="adicionar_usuario.php" target="conteudo">USUARIO</a>
                    </li>
                <?php endif; ?>
                <?php if($online->permission('adicionar_funcionario')): ?>
                    <li>   
                        <a href="adicionar_funcionario.php" target="conteudo">FUNCIONARIO</a>
                    </li>
                <?php endif; ?>
                    <li><a>PRODUTO</a>
                    <ul>
                        <?php if($online->permission('adicionar_produto')): ?>
                            <li>
                                <a href="adicionar_produto.php" target="conteudo">PRODUTO</a>
                            </li>
                        <?php endif; ?>
                        <?php if($online->permission('adicionar_fornecedor_produto')): ?>
                            <li>
                                <a href="adicionar_fornecedor_produto.php" target="conteudo">FORNECEDOR</a>
                            </li>
                        <?php endif; ?>
                        <?php if($online->permission('adicionar_tipo_produto')): ?>
                            <li>
                                <a href="adicionar_tipo_produto.php" target="conteudo">TIPO</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </li>
        <li class='has-sub'><a href='#'>MOVIMENTAÇÃO</a>
            <ul>
                <?php if($online->permission('filtrar_usuario')): ?>
                    <li>
                        <a href="filtrar_usuario.php" target="conteudo">USUARIO</a>
                    </li>
                <?php endif; ?>
                <?php if($online->permission('filtrar_funcionario')): ?>
                    <li>
                        <a href="filtrar_funcionario.php" target="conteudo">FUNCIONARIO</a>
                    </li>
                <?php endif; ?>
                <li><a>PRODUTO</a>
                    <ul>
                        <?php if($online->permission('filtrar_produto')): ?>
                            <li>
                                <a href="filtrar_produto.php" target="conteudo">PRODUTO</a>
                            </li>
                        <?php endif; ?>
                        <?php if($online->permission('list_fornecedor_produto')): ?>
                            <li>
                                <a href="list_fornecedor_produto.php" target="conteudo">FORNECEDOR</a>
                            </li>
                        <?php endif; ?>
                        <?php if($online->permission('list_tipo_produto')): ?>
                            <li>
                                <a href="list_tipo_produto.php" target="conteudo">TIPO</a>
                            </li>
                        <?php endif; ?>
                    </ul>
            </ul>
        </li>
        <?php if($online->permission('configuracoes')): ?>
            <li><a href='configuracoes.php' target="conteudo">CONFIGURAÇÕES</a></li>
        <?php endif; ?>
        <?php if($online->administrador() || $config->usuario_permite_editar_proprio_cadastro == 1): ?>
            <li><a href="editar_usuario.php?usuario_id=<?php echo $online->usuario_id; ?>" target="conteudo"><?php echo $online->nome; ?></a></li>
        <?php else: ?>
            <li><a href="#"><?php echo $online->nome; ?></a></li>
        <?php endif; ?>
        <li><a href='logout.php'>SAIR</a></li>
    </ul>
</div>
</body>
<html>