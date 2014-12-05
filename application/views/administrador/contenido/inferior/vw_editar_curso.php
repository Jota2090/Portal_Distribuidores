<?php
    if($resultado)
    {
        foreach ($resultado->result() as $row)
        {
            $attributes = array('id' => 'f_curso', 'name' => 'f_curso');
            $hidden = array('id' => $row->cur_id, 'url_imagen' => $row->cur_nombre_imagen);
            echo form_open_multipart('cursos/editar_curso', $attributes, $hidden);
            
            $select = "*";
            $where = array("ciu_estado" => "A", "ciu_pro_id" => $row->cur_provincia_id);

            $resultado_ciudades = $this->ciudad->get_ciudades($select, $where);

            $ciudades = array('' => 'Seleccione');
            if($resultado_ciudades)
            {
                foreach ($resultado_ciudades->result() as $row_c)
                {
                    $ciudades[$row_c->ciu_id] = $row_c->ciu_nombre;
                }
            }
?>
<div class="titulo_modal fondo_titulo_modal_large">
    <span>
        <span class="titulo_modal_imagen_izq">&nbsp;</span>
        <span class="titulo_modal_cuerpo">
            <span class="titulo_modal_flecha">
                Editar Curso
            </span>
        </span> 
        <span class="titulo_modal_imagen_der" >&nbsp;</span>
    </span>
</div>
<div class="cuerpo_modal fondo_cuerpo_modal_large">
    <div class="form_modal_contenido">
    <?php  
        $js = "id='estado'";
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Estado del Curso:
                </div>
                <div class='form_modal_input'>
                    ".form_dropdown('estado', $estados, $row->cur_estado, $js)."
                </div>
               </div>";

        $data = array('autocomplete'=>'off', 'name'=>'nombre_curso', 'id'=>'nombre_curso', 'value'=>set_value("nombre_curso", $row->cur_nombre), 'type'=>'text');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Nombre del Curso *
                </div>
                <div class='form_modal_input'>
                    ".form_input($data)."
                </div>
               </div>";

        $data = array('autocomplete'=>'off', 'name'=>'descripcion', 'id'=>'descripcion', 'value'=>set_value("descripcion", $row->cur_descripcion));
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Descripci&oacute;n *
                </div>
                <div class='form_modal_input'>
                    ".form_textarea($data)."
                </div>
              </div>";
        
        $data = array('name'=>'acerca_del_curso', 'id'=>'acerca_del_curso', 'value'=>set_value("acerca_del_curso", $row->cur_acerca_del_curso), 'autocomplete'=>'off');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Acerca del Curso *
                </div>
                <div class='form_modal_input'>
                    ".form_textarea($data)."
                </div>
              </div>";

        $data = array('class'=>'form_modal_input', 'name'=>'imagen', 'id'=>'imagen', 'value'=>set_value("imagen"), 'style' => 'margin-bottom: 10px;');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Imagen
                </div>
                <div class='form_modal_input'>
                    ".form_upload($data)."
                </div>
               </div>";

        $data = array('name'=>'fecha_inicio', 'id'=>'fecha_inicio', 'value'=>set_value("fecha_inicio", $row->cur_fecha_inicio), 'style'=>'width:65px; margin-right: 2px;', 'type'=>'text', 'autocomplete'=>'off', 'maxlength'=>'10');
        $data2 = array('name'=>'fecha_fin', 'id'=>'fecha_fin', 'value'=>set_value("fecha_fin", $row->cur_fecha_fin), 'style'=>'width:65px; margin-right: 2px;', 'type'=>'text', 'autocomplete'=>'off', 'maxlength'=>'10');
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

        if($row->cur_jornada === "1"){ $jornada = true; }
        else{   $jornada = false;    }
        $data = array('name'=>'jornada', 'id'=>'jornada', 'value'=>'1', 'style'=>'width:10px; margin-right: 10px;');
        echo "<div class='form_div'>
                <div class='form_modal_label'>&nbsp;</div>
                <div class='form_modal_input'>
                    ".form_checkbox($data, "1", $jornada)." 2 Jornadas
                </div>
              </div>";
    
        $data = array('name'=>'hora_inicio', 'id'=>'hora_inicio', 'value'=>set_value("hora_inicio", $row->cur_hora_inicio), 'style'=>'width:65px', 'type'=>'text', 'autocomplete'=>'off', 'maxlength'=>'8');
        $data2 = array('name'=>'hora_fin', 'id'=>'hora_fin', 'value'=>set_value("hora_fin", $row->cur_hora_fin), 'style'=>'width:65px', 'type'=>'text',  'autocomplete'=>'off', 'maxlength'=>'8');
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
        $data = array('name'=>'duracion', 'id'=>'duracion', 'value'=>set_value("duracion", $row->cur_duracion), 'style'=>'width:50px; margin-right: 10px;', 'autocomplete'=>'off', 'maxlength'=>'3');
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
        $data = array('name'=>'cupos', 'id'=>'cupos', 'value'=>set_value("cupos", $row->cur_cupos_total), 'style'=>'width:50px; margin-right: 10px;', 'autocomplete'=>'off', 'maxlength'=>'3');
        echo "<div class='form_div' style='height: 25px;'>
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
        $data = array('name'=>'costo', 'id'=>'costo', 'value'=>set_value("costo", $row->cur_costo), 'style'=>'width:39px;', 'type'=>'text', 'autocomplete'=>'off');
        echo "<div class='form_div' style='height: 25px;'>
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
                    ".form_dropdown('instructor', $instructores, $row->cur_instructor_id, $js)."
                </div>
              </div>";

        $js = "id='tema'";
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Tema *
                </div>
                <div class='form_modal_input'>
                    ".form_dropdown('tema', $temas, $row->cur_tema_id, $js)."
                </div>
              </div>";

        $data = array('name'=>'subtema', 'id'=>'subtema', 'value'=>set_value("subtema", $row->cur_subtema), 'autocomplete'=>'off', 'type'=>'text');
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
                    ".form_dropdown('provincia', $provincias, $row->cur_provincia_id, $js)."
                </div>
               </div>";

        $js = "id='ciudad'";
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Ciudad *
                </div>
                <div id='contenido_ciudad' class='form_modal_input'>
                    ".form_dropdown('ciudad', $ciudades, $row->cur_ciudad_id, $js)."
                </div>
               </div>";
        
        $data = array('name'=>'direccion_curso', 'id'=>'direccion_curso', 'value'=>set_value("direccion_curso", $row->cur_direccion), 'autocomplete'=>'off', 'type'=>'text');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Dirección *
                </div>
                <div class='form_modal_input'>
                    ".form_input($data)."
                </div>
              </div>";

        $data = array('name'=>'latitud', 'id'=>'latitud', 'value'=>set_value("latitud", $row->cur_latitud), 'style'=>'width:67px', 'type'=>'text', 'autocomplete'=>'off');
        $data2 = array('name'=>'longitud', 'id'=>'longitud', 'value'=>set_value("longitud", $row->cur_longitud), 'style'=>'width:67px', 'type'=>'text',  'autocomplete'=>'off');
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
        
        $data = array('name'=>'comentarios', 'id'=>'comentarios', 'value'=>set_value("comentarios", $row->cur_comentarios), 'autocomplete'=>'off');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Comentarios
                </div>
                <div class='form_modal_input'>
                    ".form_textarea($data)."
                </div>
               </div>";
        
        if($row->cur_publicado === "1"){ $publicado = true; }
        else{   $publicado = false;    }
        $data = array('name'=>'publicar', 'id'=>'publicar', 'value'=>'1', 'style'=>'width:10px; margin-right: 10px;');
        echo "<div class='form_div'>
                <div class='form_modal_label'>
                    Publicar
                </div>
                <div class='form_modal_input'>
                    ".form_checkbox($data, "1", $publicado)."
                </div>
              </div>";
    ?>
    </div>
</div>
<div class="fondo_footer_modal_large">
    <div class="boton_modal">
        <button type="submit" class="boton_modal_fondo" onclick="enviar_formulario_multipart('f_curso', 'tabla_listado_cursos', 'listado_curso')">
            <i class="icono-guardar">&nbsp;</i>
            Guardar cambios
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
            buttonImage: servidor+"recursos/images/JqueryUi/calendar.gif",
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
            buttonImage: servidor+"recursos/images/JqueryUi/calendar.gif",
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
<?php
            break;
        }
    }else{
?>
    <div class="cuerpo_modal">
        No existe informaci&oacute;n para este Curso 
    </div>
<?php
    }
?>