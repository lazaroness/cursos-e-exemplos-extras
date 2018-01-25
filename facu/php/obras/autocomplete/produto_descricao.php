<?php

    if(!isset($_REQUEST['term'])):
        exit();
    endif;

    require '../config/config.php';
      $objs = Produto::find_by_sql('SELECT * FROM tb_produto WHERE descricao LIKE "%'.ucfirst($_REQUEST['term']).'%" GROUP BY descricao ORDER BY descricao ASC LIMIT 0,10');

    $data = array();
    foreach ($objs as $obj):
        $data[] = array(
            'label' => $obj->descricao,
            'value' => $obj->descricao
        );
    endforeach;

    echo json_encode($data);
    flush();

?>