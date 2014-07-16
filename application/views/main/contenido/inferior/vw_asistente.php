<div class="titulo_modal">
    <span>
        <span class="titulo_modal_imagen_izq">&nbsp;</span>
        <span class="titulo_modal_cuerpo">
            <span class="titulo_modal_flecha">
                Asistentes
            </span>
        </span> 
        <span class="titulo_modal_imagen_der" >&nbsp;</span>
    </span>
</div>
<div class="cuerpo_modal">
    <div class="titulo_cuerpo_modal" style="margin-bottom: 0px; margin-top: 0px;">
        <span class="tabs">
            <span id="tab_izq" class="selected_boton_blanco_izq">&nbsp;</span>
            <span id="tab_menu_disponibles" class="tabs_content selected_boton_blanco_centro" onclick="tabs('disponibles','izq','1','blanco','asistentes_disponibles','asistente_listado');">
                Asistentes Disponibles
            </span>
            <span class="boton_blanco_centro" style="border-left: 3px #cccccc solid; padding: 8px 0px 7px 0px;"></span>
            <span id="tab_menu_nuevo" class="tabs_content boton_blanco_centro" onclick="tabs('nuevo','der','1','blanco','asistente_nuevo','asistente_listado');">
                Asistente Nuevo
            </span>
            <span id="tab_der" class="boton_blanco_der" >&nbsp;</span>
       </span>
    </div>
    <div id="asistente_listado" class="contenido_cuerpo_modal">
        <?php   $this->load->view("main/contenido/inferior/ajax/vw_tabla_asistentes_disponibles", $lista_asistentes);  ?>
    </div>
</div>

