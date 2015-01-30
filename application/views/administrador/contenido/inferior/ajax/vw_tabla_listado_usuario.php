<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/waypoints-sticky.min.js"></script>
<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/jquery.tabslet.min.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>tabs/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>tabs/typography.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo HTTP_CSS_PATH; ?>tabs/styles.css" />

<div class='tabs tabs_default'>
    <ul class='horizontal'>
        <li><a id="activos" class="tabs_enlace active" href="javascript:" onclick="cambiar_pestana('activos','ver_usuarios/activos','listado_usuario'); ">Activos</a></li>
        <li><a id="inactivos" class="tabs_enlace" href="javascript:" onclick="cambiar_pestana('inactivos','ver_usuarios/inactivos','listado_usuario');">Inactivos</a></li>
        <li><a id="pendientes" class="tabs_enlace" href="javascript:" onclick="cambiar_pestana('pendientes','ver_usuarios/pendientes','listado_usuario');">Pendientes</a></li>
        <li><a id="rechazados" class="tabs_enlace" href="javascript:" onclick="cambiar_pestana('rechazados','ver_usuarios/rechazados','listado_usuario');">Rechazados</a></li>
    </ul>
    <div id='listado_usuario'></div>
</div>
<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tabs/initializers.js"></script>

<?php
	if($this->session->userdata('opcion_pestana') == 'pendientes')
	{
		echo "<script>
				cambiar_pestana('pendientes','ver_usuarios/pendientes','listado_usuario');
			  </script>";

		$this->session->unset_userdata('opcion_pestana');
	}
?>




