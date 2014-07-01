<div id="seccion_inferior">
    <div id="seccion_inferior_contenido" >
        <div id="modal" style="display:none;">
            <div id="contenido_modal"></div>
        </div>
        <div class="filas">
            <div class="titulo_tabla">LISTA DE ASISTENTES</div>
            <div class="boton_agregar">
                <a href="javascript:" onclick="crear_formulario('lista_asistente');">
                    <span>
                        <img src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/btn_blanco_izq.png" />
                        <span class="titulo_modal_cuerpo">
                            <i class="icono-lista"></i>
                            Agregar Lista Nueva
                        </span>
                        <img class="titulo_modal_imagen_izq" src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/btn_blanco_der.png" />
                    </span>
                </a>
            </div>
        </div>
        <div id="listas_predeterminadas" class="filas">
            <?php   $this->load->view("main/contenido/inferior/ajax/vw_tabla_listas_predeterminadas"); ?>
        </div>
    </div>
</div>