<?php
    if($resultado)
    {
        if($resultado->num_rows() == 1)
        {
            $row = $resultado->row();
            
            $attributes = array('id' => 'f_usuario', 'name' => 'f_usuario');
            $hidden = array('ced' => $row->usu_cedula, 'nro' => $row->usu_id);
            echo form_open('usuarios/editar_usuario', $attributes, $hidden);
    ?>
            <div class="titulo_modal">
                <span>
                    <span class="titulo_modal_imagen_izq">&nbsp;</span>
                    <span class="titulo_modal_cuerpo">
                        <span class="titulo_modal_flecha">
                            Editar Datos Personales
                        </span>
                    </span> 
                    <span class="titulo_modal_imagen_der" >&nbsp;</span>
                </span>
            </div>
            <div class="cuerpo_modal">
            <?php
                $data = array('class'=>'form_modal_input', 'name'=>'nombre_usuario', 'id'=>'nombre_usuario', 'value'=>set_value("nombre_usuario", $row->usu_nombre), 'autocomplete'=>'off', 'type'=>'text');
                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            Nombres *
                        </div>
                        ".form_input($data)."
                      </div>";

                $data = array('class'=>'form_modal_input', 'name'=>'apellido_usuario', 'id'=>'apellido_usuario', 'value'=>set_value("apellido_usuario", $row->usu_apellido), 'autocomplete'=>'off', 'type'=>'text');
                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            Apellidos *
                        </div>
                        ".form_input($data)."
                      </div>";

                $data = array('class'=>'form_modal_input', 'name'=>'correo_usuario', 'id'=>'correo_usuario', 'value'=>set_value("correo_usuario", $row->usu_correo), 'autocomplete'=>'off', 'type'=>'text');
                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            Correo *
                        </div>
                        ".form_input($data)."
                      </div>";

                $js = 'onkeypress="return validarSoloNumeros(event);"';
                $data = array('class'=>'form_modal_input', 'name'=>'cedula_usuario', 'id'=>'cedula_usuario', 'value'=>set_value("cedula_usuario", $row->usu_cedula), 'autocomplete'=>'off', 'type'=>'text', 'maxlength'=>'10');
                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            C&eacute;dula *
                        </div>
                        ".form_input($data, '', $js)."
                      </div>";

                $data = array('class'=>'form_modal_input', 'name'=>'usuario', 'id'=>'usuario', 'value'=>set_value("usuario", $row->usu_usuario), 'autocomplete'=>'off', 'type'=>'text');
                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            Usuario *
                        </div>
                        ".form_input($data)."
                      </div>";

                $data = array('class'=>'form_modal_input', 'name'=>'contrasena', 'id'=>'contrasena', 'value'=>set_value("contrasena"), 'autocomplete'=>'off', 'type'=>'password', 'placeholder' => '8 caracteres m&iacute;nimo');
                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            Contrase&ntilde;a Actual **
                        </div>
                        ".form_input($data)."
                        <div class='form_modal_input' style='width: auto; height: 35px; text-align: left; float: left; margin-right: 55px; margin-top: 10px;'>
                            ** Debe ingresar su contrase&ntilde;a actual para poder guardar los cambios.
                        </div>
                      </div>";

            ?>
            </div>
            <div class="boton_modal">
                <span class="boton_modal_fondo">
                    <i class="icono-guardar">&nbsp;</i>
                    <span>
                    <?php
                        $js = 'onclick="enviar_formulario(\'f_usuario\', \'\', \'\')"';
                        echo form_submit('crear', 'Guardar Cambios', $js);
                    ?>
                    </span>
                </span>
            </div>
<?php
            echo form_close();
        }
        else
        {
?>
            <div class="cuerpo_modal">
                No existe informaci&oacute;n para este Usuario 
            </div>
<?php
        }     
    }
    else
    {
?>
        <div class="cuerpo_modal">
            No existe informaci&oacute;n para este Usuario 
        </div>
<?php
    }
?>