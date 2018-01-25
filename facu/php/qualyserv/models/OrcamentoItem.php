<?php
class OrcamentoItem extends ActiveRecord\Model {
  static $table_name  = 'orcamento_item';
  static $primary_key = 'id';

  // VALIDACOES
  static $validates_presence_of = array(
    array('orcamento_id', 'message' => 'Orcamento invalido<br />'),
    array('servico_id', 'message' => 'Servico invalido<br />')
  );

  public function servico(){
    return Servicos::find($this->servico_id);
  }

  public function to_s(){
    return "{$this->servico()->to_s()} - Data Previsão: {$this->data_previsao_inicio}";
  }
}
?>
