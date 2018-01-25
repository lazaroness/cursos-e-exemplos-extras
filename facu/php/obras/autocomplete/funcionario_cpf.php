<?php

    if(!isset($_REQUEST['term'])):
        exit();
    endif;

    require '../config/config.php';
    $objs = Funcionario::find_by_sql('SELECT * FROM tb_funcionario WHERE cpf LIKE "%'.ucfirst($_REQUEST['term']).'%" ORDER BY cpf ASC LIMIT 0,10');

    $data = array();
    foreach ($objs as $obj):
        $data[] = array(
            'label' => $obj->cpf,
            'value' => $obj->cpf
        );
    endforeach;

    echo json_encode($data);
    flush();

?>