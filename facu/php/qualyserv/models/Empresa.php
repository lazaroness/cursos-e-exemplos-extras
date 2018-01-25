<?php
class Empresa extends ActiveRecord\Model {
  static $table_name  = 'empresa';
  static $primary_key = 'id';

  # VALIDACOES
  static $validates_presence_of = array(
    array('razao_social', 'message' => 'Razao Social não pode ser vazio<br />'),
    array('nome_fantasia', 'message' => 'Nome Fantasia não pode ser vazio<br />'),
    array('email', 'message' => 'Email não pode ser vazio<br />'),
    array('cnpj', 'message' => 'CNPJ não pode ser vazio<br />'),
    array('data_fundacao', 'message' => 'Data de Fundação não pode ser vazio<br />'),
    array('cep', 'message' => 'Cep não pode ser vazio<br />'),
    array('logradouro', 'message' => 'Logradouro não pode ser vazio<br />'),
    array('numero', 'message' => 'Numero não pode ser vazio<br />'),
    array('cidade', 'message' => 'Cidade não pode ser vazia<br />'),
    array('estado', 'message' => 'Estado não pode ser vazio<br />'),
    array('senha', 'message' => 'Senha não pode ser vazia<br />'),
    array('confirmacao_senha', 'message' => 'Confirmação da senha não informada<br />')
  );

  static $validates_uniqueness_of = array(
    array(array('cnpj'), 'message' => 'CNPJ já cadastrado!'),
    array(array('email'), 'message' => 'E-mail já cadastrado!')
  );

  public function validate(){
    if($this->senha != $this->confirmacao_senha):
      $this->errors->add('senha', 'Senha e Confirmação não são iguais!');
    endif;
  }

  public function to_s(){
    return $this->nome_fantasia;
  }

  public function config(){
    return AuthConfiguracao::last();
  }

  public function telefones(){
    return Telefone::find('all', array('conditions' => array('class_id = ? AND class_name = ?', $this->id, 'Empresa')));
  }

  public function avaliacoes(){
    return EmpresaAvaliacao::find('all', array('conditions' => array('empresa_id = ?', $this->id)));
  }

  public function servicos_prestados(){
    return EmpresaServicos::find('all', array('conditions' => array('empresa_id = ?', $this->id)));
  }

  public function orcamentos_disponiveis(){
    $orcamentos = Orcamento::find('all', array('conditions' => array('fechado = ? AND concluido = ?', 'false', 'true')));
    $orcamentos_disponiveis = array();
    foreach($orcamentos as $orcamento):
      if($orcamento->empresa_presta_todos_servicos($this)):
        if(is_blank($this->proposta($orcamento->id)) == 'sim'):
          array_push($orcamentos_disponiveis, $orcamento);
        endif;
      endif;
    endforeach;

    return $orcamentos_disponiveis;
  }

  public function proposta($orcamento_id){
    return Proposta::find('last', array('conditions' => array('orcamento_id = ? AND empresa_id = ? AND cancelado = ?', $orcamento_id, $this->id, 'false')));
  }

  public function propostas_abertas(){
    return Proposta::find('all', array('conditions' => array('empresa_id = ? AND cancelado = ? AND fechado = ?', $this->id, 'false', 'false')));
  }

  public function propostas_fechadas(){
    return Proposta::find('all', array('conditions' => array('empresa_id = ? AND cancelado = ? AND fechado = ?', $this->id, 'false', 'true')));
  }

  public function reset(){
    $time = date('dmYHis');
    $this->token = md5("{$this->id}.{$time}");
    $this->save();
  }

  public function trocar_senha($dados){
    $time = date('dmyHis');
    $this->token = md5("{$this->id}.{$time}");
    $this->senha = $dados['senha'];
    $this->confirmacao_senha = $dados['confirmacao'];
    return $this->save();
  }

}

?>
