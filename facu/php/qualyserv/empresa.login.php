<?php
  include 'base.php';
  include 'topo.php';
  include 'menu.php';
?>
<div id='base_corpo'>
  <div id='errors'>
    <?php echo $_GET['errors']; ?>
  </div>
  <form method="post" id='form_login' action="empresa.valida.php">
    <label> <font color="#FF0000" size="+1">Login:</font></label> <br />
    <input type="email" name="login" maxlength="50" required /> <br />
    <label> <font color="#FF0000" size="+1">Senha</font></label> <br />
    <input type="password" name="password" maxlength="50" required /> <br />
    <input class='button' type="submit" value="Entrar" />
  </form>
</div>
<?php
  include 'rodape.php';
?>