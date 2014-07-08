<div id="seccion_inferior">
    <div id="seccion_inferior_contenido" >
        <div id="modal" style="display:none;">
            <div id="contenido_modal"></div>
        </div>
        <div class="filas">
            <div class="titulo_tabla">LISTA DE CURSOS AGREGADOS</div>
        </div>
        <div id="listado_curso" class="filas">
            <?php   $this->load->view("main/contenido/inferior/ajax/vw_tabla_listado_cursos"); ?>
        </div>
    </div>
</div>