<?php

  class Fornecedor extends ActiveRecord\Model {
    //-------------------------------------------------------------------------
    // DEFININDO A TABELA UTILIZADA
    //-------------------------------------------------------------------------
    static $table_name = 'tb_fornecedor';

    //-------------------------------------------------------------------------
    // VALIDAÇÕES
    //-------------------------------------------------------------------------
    static $validates_presence_of = array(
      array('telefone', 'message' => '&nbsp;&nbsp;- Telefone não pode ser em branco!<br />', 'on' => 'save'),
      array('email',    'message' => '&nbsp;&nbsp;- Email não pode ser em branco!<br />',      'on' => 'save'),
      array('cnpj',     'message' => '&nbsp;&nbsp;- CNPJ não pode ser em branco!<br />',      'on' => 'save'),
      array('cep',      'message' => '&nbsp;&nbsp;- CEP não pode ser em branco!<br />',      'on' => 'save'),
      array('numero',   'message' => '&nbsp;&nbsp;- Numero não pode ser em branco!<br />',   'on' => 'save'),
      array('rua',      'message' => '&nbsp;&nbsp;- Rua não pode ser em branco!<br />',      'on' => 'save'),
      array('bairro',   'message' => '&nbsp;&nbsp;- Bairro não pode ser em branco!<br />',   'on' => 'save'),
      array('cidade',   'message' => '&nbsp;&nbsp;- Cidade não pode ser em branco!<br />',   'on' => 'save'),
      array('estado',   'message' => '&nbsp;&nbsp;- Estado não pode ser em branco!<br />',   'on' => 'save')
    );

    static $validates_size_of = array(
      array('nome',  'within' => array(3,50),  'too_short' => '&nbsp;&nbsp;- Nome requer no minimo 3 caracteres!<br />')
    );

    static $validates_uniqueness_of = array(
      array('cnpj', 'message' => '&nbsp;&nbsp;- CNPJ já cadastrado!<br />', 'on' => 'save')
    );

  }

?>