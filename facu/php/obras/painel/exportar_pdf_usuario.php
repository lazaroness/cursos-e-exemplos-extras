<?php

    include ('seguranca.php');
    include ('../librarys/mpdf/mpdf.php');

    $nome  = $_REQUEST['usuario'];
    $ativo = $_REQUEST['ativo'];
    $email = $_REQUEST['email'];

    $sql = "SELECT * FROM tb_usuario WHERE ativo=$ativo";
    if(!$nome == ""):
        $sql = $sql." AND nome='$nome'";
    endif;
    if(!$email == ""):
        $sql = $sql." AND email='$email'";
    endif;

    $sql = $sql." ORDER BY usuario_id ASC";
    $usuarios = Usuario::find_by_sql($sql);

    $td_style = "text-align: center; border: 1px solid #000;";
    $th_style = "width: 250px; border: 1px solid #000; background-color: #CCC";

    $html = "<html><body>";
    $html .= "<table>";

    $html .= "<tr>";
    $html .= "<td colspan='2' style='text-align: left;'>";
    $html .= "<strong>".$config->empresa."</strong>";
    $html .= "</td>";
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
    $html .= "<th style='".$th_style."'>EMAIL</th>";
    $html .= "<th style='".$th_style."'>TELEFONE</th>";
    $html .= "<th style='".$th_style."'>CELULAR</th>";
    $html .= "<th style='".$th_style."'>STATUS</th>";
    $html .= "</tr>";

    foreach ($usuarios as $usuario):
        $html .= '<tr>';
        $html .= "<td style='".$td_style."'>&nbsp;".$usuario->nome."</td>";
        $html .= "<td style='".$td_style."'>&nbsp;".$usuario->email."</td>";
        $html .= "<td style='".$td_style."'>&nbsp;".$usuario->telefone."</td>";
        $html .= "<td style='".$td_style."'>&nbsp;".$usuario->celular."</td>";
        if ($usuario->ativo=="1"):
            $html .= "<td style='".$td_style."'>&nbsp;Ativo</td>";
        else:
            $html .= "<td style='".$td_style."'>&nbsp;Inativo</td>";
        endif;
        $html .= '</tr>';
    endforeach;

    $html .= "</table>";
    $html .= "</body></html>";

    $arquivo = "exportar_usuario_".date('d/m/Y').".".date('H:i:s').".pdf";

    $mpdf = new mPDF();
    $mpdf->WriteHTML($html);

    /*
    * F - salva o arquivo
    * I - abre no navegador
    * D - chama o prompt
    */

    $mpdf->Output($arquivo, 'D');

?>