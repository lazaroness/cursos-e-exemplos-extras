<?php
  include 'base.php';
  include 'empresa.online.php';
  include 'topo.php';
  echo "<div style='text-align:center;'>Bem-vindo(a) ".$_COOKIE['empresa']."</div>";
  include 'empresa.menu.php';

  if(isset($_POST['save'])):
    $empresa->razao_social       = $_POST['razao_social'];
    $empresa->nome_fantasia      = $_POST['nome_fantasia'];
    $empresa->cnpj               = $_POST['cnpj'];
    $empresa->inscricao_estadual = $_POST['inscricao_estadual'];
    $empresa->data_fundacao      = $_POST['data_fundacao'];
    $empresa->site               = $_POST['site'];
    # ENDERECO
    $empresa->cep                = $_POST['cep'];
    $empresa->logradouro         = $_POST['logradouro'];
    $empresa->numero             = $_POST['numero'];
    $empresa->cidade             = $_POST['cidade'];
    $empresa->bairro             = $_POST['bairro'];
    $empresa->complemento        = $_POST['complemento'];
    $empresa->estado             = $_POST['estado'];
    $empresa->codigo_municipio   = $_POST['codigo_municipio'];

    if($empresa->is_valid()):
      $empresa->save();
      setcookie("empresa", $empresa->nome_fantasia, time()+3600);
      header("Location: empresa.home.php");
    endif;
  endif;

?>
<div id='base_corpo'>
<h3>Empresa Editar</h3>
<form id="form" method="post" action="" onsubmit="return valida_form(this)">
  <label>RAZÃO SOCIAL:</label>
  <input name="razao_social" id="razao_social" value="<?php echo $empresa->razao_social; ?>" type="text" required />
  <label>NOME FANTASIA:</label>
  <input name="nome_fantasia" id="nome_fantasia" value="<?php echo $empresa->nome_fantasia; ?>" type="text" required />
  <label>CNPJ:</label>
  <input name="cnpj" id="cnpj" value="<?php echo $empresa->cnpj; ?>" type="text" required />
  <label>INSCRIÇÃO ESTADUAL:</label>
  <input name="inscricao_estadual" id="inscricao_estadual" value="<?php echo $empresa->inscricao_estadual; ?>" type="text" />
  <label>DATA FUNDAÇÃO:</label>
  <input name="data_fundacao" id="data_fundacao" value="<?php echo $empresa->data_fundacao; ?>" type="text" required />

  <!-- Informações do endereço -->
  <label>CEP:</label>
  <input name="cep" id="cep" value="<?php echo $empresa->cep; ?>" type="text" required />
  <label>LOGRADOURO:</label>
  <input name="logradouro" id="logradouro" value="<?php echo $empresa->logradouro; ?>" type="text" required />
  <label>NUMERO:</label>
  <input name="numero" id="numero" value="<?php echo $empresa->numero; ?>" type="text" required />
  <label>CIDADE:</label>
  <input name="cidade" id="cidade" value="<?php echo $empresa->cidade; ?>" type="text" required />
  <label>BAIRRO:</label>
  <input name="bairro" id="bairro" value="<?php echo $empresa->bairro; ?>" type="text" required />
  <label>COMPLEMENTO</label>
  <input name="complemento" id="complemento" value="<?php echo $empresa->complemento; ?>" type="text" />
  <label>ESTADO:</label>
  <input name="estado" id="estado" value="<?php echo $empresa->estado; ?>" type="text" required />
  <input name="codigo_municipio" id="codigo_municipio" value="<?php echo $empresa->codigo_municipio; ?>" type="hidden" />
  <label>SITE:</label>
  <input name="site" id="site" value="<?php echo $empresa->site; ?>" type="text" />
  <input class='button' name="save" id="save" type="submit" value="GRAVAR" />
</form>
</div>
