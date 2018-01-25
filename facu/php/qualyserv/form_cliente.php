<h3>Cliente Cadastro</h3>
<form id="form" method="post" action="" onsubmit="return valida_form(this)">
  <label>Nome:</label>
  <input name="nome" id="nome" value="<?php echo $cliente->nome; ?>" type="text" required />
  <label>Tipo:</label>
  <select name="tipo" required>
    <option value="">&nbsp;</option>
    <option value="fisica">Fisica</option>
    <option value="juridica">Juridica</option>
  </select>
  <label>CPF/CNPJ:</label>
  <input name="cpf_cnpj" id="cpf_cnpj" value="<?php echo $cliente->cpf_cnpj; ?>" type="text" required />
  <label>SEXO:</label>
  <select name="sexo" required>
    <option value="">&nbsp;</option>
    <option value="masculino">Masculino</option>
    <option value="feminino">Feminino</option>
  </select>
  <label>DATA NASC/FUND:</label>
  <input name="data_nasc_fund" id="data_nasc_fund" value="<?php echo $cliente->data_nasc_fund; ?>" type="text" required />
  <label>EMAIL:</label>
  <input name="email" id="email" value="<?php echo $cliente->email; ?>" type="email" required />
  <label>SENHA:</label>
  <input name="senha" id="senha" type="password" required />
  <label>CONFIRMAÇÃO SENHA:</label>
  <input name="confirmacao_senha" id="confirmacao_senha" type="password" required />

  <input class='button' name="save" id="save" type="submit" value="Cadastrar" />
</form>
