<?php

  class Usuario extends ActiveRecord\Model {
    //-------------------------------------------------------------------------
    // DEFININDO A TABELA UTILIZADA
    //-------------------------------------------------------------------------
    static $table_name = 'tb_usuario';

    //-------------------------------------------------------------------------
    // VALIDAÇÕES
    //-------------------------------------------------------------------------
    static $validates_presence_of = array(
      array('senha',    'message' => '&nbsp;&nbsp;- Senha não pode ser em branco!<br />',    'on' => 'save'),
      array('email',    'message' => '&nbsp;&nbsp;- Email não pode ser em branco!<br />',    'on' => 'save'),
      array('telefone', 'message' => '&nbsp;&nbsp;- Telefone não pode ser em branco!<br />', 'on' => 'save'),
      array('ativo',    'message' => '&nbsp;&nbsp;- Ativo não pode ser em branco!<br />',    'on' => 'save')
    );

    static $validates_size_of = array(
      array('nome',  'within' => array(3,50), 'too_short' => '&nbsp;&nbsp;- Nome requer no minimo 3 caracteres!<br />'),
    );
 
    static $validates_uniqueness_of = array(
      array('email', 'message' => '&nbsp;&nbsp;- E-mail já utilizado!<br />', 'on' => 'save')
    );

    static $before_save = array('password');

    //-------------------------------------------------------------------------
    // CRIPTOGRAFIA DA SENHA
    //-------------------------------------------------------------------------
    public function password() {
        if($this->is_new_record()):
            $this->senha = md5($this->senha);
        endif;
    }

    public function administrador(){
        if ($this->admin == 1):
            return true;
        endif;
        return false;
    }

    public function permission($path){
        if ($this->administrador()):
            return true;
        elseif (UsuarioPermissao::find_by_path_and_usuario_id($path, $this->usuario_id) != ""):
            return true;
        endif;
        return false;
    }

  }

?>