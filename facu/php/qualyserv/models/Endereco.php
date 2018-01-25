<?php
class Endereco extends ActiveRecord\Model {
  static $table_name  = 'endereco';
  static $primary_key = 'id';

  // VALIDACOES
  static $validates_presence_of = array(
    array('cep', 'message' => 'CEP não pode ser vazio<br />'),
    array('logradouro', 'message' => 'Logradouro não pode ser vazio<br />'),
    array('numero', 'message' => 'Numero não pode ser vazio<br />'),
    array('cidade', 'message' => 'Cidade não pode ser vazio<br />'),
    array('bairro', 'message' => 'bairro não pode ser vazio<br />'),
    array('estado', 'message' => 'Estado não pode ser vazio<br />')
  );

  public function to_s(){
    return $this->logradouro.", ".$this->numero.", ".$this->bairro.", ".$this->cidade." - ".$this->estado." CEP: ".$this->cep;
  }
}
?>
