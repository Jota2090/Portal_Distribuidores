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
            <td width="300px">
                <?php echo $row->asi_nombre_completo; ?>
            </td>
            <td>
                <div class="acciones" onclick="quitar('asistente_lista_curso','id_asistente=<?php echo $row->asi_cedula;?>&id_curso=<?php echo $row->rac_curso_id;?>&id_lista=<?php echo $row->rac_lista_asistente_id;?>','tabla_cursos_usuarios','listado_cursos_usuarios');">
                    <a href="javascript:">Quitar</a>
                </div>
            </td>
        </tr>

    <?php       } ?>
    </table>
    <?php
            }else{
                echo "No tiene asistentes agregados";
            } 
        }else{
            echo "No tiene asistentes agregados";
        } 
    ?>
</div>
