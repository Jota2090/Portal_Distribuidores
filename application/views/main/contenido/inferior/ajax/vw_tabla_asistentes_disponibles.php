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
            <td width="185px">
                <?php echo $row->asi_nombre_completo; ?>
            </td>
            <td>
                <div class="acciones" onclick="refrescar_seccion('editar_asistente','asistente_listado','id_asistente=<?php echo $row->asi_cedula;?>');" >
                    <i class="icono-editar"></i><a href="javascript:">Editar</a>
                </div>
                <div class="acciones" onclick="eliminar('asistente_listado','id_asistente=<?php echo $row->asi_cedula;?>','tabla_lista_asistente','lista_asistente');" >
                    <div style="margin-top: 1px;"><a href="javascript:">Eliminar</a></div>
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
