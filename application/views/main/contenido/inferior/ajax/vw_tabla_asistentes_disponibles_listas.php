<div style="float: right; padding: 5px 0px;">
    <b>Total: &nbsp;<?php if($asistentes){ echo count($asistentes); }else{ echo "0"; } ?></b>
</div>
<div style="overflow-y: scroll; height: 210px; clear: both;">
    <?php 
        if($asistentes){
            if(count($asistentes) > 0){
    ?>
                <table class="row-border hover dataTable">
                <?php   foreach($asistentes as $row){ ?>
                    <tr>
                        <td width="290px">
                            <?php echo $row['asi_nombre_completo']; ?>
                        </td>
                        <td>
                            <?php
                                 $data = array('name'=>'asistente[]', 'id'=>'asistente', 'value'=>$row['asi_cedula'], 'style'=>'width:10px; margin-left: 10px; valign: center;');
                                 echo form_checkbox($data);
                            ?>
                        </td>
                    </tr>
                <?php   } ?>
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
