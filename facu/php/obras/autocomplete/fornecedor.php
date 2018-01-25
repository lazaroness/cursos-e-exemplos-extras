<?php

    if(!isset($_REQUEST['term'])):
        exit();
    endif;

    require '../config/config.php';
    $objs = Fornecedor::find_by_sql('SELECT * FROM tb_fornecedor WHERE nome LIKE "%'.ucfirst($_REQUEST['term']).'%" ORDER BY fornecedor_id ASC LIMIT 0,10');

    $data = array();
    foreach ($objs as $obj):
        $data[] = array(
            'label' => $obj->nome,
            'value' => $obj->nome,
            'fornecedor_id' => $obj->fornecedor_id
        );
    endforeach;

    echo json_encode($data);
    flush();

?>