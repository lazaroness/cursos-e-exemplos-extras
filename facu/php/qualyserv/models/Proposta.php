<?php
class Proposta extends ActiveRecord\Model {
  static $table_name  = 'orcamento_proposta';
  static $primary_key = 'id';

  public function orcamento(){
    return Orcamento::find($this->orcamento_id);
  }

  public function empresa(){
    return Empresa::find($this->empresa_id);
  }

  public function to_s(){
    return "<b>Orçamento:</b> {$this->orcamento_id}, <b>Valor:</b> R$ {$this->valor}, <b>Data Previsão Inicio:</b> {$this->data_prev_inicio}, <b>Observação:</b> {$this->observacao}";
  }

  public function avaliacao(){
    return EmpresaAvaliacao::find('last', array('conditions' => array('orcamento_id = ?', $this->orcamento_id)));
  }
}
?>
