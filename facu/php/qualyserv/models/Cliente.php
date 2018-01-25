<?php
class Cliente extends ActiveRecord\Model {
  static $table_name  = 'cliente';
  static $primary_key = 'id';

  // VALIDACOES
  static $validates_presence_of = array(
    array('nome', 'message' => 'Nome não pode ser vazio<br />'),
    array('email', 'message' => 'Email não pode ser vazio<br />'),
    array('tipo', 'message' => 'Tipo não pode ser vazio<br />'),
    array('cpf_cnpj', 'message' => 'CPF/CNPJ não pode ser vazio<br />'),
    array('data_nasc_fund', 'message' => 'Data Nasc/Fund não pode ser vazio<br />'),
    array('sexo', 'message' => 'Sexo não pode ser vazio<br />'),
    array('senha', 'message' => 'Senha não pode ser vazia<br />'),
    array('confirmacao_senha', 'message' => 'Confirmação da senha não informada<br />')
  );

  static $validates_length_of = array(
    array('data_nasc_fund', 'is' => 10, 'message' => 'Data Invalida!<br />')
  );

  static $validates_uniqueness_of = array(
    array(array('cpf_cnpj'), 'message' => 'CPF/CNPJ já cadastrado!'),
    array(array('email'), 'message' => 'E-mail já cadastrado!')
  );

  public function validate(){
    if ($this->tipo == 'fisica' & strlen($this->cpf_cnpj) != 14):
      $this->errors->add('cpf_cnpj', "CPF invalido!");
    elseif($this->tipo == 'juridica' & strlen($this->cpf_cnpj) != 18):
      $this->errors->add('cpf_cnpj', "CNPJ invalido!");
    endif;
    if($this->senha != $this->confirmacao_senha):
      $this->errors->add('senha', 'Senha e Confirmação não são iguais!');
    endif;
  }

  public function config(){
    return AuthConfiguracao::last();
  }

  public function to_s(){
    return $this->nome;
  }

  public function enderecos(){
    return Endereco::find('all', array('conditions' => array('class_id = ? AND class_name = ?', $this->id, 'Cliente')));
  }

  public function telefones(){
    return Telefone::find('all', array('conditions' => array('class_id = ? AND class_name = ?', $this->id, 'Cliente')));
  }

  public function reset(){
    $time = date('dmYHis');
    $this->token = md5("{$this->id}.{$time}");
    $this->save();
  }

  public function trocar_senha($dados){
    #--------------------------------------------------------------------------
    # ATUALIZANDO O TOKEN PARA O QUE FOI ENVIADO POR E-MAIL SEJÁ INVALIDO
    #--------------------------------------------------------------------------
    $time = date('dmYHis');
    $this->token = md5("{$this->id}.{$time}");
    #--------------------------------------------------------------------------
    $this->senha = $dados['senha'];
    $this->confirmacao_senha = $dados['confirmacao'];
    return $this->save();
  }

  public function orcamentos_abertos(){
    return Orcamento::find('all', array('conditions' => array('cliente_id = ? AND fechado = ?', $this->id, 'false')));
  }

  public function orcamentos_fechados(){
    return Orcamento::find('all', array('conditions' => array('cliente_id = ? AND fechado = ?', $this->id, 'true')));
  }
}

?>
