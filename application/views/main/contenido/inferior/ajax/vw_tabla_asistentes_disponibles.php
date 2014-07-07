<div style="float: right; padding: 5px 0px;">
    <b>Total: &nbsp;<?php if($asistentes_disponibles){ echo $asistentes_disponibles->num_rows(); }else{ echo "0"; } ?></b>
</div>
<div style="overflow-y: scroll; height: 330px; clear: both;">
    <?php 
        if($asistentes_disponibles){
            if($asistentes_disponibles->num_rows() > 0){

    ?>
    <table class="row-border hover dataTable">
    <?php       foreach($asistentes_disponibles->result() as $row){ ?>
        <tr>
            <td width="170px">
                <?php echo $row->asi_nombre_completo; ?>
            </td>
            <td>
                <div class="acciones" onclick="refrescar_seccion('editar_asistente','asistente_listado','id_asistente=<?php echo $row->asi_cedula;?>');" >
                    <span class="boton_blanco_izq">&nbsp;</span>
                    <span class="boton_blanco_centro">
                        <i class="icono-editar"></i><a href="javascript:">Editar</a>
                    </span>
                    <span class="boton_blanco_der" >&nbsp;</span>
                </div>
                <div class="acciones" onclick="eliminar('asistente_listado','id_asistente=<?php echo $row->asi_cedula;?>');" >
                    <span class="boton_blanco_izq">&nbsp;</span>
                    <span class="boton_blanco_centro">
                        <a href="javascript:">Eliminar</a>
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
