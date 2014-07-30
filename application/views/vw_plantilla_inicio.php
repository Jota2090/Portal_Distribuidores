<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Cursos de Capacitacion</title>
        <meta charset="UTF-8">
        <?php $this->load->view($scripts); ?>
    </head>
   
    <body>
        <div id="header">
            <?php $this->load->view($header, $header_data); ?>
        </div>
        <div id="main">
            <?php 
                if(!isset($interna))
                {
                    $this->load->view($superior, $superior_data);
                    $this->load->view($inferior, $inferior_data); 
                }
                else
                {
                    $this->load->view($interna, $interna_data);
                }
            ?>
        </div>
        <div id="footer">&nbsp;</div>
    </body>

</html>
