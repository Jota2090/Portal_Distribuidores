<?php
    $attributes = array('id' => 'f_registro_asistente', 'name' => 'f_registro_asistente');
    echo form_open('asistentes/registrar_asistencia', $attributes);
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
            <?php    
                $js = "id='lista_asistente' class='form_modal_input' style='width:65%' onchange='cambiar(\"main/listado_asistentes_agregados_cursos/$id_curso\",\"lista_asistente\", \"asistente_listado\");'";
                echo "<div class='form_div'>
                        <div class='form_modal_label' style='width:100px'>
                            Seleccione:
                        </div>
                        ".form_dropdown('lista_asistente', $listas_asistente, '', $js)."
                      </div>";
            ?>
        </div>
        <div class="cuerpo_modal">
            <div id="asistente_listado" class="contenido_cuerpo_modal" style="height: 300px;">
                <?php  $this->load->view('main/contenido/inferior/vw_opciones_registrar_asistencia'); ?>
            </div>
        </div>
        <div class="boton_modal">
            <span class="boton_modal_fondo">
                <i class="icono-agregar-lista">&nbsp;</i>
                <span>
                <?php
                    $imagenes = array('0' => false);
                    $js = 'onclick="enviar_formulario(\'f_registro_asistente\', \'asistentes/registrar_asistencia\', \'tabla_lista_asistente\', \'lista_asistente\', '.$imagenes.')"';
                    echo form_button('crear', 'Agregar Lista', $js);
                ?>
                </span>
            </span>
        </div>

<?php
    echo form_close();
?>
