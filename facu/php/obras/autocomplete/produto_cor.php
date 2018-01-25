<?php

    if(!isset($_REQUEST['term'])):
        exit();
    endif;

    require '../config/config.php';
      $objs = Produto::find_by_sql('SELECT * FROM tb_produto WHERE cor LIKE "%'.ucfirst($_REQUEST['term']).'%" GROUP BY cor ORDER BY cor ASC LIMIT 0,10');

    $data = array();
    foreach ($objs as $obj):
        $data[] = array(
            'label' => $obj->cor,
            'value' => $obj->cor
        );
    endforeach;

    echo json_encode($data);
    flush();

?>