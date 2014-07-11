<?php
    if(isset($existe_lista)){
?>
        <div class="titulo_cuerpo_modal" style="margin-bottom: 0px; margin-top: 10px;">
            <span class="tabs">
                <span id="tab_izq" class="selected_boton_blanco_izq">&nbsp;</span>
                <span id="tab_menu_agregados" class="tabs_content selected_boton_blanco_centro" onclick="tabs('agregados','izq','0','blanco','listado_asistentes_agregados_cursos/<?php echo $curso_id;  ?>/<?php echo $lista_id;  ?>','asistente_lista_curso');">
                    Asistentes Agregados
                </span>
                <span class="boton_blanco_centro" style="border-left: 3px #cccccc solid; height: 24px; "></span>
                <span id="tab_menu_disponibles" class="tabs_content boton_blanco_centro" onclick="tabs('disponibles','der','0','blanco','listado_asistentes_disponibles_cursos/<?php echo $curso_id; ?>/<?php echo $lista_id;  ?>','asistente_lista_curso');">
                    Asistentes Disponibles
                </span>
                <span id="tab_der" class="boton_blanco_der" >&nbsp;</span>
            </span>
        </div>
        <div id="asistente_lista_curso" class="contenido_cuerpo_modal">
            <?php   $this->load->view($view, $lista_asistentes);  ?>
        </div>
<?php
    }else{
?>
    No ha seleccionado ninguna lista
<?php    
    }
?>