<?php
    if($lista){
        foreach ($lista->result() as $row) {
            $attributes = array('id' => 'f_lista_asistente', 'name' => 'f_lista_asistente');
            $hidden = array('id' => $row->la_id);
            echo form_open('asistentes/editar_lista_asistente', $attributes, $hidden);
?>
                <div class="titulo_modal">
                    <span>
                        <span class="titulo_modal_imagen_izq">&nbsp;</span>
                        <span class="titulo_modal_cuerpo">
                            <span class="titulo_modal_flecha">
                                Editar Lista
                            </span>
                        </span> 
                        <span class="titulo_modal_imagen_der" >&nbsp;</span>
                    </span>
                </div>
                <div class="cuerpo_modal">
                    <?php    
                        $data = array('autocomplete'=>'off', 'class'=>'form_modal_input', 'name'=>'nombre_lista', 'id'=>'nombre_lista', 'value'=>set_value("nombre_lista", $row->la_nombre), 'type'=>'text');
                        echo "<div class='form_div'><div class='form_modal_label' style='width:100px'>Nombre:</div>".form_input($data)."</div>";
                    ?>
                </div>
                <div class="cuerpo_modal">
                    <div class="titulo_cuerpo_modal" style="margin-bottom: 0px;">
                        <span class="tabs">
                            <span id="tab_izq" class="selected_boton_blanco_izq">&nbsp;</span>
                            <span id="tab_menu_agregados" class="tabs_content selected_boton_blanco_centro" onclick="tabs('agregados','izq','0','blanco','listado_asistentes_agregados/<?php echo $row->la_id;  ?>','asistente_lista');">
                                Asistentes Agregados
                            </span>
                            <span class="boton_blanco_centro" style="border-left: 3px #cccccc solid; padding: 8px 0px 7px 0px;"></span>
                            <span id="tab_menu_disponibles" class="tabs_content boton_blanco_centro" onclick="tabs('disponibles','der','0','blanco','listado_asistentes_disponibles/<?php echo $row->la_id;  ?>','asistente_lista');">
                                Asistentes Disponibles
                            </span>
                            <span id="tab_der" class="boton_blanco_der" >&nbsp;</span>
                        </span>
                    </div>
                    <div id="asistente_lista" class="contenido_cuerpo_modal">
                        <?php   $this->load->view("main/contenido/inferior/ajax/vw_tabla_asistentes_agregados_listas", $lista_asistentes);  ?>
                    </div>
                </div>
                <div class="boton_modal">
                    <span class="boton_modal_fondo">
                        <i class="icono-guardar">&nbsp;</i>
                        <span>
                        <?php
                            $imagenes = array('0' => false);
                            $js = 'onclick="enviar_formulario(\'f_lista_asistente\', \'asistentes/editar_lista_asistente\', \'tabla_lista_asistente\', \'lista_asistente\', '.$imagenes.')"';
                            echo form_button('crear', 'Guardar cambios', $js);
                        ?>
                        </span>
                    </span>
                </div>

<?php
            echo form_close();
                
            break;
        }
    }else{
?>
        <div class="cuerpo_modal">
            No existe informaci&oacute;n para esta Lista Predeterminada 
        </div>
<?php
    }
?>