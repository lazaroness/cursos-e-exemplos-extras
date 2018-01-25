<?php

  $obj = array(
    array('nome' => 'Lazarone S. Santana', 'email' => 'lazarone.info.web@gmail.com'),
    array('nome' => 'Lazarone S. Santana', 'email' => 'lazarone_santana@hotmail.com'),
    array('nome' => 'Ana',                 'email' => 'fernandes.ac@outlook.com'),
    array('nome' => 'Priscila',            'email' => 'priscilacm23@gmail.com'),
    array('nome' => 'Jessica',             'email' => 'jessicaqueem@hotmail.com'),
    array('nome' => 'Silas',               'email' => 'silas.s.andrade@gmail.com')
  );

  $anexos = array(array('arquivo' => 'info.png'));//, array('arquivo' => 'qualyserv2016@gmail.com.txt'));

  enviar_email($obj, $anexos);

  function enviar_email($obj, $anexos = array()){
    // ADICIONANDO A BIBLIOTECA DO PHPMailer
    include "librarys/PHPMailer/PHPMailerAutoload.php";

    $email = new PHPMailer();
    $email->isSMTP();
    $email->Host = "smtp.gmail.com";
    $email->Port = 587;
    $email->SMTPSecure = 'tls';
    $email->SMTPAuth = true;
    $email->Username = "qualyserv2016@gmail.com";
    $email->Password = "tcc2016qualyserv2";
    $email->setFrom("qualyserv2016@gmail.com","Alertas QualyServ");

    // ADICIONANDO OS EMAILS DE DESTINO
    foreach ($obj as $e):
      $email->addAddress($e['email']);
    endforeach;

    $email->Subject = "Sitema ja se encontra no ar no novo endereco!!!";

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
    include "template_email.php";

    // Guardar o conteúdo do arquivo em uma variável;
    $corpo = ob_get_contents();

    // Falar para o PHP que ele pode voltar
    // a mandar conteúdos para o navegador.
    ob_end_clean();

    return $corpo;
  }
?>
