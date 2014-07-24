<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/waypoints-sticky.min.js"></script>
<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/jquery.tabslet.min.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>tabs/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>tabs/typography.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>tabs/styles.css" />

<div class='tabs tabs_default'>
    <ul class='horizontal'>
        <li><a class="tabs_enlace" href="#tab-1">Activos</a></li>
        <li><a class="tabs_enlace" href="#tab-2">Inactivos</a></li>
        <li><a class="tabs_enlace" href="#tab-3">Pendientes</a></li>
        <li><a class="tabs_enlace" href="#tab-4">Rechazados</a></li>
    </ul>
    <div id='tab-1'>
        <table id="cursos" class="row-border hover" cellspacing="0" width="100%" >
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Ciudad</th>
                    <th>Instructor</th>
                    <th>Estado</th>
                    <th width="230px"></th>
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
                    <th width="230px"></th>
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
                        { "data": "instructor" },
                        { "data": "estado" },
                        {
                            "data": "id",
                            "render": function ( data ) {
                                        return '<div class="acciones" onclick="ver_detalles(\'curso\',\'id='+data+'\');">'+
                                                 '<i class="icono-ver_detalles"></i>'+
                                                 '<a href="javascript:">Ver Detalles</a>'+
                                               '</div>'+
                                               '<div class="acciones" onclick="editar(\'curso\',\'id='+data+'\');">'+
                                                 '<i class="icono-editar"></i>'+
                                                 '<a href="javascript:">Editar</a>'+
                                               '</div>'+
                                               '<div class="acciones" onclick="eliminar(\'curso\',\'id='+data+'\');">'+
                                                 '<div style="margin-top: 1px;"><a href="javascript:">Eliminar</a></div>'+
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
    </div>
    <div id='tab-2'>

    </div>
    <div id='tab-3'>

    </div>
</div>
<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/initializers.js"></script>