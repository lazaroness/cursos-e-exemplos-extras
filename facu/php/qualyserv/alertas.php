<?php

  $obj = array(array('nome' => 'Lazarone Santos', 'email' => 'lazarone.info.web@gmail.com'));

/*  $obj = array(
    array('nome' => 'Lazarone S. Santana', 'email' => 'lazarone.info.web@gmail.com'),
    array('nome' => 'Lazarone S. Santana', 'email' => 'lazarone_santana@hotmail.com'),
    array('nome' => 'Ana',                 'email' => 'fernandes.ac@outlook.com'),
    array('nome' => 'Priscila',            'email' => 'priscilacm23@gmail.com'),
    array('nome' => 'Jessica',             'email' => 'jessicaqueem@hotmail.com'),
    array('nome' => 'Silas',               'email' => 'silas.s.andrade@gmail.com')#,
#    array('nome' => 'John Tadeu',          'email' => 'john.tadeu@hotmail.com')#,
#    array('nome' => 'Sonia Lanza',         'email' => 'sonialanza19@gmail.com'),
#    array('nome' => 'Matheus',             'email' => 'matheus.antoniukv5@gmail.com')
  );
*/

  $anexos = array();#array(array('arquivo' => 'preparado.mp3'));

  enviar_email($obj, $anexos);

  function enviar_email($obj, $anexos = array()){
    // ADICIONANDO A BIBLIOTECA DO PHPMailer
    include "librarys/PHPMailer/PHPMailerAutoload.php";

    $email = new PHPMailer();
    $email->CharSet = "UTF-8";
    $email->isSMTP();
    $email->Host = "smtp.gmail.com";
    $email->Port = 587;
    $email->SMTPSecure = 'tls';
    $email->SMTPAuth = true;
    $email->Username = "qualyserv2016@gmail.com";
    $email->Password = "tcc2016qualyserv";
    $email->setFrom("qualyserv2016@gmail.com","QualyServ Info");

    // ADICIONANDO OS EMAILS DE DESTINO
    foreach ($obj as $e):
      $email->addAddress($e['email']);
    endforeach;

    $email->Subject = "QualyServ: Responsivo";

    $corpo = reparar_corpo_email($obj, $anexos);
    $email->msgHTML($corpo);

    // ADICIONANDO OS ANEXOS QUANDO NECESSARIO
    foreach ($anexos as $anexo) {
      $email->addAttachment("anexos/{$anexo['arquivo']}");
    }

    // ENVIANDO O EMAIL
    $email->send();
  }

  function reparar_corpo_email($obj, $anexos){
    // Falar para o PHP que não é para enviar
    // o processamento para o navegador:
    ob_start();

    // Incluir o arquivo template_email.php:
    include "email_templates/news.php";

    // Guardar o conteúdo do arquivo em uma variável;
    $corpo = ob_get_contents();

    // Falar para o PHP que ele pode voltar
    // a mandar conteúdos para o navegador.
    ob_end_clean();

    return $corpo;
  }
?>
