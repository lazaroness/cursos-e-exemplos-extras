<?php

    include ('seguranca.php');
    include  '../librarys/phpexcel/Classes/PHPExcel.php';

    $tipos_produto = TipoProduto::find('all');

    $arquivo = "exportar_tipo_produto_".date('d/m/Y').".".date('H:i:s').".xls";
    // Instanciamos a classe
    $objPHPExcel = new PHPExcel();

    // Criamos as colunas
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', $config->empresa )
            ->setCellValue('B1', $online->nome )
            ->setCellValue("C1", date('d/m/Y') )
            ->setCellValue("D1", date('H:i:s') );

    // Definimos o estilo da fonte
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);

    // Criamos as colunas
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A3', 'DESCRICAO' );

    // Podemos configurar diferentes larguras paras as colunas como padrão
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(50);

    // Também podemos escolher a posição exata aonde o dado será inserido (coluna, linha, dado);
    $count = 4;
    foreach ($tipos_produto as $tipo_produto):
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $count, $tipo_produto->descricao);
        $count++;
    endforeach;

    // Podemos renomear o nome das planilha atual, lembrando que um único arquivo pode ter várias planilhas
    $objPHPExcel->getActiveSheet()->setTitle('exportar_tipo_produto');

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