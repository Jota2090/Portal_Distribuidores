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
                { "data": "nombre" },
                { "data": "num_asistentes" },
                { "data": "curso" },
                {
                    "data": "id",
                    "render": function ( data, type, full, meta ) {
                                return '<div class="acciones" onclick="editar(\'lista_asistente\',\'id='+data+'\');">'+
                                        '<span class="boton_blanco_izq">&nbsp;</span>'+
                                        '<span class="boton_blanco_centro">'+
                                            '<i class="icono-editar"></i><a href="javascript:">Editar</a>'+
                                        '</span>'+
                                        '<span class="boton_blanco_der" >&nbsp;</span>'+
                                       '</div>'+
                                       '<div class="acciones" onclick="eliminar(\'lista_asistente\',\'id='+data+'\');">'+
                                        '<span class="boton_blanco_izq">&nbsp;</span>'+
                                        '<span class="boton_blanco_centro">'+
                                            '<div><a href="javascript:">Eliminar</a></div>'+
                                        '</span>'+
                                        '<span class="boton_blanco_der" >&nbsp;</span>'+
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

