<?php
    $config = array(
        'login/crear_usuario'=>array(
            array('field'=>'nombre', 'label'=>"nombre", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'apellido', 'label'=>"apellido", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'correo', 'label'=>"correo", 'rules'=>'required|valid_email|trim|xss_clean'),
            array('field'=>'cedula', 'label'=>"cedula", 'rules'=>'required|trim|min_length[10]|xss_clean'),
            array('field'=>'usuario', 'label'=>"usuario", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'contrasena', 'label'=>"contrasena", 'rules'=>'required|trim|xss_clean')
        ),
        
        'login/validar'=>array(
            array('field'=>'user', 'label'=>"user", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'password', 'label'=>"password", 'rules'=>'required|trim|xss_clean')
        )
    );
?>