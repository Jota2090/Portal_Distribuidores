<?php
    $attributes = array('id' => 'f_nuevo_curso', 'name' => 'f_nuevo_curso');
    echo form_open_multipart('cursos/crear_curso', $attributes);
?>
<div class="titulo_modal fondo_titulo_modal_large">
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
<div class="cuerpo_modal fondo_cuerpo_modal_large">
    <div class="form_modal_contenido">
    <?php    
        $data = array('name'=>'nombre_curso', 'id'=>'nombre_curso', 'value'=>set_value("nombre_curso"), 'autocomplete'=>'off', 'type'=>'text');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Nombre del Curso *
                </div>
                <div class='form_modal_input'>
                    ".form_input($data)."
                </div>
              </div>";

        $data = array('name'=>'descripcion', 'id'=>'descripcion', 'value'=>set_value("descripcion"), 'autocomplete'=>'off' );
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Descripci&oacute;n *
                </div>
                <div class='form_modal_input'>
                    ".form_textarea($data)."
                </div>
              </div>";
        
        $data = array('name'=>'acerca_del_curso', 'id'=>'acerca_del_curso', 'value'=>set_value("acerca_del_curso"), 'autocomplete'=>'off');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Acerca del Curso *
                </div>
                <div class='form_modal_input'>
                    ".form_textarea($data)."
                </div>
              </div>";

        $data = array('name'=>'imagen', 'id'=>'imagen', 'value'=>set_value("imagen"), 'style' => 'margin-bottom: 10px;');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Imagen *
                </div>
                <div class='form_modal_input'>
                    ".form_upload($data)."
                </div>
              </div>";

        $data = array('name'=>'fecha_inicio', 'id'=>'fecha_inicio', 'value'=>set_value("fecha_inicio"), 'style'=>'width:65px; margin-right: 2px;', 'type'=>'text', 'autocomplete'=>'off', 'maxlength'=>'10');
        $data2 = array('name'=>'fecha_fin', 'id'=>'fecha_fin', 'value'=>set_value("fecha_fin"), 'style'=>'width:65px; margin-right: 2px;', 'type'=>'text', 'autocomplete'=>'off', 'maxlength'=>'10');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Fecha del Curso *
                </div>
                <div class='form_modal_input'>
                    ".form_input($data)."
                    <div style='float: left; padding: 2px 5px;'> al </div>
                    ".form_input($data2)."
                </div>
               </div>";

        $data = array('name'=>'jornada', 'id'=>'jornada', 'value'=>'1', 'style'=>'width:10px; margin-right: 10px;');
        echo "<div class='form_div'>
                <div class='form_modal_label'>&nbsp;</div>
                <div class='form_modal_input'>
                    ".form_checkbox($data)." 2 Jornadas
                </div>
              </div>";
    
        $data = array('name'=>'hora_inicio', 'id'=>'hora_inicio', 'value'=>set_value("hora_inicio"), 'style'=>'width:60px', 'type'=>'text', 'autocomplete'=>'off', 'maxlength'=>'8');
        $data2 = array('name'=>'hora_fin', 'id'=>'hora_fin', 'value'=>set_value("hora_fin"), 'style'=>'width:60px', 'type'=>'text',  'autocomplete'=>'off', 'maxlength'=>'8');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Hora del Curso *
                </div>
                <div class='form_modal_input'>
                    ".form_input($data)."
                    <div style='float: left; padding: 2px 5px;'> hasta las </div>
                    ".form_input($data2)."
                </div>
               </div>";

        $js = 'onkeypress="return validarSoloNumeros(event);"';
        $data = array('name'=>'duracion', 'id'=>'duracion', 'value'=>set_value("duracion"), 'style'=>'width:50px; margin-right: 10px;', 'autocomplete'=>'off', 'maxlength'=>'3');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Tiempo de duraci&oacute;n *
                </div>
                <div class='form_modal_input'>
                    ".form_input($data, '', $js)."
                    <div style='float: left; padding: 3px 5px;'> (Horas) </div>
                </div>
              </div>";
    
        $js = 'onkeypress="return validarSoloNumeros(event);"';
        $data = array('name'=>'cupos', 'id'=>'cupos', 'value'=>set_value("cupos"), 'style'=>'width:50px; margin-right: 10px;', 'autocomplete'=>'off', 'maxlength'=>'3');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Cupos Disponibles *
                </div>
                <div class='form_modal_input'>
                    ".form_input($data, '', $js)."
                </div>
               </div>";
    ?>
    </div>
    <div class="form_modal_contenido">
    <?php
        $data = array('name'=>'costo', 'id'=>'costo', 'value'=>set_value("costo"), 'style'=>'width:39px', 'type'=>'text', 'autocomplete'=>'off');
        echo "<div class='form_div'>
                <div class='form_modal_label'>Costo *</div>
                <div class='form_modal_input'>
                    <div style='float: left; padding: 2px 5px 0px 0px;'> $ </div>".form_input($data).
                "</div>
             </div>";
        
        $js = "id='instructor'";
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Instructor *
                </div>
                <div class='form_modal_input'>
                    ".form_dropdown('instructor', $instructores, '', $js)."
                </div>
              </div>";

        $js = "id='tema'";
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Tema *
                </div>
                <div class='form_modal_input'>
                    ".form_dropdown('tema', $temas, '', $js)."
                </div>
              </div>";

        $data = array('name'=>'subtema', 'id'=>'subtema', 'value'=>set_value("subtema"), 'autocomplete'=>'off', 'type'=>'text');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Subtema *
                </div>
                <div class='form_modal_input'>
                    ".form_input($data)."
                </div>
               </div>";

        $js = "id='provincia' onchange='cambiar(\"ciudad/listar_ciudades\",\"provincia\", \"contenido_ciudad\");'";
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Provincia *
                </div>
                <div class='form_modal_input'>
                    ".form_dropdown('provincia', $provincias, '', $js)."
                </div>
              </div>";

        $js = "id='ciudad'";
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Ciudad *
                </div>
                <div id='contenido_ciudad' class='form_modal_input'>
                    ".form_dropdown('ciudad', $ciudades, '', $js)."
                </div>
              </div>";
        
        $data = array('name'=>'direccion_curso', 'id'=>'direccion_curso', 'value'=>set_value("direccion_curso"), 'autocomplete'=>'off', 'type'=>'text');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Dirección *
                </div>
                <div class='form_modal_input'>
                    ".form_input($data)."
                </div>
               </div>";

        $data = array('name'=>'latitud', 'id'=>'latitud', 'value'=>set_value("latitud"), 'style'=>'width:67px', 'type'=>'text', 'autocomplete'=>'off');
        $data2 = array('name'=>'longitud', 'id'=>'longitud', 'value'=>set_value("longitud"), 'style'=>'width:67px', 'type'=>'text',  'autocomplete'=>'off');
        echo "<div class='form_div' style='height: 50px;'>
                <div class='form_modal_label'>Mapa </div>
                <div class='form_modal_input'>
                    <div style='float: left; padding: 2px 5px 0px 0px;'> Lat </div>".form_input($data).
                    "<div style='float: left; padding: 2px 5px;'> Lon </div>".form_input($data2).
                    "<div style='clear: both; padding-top: 5px; text-align: right;'> 
                       <a style='color: red' href='javascript:' onclick='ver_mapa();'> Abrir GoogleMaps </a> 
                     </div>
                </div>
             </div>";
        
        $data = array('name'=>'comentarios', 'id'=>'comentarios', 'value'=>set_value("comentarios"), 'autocomplete'=>'off');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Comentarios
                </div>
                <div class='form_modal_input'>
                    ".form_textarea($data)."
                </div>
              </div>";
        
        $data = array('name'=>'publicar', 'id'=>'publicar', 'value'=>'1', 'style'=>'width:10px; margin-right: 10px;');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Publicar
                </div>
                <div class='form_modal_input'>
                    ".form_checkbox($data)."
                </div>
              </div>";
    ?>
    </div>
</div>
<div class="fondo_footer_modal_large">
    <div class="boton_modal">
        <button type="submit" class="boton_modal_fondo" onclick="enviar_formulario_multipart('f_nuevo_curso', '', '');">
            <i class="icono-agregar-curso">&nbsp;</i>
            Agregar Curso
        </button>
    </div>
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
            hour: 6,
            hourMin: 0,
            hourMax: 23
        });
        
        $('#hora_fin').timepicker({ 
            controlType: 'select',
            timeFormat: 'hh:mm tt',
            hour: 6,
            hourMin: 0,
            hourMax: 23
        });
    });
</script>