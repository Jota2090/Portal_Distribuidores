<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Cursos de Capacitacion</title>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>mis_funciones.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>ext-base.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>ext-all.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>ext-lang-es.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>jquery.modal.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>jquery.timepicker.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>jquery-ui-timepicker-addon.js"></script>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>ext-all.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>porta.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>estilo_main.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>jquery.dataTables.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>jquery.modal.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>jquery.timepicker.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>jquery-ui.css" />
    </head>
   
    <body>
        <div id="header">
            <?php $this->load->view($header, $header_data); ?>
        </div>
        <div id="main">
            <?php $this->load->view($superior); ?>
            <?php $this->load->view($inferior); ?>
        </div>
        <div id="footer">&nbsp;</div>
    </body>

</html>
