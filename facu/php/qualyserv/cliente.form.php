<?php
  include 'base.php';
  include 'cliente.online.php';
  include 'topo.php';
  echo "<div style='text-align:center;'>Bem-vindo(a) ".$_COOKIE['cliente']."</div>";
  include 'cliente.menu.php';

  if(isset($_POST['save'])):
    $cliente->nome              = $_POST['nome'];
    $cliente->tipo              = $_POST['tipo'];
    $cliente->cpf_cnpj          = $_POST['cpf_cnpj'];
    $cliente->data_nasc_fund    = $_POST['data_nasc_fund'];
    $cliente->sexo              = $_POST['sexo'];
    if($cliente->is_valid()):
      $cliente->save();
      setcookie('cliente', $cliente->nome, time()+3600);
      header("Location: cliente.home.php");
    endif;
  endif;
?>
<div id="base_corpo">
  <?php
    if($cliente->is_invalid() & isset($_POST['save'])):
      echo "<table id='errors'>";
        echo "<tr>";
          echo "<th>Erros:</th>";
        echo "</tr>";
        echo "<tr><td>".$cliente->errors->on('nome')."</td></tr>";
        echo "<tr><td>".$cliente->errors->on('tipo')."</td></tr>";
        echo "<tr><td>".$cliente->errors->on('cpf_cnpj')."</td></tr>";
        echo "<tr><td>".$cliente->errors->on('data_nasc_fund')."</td></tr>";
        echo "<tr><td>".$cliente->errors->on('sexo')."</td></tr>";
      echo "</table>";
    endif;
  ?>
<h3>Cliente Editar</h3>
<form id="form" method="post" action="" onsubmit="return valida_form(this)">
  <label>Nome:</label>
  <input name="nome" id="nome" value="<?php echo $cliente->nome; ?>" type="text" required />
  <label>Tipo:</label>
  <select name="tipo" id="tipo" required>
    <option value="">&nbsp;</option>
    <option value="fisica">Fisica</option>
    <option value="juridica">Juridica</option>
  </select>
  <label>CPF/CNPJ:</label>
  <input name="cpf_cnpj" id="cpf_cnpj" value="<?php echo $cliente->cpf_cnpj; ?>" type="text" required />
  <label>SEXO:</label>
  <select name="sexo" id="sexo" required>
    <option value="">&nbsp;</option>
    <option value="masculino">Masculino</option>
    <option value="feminino">Feminino</option>
  </select>
  <label>DATA NASC/FUND:</label>
  <input name="data_nasc_fund" id="data_nasc_fund" value="<?php echo $cliente->data_nasc_fund; ?>" type="text" required />
  <input class='button' name="save" id="save" type="submit" value="GRAVAR" />
</form>
</div>
<script>
  $('#tipo option[value="<?php echo $cliente->tipo; ?>"]').attr({ selected : "selected" });
  $('#sexo option[value="<?php echo $cliente->sexo; ?>"]').attr({ selected : "selected" });
</script>
<?php include 'rodape.php'; ?>
