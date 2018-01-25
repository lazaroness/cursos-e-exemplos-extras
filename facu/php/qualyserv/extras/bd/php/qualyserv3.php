<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 0.2b
 */

//
// Database `qualyserv3`
//

// `qualyserv3`.`administrador`
$administrador = array(
  array('id' => '1','email' => 'lazarone.info.web@gmail.com','senha' => 'e10adc3949ba59abbe56e057f20f883e','confirmacao_senha' => 'e10adc3949ba59abbe56e057f20f883e','nome_completo' => 'admin_lazarone','arquivado' => 'false')
);

// `qualyserv3`.`auth_configuracao`
$auth_configuracao = array(
  array('id' => '1','system_name' => 'QualyServ','path_logo' => '','web_site' => 'www.qualyserv.16mb.com','email' => 'qualyserv2016@gmail.com','email_password' => 'tcc2016qualyserv','email_smtp_secure' => 'tls','email_smtp_auth' => 'true','email_host' => 'smtp.gmail.com','email_port' => '587')
);

// `qualyserv3`.`cliente`
$cliente = array(
  array('id' => '1','nome' => 'Lazarone Santos Santana','email' => 'lazarone.info.web@gmail.com','tipo' => 'fisica','cpf_cnpj' => '400.021.228-12','data_nasc_fund' => '06/04/1992','sexo' => 'masculino','senha' => 'e10adc3949ba59abbe56e057f20f883e','confirmacao_senha' => 'e10adc3949ba59abbe56e057f20f883e','token' => '0ef420eb5ba772af7ed268c9e4e62865'),
  array('id' => '2','nome' => 'Silas Andrade','email' => 'silas.s.andrade@gmail.com','tipo' => 'fisica','cpf_cnpj' => '123.456.789-00','data_nasc_fund' => '09/10/1988','sexo' => 'masculino','senha' => '202cb962ac59075b964b07152d234b70','confirmacao_senha' => '202cb962ac59075b964b07152d234b70','token' => NULL),
  array('id' => '3','nome' => 'ana carolina','email' => 'fernandes.ac@outlook.com','tipo' => 'fisica','cpf_cnpj' => '427.379.978-28','data_nasc_fund' => '19/12/1993','sexo' => 'feminino','senha' => '202cb962ac59075b964b07152d234b70','confirmacao_senha' => '202cb962ac59075b964b07152d234b70','token' => NULL)
);

// `qualyserv3`.`documento`
$documento = array(
);

// `qualyserv3`.`empresa`
$empresa = array(
  array('id' => '1','cnpj' => '05.259.747/0001-82','email' => 'financeiro@hadassaheitor.com.br','razao_social' => 'Hadassa e Heitor Limpeza Ltda','nome_fantasia' => 'Hadassa e Heitor Limpeza','data_fundacao' => '11/02/2011','senha' => 'e10adc3949ba59abbe56e057f20f883e','confirmacao_senha' => 'e10adc3949ba59abbe56e057f20f883e','inscricao_estadual' => '154.411.668.405','site' => 'www.hadassaheitor.com.br','cep' => '03627-030','logradouro' => 'Rua Sebastião José Francisco','numero' => '351','cidade' => 'São Paulo','bairro' => 'Vila Buenos Aires','complemento' => '','estado' => 'SP','codigo_municipio' => '3550308','token' => 'd28cf4152439ed9e5f6c1f7c1a2bc56b'),
  array('id' => '2','cnpj' => '12.345.678/9091-23','email' => 'silas.s.andrade@gmail.com','razao_social' => 'mbrune serv','nome_fantasia' => 'mbrune Serv','data_fundacao' => '08/09/1998','senha' => 'e10adc3949ba59abbe56e057f20f883e','confirmacao_senha' => 'e10adc3949ba59abbe56e057f20f883e','inscricao_estadual' => '','site' => 'silas.s.andrade@gmail.com','cep' => '06655-000','logradouro' => 'Rua Cláudia','numero' => '12','cidade' => 'Itapevi','bairro' => 'Jardim Santo Américo','complemento' => 'Escritorio','estado' => 'SP','codigo_municipio' => '3522505','token' => NULL),
  array('id' => '3','cnpj' => '11.111.111/1111-11','email' => 'sbrune100@gmail.com','razao_social' => 'silas silva','nome_fantasia' => 'abrune','data_fundacao' => '09/10/1998','senha' => '202cb962ac59075b964b07152d234b70','confirmacao_senha' => '202cb962ac59075b964b07152d234b70','inscricao_estadual' => '','site' => 'sbrune100@gmail.com','cep' => '08598-000','logradouro' => 'Estrada Municipal do Mandi','numero' => '11','cidade' => 'Itaquaquecetuba','bairro' => 'Mandi','complemento' => 'Escritorio','estado' => 'SP','codigo_municipio' => '3523107','token' => NULL),
  array('id' => '4','cnpj' => '22.222.222/2222-22','email' => 'mbrune10@gmail.com','razao_social' => 'Marcos Andrade','nome_fantasia' => 'mbrune wbrune','data_fundacao' => '22/09/1999','senha' => '202cb962ac59075b964b07152d234b70','confirmacao_senha' => '202cb962ac59075b964b07152d234b70','inscricao_estadual' => '','site' => '','cep' => '06622-000','logradouro' => 'Rua Ailton Esteves de Melo','numero' => '22','cidade' => 'Jandira','bairro' => 'Jardim Sol Nascente','complemento' => '','estado' => 'SP','codigo_municipio' => '3525003','token' => NULL)
);

