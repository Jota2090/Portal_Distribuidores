<?php
    if(isset($existe_lista))
    {
        if($existe_lista)
        {
?>
            <div class="titulo_cuerpo_modal" style="padding: 0px;">
                <div style="float: left;">
                    Asistentes Agregados
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
                                echo "No tiene asistentes agregados";
                            }
                        }else{
                            echo "No tiene asistentes agregados";
                        } 
                    ?>
                </div>
            </div>
<?php
        }
        else
        {
?>
            No ha seleccionado ninguna lista
<?php    
        }
    }
    else
    {
?>
    No ha seleccionado ninguna lista
<?php    
    }
?>