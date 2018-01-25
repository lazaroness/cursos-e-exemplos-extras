<?php
class Telefone extends ActiveRecord\Model {
  static $table_name  = 'telefone';
  static $primary_key = 'id';

  // VALIDACOES
  static $validates_presence_of = array(
    array('tipo', 'message' => 'Tipo não pode ser vazio<br />'),
    array('ddd', 'message' => 'DDD não pode ser vazio<br />'),
    array('numero', 'message' => 'Numero não pode ser vazio<br />'),
    array('class_id', 'message' => 'ID do registro ao qual pertence não pode ser vazio<br />'),
    array('class_name', 'message' => 'CLASS do registro ao qual pertence não pode ser vazio<br />')
  );

  public function to_s(){
    return "{$this->tipo} - ({$this->ddd}) {$this->numero}";
  }
}
?>
