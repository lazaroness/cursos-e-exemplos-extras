<?php

  class Configuracao extends ActiveRecord\Model {
    //-------------------------------------------------------------------------
    // DEFININDO A TABELA UTILIZADA
    //-------------------------------------------------------------------------
    static $table_name = 'tb_configuracoes';

    //-------------------------------------------------------------------------
    // VALIDAÇÕES
    //-------------------------------------------------------------------------
    static $validates_presence_of = array(
      array('empresa',    'message' => '&nbsp;&nbsp;- Empresa não pode ser em branco!<br />',    'on' => 'save'),
      array('descricao',  'message' => '&nbsp;&nbsp;- Descrição não pode ser em branco!<br />',  'on' => 'save')
    );

    //-------------------------------------------------------------------------
    // UPLOAD LOGO
    //-------------------------------------------------------------------------
    function upload_logo($params){
      $anexo = $params['anexo'];
      $destino = "../upload/logo/{$anexo['name']}";
      $destino_banco = "upload/logo/{$anexo['name']}";
      $tipos_validos = '/^.+(\.png|\.jpg)$/';
      $resultado = preg_match($tipos_validos, $anexo['name']);
      if(!$resultado):
        echo "
          <META HTTP-EQUIV=Refresh CONTENT='0;URL=configuracoes.php'>
          <script type\"text/javascript\">
            alert(\"Arquivo invalido, envie arquivos .png ou .jpg !\");
          </script>
        ";
      else:
        // REMOVENDO A ANTIGA LOGO
        unlink("../".$this->path_logo);

        // ADICIONANDO A NOVA LOGO
        move_uploaded_file($anexo['tmp_name'], $destino);
        $this->update_attributes(array('path_logo' => $destino_banco));

        echo "<script>";
        echo "window.location='configuracoes.php?message=Operação realizada com Sucesso!';";
        echo "</script>";
      endif;
    }

  }

?>