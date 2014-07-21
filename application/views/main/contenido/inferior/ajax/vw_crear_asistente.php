<?php
    $attributes = array('id' => 'f_nuevo_asistente', 'name' => 'f_nuevo_asistente');
    echo form_open('asistentes/crear_asistente', $attributes);
?>

    <div style="margin-top: 15px;">
<?php
        $data = array('class'=>'form_modal_input', 'name'=>'nombre_asistente', 'id'=>'nombre_asistente', 'value'=>set_value("nombre_asistente"), 'autocomplete'=>'off', 'type'=>'text');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Nombres y Apellidos *
                </div>
                ".form_input($data)."
              </div>";

        $js = 'onkeypress="return validarSoloNumeros(event);"';
        $data = array('class'=>'form_modal_input', 'name'=>'cedula', 'id'=>'cedula', 'value'=>set_value("cedula"), 'autocomplete'=>'off', 'maxlength'=>'10');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    C&eacute;dula *
                </div>
                ".form_input($data, '', $js)."
              </div>";

        $js = "id='distribuidor' class='form_modal_input'";
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Distribuidor *
                </div>
                ".form_dropdown('distribuidor', $distribuidores, '', $js)."
              </div>";

        $data = array('class'=>'form_modal_input', 'name'=>'correo', 'id'=>'correo', 'value'=>set_value("correo"), 'autocomplete'=>'off', 'type'=>'text');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    E-mail *
                </div>
                ".form_input($data)."
              </div>";

        $js = 'onkeypress="return validarSoloNumeros(event);"';
        $data = array('class'=>'form_modal_input', 'name'=>'telefono', 'id'=>'telefono', 'value'=>set_value("telefono"), 'autocomplete'=>'off', 'maxlength'=>'10');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Tel&eacute;fono *
                </div>
                ".form_input($data, '', $js)."
              </div>";

        $js = "id='cargo' class='form_modal_input'";
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Cargo *
                </div>
                ".form_dropdown('cargo', $cargos_asistente, '', $js)."
              </div>";

        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Tipo *
                </div>
                <div class='form_modal_input'>";

        foreach ($tipos_asistente as $key => $value) {
            $data = array('name'=>'tipo_asistente', 'id'=>'tipo_asistente', 'value'=>$key);

            echo "<div style='margin: 8px 20px 8px 0px; width: auto; float: left;'>
                        ".form_radio($data).
                        $value."
                    </div>";
        }

        echo    "</div>
              </div>";

        $js = 'onkeypress="return validarSoloNumeros(event);"';
        $data = array('class'=>'form_modal_input', 'name'=>'antiguedad', 'id'=>'antiguedad', 'value'=>set_value("antiguedad"), 'autocomplete'=>'off', 'maxlength'=>'4', 'style'=>'width:50px;');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                   Antiguedad (a&ntilde;os) *
                </div>
                ".form_input($data, '', $js)."
              </div>";

?>
    </div>
    <div class="boton_modal">
        <span class="boton_modal_fondo">
            <i class="icono-agregar-asistente_blanco">&nbsp;</i>
            <span>
            <?php
                $js = 'onclick="enviar_formulario(\'f_nuevo_asistente\', \'asistente_nuevo\', \'asistente_listado\')"';
                echo form_submit('crear', 'Guardar Asistente', $js);
            ?>
            </span>
        </span>
    </div>
<?php
    echo form_close();
?>