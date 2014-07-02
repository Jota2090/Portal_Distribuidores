<?php
    $attributes = array('id' => 'f_nueva_lista_asistente', 'name' => 'f_nueva_lista_asistente');
    echo form_open('asistentes/crear_lista_asistente', $attributes);
?>
<div class="titulo_modal">
    <span>
        <img src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/btn_blanco_izq.png" />
        <span class="titulo_modal_cuerpo">
            Lista Nueva
        </span>
        <img class="titulo_modal_imagen_izq" src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/btn_blanco_der.png" />
    </span>
</div>
<div class="cuerpo_modal">
    <?php    
        $data = array('autocomplete'=>'off', 'class'=>'form_modal_input', 'name'=>'nombre_lista', 'id'=>'nombre_lista', 'value'=>set_value("nombre_lista"), 'type'=>'text');
        echo "<div class='form_div'><div class='form_modal_label' style='width:100px'>Nombre:</div>".form_input($data)."</div>";
    ?>
</div>
<div class="boton_modal">
    <span class="boton_modal_fondo">
        <i class="icono-agregar-lista">&nbsp;</i>
        <span>
        <?php
            $imagenes = array('0' => false);
            $js = 'onclick="enviar_formulario(\'f_nueva_lista_asistente\', \'asistentes/crear_lista_asistente\', \'tabla_listas_predeterminadas\', \'listas_predeterminadas\', '.$imagenes.')"';
            echo form_button('crear', 'Agregar Lista', $js);
        ?>
        </span>
    </span>
</div>

<?php
    echo form_close();
?>