// `qualyserv3`.`empresa_avaliacao`
$empresa_avaliacao = array(
  array('id' => '2','empresa_id' => '1','orcamento_id' => '1','msg_avaliacao' => 'teste de exibição das avaliações','data_avaliacao' => '22/05/2016')
);

// `qualyserv3`.`empresa_servicos`
$empresa_servicos = array(
  array('id' => '1','empresa_id' => '1','servico_id' => '6'),
  array('id' => '2','empresa_id' => '1','servico_id' => '9'),
  array('id' => '3','empresa_id' => '1','servico_id' => '11'),
  array('id' => '4','empresa_id' => '1','servico_id' => '2'),
  array('id' => '5','empresa_id' => '1','servico_id' => '1'),
  array('id' => '6','empresa_id' => '2','servico_id' => '1'),
  array('id' => '7','empresa_id' => '2','servico_id' => '2'),
  array('id' => '8','empresa_id' => '2','servico_id' => '3'),
  array('id' => '9','empresa_id' => '2','servico_id' => '4'),
  array('id' => '10','empresa_id' => '2','servico_id' => '5'),
  array('id' => '11','empresa_id' => '2','servico_id' => '6'),
  array('id' => '12','empresa_id' => '2','servico_id' => '7'),
  array('id' => '13','empresa_id' => '2','servico_id' => '8'),
  array('id' => '14','empresa_id' => '2','servico_id' => '9'),
  array('id' => '15','empresa_id' => '2','servico_id' => '10'),
  array('id' => '16','empresa_id' => '2','servico_id' => '11'),
  array('id' => '17','empresa_id' => '3','servico_id' => '1'),
  array('id' => '18','empresa_id' => '3','servico_id' => '2'),
  array('id' => '19','empresa_id' => '3','servico_id' => '3'),
  array('id' => '21','empresa_id' => '3','servico_id' => '5'),
  array('id' => '22','empresa_id' => '3','servico_id' => '6'),
  array('id' => '23','empresa_id' => '3','servico_id' => '7'),
  array('id' => '24','empresa_id' => '3','servico_id' => '8'),
  array('id' => '25','empresa_id' => '3','servico_id' => '9'),
  array('id' => '26','empresa_id' => '3','servico_id' => '10'),
  array('id' => '27','empresa_id' => '3','servico_id' => '11'),
  array('id' => '28','empresa_id' => '4','servico_id' => '1'),
  array('id' => '29','empresa_id' => '4','servico_id' => '2'),
  array('id' => '30','empresa_id' => '4','servico_id' => '3'),
  array('id' => '31','empresa_id' => '4','servico_id' => '4'),
  array('id' => '32','empresa_id' => '4','servico_id' => '5'),
  array('id' => '33','empresa_id' => '4','servico_id' => '6'),
  array('id' => '34','empresa_id' => '4','servico_id' => '7'),
  array('id' => '35','empresa_id' => '4','servico_id' => '8'),
  array('id' => '36','empresa_id' => '4','servico_id' => '9'),
  array('id' => '37','empresa_id' => '4','servico_id' => '10'),
  array('id' => '38','empresa_id' => '4','servico_id' => '11')
);

