<table id="listas" class="row-border hover" cellspacing="0" width="100%" >
    <thead>
        <tr>
            <th>Nombre de Lista</th>
            <th>Asistentes Agregados</th>
            <th>&Uacute;ltimo Curso Agregado</th>
            <th width="290px"></th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>Nombre de Lista</th>
            <th>Asistentes Agregados</th>
            <th>&Uacute;ltimo Curso Agregado</th>
            <th width="290px"></th>
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
                                return '<div class="acciones" onclick="crear_formulario(\'asistente\',\'id='+data+'\');">'+
                                        '<div class="borde_izq_boton_blanco">&nbsp;</div>'+
                                        '<div class="borde_centro_boton_blanco">'+
                                            '<i class="icono-agregar-asistente"></i><a href="javascript:">Agregar Asistente</a>'+
                                        '</div>'+
                                        '<div class="borde_der_boton_blanco">&nbsp;</div>'+
                                       '</div>'+
                                       '<div class="acciones" onclick="editar(\'lista_asistente\',\'id='+data+'\');">'+
                                        '<div class="borde_izq_boton_blanco">&nbsp;</div>'+
                                        '<div class="borde_centro_boton_blanco">'+
                                            '<i class="icono-editar"></i><a href="javascript:">Editar</a>'+
                                        '</div>'+
                                        '<div class="borde_der_boton_blanco">&nbsp;</div>'+
                                       '</div>'+
                                       '<div class="acciones" onclick="eliminar(\'lista_asistente\',\'id='+data+'\');">'+
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
                "lengthMenu": "Mostrar _MENU_ listas por p&aacute;gina",
                "zeroRecords": "No tiene listas registradas",
                "info": "Mostrando del _START_ al _END_ de _TOTAL_ listas",
                "infoEmpty": "No tiene listas registradas",
                "infoFiltered": "(Filtrado de _MAX_ cursos)"
            }
        });
    } );
</script>

