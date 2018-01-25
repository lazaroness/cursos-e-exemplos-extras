<?php
  # ADICIONANDO A BIBLIOTECA DO ACTIVERECORD
  require_once('librarys/php-activerecord/ActiveRecord.php');

  # ADICIONANDO METODOS AUXILIARES
  if(empty($helper)){ include('helper_methods.php'); };

  $connections = array(
    'development' => 'mysql://root:123456@localhost/qualyserv3?charset=utf8',
    'production'  => 'mysql://u208450697_prod:123456@mysql.hostinger.com.br/u208450697_prod?charset=utf8',
    'psql'        => 'psql://postgres:123456@localhost/qualyserv?charset=utf8'
  );

  $cfg = ActiveRecord\Config::instance();
  $cfg->set_model_directory('models');
  $cfg->set_connections($connections);
  $cfg->set_default_connection('development');

  // CONFIGURAÇÕES DO SISTEMA
  $config = AuthConfiguracao::last();

  // CAMINHO DAS IMAGENS
  $img = "img/";
?>
