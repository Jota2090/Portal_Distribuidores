<?php
    $attributes = array('id' => 'f_nuevo_usuario', 'name' => 'f_nuevo_usuario');
    $hidden = array('tipo' => 'U');
    echo form_open('usuarios/crear_usuario', $attributes, $hidden);
?>
<div class="titulo_modal">
    <span>
        <span class="titulo_modal_imagen_izq">&nbsp;</span>
        <span class="titulo_modal_cuerpo">
            <span class="titulo_modal_flecha">
                Registro Usuario
            </span>
        </span> 
        <span class="titulo_modal_imagen_der" >&nbsp;</span>
    </span>
</div>
<div class="cuerpo_modal">
<?php
    $data = array('class'=>'form_modal_input', 'name'=>'nombre_usuario', 'id'=>'nombre_usuario', 'value'=>set_value("nombre_usuario"), 'autocomplete'=>'off', 'type'=>'text');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Nombres:
            </div>
            ".form_input($data)."
          </div>";

    $data = array('class'=>'form_modal_input', 'name'=>'apellido_usuario', 'id'=>'apellido_usuario', 'value'=>set_value("apellido_usuario"), 'autocomplete'=>'off', 'type'=>'text');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Apellidos:
            </div>
            ".form_input($data)."
          </div>";

    $data = array('class'=>'form_modal_input', 'name'=>'correo_usuario', 'id'=>'correo_usuario', 'value'=>set_value("correo_usuario"), 'autocomplete'=>'off', 'type'=>'text');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Correo:
            </div>
            ".form_input($data)."
          </div>";

    $js = 'onkeypress="return validarSoloNumeros(event);"';
    $data = array('class'=>'form_modal_input', 'name'=>'cedula_usuario', 'id'=>'cedula_usuario', 'value'=>set_value("cedula_usuario"), 'autocomplete'=>'off', 'type'=>'text', 'maxlength'=>'10');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                C&eacute;dula:
            </div>
            ".form_input($data, '', $js)."
          </div>";

    $data = array('class'=>'form_modal_input', 'name'=>'usuario', 'id'=>'usuario', 'value'=>set_value("usuario"), 'autocomplete'=>'off', 'type'=>'text');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Usuario:
            </div>
            ".form_input($data)."
          </div>";

    $data = array('class'=>'form_modal_input', 'name'=>'contrasena', 'id'=>'contrasena', 'value'=>set_value("contrasena"), 'autocomplete'=>'off', 'type'=>'password');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Contrase&ntilde;a:
            </div>
            ".form_input($data)."
            <div class='form_modal_input' style='float: right; margin-right: 55px; margin-top: 10px;' id='passstrength'>
            </div>
          </div>";

?>
</div>
<div class="boton_modal">
    <span class="boton_modal_fondo">
        <i class="icono-agregar-asistente_blanco">&nbsp;</i>
        <span>
        <?php
            $imagenes = array('0' => false);
            $js = 'onclick="enviar_formulario(\'f_nuevo_usuario\', \'usuarios/crear_usuario\', \'\', \'\', '.$imagenes.')"';
            echo form_button('crear', 'Registrarse', $js);
        ?>
        </span>
    </span>
</div>
<?php
    echo form_close();
?>
<script>
    $('#contrasena').keyup(function(e) {
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{6,}).*", "g");

        if (false == enoughRegex.test($(this).val())) {
             $('#passstrength').html('mas caracteres');
        } else if (strongRegex.test($(this).val())) {
             $('#passstrength').className = 'ok';
             $('#passstrength').html('Fuerte');
        } else if (mediumRegex.test($(this).val())) {
             $('#passstrength').className = 'alert';
             $('#passstrength').html('medio');
        } else {
             $('#passstrength').className = 'error';
             $('#passstrength').html('debil');
        }
        return true;
    });
</script>