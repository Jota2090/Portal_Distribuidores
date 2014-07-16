<div id="seccion_inferior">
    <div id="seccion_inferior_contenido" >
        <div id="modal" style="display:none;">
            <div id="contenido_modal"></div>
        </div>
        <div class="filas">
            <div class="titulo_tabla">LISTA DE ASISTENTES</div>
            <div class="boton_agregar">
                <span>
                    <a href="javascript:" onclick="crear_formulario('lista_asistente');">
                        <span class="boton_blanco_izq">&nbsp;</span>
                        <span class="boton_blanco_centro" style="padding-right: 10px;">
                            <i class="icono-lista"></i>
                            Agregar Lista Nueva
                        </span>
                    </a>
                    <span class="boton_blanco_centro" style="border-left: 3px #cccccc solid; padding: 8px 0px 7px 0px;"></span>
                    <a href="javascript:" onclick="crear_formulario('asistente');">
                        <span class="boton_blanco_centro" style="padding-left: 10px;">
                            <i class="icono-agregar-asistente"></i>
                            Asistentes
                        </span>
                        <span class="boton_blanco_der" >&nbsp;</span>
                    </a>
               </span>
            </div>
        </div>
        <div id="lista_asistente" class="filas">
            <?php   $this->load->view("main/contenido/inferior/ajax/vw_tabla_lista_asistente"); ?>
        </div>
    </div>
</div>