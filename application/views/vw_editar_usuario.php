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
            <div class="titulo_modal fondo_titulo_modal_small">
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
            <div class="cuerpo_modal fondo_cuerpo_modal_small">
            <?php
                $data = array('name'=>'nombre_usuario', 'id'=>'nombre_usuario', 'value'=>set_value("nombre_usuario", $row->usu_nombre), 'autocomplete'=>'off', 'type'=>'text');
                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            Nombres *
                        </div>
                        <div class='form_modal_input'>
                            ".form_input($data)."
                        </div>
                      </div>";

                $data = array('name'=>'apellido_usuario', 'id'=>'apellido_usuario', 'value'=>set_value("apellido_usuario", $row->usu_apellido), 'autocomplete'=>'off', 'type'=>'text');
                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            Apellidos *
                        </div>
                        <div class='form_modal_input'>
                            ".form_input($data)."
                        </div>
                      </div>";

                $data = array('name'=>'correo_usuario', 'id'=>'correo_usuario', 'value'=>set_value("correo_usuario", $row->usu_correo), 'autocomplete'=>'off', 'type'=>'text');
                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            Correo *
                        </div>
                        <div class='form_modal_input'>
                            ".form_input($data)."
                        </div>
                      </div>";

                $js = 'onkeypress="return validarSoloNumeros(event);"';
                $data = array('name'=>'cedula_usuario', 'id'=>'cedula_usuario', 'value'=>set_value("cedula_usuario", $row->usu_cedula), 'autocomplete'=>'off', 'type'=>'text', 'maxlength'=>'10');
                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            C&eacute;dula *
                        </div>
                        <div class='form_modal_input'>
                            ".form_input($data, '', $js)."
                        </div>
                      </div>";

                $data = array('name'=>'usuario', 'id'=>'usuario', 'value'=>set_value("usuario", $row->usu_usuario), 'autocomplete'=>'off', 'type'=>'text');
                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            Usuario *
                        </div>
                        <div class='form_modal_input'>
                            ".form_input($data)."
                        </div>
                      </div>";

                $data = array('name'=>'contrasena', 'id'=>'contrasena', 'value'=>set_value("contrasena"), 'autocomplete'=>'off', 'type'=>'password', 'placeholder' => '8 caracteres m&iacute;nimo');
                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            Contrase&ntilde;a Actual **
                        </div>
                        <div class='form_modal_input'>
                            ".form_input($data)."
                            <div style='width: auto; text-align: left; float: left; margin-top: 10px;'>
                                ** Debe ingresar su contrase&ntilde;a actual para poder guardar los cambios.
                            </div>
                        </div>
                      </div>";

            ?>
            </div>
            <div class="fondo_footer_modal_small">
                <div class="boton_modal">
                    <button type="submit" class="boton_modal_fondo" onclick="enviar_formulario('f_usuario', '', '');">
                        <i class="icono-guardar">&nbsp;</i>
                        Guardar Cambios
                    </button>
                </div>
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