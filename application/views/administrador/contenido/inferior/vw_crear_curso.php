<?php
    $attributes = array('id' => 'f_nuevo_curso', 'name' => 'f_nuevo_curso');
    echo form_open_multipart('cursos/crear_curso', $attributes);
?>
<div class="titulo_modal">
    <span>
        <span class="titulo_modal_imagen_izq">&nbsp;</span>
        <span class="titulo_modal_cuerpo">
            <span class="titulo_modal_flecha">
                Curso Nuevo
            </span>
        </span> 
        <span class="titulo_modal_imagen_der" >&nbsp;</span>
    </span>
</div>
<div class="cuerpo_modal" style="height: 345px;">
    <div class="form_modal_contenido">
    <?php    
        $data = array('class'=>'form_modal_input', 'name'=>'nombre_curso', 'id'=>'nombre_curso', 'value'=>set_value("nombre_curso"), 'autocomplete'=>'off', 'type'=>'text');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Nombre del Curso *
                </div>
                ".form_input($data)."
              </div>";

        $data = array('class'=>'form_modal_input', 'name'=>'descripcion', 'id'=>'descripcion', 'value'=>set_value("descripcion"), 'autocomplete'=>'off', 'rows'=>'2', 'cols'=>'3', 'style' => 'margin-bottom: 10px;');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Descripci&oacute;n *
                </div>
                ".form_textarea($data)."
              </div>";

        $data = array('class'=>'form_modal_input', 'name'=>'imagen', 'id'=>'imagen', 'value'=>set_value("imagen"), 'style' => 'margin-bottom: 10px;');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Imagen *
                </div>
                ".form_upload($data)."
              </div>";

        $data = array('class'=>'form_modal_input', 'name'=>'fecha_inicio', 'id'=>'fecha_inicio', 'value'=>set_value("fecha_inicio"), 'style'=>'width:70px; margin-right: 2px;', 'type'=>'text', 'autocomplete'=>'off', 'maxlength'=>'10');
        $data2 = array('class'=>'form_modal_input', 'name'=>'fecha_fin', 'id'=>'fecha_fin', 'value'=>set_value("fecha_fin"), 'style'=>'width:70px; margin-right: 2px;', 'type'=>'text', 'autocomplete'=>'off', 'maxlength'=>'10');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Fecha del Curso *
                </div>
                ".form_input($data)."
                <div style='float: left; padding: 2px 5px;'> al </div>
                ".form_input($data2)."
               </div>";

        $data = array('class'=>'form_modal_input', 'name'=>'jornada', 'id'=>'jornada', 'value'=>'1', 'style'=>'width:10px; margin-right: 10px;');
        echo "<div class='form_div'>
                <div class='form_modal_label'>&nbsp;</div>
                ".form_checkbox($data)." 2 Jornadas
              </div>";
    
        $data = array('class'=>'form_modal_input', 'name'=>'hora_inicio', 'id'=>'hora_inicio', 'value'=>set_value("hora_inicio"), 'style'=>'width:70px', 'type'=>'text', 'autocomplete'=>'off', 'maxlength'=>'8');
        $data2 = array('class'=>'form_modal_input', 'name'=>'hora_fin', 'id'=>'hora_fin', 'value'=>set_value("hora_fin"), 'style'=>'width:70px', 'type'=>'text',  'autocomplete'=>'off', 'maxlength'=>'8');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Hora del Curso *
                </div>
                ".form_input($data)."
                <div style='float: left; padding: 2px 5px;'> hasta las </div>
                ".form_input($data2)."
               </div>";

        $js = 'onkeypress="return validarSoloNumeros(event);"';
        $data = array('class'=>'form_modal_input', 'name'=>'duracion', 'id'=>'duracion', 'value'=>set_value("duracion"), 'style'=>'width:50px; margin-right: 10px;', 'autocomplete'=>'off', 'maxlength'=>'3');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Tiempo de duraci&oacute;n *
                </div>
                ".form_input($data, '', $js)."
                <div style='float: left; padding: 3px 5px;'> (Horas) </div>
              </div>";
    
        $js = 'onkeypress="return validarSoloNumeros(event);"';
        $data = array('class'=>'form_modal_input', 'name'=>'cupos', 'id'=>'cupos', 'value'=>set_value("cupos"), 'style'=>'width:50px; margin-right: 10px;', 'autocomplete'=>'off', 'maxlength'=>'3');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Cupos Disponibles *
                </div>
                ".form_input($data, '', $js)."
               </div>";
    
        $data = array('class'=>'form_modal_input', 'name'=>'costo', 'id'=>'costo', 'value'=>set_value("costo"), 'style'=>'width:39px', 'type'=>'text', 'autocomplete'=>'off');
        echo "<div class='form_div'>
                <div class='form_modal_label'>Costo *</div>
                <div style='float: left; padding: 2px 5px 0px 0px;'> $ </div>".form_input($data).
             "</div>";
    
    ?>
    </div>
    <div class="form_modal_contenido">
    <?php
        $data = array('class'=>'form_modal_input', 'name'=>'publicar', 'id'=>'publicar', 'value'=>'1', 'style'=>'width:10px; margin-right: 10px;');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Publicar
                </div>
                ".form_checkbox($data)."
              </div>";
        
        $js = "id='instructor' class='form_modal_input'";
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Instructor *
                </div>
                ".form_dropdown('instructor', $instructores, '', $js)."
              </div>";

        $js = "id='tema' class='form_modal_input'";
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Tema *
                </div>
                ".form_dropdown('tema', $temas, '', $js)."
              </div>";

        $data = array('class'=>'form_modal_input', 'name'=>'subtema', 'id'=>'subtema', 'value'=>set_value("subtema"), 'autocomplete'=>'off', 'type'=>'text');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Subtema *
                </div>
                ".form_input($data)."
               </div>";

        $js = "id='provincia' class='form_modal_input' onchange='cambiar(\"ciudad/listar_ciudades\",\"provincia\", \"contenido_ciudad\");'";
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Provincia *
                </div>
                ".form_dropdown('provincia', $provincias, '', $js)."
              </div>";

        $js = "id='ciudad' class='form_modal_input'";
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Ciudad *
                </div>
                <div id='contenido_ciudad'>
                    ".form_dropdown('ciudad', $ciudades, '', $js)."
                </div>
              </div>";
        
        $data = array('class'=>'form_modal_input', 'name'=>'direccion_curso', 'id'=>'direccion_curso', 'value'=>set_value("direccion_curso"), 'autocomplete'=>'off', 'type'=>'text');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Dirección *
                </div>
                ".form_input($data)."
               </div>";

        $data = array('class'=>'form_modal_input', 'name'=>'latitud', 'id'=>'latitud', 'value'=>set_value("latitud"), 'style'=>'width:70px', 'type'=>'text', 'autocomplete'=>'off');
        $data2 = array('class'=>'form_modal_input', 'name'=>'longitud', 'id'=>'longitud', 'value'=>set_value("longitud"), 'style'=>'width:70px', 'type'=>'text',  'autocomplete'=>'off');
        echo "<div class='form_div' style='height: 50px;'>
                <div class='form_modal_label'>Mapa </div>
                <div style='float: left; padding: 2px 5px 0px 0px;'> Lat </div>".form_input($data).
                "<div style='float: left; padding: 2px 5px;'> Lon </div>".form_input($data2).
                "<div style='clear: both; padding-top: 5px; text-align: right; width: 318px;'> 
                   <a style='color: red' href='javascript:' onclick='ver_mapa();'> Abrir GoogleMaps </a> 
                 </div>
             </div>";
        
        $data = array('class'=>'form_modal_input', 'name'=>'comentarios', 'id'=>'comentarios', 'value'=>set_value("comentarios"), 'autocomplete'=>'off', 'rows'=>'3', 'cols'=>'3');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Comentarios
                </div>
                ".form_textarea($data)."
              </div>";
    ?>
    </div>
