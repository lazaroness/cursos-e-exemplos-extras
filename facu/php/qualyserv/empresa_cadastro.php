<?php
  include 'base.php';
  include 'topo.php';
  include 'menu.php';

  if(isset($_GET['id'])):
    $empresa = Empresa::find($_GET['id']);
  else:
    $empresa = new Empresa();
  endif;

  $empresa->razao_social       = $_POST['razao_social'];
  $empresa->nome_fantasia      = $_POST['nome_fantasia'];
  $empresa->cnpj               = $_POST['cnpj'];
  $empresa->inscricao_estadual = $_POST['inscricao_estadual'];
  $empresa->email              = $_POST['email'];
  $empresa->data_fundacao      = $_POST['data_fundacao'];
  $empresa->site               = $_POST['site'];
  $empresa->senha              = md5($_POST['senha']);
  $empresa->confirmacao_senha  = md5($_POST['confirmacao_senha']);
  # ENDERECO
  $empresa->cep                = $_POST['cep'];
  $empresa->logradouro         = $_POST['logradouro'];
  $empresa->numero             = $_POST['numero'];
  $empresa->cidade             = $_POST['cidade'];
  $empresa->bairro             = $_POST['bairro'];
  $empresa->complemento        = $_POST['complemento'];
  $empresa->estado             = $_POST['estado'];
  $empresa->codigo_municipio   = $_POST['codigo_municipio'];
  if(isset($_POST['save']) & $empresa->is_valid()):
    $empresa->save();
    include('librarys/enviar_email.php');
    enviar_email($empresa, array('assunto' => "{$empresa->nome_fantasia}: Cadastro efetuado com sucesso!!!", 'template' => 'empresa.novo_cadastro'));
    header("Location: empresa.valida.php?new_cadastro=true&login=".$empresa->email."&password=".$_POST['senha']);
  endif;

  echo "<div id='base_corpo'>";
    if($empresa->is_invalid() & isset($_POST['save'])):
      echo "<table id='errors'>";
        echo "<tr><th>Erros:</th></tr>";
        echo "<tr><td>".$empresa->errors->on('razao_social')."</td></tr>";
        echo "<tr><td>".$empresa->errors->on('nome_fantasia')."</td></tr>";
        echo "<tr><td>".$empresa->errors->on('cnpj')."</td></tr>";
        echo "<tr><td>".$empresa->errors->on('inscricao_estadual')."</td></tr>";
        echo "<tr><td>".$empresa->errors->on('data_fundacao')."</td></tr>";
        echo "<tr><td>".$empresa->errors->on('email')."</td></tr>";
        echo "<tr><td>".$empresa->errors->on('senha')."</td></tr>";
        echo "<tr><td>".$empresa->errors->on('confirmacao_senha')."</td></tr>";
        echo "<tr><td>".$empresa->errors->on('cep')."<td></tr>";
        echo "<tr><td>".$empresa->errors->on('logradouro')."</td></tr>";
        echo "<tr><td>".$empresa->errors->on('numero')."</td></tr>";
        echo "<tr><td>".$empresa->errors->on('cidade')."</td></tr>";
        echo "<tr><td>".$empresa->errors->on('bairro')."</td></tr>";
        echo "<tr><td>".$empresa->errors->on('estado')."</td></tr>";
        echo "<tr><td>".$empresa->errors->on('codigo_municipio')."</td></tr>";
      echo "</table>";
    endif;

    include 'form_empresa.php';
  echo "</div>";

  include 'rodape.php';
?>
