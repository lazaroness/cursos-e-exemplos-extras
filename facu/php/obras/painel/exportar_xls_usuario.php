<?php

    include ('seguranca.php');
    include  '../librarys/phpexcel/Classes/PHPExcel.php';

    $nome = "";
    if(isset($_REQUEST['usuario'])):
        $nome  = $_REQUEST['usuario'];
    endif;
    $ativo = $_REQUEST['ativo'];
    $usuarios = array();

    $nome  = $_REQUEST['usuario'];
    $ativo = $_REQUEST['ativo'];

    $sql = "SELECT * FROM tb_usuario WHERE ativo=$ativo";
    if(!$nome == ""):
        $sql = $sql." AND nome='$nome'";
    endif;

    $sql = $sql." ORDER BY usuario_id ASC";
    $usuarios = Usuario::find_by_sql($sql);

    $arquivo = "exportar_usuario_".date('d/m/Y').".".date('H:i:s').".xls";
    // Instanciamos a classe
    $objPHPExcel = new PHPExcel();

    // Criamos as colunas
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', $config->empresa )
            ->setCellValue('B1', " " )
            ->setCellValue('C1', $online->nome )
            ->setCellValue("D1", date('d/m/Y') )
            ->setCellValue("E1", date('H:i:s') );

    // Definimos o estilo da fonte
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('C3')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('D3')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('E3')->getFont()->setBold(true);

    // Criamos as colunas
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A3', 'NOME' )
            ->setCellValue('B3', "EMAIL" )
            ->setCellValue("C3", "TELEFONE" )
            ->setCellValue("D3", "CELULAR" )
            ->setCellValue("E3", "STATUS");

    // Podemos configurar diferentes larguras paras as colunas como padrão
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

    // Também podemos escolher a posição exata aonde o dado será inserido (coluna, linha, dado);
    $count = 4;
    foreach ($usuarios as $usuario):
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $count, $usuario->nome);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $count, $usuario->email);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $count, $usuario->telefone);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $count, $usuario->celular);
        if ($usuario->ativo=="1"):
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $count, 'Ativo');
        else:
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $count, 'Inativo');
        endif;
        $count++;
    endforeach;

    // Podemos renomear o nome das planilha atual, lembrando que um único arquivo pode ter várias planilhas
    $objPHPExcel->getActiveSheet()->setTitle('exportar_usuario');

    // Cabeçalho do arquivo para ele baixar
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$arquivo.'"');
    header('Cache-Control: max-age=0');
    // Se for o IE9, isso talvez seja necessário
    header('Cache-Control: max-age=1');

    // Acessamos o 'Writer' para poder salvar o arquivo
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

    // Salva diretamente no output, poderíamos mudar arqui para um nome de arquivo em um diretório ,caso não quisessemos jogar na tela
    $objWriter->save('php://output'); 

    exit;
?>