<div id="seccion_inferior">
    <div id="seccion_inferior_contenido" >
        <div class="filas">
            <div id="contenido_izq">
                <div>Listado de Cursos Agregados</div>
            </div>
            <div id="contenido_der">
                <a href="#" onclick="crear_formulario('curso');">
                    <div class="borde_izq_boton_rojo">&nbsp;</div>
                    <div class="borde_centro_boton_rojo">
                        <img src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/ico_agregar_curso.png" />
                        <div>Agregar Curso Nuevo</div>
                    </div>
                    <div class="borde_der_boton_rojo">&nbsp;</div>
                </a>
            </div>
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