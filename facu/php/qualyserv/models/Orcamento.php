<?php
class Orcamento extends ActiveRecord\Model {
  static $table_name  = 'orcamento';
  static $primary_key = 'id';

  static $validates_presence_of = array(
    array('cliente_id', 'message' => 'Cliente invalido<br />')
  );

  public function itens(){
    return OrcamentoItem::find('all', array('conditions' => array('orcamento_id = ?', $this->id)));
  }

  public function cliente(){
    return Cliente::find($this->cliente_id);
  }

  public function endereco(){
    return Endereco::find($this->endereco_id);
  }

  public function propostas(){
    return Proposta::find('all', array('conditions' => array('orcamento_id = ? AND cancelado = ?', $this->id, 'false')));
  }

  public function proposta(){
    return Proposta::find('last', array('conditions' => array('orcamento_id = ? AND cancelado = ? AND fechado = ?', $this->id, 'false', 'true')));
  }

  public function to_s(){
    return "Num: {$this->id}, Cliente: {$this->cliente()->to_s()}, Itens: ".count($this->itens());
  }

  public function empresa_presta_todos_servicos($empresa){
    foreach($this->itens() as $item):
      $i = 0;
      foreach($empresa->servicos_prestados() as $servico):
        if($servico->servico_id == $item->servico_id):
          $i = 1;
          break;
        endif;
      endforeach;
      if($i == 0):
        return false;
      endif;
    endforeach;
    return true;
  }
}
?>
