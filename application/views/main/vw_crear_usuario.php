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
                Nombres *
            </div>
            ".form_input($data)."
          </div>";

    $data = array('class'=>'form_modal_input', 'name'=>'apellido_usuario', 'id'=>'apellido_usuario', 'value'=>set_value("apellido_usuario"), 'autocomplete'=>'off', 'type'=>'text');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Apellidos *
            </div>
            ".form_input($data)."
          </div>";

    $data = array('class'=>'form_modal_input', 'name'=>'correo_usuario', 'id'=>'correo_usuario', 'value'=>set_value("correo_usuario"), 'autocomplete'=>'off', 'type'=>'text');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Correo *
            </div>
            ".form_input($data)."
          </div>";

    $js = 'onkeypress="return validarSoloNumeros(event);"';
    $data = array('class'=>'form_modal_input', 'name'=>'cedula_usuario', 'id'=>'cedula_usuario', 'value'=>set_value("cedula_usuario"), 'autocomplete'=>'off', 'type'=>'text', 'maxlength'=>'10');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                C&eacute;dula *
            </div>
            ".form_input($data, '', $js)."
          </div>";

    $data = array('class'=>'form_modal_input', 'name'=>'usuario', 'id'=>'usuario', 'value'=>set_value("usuario"), 'autocomplete'=>'off', 'type'=>'text');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Usuario *
            </div>
            ".form_input($data)."
          </div>";

    $data = array('class'=>'form_modal_input', 'name'=>'contrasena', 'id'=>'contrasena', 'value'=>set_value("contrasena"), 'autocomplete'=>'off', 'type'=>'password', 'placeholder' => '8 caracteres m&iacute;nimo');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Contrase&ntilde;a *
            </div>
            ".form_input($data)."
            <div class='form_modal_input' style='height: 35px; text-align: right; float: right; margin-right: 55px; margin-top: 10px;' id='validador_contrasena'>
                <img src='".  base_url()."recursos/images/Main/Header/barra_gris_contrasena.png' />
            </div>
          </div>";

?>
</div>
<div class="boton_modal">
    <span class="boton_modal_fondo">
        <i class="icono-agregar-asistente_blanco">&nbsp;</i>
        <span>
        <?php
            $js = 'onclick="enviar_formulario(\'f_nuevo_usuario\', \'\', \'\')"';
            echo form_submit('crear', 'Registrarse', $js);
        ?>
        </span>
    </span>
</div>
<?php
    echo form_close();
?>
<script>
    $('#contrasena').keyup(function(e) {
        var strongRegex = new RegExp("^(?=.{10,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{9,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{8,}).*", "g");

        if (false == enoughRegex.test($(this).val())) {
             $('#validador_contrasena').html("<img src='<?php echo base_url() ?>recursos/images/Main/Header/barra_gris_contrasena.png' /><div>8 caracteres m&iacute;nimo</div>");
        } else if (strongRegex.test($(this).val())) {
             $('#validador_contrasena').html("<img src='<?php echo base_url() ?>recursos/images/Main/Header/barra_fuerte_contrasena.png' /><div>Segura</div>");
        } else if (mediumRegex.test($(this).val())) {
             $('#validador_contrasena').html("<img src='<?php echo base_url() ?>recursos/images/Main/Header/barra_medio_contrasena.png' /><div>Medio</div>");
        } else {
             $('#validador_contrasena').html("<img src='<?php echo base_url() ?>recursos/images/Main/Header/barra_debil_contrasena.png' /><div>D&eacute;bil</div>");
        }
        return true;
    });
</script>