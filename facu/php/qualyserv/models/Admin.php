<?php
class Admin extends ActiveRecord\Model {
  static $table_name  = 'administrador';
  static $primary_key = 'id';

  // VALIDACOES
  static $validates_presence_of = array(
    array('email', 'message' => 'E-mail não pode ser vazio<br />'),
    array('senha', 'message' => 'Senha não pode ser vazio<br />'),
    array('confirmacao_senha', 'message' => 'Senha não pode ser vazio<br />'),
    array('nome_completo', 'message' => 'Nome não pode ser vazio<br />'),
  );

  static $validates_size_of = array(
    array('nome_completo', 'minimum' => 3, 'too_long' => 'Nome Requer no minimo 3 caracteres!')
  );

  static $validates_uniqueness_of = array(
    array(array('email'), 'message' => 'E-mail já cadastrado!')
  );

  public function validate(){
    if($this->senha != $this->confirmacao_senha):
      $this->errors->add('senha', 'Senha e Confirmação não são iguais!');
    endif;
  }

  public function to_s(){
    return $this->nome_completo;
  }
}
?>
