<?php
  include 'base.php';
  include 'cliente.online.php';
  include 'topo.php';
  include 'cliente.menu.php';

  if(isset($_REQUEST['id'])):
    $proposta = Proposta::find($_REQUEST['id']);
    $avaliacao = new EmpresaAvaliacao();
  endif;

  if(isset($_POST['save'])):
    $avaliacao = new EmpresaAvaliacao();
    $avaliacao->orcamento_id   = $_POST['orcamento_id'];
    $avaliacao->empresa_id     = $proposta->empresa_id;
    $avaliacao->msg_avaliacao  = $_POST['msg_avaliacao'];
    $avaliacao->data_avaliacao = date('d/m/y H:i:s');

    if($avaliacao->is_valid()):
      $avaliacao->save();
      header("Location: cliente.orcamento_detalhes.php?id={$avaliacao->orcamento_id}");
    endif;
  endif;
?>
<div id='base_corpo'>
  <form id="form" method="post" action="">
    <label>Empresa:</label>
    <input name="empresa" id="empresa" value="<?php echo $proposta->empresa()->to_s(); ?>" type="text" disabled />
    <label>Mensagem Avaliação:</label>
    <textarea name="msg_avaliacao" id="msg_avaliacao" required></textarea>
    <input name="orcamento_id" id="orcamento_id" value="<?php echo $proposta->orcamento_id; ?>" type="hidden" />
    <input class="button" name="save" id="save" type="submit" value="Gravar" />
  </form>
</div>
<script>
  jQuery('#msg_avaliacao').focus();
</script>
