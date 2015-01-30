<?php
    $attributes = array('id' => 'f_enviar_detalle_curso', 'name' => 'f_enviar_detalle_curso');
    $hidden = array('id' => $curso);
    echo form_open('cursos/enviar_detalle', $attributes, $hidden);
?>
<div class="cuerpo_modal">
<?php
    $data = array('class'=>'form_modal_input', 'name'=>'correo', 'id'=>'correo', 'value'=>set_value("correo"), 'autocomplete'=>'off', 'type'=>'text', 'placeholder'=>'Correos electr&oacute;nicos', 'style'=>'width: 100%');
    echo "<div class='form_div' style='height: 60px; margin-right: 50px; margin-top: 50px;'>
            ".form_input($data)."
            <div style='clear: both; padding-top:10px;'>
                * Ingresa los correos electr&oacute;nicos separados por coma (,)
            </div>
          </div>";
?>
</div>
<div class="boton_modal">
    <span class="boton_modal_fondo">
        <span>
        <?php
            $js = 'onclick="enviar_formulario(\'f_enviar_detalle_curso\', \'\', \'\')"';
            echo form_submit('enviar', 'Enviar', $js);
        ?>
        </span>
    </span>
</div>
<?php
    echo form_close();
?>