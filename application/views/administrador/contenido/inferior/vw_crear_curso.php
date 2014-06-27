<script>
    $(document).ready(function(){
        $('#apellido').timepicker({ timeFormat: 'hh:mm' });
    });

</script>
<div class="titulo_modal">
    <span>
        <img src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/border_izq_btn_rojo.png" />
        <span class="titulo_modal_cuerpo">
            Curso Nuevo
        </span>
        <img class="titulo_modal_imagen_izq" src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/border_der_btn_rojo.png" />
    </span>
</div>
<div class="cuerpo_modal">
    <?php
        echo validation_errors();

        $attributes = array('id' => 'f_nuevo_curso', 'name' => 'f_nuevo_curso');
        //$hidden = array('tipo' => 'U');
        echo form_open('cursos/crear_curso', $attributes);
    ?>
    
    <div class="form_modal_contenido">
    <?php    
        $data = array('name'=>'nombre', 'id'=>'nombre', 'value'=>set_value("nombre"), 'maxlength'=>'100', 'style'=>'width:50%', 'type'=>'text');
        echo "Nombres:".form_input($data)."<br/>";

        $data = array('name'=>'', 'id'=>'apellido', 'value'=>set_value("apellido"), 'maxlength'=>'100', 'style'=>'width:50%', 'type'=>'text');
        echo "Apellidos:".form_input($data)."<br/>";

        $data = array('name'=>'correo', 'id'=>'correo', 'value'=>set_value("correo"), 'maxlength'=>'100', 'style'=>'width:50%', 'type'=>'text');
        echo "Correo:".form_input($data)."<br/>";
    ?>
    </div>
    <div class="form_modal_contenido">
    <?php  
        $data = array('name'=>'cedula', 'id'=>'cedula', 'value'=>set_value("cedula"), 'maxlength'=>'100', 'style'=>'width:50%', 'type'=>'text');
        echo "C&eacute;dula:".form_input($data)."<br/>";

        $data = array('name'=>'usuario', 'id'=>'usuario', 'value'=>set_value("usuario"), 'maxlength'=>'100', 'style'=>'width:50%', 'autocomplete'=>'off', 'type'=>'text');
        echo "Usuario:".form_input($data)."<br/>";

        $data = array('name'=>'contrasena', 'id'=>'contrasena', 'value'=>set_value("contrasena"), 'maxlength'=>'100', 'style'=>'width:50%', 'type'=>'password');
        echo "Contrase&ntilde;a:".form_input($data)."<br/>";
        
        /*$options = array('S'=>'Super Administrador', 'V'=>'Vendedores', 'U'=>'Asistente (Administrador)');
        echo "Tipo:".form_dropdown('tipo', $options, 'U')."<br/>";*/

        echo form_submit('crear', 'Crear Usuario');

        echo form_close();
    ?>
    </div>
</div>
<div class="boton_modal"></div>