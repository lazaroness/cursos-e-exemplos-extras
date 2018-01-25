<?php

    if(!isset($_REQUEST['term'])):
        exit();
    endif;

    require '../config/config.php';
    $objs = Usuario::find_by_sql('SELECT * FROM tb_usuario WHERE nome LIKE "%'.ucfirst($_REQUEST['term']).'%" GROUP BY nome ORDER BY nome ASC LIMIT 0,10');

    $data = array();
    foreach ($objs as $obj):
        $data[] = array(
            'label' => $obj->nome,
            'value' => $obj->nome
        );
    endforeach;

    echo json_encode($data);
    flush();

?>