<?php

    include ('seguranca.php');
    include ('../librarys/mpdf/mpdf.php');

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

    $td_style = "text-align: center; border: 1px solid #000;";
    $th_style = "width: 250px; border: 1px solid #000; background-color: #CCC";

    $html = "<html><body>";
    $html .= "<table>";

    $html .= "<tr>";
    $html .= "<td colspan='2' style='text-align: left;'>";
    $html .= "<strong>".$config->empresa."</strong>";
    $html .= "</td>";
    $html .= "<td>&nbsp;</td>";
    $html .= "<td>&nbsp;</td>";
    $html .= "<td style='text-align: right;'>";
    $html .= $online->nome;
    $html .= "</td>";
    $html .= "<td style='text-align: right;'>";
    $html .= date('d/m/Y')." - ".date('H:i:s');
    $html .= "</td>";
    $html .= "</tr>";
    $html .= "<tr><td style='colspan: 2; height: 22px;'>&nbsp;</td></tr>";
    
    $html .= "<tr>";
    $html .= "<th style='".$th_style."'>NOME</th>";
    $html .= "<th style='".$th_style."'>CARGO</th>";
    $html .= "<th style='".$th_style."'>CPF</th>";
    $html .= "<th style='".$th_style."'>TELEFONE</th>";
    $html .= "<th style='".$th_style."'>CELULAR</th>";
    $html .= "<th style='".$th_style."'>STATUS</th>";
    $html .= "</tr>";

    foreach ($funcionarios as $funcionario):
        $html .= '<tr>';
        $html .= "<td style='".$td_style."'>&nbsp;".$funcionario->nome."</td>";
        $html .= "<td style='".$td_style."'>&nbsp;".$funcionario->cargo."</td>";
        $html .= "<td style='".$td_style."'>&nbsp;".$funcionario->cpf."</td>";
        $html .= "<td style='".$td_style."'>&nbsp;".$funcionario->telefone."</td>";
        $html .= "<td style='".$td_style."'>&nbsp;".$funcionario->celular."</td>";
        if ($funcionario->ativo=="1"):
            $html .= "<td style='".$td_style."'>&nbsp;Ativo</td>";
        else:
            $html .= "<td style='".$td_style."'>&nbsp;Inativo</td>";
        endif;
        $html .= '</tr>';
    endforeach;

    $html .= "</table>";
    $html .= "</body></html>";

    $arquivo = "exportar_funcionario_".date('d/m/Y').".".date('H:i:s').".pdf";

    $mpdf = new mPDF();
    $mpdf->WriteHTML($html);

    /*
    * F - salva o arquivo
    * I - abre no navegador
    * D - chama o prompt
    */

    $mpdf->Output($arquivo, 'D');

?>