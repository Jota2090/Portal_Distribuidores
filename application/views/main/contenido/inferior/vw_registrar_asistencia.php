<?php
    $attributes = array('id' => 'f_registro_asistente', 'name' => 'f_registro_asistente');
    $hidden = array('id' => $id_curso);
    echo form_open('asistentes/registrar_asistencia', $attributes, $hidden);
?>
        <div class="titulo_modal">
            <span>
                <span class="titulo_modal_imagen_izq">&nbsp;</span>
                <span class="titulo_modal_cuerpo">
                    <span class="titulo_modal_flecha">
                        Registrar Asistencia
                    </span>
                </span> 
                <span class="titulo_modal_imagen_der" >&nbsp;</span>
            </span>
        </div>
        <div class="cuerpo_modal">
             <div class="form_div">
                <div class="form_modal_label" style="width:150px;">
                    Curso:
                </div>
                <div class="form_modal_input">
                    <textarea class="textarea-detalle" cols="42" rows="2" readonly="true"><?php if(isset($curso_nombre)){   echo $curso_nombre;   }else{  echo "No existe informaci&oacute;n para este curso";    } ?></textarea>
                </div>
            </div>
             <div class="form_div" style="padding-top: 10px;">
                <div class="form_modal_label" style="width:150px">
                    Cupos Disponibles:
                </div>
                <div class="form_modal_input">
                    <?php if(isset($curso_cupos)){   echo $curso_cupos;   }else{  echo "No existe informaci&oacute;n para este curso";    } ?>
                </div>
            </div>
            <?php    
                $js = "id='lista_asistente' class='form_modal_input' style='width:55%' onchange='cambiar(\"main/asistentes_agregados_cursos/$id_curso/0\",\"lista_asistente\", \"asistente_listado\");'";
                echo "<div class='form_div'>
                        <div class='form_modal_label' style='width:150px'>
                            Listas Predeterminadas:
                        </div>
                        ".form_dropdown('lista_asistente', $listas_asistente, '', $js)."
                      </div>";
            ?>
        </div>
        <div id="asistente_listado" class="cuerpo_modal" style="height: 290px;">
            <?php  $this->load->view('main/contenido/inferior/vw_opciones_registrar_asistencia'); ?>
        </div>
        <div class="boton_modal">
            <span class="boton_modal_fondo">
                <i class="icono-agregar-asistente_blanco">&nbsp;</i>
                <span>
                <?php
                    $imagenes = array('0' => false);
                    $js = 'onclick="enviar_formulario(\'f_registro_asistente\', \'asistentes/registrar_asistencia\', \'tabla_cursos\', \'listado_curso\', '.$imagenes.')"';
                    echo form_button('crear', 'Registrar Asistencia', $js);
                ?>
                </span>
            </span>
        </div>

<?php
    echo form_close();
?>
