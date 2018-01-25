<?php
  include 'base.php';
  include 'cliente.online.php';
  include 'topo.php';
  include 'cliente.menu.php';

  if(isset($_REQUEST['id'])):
    $telefone = Telefone::find($_REQUEST['id']);
  else:
    $telefone = new Telefone();
  endif;

  if(isset($_POST['save'])):
    $telefone->tipo       = $_POST['tipo'];
    $telefone->ddd        = $_POST['ddd'];
    $telefone->numero     = $_POST['telefone'];
    $telefone->class_id   = $cliente->id;
    $telefone->class_name = 'Cliente';

    if($telefone->is_valid()):
      $telefone->save();
      header("Location: cliente.home.php");
    endif;
  endif;
?>
<div id='base_corpo'>
  <?php
    if($telefone->is_new_record()):
      echo "<h3>Telefone Cadastro</h3>";
    else:
      echo "<h3>Telefone Editar</h3>";
    endif;
  ?>
  <form id="form" method="post" action="">
    <label>TIPO:</label>
    <select name="tipo" id="tipo" required>
      <option value="">-- SELECIONE --</option>
      <option value="comercial">Comercial</option>
      <option value="residencial">Residencial</option>
      <option value="celular">Celular</option>
      <option value="Nextel">Rádio Nextel</option>
    </select>
    <label>DDD:</label>
    <input name="ddd" id="ddd" value="<?php echo $telefone->ddd; ?>" type="text" required />
    <label>NUMERO:</label>
    <input name="telefone" id="telefone" value="<?php echo $telefone->numero; ?>" type="text" required />
    <input class="button" name="save" id="save" type="submit" value="Gravar" />
  </form>
</div>
<?php
  include 'rodape.php';
?>
<script>
  $('#tipo option[value="<?php echo $telefone->tipo; ?>"]').attr({ selected : "selected" });
</script>
