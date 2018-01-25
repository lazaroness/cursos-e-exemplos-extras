<?php

    class Produto extends ActiveRecord\Model {
        //---------------------------------------------------------------------
        // DEFININDO A TABELA UTILIZADA
        //---------------------------------------------------------------------
        static $table_name = 'tb_produto';

        //---------------------------------------------------------------------
        // RELACIONAMENTOS
        //---------------------------------------------------------------------
        static $has_one = array(
            array(
                'fornecedor',
                'class_name' => 'Fornecedor',
                'primary_key' => 'fornecedor_id',
                'foreign_key' => 'fornecedor_id'
            )
        );

        //---------------------------------------------------------------------
        // VALIDAÇÕES
        //---------------------------------------------------------------------
        static $validates_presence_of = array(
            array('descricao',       'message' => '&nbsp;&nbsp;- Descrição não pode ser em branco!<br />',       'on' => 'save'),
            array('cor',             'message' => '&nbsp;&nbsp;- Cor não pode ser em branco!<br />',             'on' => 'save'),
            array('material',        'message' => '&nbsp;&nbsp;- Material não pode ser em branco!<br />',        'on' => 'save'),
            array('preco_compra',    'message' => '&nbsp;&nbsp;- Preco de compra não pode ser em branco!<br />', 'on' => 'save'),
            array('preco_venda',     'message' => '&nbsp;&nbsp;- Preco de venda não pode ser em branco!<br />',  'on' => 'save'),
            array('tipo_produto_id', 'message' => '&nbsp;&nbsp;- Tipo Invalido!<br />',                          'on' => 'save'),
            array('fornecedor_id',   'message' => '&nbsp;&nbsp;- Fornecedor Invalido!<br />',                    'on' => 'save')
        );

        static $validates_uniqueness_of = array(
            array('descricao', 'message' => '&nbsp;&nbsp;- Descrição já utilizada!<br />', 'on' => 'save')
        );
    
    }

?>