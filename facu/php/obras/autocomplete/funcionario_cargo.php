<?php

    if(!isset($_REQUEST['term'])):
        exit();
    endif;

    require '../config/config.php';
    $objs = Funcionario::find_by_sql('SELECT * FROM tb_funcionario WHERE cargo LIKE "%'.ucfirst($_REQUEST['term']).'%" GROUP BY cargo ORDER BY cargo ASC LIMIT 0,10');

    $data = array();
    foreach ($objs as $obj):
        $data[] = array(
            'label' => $obj->cargo,
            'value' => $obj->cargo
        );
    endforeach;
    echo json_encode($data);
    flush();

?>