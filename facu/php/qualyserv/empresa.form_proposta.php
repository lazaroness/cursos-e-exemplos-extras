<?php

  if(isset($_POST['save'])):
    $proposta = $empresa->proposta($orcamento->id);
    if(is_blank($proposta) == 'sim'):
      $proposta = new Proposta();
    endif;
    $proposta->orcamento_id     = $_POST['orcamento_id'];
    $proposta->empresa_id       = $_POST['empresa_id'];
    $proposta->valor            = $_POST['valor'];
    $proposta->data_prev_inicio = $_POST['data_prev_inicio'];
    $proposta->observacao       = $_POST['observacao'];

    if($proposta->is_valid()):
      $proposta->save();
      include('librarys/enviar_email.php');
      $cliente = $proposta->orcamento()->cliente();
      enviar_email($cliente, array('assunto' => "{$cliente->to_s()}: Seu orçamento: {$proposta->orcamento_id} possui uma nova proposta!!!", 'template' => 'empresa.nova_proposta'));
      $msg = 'Operação efetuada com sucesso.';
      header("Location: empresa.propostas_abertas.php?msg={$msg}");
    else:
      $msg =  $proposta->errors->on('valor');
      $msg .= $proposta->errors->on('data_prev_inicio');
      $msg .= $proposta->errors->on('observacao');
      $msg .= $proposta->errors->on('orcamento_id');
      $msg .= $proposta->errors->on('empresa_id');
      header("Location: empresa.orcamento_detalhes.php?msg={$msg}");
    endif;

  endif;

  if(is_blank($proposta) == 'sim'):
    $proposta = $empresa->proposta($orcamento->id);
  endif;

  if(is_blank($proposta) == 'sim'):
    $proposta = new Proposta();
    $proposta->orcamento_id = $orcamento->id;
    $proposta->empresa_id   = $empresa->id;
  endif;

?>
<form id="form" method="post" action="">
  <label>Valor:</label>
  <input name="valor" id="valor" value="<?php echo $proposta->valor; ?>" type="text" required />
  <label>Data Previsão Inicio:</label>
  <input name="data_prev_inicio" id="data_prev_inicio" value="<?php echo $proposta->data_prev_inicio; ?>" type="text" required />
  <label>Observação:</label>
  <textarea name="observacao" id="observacao" required><?php echo $proposta->observacao; ?></textarea>
  <input name="orcamento_id" id="orcamento_id" value="<?php echo $proposta->orcamento_id; ?>" type="hidden" required />
  <input name="empresa_id" id="empresa_id" value="<?php echo $proposta->empresa_id; ?>" type="hidden" required />
  <input class="button" name="save" id="save" type="submit" value="Gravar" />
</form>
