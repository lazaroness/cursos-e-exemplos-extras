<?php
  include 'base.php';
  include 'cliente.online.php';
  include 'topo.php';
  include 'cliente.menu.php';

  if(isset($_REQUEST['id'])):
    $endereco = Endereco::find($_REQUEST['id']);
  else:
    $endereco = new Endereco();
  endif;

  if(isset($_POST['save'])):
    $endereco->cep         = $_POST['cep'];
    $endereco->logradouro  = $_POST['logradouro'];
    $endereco->numero      = $_POST['numero'];
    $endereco->cidade      = $_POST['cidade'];
    $endereco->bairro      = $_POST['bairro'];
    $endereco->estado      = $_POST['estado'];
    $endereco->complemento = $_POST['complemento'];
    $endereco->class_id    = $cliente->id;
    $endereco->class_name  = 'Cliente';
    $endereco->codigo_municipio = $_POST['codigo_municipio'];

    if($endereco->is_valid()):
      $endereco->save();
      header("Location: cliente.home.php");
    endif;
  endif;
?>
<div id='base_corpo'>
  <?php
    if($endereco->is_new_record()):
      echo "<h3>Endereco Cadastro</h3>";
    else:
      echo "<h3>Endereco Editar</h3>";
    endif;

    if($endereco->is_invalid() & isset($_POST['save'])):
      echo "<table id='errors'>";
        echo "<tr>";
          echo "<th>Erros:</th>";
        echo "</tr>";
        echo "<tr><td>".$endereco->errors->on('cep')."</td></tr>";
        echo "<tr><td>".$endereco->errors->on('logradouro')."</td></tr>";
        echo "<tr><td>".$endereco->errors->on('numero')."</td></tr>";
        echo "<tr><td>".$endereco->errors->on('cidade')."</td></tr>";
        echo "<tr><td>".$endereco->errors->on('bairro')."</td></tr>";
        echo "<tr><td>".$endereco->errors->on('estado')."</td></tr>";
      echo "</table>";
    endif;
  ?>
  <form id="form" method="post" action="">
    <label>CEP:</label>
    <input name="cep" id="cep" value="<?php echo $endereco->cep; ?>" type="text" required />
    <label>LOGRADOURO:</label>
    <input name="logradouro" id="logradouro" value="<?php echo $endereco->logradouro; ?>" type="text" required />
    <label>NUMERO:</label>
    <input name="numero" id="numero" value="<?php echo $endereco->numero; ?>" type="text" required />
    <label>CIDADE:</label>
    <input name="cidade" id="cidade" value="<?php echo $endereco->cidade; ?>" type="text" required />
    <label>BAIRRO:</label>
    <input name="bairro" id="bairro" value="<?php echo $endereco->bairro; ?>" type="text" required />
    <label>ESTADO:</label>
    <input name="estado" id="estado" value="<?php echo $endereco->estado; ?>" type="text" required />
    <label>COMPLEMENTO:</label>
    <input name="complemento" id="complemento" value="<?php echo $endereco->complemento; ?>" type="text" />
    <input name="codigo_municipio" id="codigo_municipio" value="<?php echo $endereco->codigo_municipio; ?>" type="hidden" />
    <input class="button" name="save" id="save" type="submit" value="Gravar" />
  </form>
</div>
<script>
  jQuery('#cep').focus();
</script>
