<?php
    $attributes = array('id' => 'f_nueva_lista_asistente', 'name' => 'f_nueva_lista_asistente');
    echo form_open('asistentes/crear_lista_asistente', $attributes);
?>
<div class="titulo_modal">
    <span>
        <span class="titulo_modal_imagen_izq">&nbsp;</span>
        <span class="titulo_modal_cuerpo">
            <span class="titulo_modal_flecha">
                Lista Nueva
            </span>
        </span> 
        <span class="titulo_modal_imagen_der" >&nbsp;</span>
    </span>
</div>
<div class="cuerpo_modal">
    <?php    
        $data = array('autocomplete'=>'off', 'class'=>'form_modal_input', 'name'=>'nombre_lista', 'id'=>'nombre_lista', 'value'=>set_value("nombre_lista"), 'type'=>'text');
        echo "<div class='form_div'><div class='form_modal_label' style='width:100px'>Nombre:</div>".form_input($data)."</div>";
    ?>
</div>
<div class="cuerpo_modal">
    <div class="titulo_cuerpo_modal" style="padding: 0px;">
        <div style="float: left;">
            Asistentes Disponibles
        </div>
        <div style="float: right;">
            Total: <?php if($resultado){ echo $resultado->num_rows(); }else{ echo "0"; } ?>
        </div>
    </div> 
    <div class="contenido_cuerpo_modal">
        <div style="float: right; padding: 5px 28px;">
            <a href="javascript:" onclick="marcar_todos('asistentes');" >Marcar Todos</a>
        </div>
        <div style="overflow-y: scroll; height: 230px; clear: both;">
            <?php 
                if($resultado){
                    if($resultado->num_rows() > 0){
            ?>
            <table id="asistentes"  class="row-border hover dataTable">
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
                }else{
                    echo "No tiene asistentes disponibles";
                } 
            ?>
        </div>
    </div>
</div>
<div class="boton_modal">
    <span class="boton_modal_fondo">
        <i class="icono-agregar-lista">&nbsp;</i>
        <span>
        <?php
            $js = 'onclick="enviar_formulario(\'f_nueva_lista_asistente\', \'tabla_lista_asistente\', \'lista_asistente\')"';
            echo form_submit('crear', 'Agregar Lista', $js);
        ?>
        </span>
    </span>
</div>

<?php
    echo form_close();
?>