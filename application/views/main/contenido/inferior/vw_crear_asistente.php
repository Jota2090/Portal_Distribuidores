<?php
    $attributes = array('id' => 'f_nuevo_asistente', 'name' => 'f_nuevo_asistente');
    echo form_open('asistentes/crear_asistente', $attributes);
?>
<div class="titulo_modal">
    <span>
        <img src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/btn_blanco_izq.png" />
        <span class="titulo_modal_cuerpo">
            Asistente Nuevo
        </span>
        <img class="titulo_modal_imagen_izq" src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/btn_blanco_der.png" />
    </span>
</div>
<div class="cuerpo_modal" style="height: 330px;">
    <?php
        
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
        
        $data = array('name'=>'jornada', 'id'=>'jornada', 'value'=>'1');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Tipo:
                </div>
                <div class='form_modal_input'>
                    <div style='margin: 8px 20px 8px 0px; width: auto; float: left;'>
                        ".form_radio($data)."
                        Enrolado
                    </div>
                    <div style='margin: 8px 20px 8px 0px; width: auto; float: left;'>
                        ".form_radio($data)."
                         Freenlace
                    </div>
                </div>
              </div>";
    
   
    
    ?>
</div>
<div class="boton_modal">
    <span class="boton_modal_fondo">
        <i class="icono-agregar-asistente">&nbsp;</i>
        <span>
        <?php
            $imagenes = array('0' => true, '1' => 'imagen');
            $js = 'onclick="enviar_formulario(\'f_nuevo_asistente\', \'asistentes/crear_asistentes\', \'tabla_listado_cursos\', \'listado_curso\', '.$imagenes.')"';
            echo form_button('crear', 'Agregar Asistente', $js);
        ?>
        </span>
    </span>
</div>

<?php
    echo form_close();
?>