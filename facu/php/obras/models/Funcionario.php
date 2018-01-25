<?php

  class Funcionario extends ActiveRecord\Model {
    //-------------------------------------------------------------------------
    // DEFININDO A TABELA UTILIZADA
    //-------------------------------------------------------------------------
    static $table_name = 'tb_funcionario';

    //-------------------------------------------------------------------------
    // VALIDAÇÕES
    //-------------------------------------------------------------------------
    static $validates_presence_of = array(
      array('cargo',    'message' => '&nbsp;&nbsp;- Cargo não pode ser em branco!<br />',    'on' => 'save'),
      array('telefone', 'message' => '&nbsp;&nbsp;- Telefone não pode ser em branco!<br />', 'on' => 'save'),
      array('cpf',      'message' => '&nbsp;&nbsp;- CPF não pode ser em branco!<br />',      'on' => 'save'),
      array('cep',      'message' => '&nbsp;&nbsp;- CEP não pode ser em branco!<br />',      'on' => 'save'),
      array('numero',   'message' => '&nbsp;&nbsp;- Numero não pode ser em branco!<br />',   'on' => 'save'),
      array('rua',      'message' => '&nbsp;&nbsp;- Rua não pode ser em branco!<br />',      'on' => 'save'),
      array('bairro',   'message' => '&nbsp;&nbsp;- Bairro não pode ser em branco!<br />',   'on' => 'save'),
      array('cidade',   'message' => '&nbsp;&nbsp;- Cidade não pode ser em branco!<br />',   'on' => 'save'),
      array('estado',   'message' => '&nbsp;&nbsp;- Estado não pode ser em branco!<br />',   'on' => 'save')
    );

    static $validates_size_of = array(
      array('nome',  'within' => array(3,50),  'too_short' => '&nbsp;&nbsp;- Nome requer no minimo 3 caracteres!<br />'),
      array('cep',   'is' => 9,  'message' => '&nbsp;&nbsp;- CEP requer 9 caracteres (99999-999)!<br />'),
      array('ativo', 'is' => 1,  'message' => '&nbsp;&nbsp;- Ativo requer 1(0 ou 1) caracteres!<br />')
    );

    static $validates_uniqueness_of = array(
      array('cpf', 'message' => '&nbsp;&nbsp;- CPF já cadastrado!<br />', 'on' => 'save')
    );

  }

?>