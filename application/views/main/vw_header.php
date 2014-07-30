<div id="header_contenido">
    <div id="modal" style="display:none;">
        <div id="cargando" style="display: none; position: relative; top: 40%; vertical-align: middle; text-align: center;">
            Enviando... <img src='<?php echo HTTP_IMAGES_PATH; ?>loading.gif'>
        </div>
        <div id="contenido_modal"></div>
    </div>
    <div id="header_titulo">
        <img src="<?php echo HTTP_IMAGES_PATH; ?>Main/Header/logo_claro.png" />
        <div><a href="<?php echo base_url()?>main">Cursos de Capacitaci&oacute;n</a></div>
    </div>
    <div id="header_opciones">
    <?php
        if(isset($auth) && $auth)
        {  
    ?>
            <div id="inicio_header">
                <ul class="drop_menu">
                    <li>
                        <a href='javascript:'  onclick='desplegar("datos_usuario");' >
                            <div>
                                <img src="<?php echo HTTP_IMAGES_PATH; ?>Main/Header/ico_usuario.png" />
                            </div>
                            <div id="usuario">
                                Bienvenido, <?php 
                                                $nombres = explode(" ",$nombre);
                                                $apellidos = explode(" ",$apellido);
                                                echo $nombres[0]." ".$apellidos[0];
                                             ?>
                            </div>
                        </a>
                        <ul id="datos_usuario" style="display: none; z-index: 1; background: url('<?php echo HTTP_IMAGES_PATH; ?>Main/Header/fondo_logueado_admin.png') no-repeat;">
                            <li>
                                <div id="header_login" style="text-align:right;">
                                    <a href="<?php echo base_url()?>login/logout/main">
                                        Editar Datos
                                    </a>
                                    <a href="<?php echo base_url()?>login/logout/main">
                                        Cerrar Sesi&oacute;n
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_header">
                <div class="opcion"><a href="<?php echo base_url()?>main/lista_asistente">Asistentes</a></div>
                <div class="opcion"><a href="<?php echo base_url()?>main/cursos_usuarios">Cursos</a></div>
            </div>
    <?php 
        }
        else
        {    
    ?>
            <div class="menu_header" style="float: right;">
                <div class="opcion"><a href="javascript:" onclick="crear_formulario('registro_usuario');">Reg&iacute;strate</a></div>
            </div>
            <div id="inicio_header">
                <ul class="drop_menu">
                    <li>
                        <a href='javascript:' onclick='desplegar("iniciar_sesion");' >
                            <img src="<?php echo HTTP_IMAGES_PATH; ?>Main/Header/ico_usuario.png" />
                            <div>Iniciar Sesi&oacute;n</div>
                        </a>
                        <ul id="iniciar_sesion" style="display: none; z-index: 1;  background: url('<?php echo HTTP_IMAGES_PATH; ?>Main/Header/fondo_login.png') no-repeat;">
                            <li>
                                <div id="header_login">
                                     <?php 
                                        $attributes = array('id' => 'f_login', 'name' => 'f_login');
                                        echo form_open(base_url().'login/validar', $attributes);

                                        $data = array('name'=>'tipo', 'id'=>'tipo', 'value'=>'main', 'type'=>'hidden');
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
                                    <div id="olvido_contrasena" style="float:right;" onclick="crear_formulario('olvido_contrasena');">
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
                <div class="opcion"><a href="<?php echo base_url()?>main/buscador_cursos">Cursos</a></div>
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