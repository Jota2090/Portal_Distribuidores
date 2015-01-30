<?php
    $attributes = array('id' => 'f_imprimir_asistente', 'name' => 'f_imprimir_asistente', 'target' => '_blank');
    $hidden = array('id' => $id_curso);
    echo form_open('asistentes/imprimir_asistencia', $attributes, $hidden);
?>
        <div class="titulo_modal fondo_titulo_modal_medium">
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
        <div class="cuerpo_modal fondo_cuerpo_modal_medium">
            <div class="form_div">
                <div class="form_modal_label">
                    Curso:
                </div>
                <div class="form_modal_input">
                    <?php if(isset($curso_nombre)){   echo $curso_nombre;   }else{  echo "No existe informaci&oacute;n para este curso";    } ?>
                </div>
            </div>
            <div class="form_div">
                <div class="titulo_cuerpo_modal">
                    <div style="float: left;">
                        Asistentes Agregados
                    </div>
                    <div style="float: right;">
                        Total: <?php if($resultado){ echo $resultado->num_rows(); }else{ echo "0"; } ?>
                    </div>
                </div>
                <div id="asistente_listado" class="max-height scroll-y">
                    <div class="checkAll">
                        Todos <input id="check_all" name="check_all" type="checkbox" onclick="marcar_todos('asistentes','check_all');" />
                    </div>
                    <div style="clear: both;">
                    <?php 
                        if($resultado)
                        {
                            if($resultado->num_rows() > 0)
                            {
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
                            }
                            else
                            {
                                echo "No tiene asistentes agregados";
                            }
                        }
                        else
                        {
                            echo "No tiene asistentes agregados";
                        } 
                    ?>
                    </div>
                </div>
            </div>
            <div class="boton_modal">
                <button type="button" class="boton_modal_fondo" onclick="redirect_by_post('f_imprimir_asistente');">
                    <i class="icono-agregar-asistente_blanco">&nbsp;</i>
                    Imprimir Asistencia
                </button>
            </div>
        </div>
        <div class="fondo_footer_modal_medium">&nbsp;</div>
<?php
    echo form_close();
?>
