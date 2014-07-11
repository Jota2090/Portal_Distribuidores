<table id="cursos" class="row-border hover" cellspacing="0" width="100%" >
    <thead>
        <tr>
            <th>Cupos<br/>Disponibles</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Ciudad</th>
            <th>Estado</th>
            <th width="280px"></th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>Cupos<br/>Disponibles</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Ciudad</th>
            <th>Estado</th>
            <th width="280px"></th>
        </tr>
    </tfoot>
</table>

<script>
    $(document).ready(function() {
        $('#cursos').dataTable({
            "ajax": '<?php echo base_url()."cursos/listar_cursos/1";?>',
            "order": [[ 2, "asc" ]],
            "columns": [
                { "data": "cupos",
                  "render": function ( data ) {
                                return '<div style="text-align: center;">'+data+'</div>';
                              }
                },
                { "data": "nombre" },
                { "data": "fecha_inicio" ,
                  "render": function ( data ) {
                                return '<div style="text-align: center;">'+data+'</div>';
                              }
                },
                { "data": "hora_inicio" ,
                  "render": function ( data ) {
                                return '<div style="text-align: center;">'+data+'</div>';
                              }
                },
                { "data": "ciudad" ,
                  "render": function ( data ) {
                                return '<div style="text-align: center;">'+data+'</div>';
                              }
                },
                { "data": "estado" },
                {
                    "data": "id",
                    "render": function ( data ) {
                                return '<div class="acciones" onclick="ver_detalles(\'curso\',\'id='+data+'\');">'+
                                        '<i class="icono-ver_detalles"></i>'+
                                        '<a href="javascript:">Ver Detalles</a>'+
                                       '</div>'+
                                       '<div class="acciones" onclick="crear_formulario(\'asistente_curso\',\'id='+data+'\');">'+
                                        '<i class="icono-agregar-asistente"></i>'+
                                        '<a href="javascript:">Asistencia</a>'+
                                       '</div>'+
                                       '<div class="acciones" onclick="ver_detalles(\'curso\',\'id='+data+'\');">'+
                                        '<i class="icono-ver_detalles"></i>'+
                                        '<a href="javascript:">Imprimir</a>'+
                                       '</div>';
                              }
                }
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ cursos por p&aacute;gina",
                "zeroRecords": "No existen cursos registrados",
                "info": "Mostrando del _START_ al _END_ de _TOTAL_ cursos",
                "infoEmpty": "No existen cursos registrados",
                "infoFiltered": "(Filtrado de _MAX_ cursos)"
            }
        });
    } );
</script>