// `qualyserv3`.`endereco`
$endereco = array(
  array('id' => '1','cep' => '06150-510','logradouro' => 'Estrada dos Jasmins','numero' => '9','bairro' => 'Santa Maria','cidade' => 'Osasco','estado' => 'SP','complemento' => '','codigo_municipio' => '3534401','class_id' => '1','class_name' => 'Cliente'),
  array('id' => '2','cep' => '40286-020','logradouro' => 'Rua Jardim Lucaia','numero' => '201','bairro' => 'Brotas','cidade' => 'Salvador','estado' => 'BA','complemento' => 'Desenvolvimento','codigo_municipio' => '2927408','class_id' => '1','class_name' => 'Cliente'),
  array('id' => '3','cep' => '06656-110','logradouro' => 'Avenida dos Bugres','numero' => '104','bairro' => 'Jardim Bela Vista','cidade' => 'Itapevi','estado' => 'SP','complemento' => '','codigo_municipio' => '3522505','class_id' => '2','class_name' => 'Cliente'),
  array('id' => '4','cep' => '06326-455','logradouro' => 'Rua Tatuí','numero' => '185','bairro' => 'Conjunto Habitacional Presidente Castelo Branco','cidade' => 'Carapicuíba','estado' => 'SP','complemento' => '','codigo_municipio' => '3510609','class_id' => '3','class_name' => 'Cliente')
);

// `qualyserv3`.`orcamento`
$orcamento = array(
  array('id' => '1','cliente_id' => '1','observacao' => NULL,'fechado' => 'true','concluido' => 'true','endereco_id' => '1'),
  array('id' => '2','cliente_id' => '1','observacao' => NULL,'fechado' => 'false','concluido' => 'true','endereco_id' => '2'),
  array('id' => '3','cliente_id' => '1','observacao' => NULL,'fechado' => 'false','concluido' => 'true','endereco_id' => '1'),
  array('id' => '4','cliente_id' => '2','observacao' => NULL,'fechado' => 'true','concluido' => 'true','endereco_id' => '3'),
  array('id' => '5','cliente_id' => '1','observacao' => NULL,'fechado' => 'false','concluido' => 'false','endereco_id' => NULL),
  array('id' => '6','cliente_id' => '3','observacao' => NULL,'fechado' => 'false','concluido' => 'true','endereco_id' => '4'),
  array('id' => '7','cliente_id' => '2','observacao' => NULL,'fechado' => 'false','concluido' => 'true','endereco_id' => '3')
);

// `qualyserv3`.`orcamento_item`
$orcamento_item = array(
  array('id' => '1','orcamento_id' => '1','servico_id' => '1','data_previsao_inicio' => '17/05/2016'),
  array('id' => '2','orcamento_id' => '2','servico_id' => '6','data_previsao_inicio' => '20/05/2016'),
  array('id' => '3','orcamento_id' => '3','servico_id' => '1','data_previsao_inicio' => '17/05/2016'),
  array('id' => '9','orcamento_id' => '4','servico_id' => '4','data_previsao_inicio' => '23/05/2016'),
  array('id' => '8','orcamento_id' => '4','servico_id' => '4','data_previsao_inicio' => '23/05/2016'),
  array('id' => '7','orcamento_id' => '5','servico_id' => '1','data_previsao_inicio' => '25/05/2016'),
  array('id' => '10','orcamento_id' => '6','servico_id' => '1','data_previsao_inicio' => '25/05/2016'),
  array('id' => '11','orcamento_id' => '6','servico_id' => '4','data_previsao_inicio' => '25/05/2016'),
  array('id' => '12','orcamento_id' => '7','servico_id' => '8','data_previsao_inicio' => '24/06/2016')
);

