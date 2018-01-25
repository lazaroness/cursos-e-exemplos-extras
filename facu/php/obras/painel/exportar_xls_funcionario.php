<?php

    include ('seguranca.php');
    include  '../librarys/phpexcel/Classes/PHPExcel.php';

    $nome  = $_REQUEST['nome'];
    $cargo = $_REQUEST['cargo'];
    $cpf   = $_REQUEST['cpf'];
    $ativo = $_REQUEST['ativo'];

    $sql = "SELECT * FROM tb_funcionario WHERE ativo=$ativo";
    if(!$cargo == ""):
        $sql = $sql." AND cargo='$cargo'";
    endif;
    if(!$cpf == ""):
        $sql = $sql." AND cpf='$cpf'";
    endif;
    if(!$nome == ""):
        $sql = $sql." AND nome='$nome'";
    endif;

    $sql = $sql." ORDER BY funcionario_id ASC";
    $funcionarios = Funcionario::find_by_sql($sql);

    $arquivo = "exportar_funcionario_".date('d/m/Y').".".date('H:i:s').".xls";
    // Instanciamos a classe
    $objPHPExcel = new PHPExcel();

    // Criamos as colunas
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', $config->empresa )
            ->setCellValue('B1', " " )
            ->setCellValue('C1', " " )
            ->setCellValue('D1', $online->nome )
            ->setCellValue("E1", date('d/m/Y') )
            ->setCellValue("F1", date('H:i:s') );

    // Definimos o estilo da fonte
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('C3')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('D3')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('E3')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('F3')->getFont()->setBold(true);

    // Criamos as colunas
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A3', 'NOME' )
            ->setCellValue('B3', "CARGO" )
            ->setCellValue('C3', "CPF" )
            ->setCellValue("D3", "TELEFONE" )
            ->setCellValue("E3", "CELULAR" )
            ->setCellValue("F3", "STATUS");

    // Podemos configurar diferentes larguras paras as colunas como padrão
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

    // Também podemos escolher a posição exata aonde o dado será inserido (coluna, linha, dado);
    $count = 4;
    foreach ($funcionarios as $funcionario):
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $count, $funcionario->nome);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $count, $funcionario->cargo);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $count, $funcionario->cpf);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $count, $funcionario->telefone);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $count, $funcionario->celular);
        if ($funcionario->ativo=="1"):
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $count, 'Ativo');
        else:
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $count, 'Inativo');
        endif;
        $count++;
    endforeach;

    // Podemos renomear o nome das planilha atual, lembrando que um único arquivo pode ter várias planilhas
    $objPHPExcel->getActiveSheet()->setTitle('exportar_funcionario');

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