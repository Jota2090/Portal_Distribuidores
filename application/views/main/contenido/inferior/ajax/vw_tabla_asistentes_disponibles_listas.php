<div style="float: right; padding: 5px 0px;">
    <b>Total: &nbsp;<?php if($asistentes){ echo $asistentes->num_rows(); }else{ echo "0"; } ?></b>
</div>
<div style="overflow-y: scroll; height: 210px; clear: both;">
    <?php 
        if($asistentes){
            if($asistentes->num_rows() > 0){

    ?>
    <table class="row-border hover dataTable">
    <?php       foreach($asistentes->result() as $row){ ?>
        <tr>
            <td width="180px">
                <?php echo $row->asi_nombre_completo; ?>
            </td>
            <td
                <div class="acciones" onclick="quitar('asistente_lista','id_asistente=<?php echo $row->asi_cedula;?>&id_lista=<?php echo $row->ral_lista_asistente_id;?>','tabla_listas_predeterminadas','listas_predeterminadas');" >
                    <span class="boton_blanco_izq">&nbsp;</span>
                    <span class="boton_blanco_centro">
                        <a href="javascript:">Quitar</a>
                    </span>
                    <span class="boton_blanco_der" >&nbsp;</span>
                </div>
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
