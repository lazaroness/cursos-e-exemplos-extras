<?php
  require 'config/config.php';
  include 'empresa.online.php';

  if(isset($_POST['save'])):
    $servicos   = Servicos::find('all');
    $empresa_id = $_COOKIE['empresa_id'];
    foreach($servicos as $servico):
      if(isset($_POST["servico_{$servico->id}"])):
        $empresa_servico = EmpresaServicos::find('last', array('conditions' => array('servico_id = ? and empresa_id = ?', $servico->id, $empresa_id)));
        if(is_blank($empresa_servico) == 'sim'):
          $empresa_servico = new EmpresaServicos();
        endif;
        $empresa_servico->empresa_id = $empresa_id;
        $empresa_servico->servico_id = $servico->id;
        $empresa_servico->save();
      else:
        $empresa_servico = EmpresaServicos::find('last', array('conditions' => array('servico_id = ? and empresa_id = ?', $servico->id, $empresa_id)));
        if(is_blank($empresa_servico) == 'nao'):
          $empresa_servico->delete();
        endif;
      endif;
    endforeach;
    header("Location: empresa.configuracoes.php?msg=Operação efetuada com sucesso!!!");
  else:
    header("Location: empresa.home.php");
  endif;
?>
