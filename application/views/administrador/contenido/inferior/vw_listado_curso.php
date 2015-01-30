<div id="seccion_inferior">
    <div id="seccion_inferior_contenido" >
        <div class="filas">
            <div class="titulo_tabla">LISTA DE CURSOS AGREGADOS</div>
            <div class="boton_agregar">
                <a href="javascript:" onclick="crear_formulario('curso');">
                    <span>
                        <span class="boton_blanco_izq">&nbsp;</span>
                        <span class="boton_blanco_centro">
                            <i class="icono-cuadritos"></i>
                            Agregar Curso
                        </span>
                        <span class="boton_blanco_der" >&nbsp;</span>
                    </span>
                </a>
            </div>
        </div>
        <div id="tab_cursos" class="filas">
            <?php   $this->load->view("administrador/contenido/inferior/ajax/vw_tabla_listado_curso"); ?>
        </div>
    </div>
</div>