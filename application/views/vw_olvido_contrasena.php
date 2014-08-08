<?php
    $attributes = array('id' => 'f_olvido_contrasena', 'name' => 'f_olvido_contrasena');
    echo form_open('usuarios/olvido_contrasena', $attributes);
?>
<div class="titulo_modal">
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
<div class="cuerpo_modal">
<?php
    $data = array('class'=>'form_modal_input', 'name'=>'usuario_correo', 'id'=>'usuario_correo', 'value'=>set_value("usuario_correo"), 'autocomplete'=>'off', 'type'=>'text');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Usuario / Correo:
            </div>
            ".form_input($data)."
          </div>";

?>
</div>
<div class="boton_modal">
    <span class="boton_modal_fondo">
        <i class="icono-agregar-asistente_blanco">&nbsp;</i>
        <span>
        <?php
            $imagenes = array('0' => false);
            $js = 'onclick="enviar_formulario(\'f_olvido_contrasena\', \'\', \'\')"';
            echo form_submit('enviar', 'Enviar', $js);
        ?>
        </span>
    </span>
</div>
<?php
    echo form_close();
?>