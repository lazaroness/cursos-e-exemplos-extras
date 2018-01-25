<?php

    if(!isset($_REQUEST['term'])):
        exit();
    endif;

    require '../config/config.php';
      $objs = Produto::find_by_sql('SELECT * FROM tb_produto WHERE material LIKE "%'.ucfirst($_REQUEST['term']).'%" GROUP BY material ORDER BY material ASC LIMIT 0,10');

    $data = array();
    foreach ($objs as $obj):
        $data[] = array(
            'label' => $obj->material,
            'value' => $obj->material
        );
    endforeach;

    echo json_encode($data);
    flush();

?>