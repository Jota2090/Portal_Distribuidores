<?php
    $attributes = array('id' => 'f_nuevo_usuario', 'name' => 'f_nuevo_usuario');
    $hidden = array('tipo' => 'U');
    echo form_open('usuarios/crear_usuario', $attributes, $hidden);
?>
<div class="titulo_modal fondo_titulo_modal_small">
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
<div class="cuerpo_modal fondo_cuerpo_modal_small">
<?php
    $data = array('name'=>'nombre_usuario', 'id'=>'nombre_usuario', 'value'=>set_value("nombre_usuario"), 'autocomplete'=>'off', 'type'=>'text');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Nombres *
            </div>
            <div class='form_modal_input'>
                ".form_input($data)."
            </div>
          </div>";

    $data = array('name'=>'apellido_usuario', 'id'=>'apellido_usuario', 'value'=>set_value("apellido_usuario"), 'autocomplete'=>'off', 'type'=>'text');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Apellidos *
            </div>
            <div class='form_modal_input'>
                ".form_input($data)."
            </div>
          </div>";

    $data = array('name'=>'correo_usuario', 'id'=>'correo_usuario', 'value'=>set_value("correo_usuario"), 'autocomplete'=>'off', 'type'=>'text');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Correo *
            </div>
            <div class='form_modal_input'>
                ".form_input($data)."
            </div>
          </div>";

    $js = 'onkeypress="return validarSoloNumeros(event);"';
    $data = array('name'=>'cedula_usuario', 'id'=>'cedula_usuario', 'value'=>set_value("cedula_usuario"), 'autocomplete'=>'off', 'type'=>'text', 'maxlength'=>'10');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                C&eacute;dula *
            </div>
            <div class='form_modal_input'>
                ".form_input($data, '', $js)."
            </div>
          </div>";

    $data = array('name'=>'usuario', 'id'=>'usuario', 'value'=>set_value("usuario"), 'autocomplete'=>'off', 'type'=>'text');
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
                Contrase&ntilde;a *
            </div>
            <div class='form_modal_input'>
                ".form_input($data).
                "<div class='form_modal_input' style='height: 35px; text-align: right; float: right; margin-right: 55px;' id='validador_contrasena'>
                    <img src='".  base_url()."recursos/images/Main/Header/barra_gris_contrasena.png' />
                </div>
            </div>
          </div>";

?>
</div>
<div class="fondo_footer_modal_small">
    <div class="boton_modal">
        <button type="submit" class="boton_modal_fondo" onclick="enviar_formulario('f_nuevo_usuario', '', '');">
            <i class="icono-agregar-asistente_blanco">&nbsp;</i>
            Registrarse
        </button>
    </div>
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
    
    /*$('#usuario').keyup(function(e) {
        var texto = document.getElementById('usuario').value;
        texto = texto.replace(/\s+/gi, " ");
        $(this).val(texto);
        
        return true;
    });*/
</script>