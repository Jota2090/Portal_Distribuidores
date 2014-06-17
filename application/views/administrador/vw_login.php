<?php
    
    echo validation_errors();

    $attributes = array('id' => 'f_login', 'name' => 'f_login');
    echo form_open('login/validar', $attributes);
    
    $data = array('name'=>'usuario', 'id'=>'usuario', 'value'=>set_value("usuario"), 'maxlength'=>'100', 'style'=>'width:50%', 'autocomplete'=>'off', 'type'=>'text');
    echo "Usuario:".form_input($data)."<br/>";
    
    $data = array('name'=>'contrasena', 'id'=>'contrasena', 'value'=>set_value("contrasena"), 'maxlength'=>'100', 'style'=>'width:50%', 'type'=>'password');
    echo "Contrase&ntilde;a:".form_input($data)."<br/>";
    
    echo form_submit('login', 'Login');
    
    echo form_close();
?>
