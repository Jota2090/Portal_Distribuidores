<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Cursos de Capacitacion</title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>estilo.css" />
    </head>

    <body>
        <div id="header">
            <div id="header_titulo">
                <div>Cursos de Capacitaci&oacute;n</div>
                <img src="<?php echo HTTP_IMAGES_PATH; ?>Header/logo_claro.png" />
            </div>
            <div id="header_opciones">
                <div class="opcion_selected">Cursos</div>
                <div class="opcion">Categor&iacute;as</div>
                <div id="inicio_header">
                    <img src="<?php echo HTTP_IMAGES_PATH; ?>Header/ico_usuario.png" />
                    <div>Iniciar Sesi&oacute;n</div>
                </div>
                <div id="header_buscador">
                    <input class="input_buscador" type="text" value="" placeholder="Busca un curso aqu&iacute;" />
                    <img class="img_buscador" src="<?php echo HTTP_IMAGES_PATH; ?>Header/btn_buscador.png" />
                </div>
            </div>
        </div>
        <div id="main">
            <div id="seccion_superior">
                <img width="100%" height="400px" src="<?php echo HTTP_IMAGES_PATH; ?>Main/Superior/cursos_slider.jpg" />
            </div>
            <div id="seccion_inferior">
                <div id="tema_inferior">
                    <h4>CURSOS DESTACADOS DEL D&Iacute;A</h4>
                </div>
                <div id="cursos">
                    <div class="cursos_destacados">
                        <div class="titulo_curso_destacados">
                            T&eacute;cnicas en Ventas
                        </div>
                        <div class="borde-redondeado-jquery cuerpo_curso_destacados">
                            <img src="<?php echo HTTP_IMAGES_PATH; ?>Noticias/1.jpg" />
                            <div>
                                Desarrollo de ideas innovadoras para crear estrategias y mejorar las ventas. 
                            </div>
                        </div>
                    </div>
                    <div class="espacio_cursos_destacados">&nbsp;</div>
                    <div class="cursos_destacados">
                        <div class="titulo_curso_destacados">
                            Navegaci&oacute;n por Datos
                        </div>
                        <div class="cuerpo_curso_destacados">
                            <img src="<?php echo HTTP_IMAGES_PATH; ?>Noticias/2.jpg" />
                            <div>
                                Importancia de la seguridad inform&aacute;tica y las nuevas tecnolog&iacute;as de la informaci&oacute;n. 
                            </div>
                        </div>
                    </div>
                    <div class="espacio_cursos_destacados">&nbsp;</div>
                    <div class="cursos_destacados">
                        <div class="titulo_curso_destacados">
                            E-Commerce
                        </div>
                        <div class="cuerpo_curso_destacados">
                            <img src="<?php echo HTTP_IMAGES_PATH; ?>Noticias/3.jpg" />
                            <div>
                                An&aacute;lisis sobre su crecimiento y t&eacute;cnicas estrat&eacute;gicas para emprendedores.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">&nbsp;</div>
    </body>

</html>
