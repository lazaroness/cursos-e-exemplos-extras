<?php
class AuthConfiguracao extends ActiveRecord\Model {
    static $table_name = 'auth_configuracao';
    static $primary_key = 'id';

    // VALIDACOES
    static $validates_presence_of = array( array('system_name'));
}
?>
