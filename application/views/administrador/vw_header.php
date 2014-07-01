<div id="header_contenido">
    <div id="header_titulo">
        <div>Cursos de Capacitaci&oacute;n</div>
        <img src="<?php echo HTTP_IMAGES_PATH; ?>Main/Header/logo_claro.png" />
    </div>
    <div id="header_opciones">
        <?php
        if(isset($auth) && $auth){  ?>
        <div id="inicio_header">
            <div><img src="<?php echo HTTP_IMAGES_PATH; ?>Main/Header/ico_usuario.png" /></div>
            <div id="usuario">Bienvenido, <?php echo $nombre." ".$apellido;?></div>
        </div>
        <div class="menu_header">
            <div class="opcion"><a href="<?php echo base_url()?>login/logout/administrador">Cerrar Sesi&oacute;n</a></div>
            <div class="opcion"><a href="<?php echo base_url()?>administrador/reportes">Reportes</a></div>
            <div class="opcion"><a href="<?php echo base_url()?>administrador/cursos">Cursos</a></div>
        </div>
        <?php }else{    ?>
        <div id="inicio_header">
            <ul class="drop_menu">
                <li>
                    <a href='#'>
                        <img src="<?php echo HTTP_IMAGES_PATH; ?>Main/Header/ico_usuario.png" />
                        <div>Iniciar Sesi&oacute;n</div>
                    </a>
                    <ul>
                        <li>
                            <div id="header_login">
                                 <?php 
                                    $attributes = array('id' => 'f_login', 'name' => 'f_login');
                                    echo form_open(base_url().'/login/validar', $attributes);
                                    
                                    $data = array('name'=>'tipo', 'id'=>'tipo', 'value'=>'administrador', 'type'=>'hidden');
                                    echo form_input($data);
                                ?>
                                <label>Usuario:</label>

                                <?php
                                    $data1 = array('class'=>'input_login', 'name'=>'user', 'id'=>'user', 'value'=>set_value("usuario"), 'maxlength'=>'100', 'autocomplete'=>'off', 'type'=>'text');
                                    echo form_input($data1)."<br/>";
                                ?>

                                <label>Contrase&ntilde;a:</label>
                                <?php
                                    $data2 = array('class'=>'input_login', 'name'=>'password', 'id'=>'password', 'value'=>set_value("contrasena"), 'maxlength'=>'100', 'type'=>'password');
                                    echo form_input($data2)."<br/>";

                                    $data3 = array('class'=>'btn_ingresar', 'name'=>'ingresar', 'style'=>'width:120px', 'content'=>'Ingresar', 'onClick' => 'validar_formulario(\'f_login\')');
                                    echo form_button($data3);

                                    echo form_close();
                                ?>
                                <div id="olvido_contrasena" style="float:right;">
                                    <p>Olvidaste tu contrase&ntilde;a</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="menu_header">
            <div class="opcion"><a href="#">Categor&iacute;as</a></div>
            <div class="opcion"><a href="#">Cursos</a></div>
        </div>
        <?php }  ?>
    </div>
</div>

<?php
    if(isset($auth) && !$auth){ ?>
    <script>
        Ext.Msg.alert("Atenci\xf3n","Usuario y/o Contrase\xf1a incorrectos");
    </script>
<?php
    }
?>