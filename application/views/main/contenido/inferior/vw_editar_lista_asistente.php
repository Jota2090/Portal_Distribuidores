<?php
    if($resultado){
        foreach ($resultado->result() as $row) {
            $attributes = array('id' => 'f_lista_asistente', 'name' => 'f_lista_asistente');
            $hidden = array('id' => $row->la_id);
            echo form_open('asistentes/editar_lista_asistente', $attributes, $hidden);
?>
<div class="titulo_modal">
    <span>
        <span class="titulo_modal_imagen_izq">&nbsp;</span>
        <span class="titulo_modal_cuerpo">
            <span class="titulo_modal_flecha">
                Editar Lista
            </span>
        </span> 
        <span class="titulo_modal_imagen_der" >&nbsp;</span>
    </span>
</div>
<div class="cuerpo_modal">
    <?php    
        $data = array('autocomplete'=>'off', 'class'=>'form_modal_input', 'name'=>'nombre_lista', 'id'=>'nombre_lista', 'value'=>set_value("nombre_lista", $row->la_nombre), 'type'=>'text');
        echo "<div class='form_div'><div class='form_modal_label' style='width:100px'>Nombre:</div>".form_input($data)."</div>";
    ?>
</div>
<div class="cuerpo_modal">
    <div class="titulo_cuerpo_modal">
        <div style="float: left;">
            Asistentes Asignados
        </div>
        <div style="float: right;">
            Total: <?php if($resultado){ echo $resultado->num_rows(); }else{ echo "0"; } ?>
        </div>
    </div> 
    <div class="contenido_cuerpo_modal">
        <div style="overflow-y: scroll; height: 230px;">
            <?php 
                if($resultado){
                    if($resultado->num_rows() > 0){
            ?>
            <table class="row-border hover dataTable">
            <?php       foreach($resultado->result() as $row){ ?>
                <tr>
                    <td width="290px">
                        <?php echo $row->asi_nombre_completo; ?>
                    </td>
                    <td>
                        <?php
                            $data = array('name'=>'asistente[]', 'id'=>'asistente', 'value'=>$row->asi_cedula, 'style'=>'width:10px; margin-left: 10px; valign: center;');
                            echo form_checkbox($data);
                        ?>
                    </td>
                </tr>
                
            <?php       } ?>
            </table>
            <?php
                    }else{
                        echo "No tiene asistentes disponibles";
                    } 
                }
            ?>
        </div>
    </div>
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