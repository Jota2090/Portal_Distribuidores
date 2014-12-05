<?php
    $config = array(
        'usuarios/crear_usuario'=>array(
            array('field'=>'nombre_usuario', 'label'=>"Nombres", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'apellido_usuario', 'label'=>"Apellidos", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'correo_usuario', 'label'=>"Correo", 'rules'=>'required|valid_email|trim|xss_clean'),
            array('field'=>'cedula_usuario', 'label'=>"C&eacute;dula", 'rules'=>'required|trim|min_length[10]|max_length[13]|xss_clean'),
            array('field'=>'usuario', 'label'=>"Usuario", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'contrasena', 'label'=>"Contrase&ntilde;a", 'rules'=>'required|trim|xss_clean|min_length[8]')
        ),
        
        'usuarios/olvido_contrasena'=>array(
            array('field'=>'usuario_correo', 'label'=>"Usuario / Correo", 'rules'=>'required|trim|xss_clean')
        ),
        
        'cursos/crear_curso'=>array(
            array('field'=>'nombre_curso', 'label'=>"Nombre", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'descripcion', 'label'=>"Descripci&oacute;n", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'acerca_del_curso', 'label'=>"Acerca del Curso", 'rules'=>'required|trim|xss_clean'),
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
        
        'asistentes/crear_asistente'=>array(
            array('field'=>'nombre_asistente', 'label'=>"Nombres y Apellidos", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'cedula', 'label'=>"C&eacute;dula", 'rules'=>'required|trim|numeric|xss_clean|min_length[10]'),
            array('field'=>'distribuidor', 'label'=>"Distribuidor", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'correo', 'label'=>"E-mail", 'rules'=>'required|valid_email|trim|xss_clean'),
            array('field'=>'telefono', 'label'=>"Tel&eacute;fono", 'rules'=>'required|numeric|trim|xss_clean'),
            array('field'=>'cargo', 'label'=>"Cargo", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'tipo_asistente', 'label'=>"Tipo", 'rules'=>'required|trim|xss_clean'),
            array('field'=>'antiguedad', 'label'=>"Antiguedad", 'rules'=>'required|trim|numeric|max_length[4]|xss_clean')
        ),

        'asistentes/registrar_asistencia'=>array(
            array('field'=>'asistente', 'label'=>"Asistente", 'rules'=>'required|xss_clean')
        ),
        
        'cursos/enviar_detalle'=>array(
            array('field'=>'correo', 'label'=>"Correo Electrónico", 'rules'=>'required|valid_emails|trim|xss_clean')
        ),

        'asistentes/imprimir_asistencia'=>array(
            array('field'=>'asistente', 'label'=>"Asistente", 'rules'=>'required|xss_clean')
        ),
        
        'usuarios/cambiar_contrasena'=>array(
            array('field'=>'contrasena_actual', 'label'=>"Contrase&ntilde;a Actual", 'rules'=>'required|trim|xss_clean|min_length[8]'),
            array('field'=>'contrasena_nueva', 'label'=>"Nueva Contrase&ntilde;a", 'rules'=>'required|trim|xss_clean|min_length[8]'),
            array('field'=>'contrasena_nueva_2', 'label'=>"Repetir Nueva Contrase&ntilde;a", 'rules'=>'required|trim|xss_clean|min_length[8]')
        ),
    );
?>