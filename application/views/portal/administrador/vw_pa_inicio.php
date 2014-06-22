<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Cursos de Capacitacion</title>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>mis_funciones.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>ext-base.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>ext-all.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>ext-lang-es.js"></script>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>ext-all.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>porta.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>estilo.css" />
    </head>
   
    <body>
        <div id="header">
            <?php  $this->load->view("main/vw_header",$header);    ?>
        </div>
        <div id="main">
            <div id="seccion_superior">
                <div id="seccion_superior_contenido" >
                    <div class="filas">
                        <div id="slogan_publicidad">
                            CAPAC&Iacute;TATE
                        </div>
                    </div>
                    <div class="filas">
                        <div id="buscador">
                            <input class="input_buscador" type="text" value="" placeholder="Busca un curso aqu&iacute;" />
                            <img class="img_buscador" src="<?php echo HTTP_IMAGES_PATH; ?>Main/Superior/btn_buscador.png" />
                        </div>
                    </div>
                    <div class="filas">
                        <div style="float: right;">
                            <img height="160px" src="<?php echo HTTP_IMAGES_PATH; ?>Main/Superior/txt_curso_online.png" />
                        </div>
                    </div>
                </div>
            </div>
            <div id="seccion_inferior">
                <div id="seccion_inferior_contenido" >
                    <div class="filas">
                        <h4>CURSOS DESTACADOS DEL D&Iacute;A</h4>
                    </div>
                    <div class="filas">
                        <div class="cursos_destacados">
                            <div class="titulo_curso_destacados">
                                T&eacute;cnicas en Ventas
                            </div>
                            <div class="cuerpo_curso_destacados">
                                <div class="fecha">24 de Junio del 2014</div>
                                <img src="<?php echo HTTP_IMAGES_PATH; ?>Noticias/1.jpg" />
                                <div class="descripcion">
                                    Desarrollo de ideas innovadoras para crear estrategias y mejorar las ventas. 
                                </div>
                            </div>
                            <div class="footer_curso_destacados">&nbsp;</div>
                            <div class="boton_curso_destacados">Registrarse</div>
                        </div>
                        <div class="espacio_cursos_destacados">&nbsp;</div>
                        <div class="cursos_destacados">
                            <div class="titulo_curso_destacados">
                                Navegaci&oacute;n por Datos
                            </div>
                            <div class="cuerpo_curso_destacados">
                                <div class="fecha">25 de Junio del 2014</div>
                                <img src="<?php echo HTTP_IMAGES_PATH; ?>Noticias/2.jpg" />
                                <div class="descripcion">
                                    Importancia de la seguridad inform&aacute;tica y las nuevas tecnolog&iacute;as de la informaci&oacute;n. 
                                </div>
                            </div>
                            <div class="footer_curso_destacados">&nbsp;</div>
                            <div class="boton_curso_destacados">Registrarse</div>
                        </div>
                        <div class="espacio_cursos_destacados">&nbsp;</div>
                        <div class="cursos_destacados">
                            <div class="titulo_curso_destacados">
                                E-Commerce
                            </div>
                            <div class="cuerpo_curso_destacados">
                                <div class="fecha">26 de Junio del 2014</div>
                                <img src="<?php echo HTTP_IMAGES_PATH; ?>Noticias/3.jpg" />
                                <div class="descripcion">
                                    An&aacute;lisis sobre su crecimiento y t&eacute;cnicas estrat&eacute;gicas para emprendedores.
                                </div>
                            </div>
                            <div class="footer_curso_destacados">&nbsp;</div>
                            <div class="boton_curso_destacados">Registrarse</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">&nbsp;</div>
    </body>

</html>
