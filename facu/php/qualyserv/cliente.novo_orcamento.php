<?php
  include 'base.php';
  include('cliente.online.php');
  include('topo.php');
  echo "<div style='text-align:center;'>Bem-vindo(a) ".$_COOKIE['cliente']."</div>";
  include('cliente.menu.php');

  if(isset($_REQUEST['novo']) == 'sim'):
    $orcamento = Orcamento::find('last', array('conditions' => array('cliente_id = ? AND concluido = ?', $cliente->id, 'false')));
    if(is_blank($orcamento) == 'sim'):
      $orcamento = new Orcamento();
    endif;
  endif;

  if(is_blank($_REQUEST['id']) == 'nao'):
    $orcamento = Orcamento::find($_REQUEST['id']);
  endif;

  if(is_blank($_POST['orcamento_id']) == 'sim' & isset($_POST['define_endereco'])):
    $orcamento = new Orcamento();
    $orcamento->cliente_id  = $cliente->id;
    $orcamento->endereco_id = $_POST['endereco_id'];
    $orcamento->save();
  endif;

  if(is_blank($_POST['orcamento_id']) == 'nao' & isset($_POST['define_endereco'])):
    $orcamento = Orcamento::find($_POST['orcamento_id']);
    $orcamento->endereco_id = $_POST['endereco_id'];
    $orcamento->save();
  endif;

  if(is_blank($_POST['orcamento_id']) == 'sim' & isset($_POST['save'])):
    $orcamento = new Orcamento();
    $orcamento->cliente_id = $cliente->id;
    $orcamento->save();

    $novo_item = new OrcamentoItem();
    $novo_item->servico_id           = $_POST['servico_id'];
    $novo_item->orcamento_id         = $orcamento->id;
    $novo_item->data_previsao_inicio = $_POST['data_previsao_inicio'];
    $novo_item->save();
  endif;

  if(is_blank($_POST['orcamento_id']) == 'nao' & isset($_POST['save'])):
    $orcamento = Orcamento::find($_POST['orcamento_id']);

    $novo_item = new OrcamentoItem();
    $novo_item->servico_id           = $_POST['servico_id'];
    $novo_item->orcamento_id         = $orcamento->id;
    $novo_item->data_previsao_inicio = $_POST['data_previsao_inicio'];
    $novo_item->save();
  endif;

  # CODIGO PARA ADICAO DO ITEM

  echo "<div id='base_corpo'>";
    if(isset($_REQUEST['msg'])):
      echo "<div id='msg'>";
      echo "<img src='{$img}alerta.png' />&nbsp;&nbsp;{$_REQUEST['msg']}";
      echo "</div>";
      echo "<script>";
        echo "$('#msg').effect('pulsate');";
      echo "</script>";
    endif;

    echo "<div style='border: 1px solid #000000; padding: 5px; margin-bottom: 5px; height: 40px;'>";
      echo "<div 'orcamento' style='width: 70%; text-align: left; float: left; height: 39px; margin-top: 12px;'>";
        echo "ORÇAMENTO: <font color='#ff0000'>{$orcamento->id}</font>&nbsp;&nbsp;";
      echo "</div>";
      echo "<div id='concluir' style='width: 30%; text-align: right; float: left;'>";
        echo "<a href='cliente.orcamento_concluir.php?id={$orcamento->id}' style='text-decoration: none;'>";
          echo "<input class='button' style='width: 100%;' name='save' id='save' type='button' value='Concluir' />";
        echo "</a>";
      echo "</div>";
    echo "</div>";

    echo "<form id='form' action='cliente.novo_orcamento.php' method='post'>";
      echo "<input name='orcamento_id' id='orcamento_id' value='".$orcamento->id."' type='hidden' required />";
      echo "<label>ENDEREÇO:</label>";
      echo "<select name='endereco_id' id='endereco_id' required>";
        echo "<option value=''>-- SELECIONE --</option>";
        foreach($cliente->enderecos() as $endereco):
          echo "<option value='{$endereco->id}'>{$endereco->to_s()}</option>";
        endforeach;
      echo "</select>";
      echo "<input class='button' name='define_endereco' id='define_endereco' type='submit' value='Gravar Endereço' />";
    echo "</form>";

    echo "<div style='border-bottom: 1px dashed #000000; border-top: 1px dashed #000000; padding: 5px; margin-bottom: 5px; margin-top: 10px;'>";
      echo "ADICIONAR ITEM:";
    echo "</div>";
    echo "<form id='form' action='cliente.novo_orcamento.php' method='post'>";
      echo "<input name='orcamento_id' id='orcamento_id' value='".$orcamento->id."' type='hidden' required />";
      echo "<label>SERVIÇO:</label>";
      echo "<select name='servico_id' id='servico_id' required>";
        $servicos = Servicos::find('all');
        echo "<option value=''>-- SELECIONE --</option>";
        foreach($servicos as $servico):
          echo "<option value='".$servico->id."'>".$servico->descricao."</option>";
        endforeach;
      echo "</select>";
      echo "<label>DATA PREVISÃO INICIO:</label>";
      echo "<input name='data_previsao_inicio' id='data_previsao_inicio' type='text' />";

      echo "<input class='button' name='save' id='save' type='submit' value='Adicionar Serviço' />";
    echo "</form>";

    echo "<br />";

    echo "<div style='border: 1px solid #000000; padding: 5px; margin-bottom: 5px;'>";
      echo "ITENS";
    echo "</div>";
    echo "<div id='itens' style='width: 100%; height: auto;'>";
      foreach($orcamento->itens() as $item):
        echo "<div id='item' style='width: 100%;'>";
          echo "{$item->to_s()}&nbsp;";
          echo "<a href='cliente.orcamento_item_excluir.php?id=".$item->id."'>";
            echo "<img src='".$img."cancelar.png' title='Excluir' alt='Excluir' />";
          echo "</a>";
        echo "</div>";
        echo "<hr />";
      endforeach;
    echo "</div>";
  echo "</div>";

  include 'rodape.php';
?>
<script>
  $('#endereco_id option[value="<?php echo $orcamento->endereco_id; ?>"]').attr({ selected : "selected" });
</script>

