<div id="seccion_inferior">
    <div id="seccion_inferior_contenido" >
        <div id="modal" style="display:none;">
            <div id="contenido_modal"></div>
        </div>
        <div class="filas">
            <div class="titulo_tabla">LISTA DE CURSOS AGREGADOS</div>
            <div class="boton_agregar">
                <a href="javascript:" onclick="crear_formulario('curso');">
                    <span>
                        <img src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/btn_blanco_izq.png" />
                        <span class="titulo_modal_cuerpo">
                            <i class="icono-cuadritos"></i>
                            Agregar Curso
                        </span>
                        <img class="titulo_modal_imagen_izq" src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/btn_blanco_der.png" />
                    </span>
                </a>
            </div>
        </div>
        <div id="listado_curso" class="filas">
            <?php   $this->load->view("administrador/contenido/inferior/ajax/vw_tabla_listado_curso"); ?>
        </div>
    </div>
</div>