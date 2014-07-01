<?php
    $config = array(
        'login/crear_usuario'=>array(
            array('field'=>'nombre', 'label'=>"Nombre", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'apellido', 'label'=>"Apellido", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'correo', 'label'=>"Correo", 'rules'=>'required|valid_email|trim|xss_clean'),
            array('field'=>'cedula', 'label'=>"C&eacute;dula", 'rules'=>'required|trim|min_length[10]|max_length[13]|xss_clean'),
            array('field'=>'usuario', 'label'=>"Usuario", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'contrasena', 'label'=>"Contrase&ntilde;a", 'rules'=>'required|trim|xss_clean')
        ),
        
        'login/validar'=>array(
            array('field'=>'user', 'label'=>"Usuario", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'password', 'label'=>"Contrase&ntilde;a", 'rules'=>'required|trim|xss_clean')
        ),
        
        'cursos/crear_curso'=>array(
            array('field'=>'nombre_curso', 'label'=>"Nombre", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'descripcion', 'label'=>"Descripci&oacute;n", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'fecha_inicio', 'label'=>"Fecha", 'rules'=>'required|max_length[10]|trim|xss_clean'),
            array('field'=>'fecha_fin', 'label'=>"Fecha", 'rules'=>'required|max_length[10]|trim|xss_clean'),
            array('field'=>'hora_inicio', 'label'=>"Hora", 'rules'=>'required|max_length[8]|trim|xss_clean'),
            array('field'=>'hora_fin', 'label'=>"Hora", 'rules'=>'required|max_length[8]|trim|xss_clean'),
            array('field'=>'duracion', 'label'=>"Tiempo de duraci&oacute;n", 'rules'=>'required|trim|max_length[3]|numeric|xss_clean'),
            array('field'=>'cupos', 'label'=>"Cupos Disponibles", 'rules'=>'required|trim|numeric|max_length[3]|xss_clean'),
            array('field'=>'costo', 'label'=>"Costo", 'rules'=>'required|trim|numeric||xss_clean'),
            array('field'=>'instructor', 'label'=>"Instructor", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'tema', 'label'=>"Tema", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'subtema', 'label'=>"Subtema", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'provincia', 'label'=>"Provincia", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'ciudad', 'label'=>"Ciudad", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'direccion_curso', 'label'=>"Direcci&oacute;n", 'rules'=>'required|trim|xss_clean')
        ),
        
        'asistentes/crear_lista_asistente'=>array(
            array('field'=>'nombre_lista', 'label'=>"Nombre", 'rules'=>'required|trim|xss_clean')
        ),
    );
?>