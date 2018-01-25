<?php
class Servicos extends ActiveRecord\Model {
  static $table_name  = 'servicos';
  static $primary_key = 'id';

  // VALIDACOES
  static $validates_presence_of = array(array('descricao'));

  public function to_s(){
    return "Cod: {$this->id}, {$this->descricao}";
  }
}
?>
