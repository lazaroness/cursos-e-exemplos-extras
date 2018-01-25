<?php
class EmpresaServicos extends ActiveRecord\Model {
  static $table_name  = 'empresa_servicos';
  static $primary_key = 'id';

  // VALIDACOES
  static $validates_presence_of = array(
    array('empresa_id', 'message' => 'Empresa não informada<br />'),
    array('servico_id', 'message' => 'Serviço não informado<br />')
  );

  public function servico(){
    return Servicos::find($this->servico_id);
  }

}
?>
