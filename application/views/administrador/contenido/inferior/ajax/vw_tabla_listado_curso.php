<table id="cursos" class="row-border hover" cellspacing="0" width="100%" >
    <thead>
        <tr>
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
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Ciudad</th>
            <th>Instructor</th>
            <th>Estado</th>
            <th width="270px"></th>
        </tr>
    </tfoot>
</table>

<script>
    $(document).ready(function() {
        $('#cursos').dataTable({
            "ajax": '<?php echo base_url()."cursos/listar_cursos";?>',
            "order": [[ 1, "asc" ]],
            "columns": [
                { "data": "nombre" },
                { "data": "fecha_inicio" },
                { "data": "hora_inicio" },
                { "data": "ciudad" },
                { "data": "instructor" },
                { "data": "estado" },
                {
                    "data": "id",
                    "render": function ( data, type, full, meta ) {
                                return '<div class="acciones" onclick="ver_detalles(\'curso\',\'id='+data+'\');">'+
                                        '<div class="borde_izq_boton_blanco">&nbsp;</div>'+
                                        '<div class="borde_centro_boton_blanco">'+
                                            '<img src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/ico_buscar.png" />'+
                                            '<div><a href="javascript:">Ver Detalles</a></div>'+
                                        '</div>'+
                                        '<div class="borde_der_boton_blanco">&nbsp;</div>'+
                                       '</div>'+
                                       '<div class="acciones" onclick="editar(\'curso\',\'id='+data+'\');">'+
                                        '<div class="borde_izq_boton_blanco">&nbsp;</div>'+
                                        '<div class="borde_centro_boton_blanco">'+
                                            '<i class="icono-editar"></i><a href="javascript:">Editar</a>'+
                                        '</div>'+
                                        '<div class="borde_der_boton_blanco">&nbsp;</div>'+
                                       '</div>'+
                                       '<div class="acciones" onclick="eliminar(\'curso\',\'id='+data+'\');">'+
                                        '<div class="borde_izq_boton_blanco">&nbsp;</div>'+
                                        '<div class="borde_centro_boton_blanco">'+
                                            '<div><a href="javascript:">Eliminar</a></div>'+
                                        '</div>'+
                                        '<div class="borde_der_boton_blanco">&nbsp;</div>'+
                                       '</div>';
                              }
                }
            ],
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

