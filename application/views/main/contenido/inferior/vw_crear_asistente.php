<div class="titulo_modal">
    <span>
        <span class="titulo_modal_imagen_izq">&nbsp;</span>
        <span class="titulo_modal_cuerpo">
            <span class="titulo_modal_flecha">
                Asistentes
            </span>
        </span> 
        <span class="titulo_modal_imagen_der" >&nbsp;</span>
    </span>
</div>
<div class="cuerpo_modal">
    <span>
        <span class="boton_blanco_izq selected_boton_blanco_izq">&nbsp;</span>
        <span class="boton_blanco_centro selected_boton_blanco_centro" style="padding-right: 10px;">
            Asistentes Disponibles
        </span>
        <span class="boton_blanco_centro" style="border-left: 3px #cccccc solid; height: 24px; "></span>
        <span class="boton_blanco_centro" style="padding-left: 10px;">
            Asistente Nuevo
        </span>
        <span class="boton_blanco_der" >&nbsp;</span>
    </span>
    <div id="tab1">
        <div class="cuerpo_modal_tab" style="margin-left: 20px; width: 370px;">
        
        </div>
    </div>
    <div id="tab2" style="display: none;">
        <div class="cuerpo_modal_tab" style="margin-left: 50px; width: 350px;">
        <?php
            $attributes = array('id' => 'f_nuevo_asistente', 'name' => 'f_nuevo_asistente');
            echo form_open('asistentes/crear_asistente', $attributes);

            $data = array('class'=>'form_modal_input', 'name'=>'nombre_asistente', 'id'=>'nombre_asistente', 'value'=>set_value("nombre_asistente"), 'autocomplete'=>'off', 'type'=>'text');
            echo "<div class='form_div'>
                    <div class='form_modal_label'>
                        Nombres y Apellidos:
                    </div>
                    ".form_input($data)."
                  </div>";

            $js = 'onkeypress="return validarSoloNumeros(event);"';
            $data = array('class'=>'form_modal_input', 'name'=>'cedula', 'id'=>'cedula', 'value'=>set_value("cedula"), 'autocomplete'=>'off', 'maxlength'=>'13');
            echo "<div class='form_div'>
                    <div class='form_modal_label'>
                        C&eacute;dula:
                    </div>
                    ".form_input($data, '', $js)."
                  </div>";

            $js = "id='distribuidor' class='form_modal_input'";
            echo "<div class='form_div'>
                    <div class='form_modal_label'>
                        Distribuidor:
                    </div>
                    ".form_dropdown('distribuidor', $distribuidores, '', $js)."
                  </div>";

            $data = array('class'=>'form_modal_input', 'name'=>'correo', 'id'=>'correo', 'value'=>set_value("correo"), 'autocomplete'=>'off', 'type'=>'text');
            echo "<div class='form_div'>
                    <div class='form_modal_label'>
                        E-mail:
                    </div>
                    ".form_input($data)."
                  </div>";

            $js = 'onkeypress="return validarSoloNumeros(event);"';
            $data = array('class'=>'form_modal_input', 'name'=>'telefono', 'id'=>'telefono', 'value'=>set_value("telefono"), 'autocomplete'=>'off', 'maxlength'=>'10');
            echo "<div class='form_div'>
                    <div class='form_modal_label'>
                        Tel&eacute;fono:
                    </div>
                    ".form_input($data, '', $js)."
                  </div>";

            $js = "id='cargo' class='form_modal_input'";
            echo "<div class='form_div'>
                    <div class='form_modal_label'>
                        Cargo:
                    </div>
                    ".form_dropdown('cargo', $cargos_asistente, '', $js)."
                  </div>";

            echo "<div class='form_div'>
                    <div class='form_modal_label'>
                        Tipo:
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
                       Antiguedad:
                    </div>
                    ".form_input($data, '', $js)."
                  </div>";

        ?>
        </div>
        <div class="boton_modal" style="width: 420px;">
            <span class="boton_modal_fondo">
                <i class="icono-agregar-asistente_blanco">&nbsp;</i>
                <span>
                <?php
                    $imagenes = array('0' => true, '1' => 'imagen');
                    $js = 'onclick="enviar_formulario(\'f_nuevo_asistente\', \'asistentes/crear_asistentes\', \'tabla_listado_cursos\', \'listado_curso\', '.$imagenes.')"';
                    echo form_button('crear', 'Guardar Asistente', $js);
                ?>
                </span>
            </span>
        </div>
        <?php
            echo form_close();
        ?>
    </div>
</div>

