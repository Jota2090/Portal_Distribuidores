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
        <div class="filas">
            <table id="cursos" class="row-border hover" cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Ciudad</th>
                        <th>Instructor</th>
                        <th>Estado</th>
                        <th width="260px"></th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Ciudad</th>
                        <th>Instructor</th>
                        <th>Estado</th>
                        <th width="260px"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#cursos').dataTable({
            "ajax": '<?php echo base_url()."cursos/listar_cursos";?>',
            "language": {
                "lengthMenu": "Mostrar _MENU_ cursos por p&aacute;gina",
                "zeroRecords": "No tiene cursos registrados",
                "info": "Mostrando del _START_ al _END_ de _TOTAL_ cursos",
                "infoEmpty": "No tiene cursos registrados",
                "infoFiltered": "(Filtrado de _MAX_ cursos)"
            }
        });
    } );
</script>