</div>
<div class="boton_modal">
    <span class="boton_modal_fondo">
        <i class="icono-agregar-curso">&nbsp;</i>
        <span>
        <?php
            $js = 'onclick="enviar_formulario_multipart(\'f_nuevo_curso\', \'tabla_listado_cursos\', \'listado_curso\')"';
            echo form_submit('crear', 'Agregar Curso', $js);
        ?>
        </span>
    </span>
</div>

<?php
    echo form_close();
?>

<script>
    $(function() {
        $( "#fecha_inicio" ).datepicker({
            showOn: "button",
            buttonImage: "../recursos/images/JqueryUi/calendar.gif",
            buttonImageOnly: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd/mm/yy',
            minDate: 0,
            onClose: function( selectedDate ) {
                $( "#fecha_fin" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        
        $( "#fecha_fin" ).datepicker({
            showOn: "button",
            buttonImage: "../recursos/images/JqueryUi/calendar.gif",
            buttonImageOnly: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd/mm/yy',
            minDate: 0,
            onClose: function( selectedDate ) {
                $( "#fecha_inicio" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
        
        $('#hora_inicio').timepicker({ 
            controlType: 'select',
            timeFormat: 'hh:mm tt',
            hourMin: 6,
            hourMax: 18
        });
        
        $('#hora_fin').timepicker({ 
            controlType: 'select',
            timeFormat: 'hh:mm tt',
            hourMin: 6,
            hourMax: 18
        });
    });
</script>