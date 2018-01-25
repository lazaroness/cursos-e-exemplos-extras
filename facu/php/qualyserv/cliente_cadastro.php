<?php
  include 'base.php';
  include 'topo.php';
  include 'menu.php';

  if(isset($_GET['id'])):
    $cliente = Cliente::find($_GET['id']);
  else:
    $cliente = new Cliente();
  endif;

  $cliente->nome              = $_POST['nome'];
  $cliente->email             = $_POST['email'];
  $cliente->tipo              = $_POST['tipo'];
  $cliente->cpf_cnpj          = $_POST['cpf_cnpj'];
  $cliente->data_nasc_fund    = $_POST['data_nasc_fund'];
  $cliente->sexo              = $_POST['sexo'];
  $cliente->senha             = md5($_POST['senha']);
  $cliente->confirmacao_senha = md5($_POST['confirmacao_senha']);
 
  if(isset($_POST['save']) & $cliente->is_valid()):
    $cliente->save();
    include('librarys/enviar_email.php');
    enviar_email($cliente, array('assunto' => "{$cliente->nome}: Cadastro efetuado com sucesso!!!", 'template' => 'cliente.novo_cadastro'));
    header("Location: cliente.valida.php?new_cadastro=true&login=".$cliente->email."&password=".$_POST['senha']);
  endif;

  echo "<div id='base_corpo'>";
    if($cliente->is_invalid() & isset($_POST['save'])):
      echo "<table id='errors'>";
        echo "<tr>";
          echo "<th>Erros:</th>";
        echo "</tr>";
        #echo $cliente->errors->full_messages();
        echo "<tr><td>".$cliente->errors->on('nome')."</td></tr>";
        echo "<tr><td>".$cliente->errors->on('email')."</td></tr>";
        echo "<tr><td>".$cliente->errors->on('tipo')."</td></tr>";
        echo "<tr><td>".$cliente->errors->on('cpf_cnpj')."</td></tr>";
        echo "<tr><td>".$cliente->errors->on('data_nasc_fund')."</td></tr>";
        echo "<tr><td>".$cliente->errors->on('sexo')."</td></tr>";
        echo "<tr><td>".$cliente->errors->on('senha')."</td></tr>";
        echo "<tr><td>".$cliente->errors->on('confirmacao_senha')."</td></tr>";
      echo "</table>";
    endif;

    include 'form_cliente.php';
  echo "</div>";

  include 'rodape.php';

?>
