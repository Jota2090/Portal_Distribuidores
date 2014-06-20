<?php
    $config = array(
        'login/crear_usuario'=>array(
            array('field'=>'nombre', 'label'=>"nombre", 'rules'=>'required|trim'),
            array('field'=>'apellido', 'label'=>"apellido", 'rules'=>'required|trim'),
            array('field'=>'correo', 'label'=>"correo", 'rules'=>'required|valid_email|trim'),
            array('field'=>'cedula', 'label'=>"cedula", 'rules'=>'required|trim|min_length[10]'),
            array('field'=>'usuario', 'label'=>"usuario", 'rules'=>'required|trim'),
            array('field'=>'contrasena', 'label'=>"contrasena", 'rules'=>'required|trim')
        ),
        
        'login/validar'=>array(
            array('field'=>'user', 'label'=>"user", 'rules'=>'required|trim'),
            array('field'=>'password', 'label'=>"password", 'rules'=>'required|trim')
        )
    );
?>