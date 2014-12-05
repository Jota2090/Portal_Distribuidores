<?php
    $attributes = array('id' => 'f_olvido_contrasena', 'name' => 'f_olvido_contrasena');
    echo form_open('usuarios/olvido_contrasena', $attributes);
?>
<div class="titulo_modal fondo_titulo_modal_small">
    <span>
        <span class="titulo_modal_imagen_izq">&nbsp;</span>
        <span class="titulo_modal_cuerpo">
            <span class="titulo_modal_flecha">
                Olvidaste tu Contrase&ntilde;a
            </span>
        </span> 
        <span class="titulo_modal_imagen_der" >&nbsp;</span>
    </span>
</div>
<div class="cuerpo_modal fondo_cuerpo_modal_small">
<?php
    $data = array('name'=>'usuario_correo', 'id'=>'usuario_correo', 'value'=>set_value("usuario_correo"), 'autocomplete'=>'off', 'type'=>'text');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Usuario / Correo:
            </div>
            <div class='form_modal_input'>
                ".form_input($data)."
            </div>
          </div>";

?>
</div>
<div class="fondo_footer_modal_small">
    <div class="boton_modal">
        <button type="submit" class="boton_modal_fondo" onclick="enviar_formulario('f_olvido_contrasena', '', '');">
            <i class="icono-agregar-asistente_blanco">&nbsp;</i>
            Enviar
        </button>
    </div>
</div>
<?php
    echo form_close();
?>