<table id="usuarios" class="row-border hover" cellspacing="0" width="100%" >
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>C&eacute;dula</th>
            <th>Correo</th>
            <th></th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>C&eacute;dula</th>
            <th>Correo</th>
            <th></th>
        </tr>
    </tfoot>
</table>

<script>
    $(document).ready(function() {
        $('#usuarios').dataTable({
            "ajax": '<?php echo base_url()."usuarios/listar_usuarios/2";?>',
            "order": [[ 1, "asc" ]],
            "columns": [
                { "data": "nombre" ,
                  "render": function ( data ) {
                                return '<div style="text-align: center;">'+data+'</div>';
                              }
                },
                { "data": "apellido" ,
                  "render": function ( data ) {
                                return '<div style="text-align: center;">'+data+'</div>';
                              }
                },
                { "data": "cedula" ,
                  "render": function ( data ) {
                                return '<div style="text-align: center;">'+data+'</div>';
                              }
                },
                { "data": "correo" ,
                  "render": function ( data ) {
                                return '<div style="text-align: center;">'+data+'</div>';
                              }
                },
                {
                    "data": "cedula",
                    "render": function ( data ) {
                                return '<div class="acciones" onclick="activar(\'usuario\',\'id='+data+'&tipo=pendientes\');">'+
                                         '<a href="javascript:">Activar</a>'+
                                       '</div>'+
                                       '<div class="acciones" onclick="rechazar(\'usuario\',\'id='+data+'&tipo=pendientes\');">'+
                                         '<a href="javascript:">Rechazar</a>'+
                                       '</div>'+
                                       '<div class="acciones" onclick="eliminar(\'usuario\',\'id='+data+'&tipo=pendientes\');">'+
                                         '<a href="javascript:">Eliminar</a>'+
                                       '</div>';
                              }
                }
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ usuarios por p&aacute;gina",
                "zeroRecords": "No tiene usuarios registrados",
                "info": "Mostrando del _START_ al _END_ de _TOTAL_ usuarios",
                "infoEmpty": "No tiene usuarios registrados",
                "infoFiltered": "(Filtrado de _MAX_ usuarios)"
            }
        });
    } );
</script>