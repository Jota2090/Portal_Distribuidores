<div class="titulo_modal">
    <span>
        <img src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/border_izq_btn_rojo.png" />
        <span class="titulo_modal_cuerpo">
            Curso Nuevo
        </span>
        <img class="titulo_modal_imagen_izq" src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/border_der_btn_rojo.png" />
    </span>
</div>
<div class="cuerpo_modal">
    <?php
        echo validation_errors();

        $attributes = array('id' => 'f_nuevo_curso', 'name' => 'f_nuevo_curso');
        //$hidden = array('tipo' => 'U');
        echo form_open_multipart('cursos/crear_curso', $attributes);
    ?>
    
    <div class="form_modal_contenido">
    <?php    
        $data = array('class'=>'form_modal_input', 'name'=>'nombre_curso', 'id'=>'nombre_curso', 'value'=>set_value("nombre_curso"), 'type'=>'text');
        echo "<div class='form_div'><div class='form_modal_label'>Nombre del Curso:</div>".form_input($data)."</div>";

        $data = array('class'=>'form_modal_input', 'name'=>'descripcion', 'id'=>'descripcion', 'value'=>set_value("descripcion"), 'rows'=>'2', 'cols'=>'3');
        echo "<div class='form_div'><div class='form_modal_label'>Descripci&oacute;n:</div>".form_textarea($data)."</div>";

        $data = array('class'=>'form_modal_input', 'name'=>'imagen', 'id'=>'imagen', 'value'=>set_value("imagen"));
        echo "<div class='form_div'><div class='form_modal_label'>Imagen:</div>".form_upload($data)."</div>";

        $data = array('class'=>'form_modal_input', 'name'=>'fecha_inicio', 'id'=>'fecha_inicio', 'value'=>set_value("fecha_inicio"), 'style'=>'width:70px', 'type'=>'text', 'autocomplete'=>'false');
        $data2 = array('class'=>'form_modal_input', 'name'=>'fecha_fin', 'id'=>'fecha_fin', 'value'=>set_value("fecha_fin"), 'style'=>'width:70px', 'type'=>'text', 'autocomplete'=>'false');
        echo "<div class='form_div'><div class='form_modal_label'>Fecha del Curso:</div>".form_input($data)."<div style='float: left; padding: 2px 5px;'> al </div>".form_input($data2)."</div>";

        $data = array('class'=>'form_modal_input', 'name'=>'jornada', 'id'=>'jornada', 'value'=>'1', 'style'=>'width:10px; margin-right: 10px;');
        echo "<div class='form_div'><div class='form_modal_label'>&nbsp;</div>".form_checkbox($data)." 2 Jornadas</div>";
    
        $data = array('class'=>'form_modal_input', 'name'=>'hora_inicio', 'id'=>'hora_inicio', 'value'=>set_value("hora_inicio"), 'style'=>'width:70px', 'type'=>'text', 'autocomplete'=>'false');
        $data2 = array('class'=>'form_modal_input', 'name'=>'hora_fin', 'id'=>'hora_fin', 'value'=>set_value("hora_fin"), 'style'=>'width:70px', 'type'=>'text',  'autocomplete'=>'false');
        echo "<div class='form_div'><div class='form_modal_label'>Hora del Curso:</div>".form_input($data)."<div style='float: left; padding: 2px 5px;'> hasta las </div>".form_input($data2)."</div>";

        $data = array('class'=>'form_modal_input', 'name'=>'duracion', 'id'=>'duracion', 'value'=>set_value("duracion"), 'style'=>'width:50px; margin-right: 10px;');
        echo "<div class='form_div'><div class='form_modal_label'>Tiempo de duraci&oacute;n:</div>".form_input($data)." <div style='float: left; padding: 3px 5px;'> (Horas) </div></div>";
    
        $data = array('class'=>'form_modal_input', 'name'=>'cupos', 'id'=>'cupos', 'value'=>set_value("cupos"), 'style'=>'width:50px; margin-right: 10px;');
        echo "<div class='form_div'><div class='form_modal_label'>Cupos Disponibles:</div>".form_input($data)."</div>";
    
        
    ?>
    </div>
    <div class="form_modal_contenido">
    <?php  
        $data = array('class'=>'form_modal_input', 'name'=>'cedula', 'id'=>'cedula', 'value'=>set_value("cedula"), 'maxlength'=>'100', 'style'=>'width:50%', 'type'=>'text');
        echo "<div class='form_div'><div class='form_modal_label'>C&eacute;dula:</div>".form_input($data)."</div>";

        $data = array('class'=>'form_modal_input', 'name'=>'usuario', 'id'=>'usuario', 'value'=>set_value("usuario"), 'maxlength'=>'100', 'style'=>'width:50%', 'autocomplete'=>'off', 'type'=>'text');
        echo "<div class='form_div'><div class='form_modal_label'>Usuario:</div>".form_input($data)."</div>";

        $data = array('class'=>'form_modal_input', 'name'=>'contrasena', 'id'=>'contrasena', 'value'=>set_value("contrasena"), 'maxlength'=>'100', 'style'=>'width:50%', 'type'=>'password');
        echo "<div class='form_div'><div class='form_modal_label'>Contrase&ntilde;a:</div>".form_input($data)."</div>";
        
        /*$options = array('S'=>'Super Administrador', 'V'=>'Vendedores', 'U'=>'Asistente (Administrador)');
        echo "Tipo:".form_dropdown('tipo', $options, 'U')."<br/>";*/

        echo form_submit('crear', 'Crear Usuario');

        echo form_close();
    ?>
    </div>
</div>
<div class="boton_modal"></div>

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
            hourMin: 8,
            hourMax: 18
        });
        
        $('#hora_fin').timepicker({ 
            timeFormat: 'hh:mm tt',
            hourMin: 8,
            hourMax: 18,
            hourGrid: 6,
            minuteGrid: 15,
            stepHour: 1,
            stepMinute: 5,
        });
    });
</script>