// `qualyserv3`.`orcamento_proposta`
$orcamento_proposta = array(
  array('id' => '1','orcamento_id' => '1','empresa_id' => '1','valor' => '50.00','observacao' => 'sÃ³ posso comeÃ§ar o serviÃ§o a partir do dia 19/05','data_prev_inicio' => '19/05/2016','cancelado' => 'false','fechado' => 'true'),
  array('id' => '3','orcamento_id' => '2','empresa_id' => '1','valor' => '75.00','observacao' => 'teste de filtro','data_prev_inicio' => '18/05/2016','cancelado' => 'false','fechado' => 'false'),
  array('id' => '4','orcamento_id' => '3','empresa_id' => '1','valor' => '250.00','observacao' => 'teste de envio de email','data_prev_inicio' => '18/05/2016','cancelado' => 'false','fechado' => 'false'),
  array('id' => '5','orcamento_id' => '2','empresa_id' => '2','valor' => '120,00','observacao' => 'Inicio dia 28/05','data_prev_inicio' => 'inicio','cancelado' => 'false','fechado' => 'false'),
  array('id' => '6','orcamento_id' => '3','empresa_id' => '3','valor' => '400','observacao' => '18/05/2016','data_prev_inicio' => 'fechado','cancelado' => 'false','fechado' => 'false'),
  array('id' => '7','orcamento_id' => '4','empresa_id' => '3','valor' => '100.00','observacao' => 'Cobro 100 reais o dia de trabalho','data_prev_inicio' => '30/05/2016','cancelado' => 'false','fechado' => 'true')
);

// `qualyserv3`.`servicos`
$servicos = array(
  array('id' => '1','descricao' => 'Eletrica'),
  array('id' => '2','descricao' => 'Instalacao de Som e Imagem'),
  array('id' => '3','descricao' => 'Encanador'),
  array('id' => '4','descricao' => 'Pedreiro'),
  array('id' => '5','descricao' => 'Instalacao de Pisos e Revestimentos'),
  array('id' => '6','descricao' => 'Fixacao'),
  array('id' => '7','descricao' => 'Montagem de moveis'),
  array('id' => '8','descricao' => 'Ar Condicionado'),
  array('id' => '9','descricao' => 'Caixa D\' agua'),
  array('id' => '10','descricao' => 'Pintura e Papel de parede'),
  array('id' => '11','descricao' => 'Portas e Janelas')
);

// `qualyserv3`.`servico_materiais`
$servico_materiais = array(
);

// `qualyserv3`.`telefone`
$telefone = array(
  array('id' => '1','tipo' => 'celular','ddd' => '011','numero' => '9 9862-3698','class_id' => '1','class_name' => 'Empresa'),
  array('id' => '2','tipo' => 'comercial','ddd' => '011','numero' => '2941-0580','class_id' => '1','class_name' => 'Empresa'),
  array('id' => '3','tipo' => 'residencial','ddd' => '011','numero' => '3683-4998','class_id' => '1','class_name' => 'Empresa'),
  array('id' => '4','tipo' => 'celular','ddd' => '011','numero' => '9 6042-9643','class_id' => '1','class_name' => 'Cliente'),
  array('id' => '5','tipo' => 'celular','ddd' => '011','numero' => '9 9314-2917','class_id' => '1','class_name' => 'Cliente'),
  array('id' => '6','tipo' => 'residencial','ddd' => '011','numero' => '4141-4141','class_id' => '2','class_name' => 'Cliente'),
  array('id' => '7','tipo' => 'comercial','ddd' => '011','numero' => '2332-1122','class_id' => '3','class_name' => 'Empresa'),
  array('id' => '8','tipo' => 'celular','ddd' => '011','numero' => '9 8913-2564','class_id' => '3','class_name' => 'Cliente')
);
