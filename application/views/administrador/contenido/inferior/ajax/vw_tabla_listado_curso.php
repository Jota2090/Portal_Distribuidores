<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/waypoints-sticky.min.js"></script>
<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/jquery.tabslet.min.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>tabs/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>tabs/typography.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>tabs/styles.css" />

<div class='tabs tabs_default'>
    <ul class='horizontal'>
        <li><a id="disponibles" class="tabs_enlace active" href="javascript:" onclick="cambiar_pestana('disponibles','tabs_cursos/disponibles','listado_curso');">Disponibles</a></li>
        <li><a id="terminados" class="tabs_enlace" href="javascript:" onclick="cambiar_pestana('terminados','tabs_cursos/terminados','listado_curso');">Terminados</a></li>
        <li><a id="cancelados" class="tabs_enlace" href="javascript:" onclick="cambiar_pestana('cancelados','tabs_cursos/cancelados','listado_curso');">Cancelados</a></li>
    </ul>
    <div id='listado_curso'></div>
</div>
<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/initializers_cursos.js"></script>
