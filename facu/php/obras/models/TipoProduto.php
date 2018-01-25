<?php

    class TipoProduto extends ActiveRecord\Model {
        //---------------------------------------------------------------------
        // DEFININDO A TABELA UTILIZADA
        //---------------------------------------------------------------------
        static $table_name = 'tb_tipo_produto';

        //---------------------------------------------------------------------
        // VALIDAÇÕES
        //---------------------------------------------------------------------
        static $validates_presence_of = array(
            array('descricao', 'message' => '&nbsp;&nbsp;- Descrição não pode ser em branco!<br />',  'on' => 'save')
        );

        static $validates_uniqueness_of = array(
            array('descricao', 'message' => '&nbsp;&nbsp;- Descrição já utilizada!<br />', 'on' => 'save')
        );
    
    }

?>