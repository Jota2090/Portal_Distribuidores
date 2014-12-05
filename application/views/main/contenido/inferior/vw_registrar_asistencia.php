<?php
    $attributes = array('id' => 'f_registro_asistente', 'name' => 'f_registro_asistente');
    $hidden = array('id' => $id_curso);
    echo form_open('asistentes/registrar_asistencia', $attributes, $hidden);
?>
        <div class="fondo_titulo_modal_medium">
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
        <div class="fondo_cuerpo_modal_medium">
            <div class="form_div">
                <div class="form_modal_label">
                    Curso:
                </div>
                <div class="form_modal_input">
                   <?php if(isset($curso_nombre)){   echo $curso_nombre.$curso_nombre.$curso_nombre.$curso_nombre.$curso_nombre;   }else{  echo "No existe informaci&oacute;n para este curso";    } ?>
                </div>
            </div>
            <div class="form_div" style="padding-top: 10px;">
                <div class="form_modal_label">
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
        <!--<div id="asistente_listado" class="cuerpo_modal" style="height: 290px;">
            <?php  $this->load->view('main/contenido/inferior/vw_opciones_registrar_asistencia'); ?>
        </div>-->
        <div class="fondo_footer_modal_medium">
            <div class="boton_modal">
                <span class="boton_modal_fondo">
                    <i class="icono-agregar-asistente_blanco">&nbsp;</i>
                    <span>
                    <?php
                        $js = 'onclick="enviar_formulario(\'f_registro_asistente\', \'tabla_cursos_usuarios\', \'listado_cursos_usuarios\')"';
                        echo form_submit('crear', 'Registrar Asistencia', $js);
                    ?>
                    </span>
                </span>
            </div>
        </div>

<?php
    echo form_close();
?>
