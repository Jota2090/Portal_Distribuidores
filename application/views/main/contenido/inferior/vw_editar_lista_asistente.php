<?php
    if($resultado){
        foreach ($resultado->result() as $row) {
            $attributes = array('id' => 'f_lista_asistente', 'name' => 'f_lista_asistente');
            $hidden = array('id' => $row->la_id);
            echo form_open('asistentes/editar_lista_asistente', $attributes, $hidden);
?>
<div class="titulo_modal">
    <span>
        <img src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/btn_blanco_izq.png" />
        <span class="titulo_modal_cuerpo">
            Editar Lista
        </span>
        <img class="titulo_modal_imagen_izq" src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/btn_blanco_der.png" />
    </span>
</div>
<div class="cuerpo_modal">
    <?php    
        $data = array('autocomplete'=>'off', 'class'=>'form_modal_input', 'name'=>'nombre_lista', 'id'=>'nombre_lista', 'value'=>set_value("nombre_lista", $row->la_nombre), 'type'=>'text');
        echo "<div class='form_div'><div class='form_modal_label' style='width:100px'>Nombre:</div>".form_input($data)."</div>";
    ?>
</div>
<div class="boton_modal">
    <span class="boton_modal_fondo">
        <i class="icono-guardar">&nbsp;</i>
        <span>
        <?php
            $imagenes = array('0' => false);
            $js = 'onclick="enviar_formulario(\'f_lista_asistente\', \'asistentes/editar_lista_asistente\', \'tabla_listas_predeterminadas\', \'listas_predeterminadas\', '.$imagenes.')"';
            echo form_button('crear', 'Guardar cambios', $js);
        ?>
        </span>
    </span>
</div>

<?php
            echo form_close();
                
            break;
        }
    }else{
?>
    <div class="cuerpo_modal">
        No existe informaci&oacute;n para esta Lista Predeterminada 
    </div>
<?php
    }
?>