<div id="seccion_inferior">
    <div id="seccion_inferior_contenido" >
        <div id="modal" style="display:none;">
            <div id="contenido_modal"></div>
        </div>
        <div class="filas">
            <div class="titulo_tabla">LISTA DE CURSOS AGREGADOS</div>
            <div class="boton_agregar">
                <a href="javascript:" onclick="crear_formulario('curso');">
                    <div class="borde_izq_boton_agregar">&nbsp;</div>
                    <div class="borde_centro_boton_agregar">
                        <img src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/ico_agregar_curso.png" />
                        <div>Agregar Curso Nuevo</div>
                    </div>
                    <div class="borde_der_boton_agregar">&nbsp;</div>
                </a>
            </div>
        </div>
        <div id="listado_curso" class="filas">
            <?php   $this->load->view("administrador/contenido/inferior/ajax/vw_tabla_listado_cursos"); ?>
        </div>
    </div>
</div>