<table id="listas" class="row-border hover" cellspacing="0" width="100%" >
    <thead>
        <tr>
            <th>Nombre de Lista</th>
            <th>Asistentes Agregados</th>
            <th>&Uacute;ltimo Curso Agregado</th>
            <th width="150px"></th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>Nombre de Lista</th>
            <th>Asistentes Agregados</th>
            <th>&Uacute;ltimo Curso Agregado</th>
            <th width="150px"></th>
        </tr>
    </tfoot>
</table>

<script>
    $(document).ready(function() {
        $('#listas').dataTable({
            "ajax": '<?php echo base_url()."asistentes/get_listas_predeterminadas";?>',
            "columns": [
                {   "data": "nombre"    },
                {   "data": "num_asistentes",
                    "render": function ( data ) {
                                return '<div style="text-align: center;">'+data+'</div>';
                              }
                },
                {   "data": "curso",
                    "render": function ( data ) {
                                return '<div style="text-align: center;">'+data+'</div>';
                              }
                },
                {
                    "data": "id",
                    "render": function ( data ) {
                                return '<div class="acciones" onclick="editar(\'lista_asistente\',\'id='+data+'\');">'+
                                         '<i class="icono-editar"></i><a href="javascript:">Editar</a>'+
                                       '</div>'+
                                       '<div class="acciones" onclick="eliminar(\'lista_asistente\',\'id='+data+'\');">'+
                                         '<div style="margin-top: 1px;"><a href="javascript:">Eliminar</a></div>'+
                                       '</div>';
                              }
                }
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ listas por p&aacute;gina",
                "zeroRecords": "No tiene listas registradas",
                "info": "Mostrando del _START_ al _END_ de _TOTAL_ listas",
                "infoEmpty": "No tiene listas registradas",
                "infoFiltered": "(Filtrado de _MAX_ cursos)"
            }
        });
    } );
</script>

