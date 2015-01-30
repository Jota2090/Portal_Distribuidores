<?php
    if(isset($resultado))
    {
        if($resultado)
        {
            $lista_id = "";
            
            foreach ($resultado->result() as $row)
            {
                if( $lista_id == "" )
                {
                    $lista_id = $row->la_id;
                ?>
                    <div class="titulo_modal_cuerpo">
                        <?php echo $row->la_nombre; ?>
                    </div>
                    <table class="row-border hover dataTable">
                <?php
                }
                else if( $lista_id != $row->la_id )
                {
                    $lista_id = $row->la_id;
                ?>
                    </table>
                    <div class="titulo_modal_cuerpo">
                        <?php echo $row->la_nombre; ?>
                    </div>
                    <table class="row-border hover dataTable">
                <?php
                }
                ?>
                <tr>
                    <?php
                        if($row->ral_id == "" || $row->ral_id == null)
                        {
                    ?>
                            <td colspan="2">
                                No existen asistentes agregados a esta lista
                            </td>
                    <?php        
                        }
                        else
                        {
                    ?>
                            <td class="col-nombre">
                                <?php 
                                    echo $row->asi_nombre_completo; 
                                    echo form_hidden('nombre[]', $row->asi_nombre_completo);
                                ?>
                            </td>
                            <td class="col-opciones">
                                <div align="center">
                                    <?php
                                        if($row->rac_curso_id == "" || $row->rac_curso_id == null)
                                        {
                                            $data = array('name'=>'asistente[]', 'id'=>'asistente', 'value'=>$row->asi_cedula."_".$lista_id);
                                            echo form_checkbox($data);
                                        }
                                        else
                                        {
                                    ?>
                                            <div onclick="quitar('asistente_listado','id_asistente=<?php echo $row->asi_cedula;?>&id_curso=<?php echo $row->rac_curso_id;?>&id_lista=<?php echo $row->rac_lista_asistente_id;?>','tabla_cursos_usuarios','listado_cursos_usuarios');">
                                                <a href="javascript:">Quitar</a>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </td>
                    <?php
                        }
                    ?>
                </tr>
        <?php
            }
        ?>
            </table>
        <?php
        }
        else
        {
?>
            No hay asistentes ingresados
<?php    
        }
    }
    else
    {
?>
        No hay asistentes ingresados
<?php    
    }
?>