<?php
  # inclue the ActiveRecord library
  require_once 'librarys/php-activerecord/ActiveRecord.php';

  $cfg = ActiveRecord\Config::instance();
  $cfg->set_model_directory('models');
  
  //LOCALHOST
  $cfg->set_connections(array('development' =>
    'mysql://root:usb30sata@localhost/tcc_obra'));
  // LOCALHOST WINDOWS
//  $cfg->set_connections(array('development' =>
//    'mysql://root@localhost/obra_2_0'));
  
  // REMOTO
//  $cfg->set_connections(array('development' =>
//    'mysql://u485728739_admin:gerenciamentoobras1@mysql.hostinger.com.br/u485728739_obras'));

  #----------------------------------------------------------------------------
  # CONFIGURACAO
  #----------------------------------------------------------------------------
  $config = Configuracao::find('last');
?>
