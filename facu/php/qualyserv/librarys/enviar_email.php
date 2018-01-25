<?php

  function enviar_email($obj, $dados, $anexos = array()){
    if(empty($dados['carregar'])):
      include "librarys/PHPMailer/PHPMailerAutoload.php";
    endif;

    $envio = new PHPMailer();
    $envio->CharSet = "UTF-8";
    $envio->isSMTP();
    $envio->Host = $obj->config()->email_host;
    $envio->Port = $obj->config()->email_port;
    $envio->SMTPSecure = $obj->config()->email_smtp_secure;
    $envio->SMTPAuth = $obj->config()->email_smtp_auth;
    $envio->Username = $obj->config()->email;
    $envio->Password = $obj->config()->email_password;
    $envio->setFrom($obj->config()->email, $obj->config()->system_name);

    $envio->addAddress($obj->email);

    # RECEBENDO COPIA
    $envio->AddBCC('lazarone.info.web@gmail.com', 'Lazarone S. S.');

    $envio->Subject = $dados['assunto'];

    $corpo = preparar_corpo_email($obj, $dados);
    $envio->msgHTML($corpo);

    foreach ($anexos as $anexo){
      $envio->addAttachment("anexos/{$anexo['arquivo']}");
    }

    $envio->send();
/*    if(!$envio->Send()):
      echo 'Mensagem não foi enviada.';
      echo 'Mailer error: ' . $envio->ErrorInfo;
    endif;
*/
  }

  function preparar_corpo_email($obj, $dados){
    # FALAR PARA O PHP QUE NÃO É PARA ENVIAR O PROCESSAMENTO PARA O NAVEGADOR
    ob_start();

    # INCLUINDO O ARQUIVO COM O TAMPLATE
    $template = $dados['template'].".php";
    include "email_templates/base.php";

    # GUARDANDO O CONTEUDO DO ARQUIVO EM UMA VARIAVEL
    $corpo = ob_get_contents();

    # FALAR PARA O PHP QUE JÁ PODE VOLTAR A ENVIAR O PROCESSAMENTO PARA O NAVEGADOR
    ob_end_clean();

    return $corpo;
  }

?>
