<?php
    $attributes = array('id' => 'f_imprimir_asistente', 'name' => 'f_imprimir_asistente', 'target' => '_blank');
    $hidden = array('id' => $id_curso);
    echo form_open('asistentes/imprimir_asistencia', $attributes, $hidden);
?>
        <div class="titulo_modal">
            <span>
                <span class="titulo_modal_imagen_izq">&nbsp;</span>
                <span class="titulo_modal_cuerpo">
                    <span class="titulo_modal_flecha">
                        Imprimir Asistencia
                    </span>
                </span> 
                <span class="titulo_modal_imagen_der" >&nbsp;</span>
            </span>
        </div>
        <div class="cuerpo_modal">
            <div class="form_div">
                <div class="form_modal_label" style="width:150px;">
                    Curso:
                </div>
                <div class="form_modal_input">
                    <textarea class="textarea-detalle" cols="42" rows="2" readonly="true"><?php if(isset($curso_nombre)){   echo $curso_nombre;   }else{  echo "No existe informaci&oacute;n para este curso";    } ?></textarea>
                </div>
            </div>
        </div>
        <div id="asistente_listado" class="cuerpo_modal" style="height: 380px;">
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
                    <?php
                        $lista_id = '';

                        foreach($resultado->result() as $row)
                        { 
                            if($lista_id == '' || $lista_id != $row->rac_lista_asistente_id)
                            {
                                $lista_id = $row->rac_lista_asistente_id;
                                $i = 0;
                    ?>
                                <tr style="background-color: #dddddd">
                                    <td>
                                        <b><?php echo $row->la_nombre; ?></b>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>
                    <?php
                            }

                            $i++;
                    ?>
                        <tr>
                            <td width="280px">
                                <?php echo $row->asi_nombre_completo; ?>
                            </td>
                            <td>
                                <?php
                                    $data = array('name'=>'asistente[]', 'id'=>'asistente', 'value'=>$row->rac_id, 'style'=>'width:10px; margin-left: 10px; valign: center;');
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
        </div>
        <div class="boton_modal">
            <span class="boton_modal_fondo">
                <i class="icono-agregar-asistente_blanco">&nbsp;</i>
                <span>
                    <a href="javascript:" onclick="redirect_by_post('f_imprimir_asistente');">
                        Imprimir Asistencia
                    </a>
                </span>
            </span>
        </div>

<?php
    echo form_close();
?>
