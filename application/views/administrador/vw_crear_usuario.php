<?php
    
    echo validation_errors();

    $attributes = array('id' => 'f_nuevo_usuario', 'name' => 'f_nuevo_usuario');
    echo form_open('login/crear_usuario', $attributes);
    
    $data = array('name'=>'nombre', 'id'=>'nombre', 'value'=>set_value("nombre"), 'maxlength'=>'100', 'style'=>'width:50%', 'type'=>'text');
    echo "Nombres:".form_input($data)."<br/>";
    
    $data = array('name'=>'apellido', 'id'=>'apellido', 'value'=>set_value("apellido"), 'maxlength'=>'100', 'style'=>'width:50%', 'type'=>'text');
    echo "Apellidos:".form_input($data)."<br/>";
    
    $data = array('name'=>'correo', 'id'=>'correo', 'value'=>set_value("correo"), 'maxlength'=>'100', 'style'=>'width:50%', 'type'=>'text');
    echo "Correo:".form_input($data)."<br/>";
    
    $data = array('name'=>'cedula', 'id'=>'cedula', 'value'=>set_value("cedula"), 'maxlength'=>'100', 'style'=>'width:50%', 'type'=>'text');
    echo "C&eacute;dula:".form_input($data)."<br/>";
    
    $data = array('name'=>'usuario', 'id'=>'usuario', 'value'=>set_value("usuario"), 'maxlength'=>'100', 'style'=>'width:50%', 'autocomplete'=>'off', 'type'=>'text');
    echo "Usuario:".form_input($data)."<br/>";
    
    $data = array('name'=>'contrasena', 'id'=>'contrasena', 'value'=>set_value("contrasena"), 'maxlength'=>'100', 'style'=>'width:50%', 'type'=>'password');
    echo "Contrase&ntilde;a:".form_input($data)."<br/>";
    
    $options = array('S'=>'Super Administrador', 'V'=>'Vendedores', 'U'=>'Asistente (Administrador)');
    echo "Tipo:".form_dropdown('tipo', $options, 'U')."<br/>";
    
    echo form_submit('crear', 'Crear Usuario');
    
    echo form_close();
?>
