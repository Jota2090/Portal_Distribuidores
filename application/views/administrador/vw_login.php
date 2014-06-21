<?php
    
    echo validation_errors();

    $attributes = array('id' => 'f_login', 'name' => 'f_login');
    echo form_open('login/validar', $attributes);
    
    $data = array('name'=>'user', 'id'=>'user', 'value'=>set_value("user"), 'maxlength'=>'100', 'style'=>'width:50%', 'autocomplete'=>'off', 'type'=>'text');
    echo "Usuario:".form_input($data)."<br/>";
    
    $data = array('name'=>'password', 'id'=>'password', 'value'=>set_value("password"), 'maxlength'=>'100', 'style'=>'width:50%', 'type'=>'password');
    echo "Contrase&ntilde;a:".form_input($data)."<br/>";
    
    echo form_submit('login', 'Login');
    
    echo form_close();
?>
