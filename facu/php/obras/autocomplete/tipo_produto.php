<?php

    if(!isset($_REQUEST['term'])):
        exit();
    endif;

    require '../config/config.php';
    $objs = TipoProduto::find_by_sql('SELECT * FROM tb_tipo_produto WHERE descricao LIKE "%'.ucfirst($_REQUEST['term']).'%" ORDER BY descricao ASC LIMIT 0,10');

    $data = array();
    foreach ($objs as $obj):
        $data[] = array(
            'label' => $obj->descricao,
            'value' => $obj->descricao,
            'tipo_produto_id' => $obj->tipo_produto_id
        );
    endforeach;

    echo json_encode($data);
    flush();

?>