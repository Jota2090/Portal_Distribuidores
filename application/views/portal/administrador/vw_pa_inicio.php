<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Cursos de Capacitacion</title>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>mis_funciones.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>ext-base.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>ext-all.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>ext-lang-es.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>jquery.dataTables.js"></script>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>ext-all.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>porta.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>estilo_portal.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>jquery.dataTables.css" />
    
        
    </head>
    <script>
        $(document).ready(function() {
            $('#example').dataTable({
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
   
    <body>
        <div id="header">
            <?php  $this->load->view("portal/vw_pa_header",$header);    ?>
        </div>
        <div id="main">
            <div id="seccion_titulo_tabs">
                <div id="titulo" >
                    <img src="<?php echo HTTP_IMAGES_PATH?>Main/Header/logo_claro.png" />
                    <div>PORTAL DE CAPACITACI&Oacute;N</div>
                </div>
                <div id="menu">
                    <div class="tabs">
                        <div id="menu_tab_1" class="tab_selected">&nbsp;</div>
                        <div class="tab_texto">Cursos</div>
                    </div>
                    <div class="tabs_last">
                        <div id="menu_tab_2" class="tab_no_selected">&nbsp;</div>
                        <div class="tab_texto">Reportes</div>
                    </div>
                </div>
            </div>
            <div id="seccion_contenido">
                <div id="contenido_izq">
                    <div>Listado de Cursos Agregados</div>
                </div>
                <div id="contenido_der">
                    <div class="borde_izq_boton_rojo">&nbsp;</div>
                    <div class="borde_centro_boton_rojo">
                        <img src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/ico_agregar_curso.png" />
                        <div>Agregar Curso Nuevo</div>
                    </div>
                    <div class="borde_der_boton_rojo">&nbsp;</div>
                </div>
                <table id="example" class="row-border hover" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Ciudad</th>
                            <th>Instructor</th>
                            <th></th>
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
                            <th width="260px"></th>
                        </tr>
                    </tfoot>
                    
                    <tbody>
                        <tr>
                            <td>CP00129</td>
                            <td>Capacitacion de Redes de Computadores Capacitacion de Redes de Computadores</td>
                            <td>23/05/2014</td>
                            <td>8:30</td>
                            <td>Guayaquil</td>
                            <td>Jose Avellano Quiroz</td>
                            <td>
                                <div class="acciones">
                                    <div class="borde_izq_boton_blanco">&nbsp;</div>
                                    <div class="borde_centro_boton_blanco">
                                        <img src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/ico_buscar.png" />
                                        <div><a href="#">Ver Detalles</a></div>
                                    </div>
                                    <div class="borde_der_boton_blanco">&nbsp;</div>
                                </div>
                                <div class="acciones">
                                    <div class="borde_izq_boton_blanco">&nbsp;</div>
                                    <div class="borde_centro_boton_blanco">
                                        <img src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/ico_editar.png" />
                                        <div><a href="#">Editar</a></div>
                                    </div>
                                    <div class="borde_der_boton_blanco">&nbsp;</div>
                                </div>
                                <div class="acciones">
                                    <div class="borde_izq_boton_blanco">&nbsp;</div>
                                    <div class="borde_centro_boton_blanco">
                                        <div><a href="#">Eliminar</a></div>
                                    </div>
                                    <div class="borde_der_boton_blanco">&nbsp;</div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="footer">&nbsp;</div>
    </body>

</html>
