<?php
    require 'config/config_login.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $config->empresa; ?></title>

	<!-- -------------------------------------------------------------- -->
        <!-- ARQUIVOS .JS                                                   -->
	<!-- -------------------------------------------------------------- -->
        <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/ladda.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
        <script type="text/javascript">
            function AlertIt() {
                alert('Não implementado.');
            }
        </script>

        <!-- -------------------------------------------------------------- -->
	<!-- ARQUIVOS .CSS                                                  -->
        <!-- -------------------------------------------------------------- -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/login.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
        <link href="css/ladda.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="container">
            <div class="form-signin">
                <img src="<?php echo $config->path_logo;?>" style="width: 300px; height: 60px;" title="<?php echo $config->empresa;?>" /></a><br>
                <div id="form-signin">
                    <form method="post" action="acesso.php">
                        <input type="text" class="input-block-level" placeholder="E-mail" id="email" name="email">
                        <input type="password" class="input-block-level" placeholder="Senha" id="senha" name="senha">
                        <button id="btnLogOn" class="btn btn-large btn-primary btn-block">
                            <span class="ladda-label">Login</span>
                            <span class="ladda-spinner"></span>
                            <div class="ladda-progress" style="width: 0px;"></div>
                        </button>
                    </form>
                    <span>
                        <a href="javascript:AlertIt();">Esqueceu sua senha?</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="painel/">Não Sou Cliente.</a>
                    </span>
                </div>
            </div>           
            <p id="copyright">
                <span style="color:#006600; font-size:16px;">
                    <?php
                        if(isset($_GET['erro'])):
                            echo $_GET['erro'];
                        endif;
                    ?>
                </span>
                <br />
                <?php echo $config->empresa; ?>
            </p>
        </div>
    </body>

</html>