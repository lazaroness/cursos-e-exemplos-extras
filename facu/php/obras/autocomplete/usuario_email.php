<?php

    if(!isset($_REQUEST['term'])):
        exit();
    endif;

    require '../config/config.php';
    $objs = Usuario::find_by_sql('SELECT * FROM tb_usuario WHERE email LIKE "%'.ucfirst($_REQUEST['term']).'%" GROUP BY email ORDER BY email ASC LIMIT 0,10');

    $data = array();
    foreach ($objs as $obj):
        $data[] = array(
            'label' => $obj->email,
            'value' => $obj->email
        );
    endforeach;

    echo json_encode($data);
    flush();

?>