<?php
    if($asistente){
        foreach ($asistente->result() as $row) {
            $attributes = array('id' => 'f_asistente', 'name' => 'f_asistente');
            $hidden = array('id_asistente' => $row->asi_cedula);
            echo form_open('asistentes/editar_asistente', $attributes, $hidden);
?>
            <div class="contenido_cuerpo_modal">
<?php
                $data = array('class'=>'form_modal_input', 'name'=>'nombre_asistente', 'id'=>'nombre_asistente', 'value'=>set_value("nombre_asistente", $row->asi_nombre_completo), 'autocomplete'=>'off', 'type'=>'text');
                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            Nombres y Apellidos *
                        </div>
                        ".form_input($data)."
                      </div>";

                $js = 'onkeypress="return validarSoloNumeros(event);"';
                $data = array('class'=>'form_modal_input', 'name'=>'cedula', 'id'=>'cedula', 'value'=>set_value("cedula", $row->asi_cedula), 'autocomplete'=>'off', 'maxlength'=>'10');
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
                        ".form_dropdown('distribuidor', $distribuidores, $row->asi_distribuidor_id, $js)."
                      </div>";

                $data = array('class'=>'form_modal_input', 'name'=>'correo', 'id'=>'correo', 'value'=>set_value("correo", $row->asi_correo), 'autocomplete'=>'off', 'type'=>'text');
                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            E-mail *
                        </div>
                        ".form_input($data)."
                      </div>";

                $js = 'onkeypress="return validarSoloNumeros(event);"';
                $data = array('class'=>'form_modal_input', 'name'=>'telefono', 'id'=>'telefono', 'value'=>set_value("telefono", $row->asi_telefono), 'autocomplete'=>'off', 'maxlength'=>'10');
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
                        ".form_dropdown('cargo', $cargos_asistente, $row->asi_cargo_asistente_id, $js)."
                      </div>";

                echo "<div class='form_div'>
                        <div class='form_modal_label'>
                            Tipo *
                        </div>
                        <div class='form_modal_input'>";
                
                
                
                foreach ($tipos_asistente as $key => $value) {
                    $data = array('name'=>'tipo_asistente', 'id'=>'tipo_asistente', 'value'=>$key);
                    
                    if($row->asi_tipo_asistente_id == $key){ 
                        echo "<div style='margin: 8px 20px 8px 0px; width: auto; float: left;'>
                                    ".form_radio($data, $key, true).
                                    $value."
                                </div>";
                    }else{
                        echo "<div style='margin: 8px 20px 8px 0px; width: auto; float: left;'>
                                    ".form_radio($data).
                                    $value."
                                </div>";
                    }
                }

                echo    "</div>
                      </div>";

                $js = 'onkeypress="return validarSoloNumeros(event);"';
                $data = array('class'=>'form_modal_input', 'name'=>'antiguedad', 'id'=>'antiguedad', 'value'=>set_value("antiguedad", $row->asi_antiguedad), 'autocomplete'=>'off', 'maxlength'=>'4', 'style'=>'width:50px;');
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
                    <i class="icono-guardar">&nbsp;</i>
                    <span>
                    <?php
                        $js = 'onclick="enviar_formulario(\'f_asistente\', \'asistentes_disponibles\', \'asistente_listado\')"';
                        echo form_submit('crear', 'Guardar cambios', $js);
                    ?>
                    </span>
                </span>
            </div>
<?php
            echo form_close();
                
            break;
        }
    }else{
?>
        <div class="cuerpo_modal">
            No existe informaci&oacute;n para este Asistente 
        </div>
<?php
    }
?>
