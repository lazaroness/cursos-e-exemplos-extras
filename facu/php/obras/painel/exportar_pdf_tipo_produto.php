<?php

    include ('seguranca.php');
    include ('../librarys/mpdf/mpdf.php');

    $tipos_produto = TipoProduto::find('all');

    $td_style = "text-align: center; border: 1px solid #000;";
    $th_style = "width: 250px; border: 1px solid #000; background-color: #CCC";

    $html = "<html><body>";
    $html .= "<table>";

    $html .= "<tr>";
    $html .= "<td style='text-align: left;'>";
    $html .= "<strong>".$config->empresa."</strong>";
    $html .= "</td>";
    $html .= "</tr>";
    $html .= "<tr><td style='colspan: 2; height: 22px;'>&nbsp;</td></tr>";
    
    $html .= "<tr>";
    $html .= "<th style='".$th_style."'>DESCRIÇÃO</th>";
    $html .= "</tr>";

    foreach ($tipos_produto as $tipo_produto):
        $html .= '<tr>';
        $html .= "<td style='".$td_style."'>&nbsp;".$tipo_produto->descricao."</td>";
        $html .= '</tr>';
    endforeach;

    $html .= "</table>";
    $html .= "</body></html>";

    $arquivo = "exportar_tipo_produto_".date('d/m/Y').".".date('H:i:s').".pdf";

    $mpdf = new mPDF();
    $mpdf->WriteHTML($html);

    /*
    * F - salva o arquivo
    * I - abre no navegador
    * D - chama o prompt
    */

    $mpdf->Output($arquivo, 'D');

?>