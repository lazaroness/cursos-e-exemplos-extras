<?php
class EmpresaAvaliacao extends ActiveRecord\Model {
  static $table_name  = 'empresa_avaliacao';
  static $primary_key = 'id';

  # VALIDACOES
  static $validates_presence_of = array(
    array('orcamento_id',  'message' => 'Orçamento não informado.<br />'),
    array('empresa_id',    'message' => 'Empresa não informada.<br />'),
    array('msg_avaliacao', 'message' => 'Avaliação não informada.<br />')
  );

  public function orcamento(){
    return Orcamento::find($this->orcamento_id);
  }

  public function empresa(){
    return Empresa::find($this->empresa_id);
  }

  public function to_s(){
    return $this->msg_avaliacao;
  }

}
?>
