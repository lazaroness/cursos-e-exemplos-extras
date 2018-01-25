<div id='base_corpo'>
  <h3>Cliente Login</h3>
  <form method="post" id='form_login' action="cliente.valida.php">
    <label> <font size="+1">Login:</font></label> <br />
    <input type="email" name="login" maxlength="50" required /> <br />
    <label> <font size="+1">Senha</font></label> <br />
    <input type="password" name="password" maxlength="50" required /> <br />
    <input class='button' type="submit" value="Entrar" />
  </form>
  <div id='reset_password'>
    <a href='cliente.reset.php'>Esqueci minha senha!</a>
  </div>
</div>
