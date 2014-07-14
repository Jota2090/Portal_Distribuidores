<?php
    if($resultado){
        foreach ($resultado->result() as $row) {
?>
    <div class="titulo_modal">
        <span>
            <span class="titulo_modal_imagen_izq">&nbsp;</span>
            <span class="titulo_modal_cuerpo">
                <span class="titulo_modal_flecha">
                <?php echo $row->cur_nombre; ?>
                </span>
            </span> 
            <span class="titulo_modal_imagen_der" >&nbsp;</span>
        </span>
    </div>
    <div class="cuerpo_modal" style="height: 325px; margin-top:20px;">
        <div class="form_modal_contenido">
            <div class="form_div">
                <div class="form_modal_label">
                    Descripci&oacute;n:
                </div>
                <div class="form_modal_input right">
                    <?php echo $row->cur_descripcion; ?>
                </div>
            </div>
            <div class="form_div" style="margin-top: 10px;">
                <div class="form_modal_label">
                    Fecha del Curso:
                </div>
                <div class="form_modal_input right">
                    <?php echo $row->cur_fecha_inicio." al ".$row->cur_fecha_fin; ?>
                </div>
            </div>
            <div class="form_div">
                <div class="form_modal_label">
                    Hora:
                </div>
                <div class="form_modal_input right">
                    <?php echo $row->cur_hora_inicio." hasta las ".$row->cur_hora_fin; ?>
                </div>
            </div>
            <div class="form_div">
                <div class="form_modal_label">
                    Instructor:
                </div>
                <div class="form_modal_input right">
                    <?php echo $row->ins_nombre." ".$row->ins_apellido; ?>
                </div>
            </div>
            <div class="form_div">
                <div class="form_modal_label">
                    Tiempo de duraci&oacute;n:
                </div>
                <div class="form_modal_input right">
                    <?php echo $row->cur_duracion." hora(s)"; ?>
                </div>
            </div>
            <div class="form_div">
                <div class="form_modal_label">
                    Cupos Totales:
                </div>
                <div class="form_modal_input right">
                    <?php echo $row->cur_cupos_total; ?> 
                </div>
            </div>
            <div class="form_div">
                <div class="form_modal_label">
                    Cupos Disponibles:
                </div>
                <div class="form_modal_input right">
                    <?php
                        $cupos_disponibles = $row->cur_cupos_total - $row->cur_cupos_usados;
                        echo $cupos_disponibles; 
                    ?> 
                </div>
            </div>
            <div class="form_div">
                <div class="form_modal_label">
                    Costo:
                </div>
                <div class="form_modal_input right">
                    <?php echo "$".$row->cur_costo; ?> 
                </div>
            </div>
            <div class="form_div">
                <div class="form_modal_label">
                    Comentarios:
                </div>
                <div class="form_modal_input right">
                    <textarea  class="textarea-detalle" cols="18" rows="2" readonly="true"><?php echo $row->cur_comentarios; ?></textarea>
                </div>
            </div>
        </div>
        <div class="form_modal_contenido">
            <div class="form_div">
                <div class="form_modal_label">
                    Imagen:
                </div>
                <div class="form_modal_input" style="width: 150px; height: 100px; margin-bottom: 10px;">
                    <a href="<?php echo $row->cur_url_imagen; ?>" data-lightbox="<?php echo $row->cur_nombre_imagen; ?>" >
                        <img src="<?php echo base_url()?>recursos/images/Cursos/Miniaturas/<?php echo $row->cur_nombre_imagen; ?>" />
                    </a>
                </div>
            </div>
            <div class="form_div">
                <div class="form_modal_label">
                    Tema:
                </div>
                <div class="form_modal_input">
                    <?php echo $row->tem_nombre; ?>
                </div>
            </div>
            <div class="form_div" style="margin-top: 10px;">
                <div class="form_modal_label">
                    Subtema:
                </div>
                <div class="form_modal_input">
                    <?php echo $row->cur_subtema; ?>
                </div>
            </div>
            <div class="form_div" style="margin-top: 10px;">
                <div class="form_modal_label">
                    Provincia:
                </div>
                <div class="form_modal_input">
                    <?php echo $row->pro_nombre; ?>
                </div>
            </div>
            <div class="form_div">
                <div class="form_modal_label">
                    Ciudad:
                </div>
                <div class="form_modal_input">
                    <?php echo $row->ciu_nombre; ?>
                </div>
            </div>
            <?php
                if(!empty($row->cur_latitud) && !empty($row->cur_longitud)){
            ?>
            <div class="form_div" style="height: 50px;">
                <div class="form_modal_label">
                    Direcci&oacute;n:
                </div>
                <div class="form_modal_input">
                    <?php echo $row->cur_direccion; ?>
                </div>
                <div style="clear: both; padding-top: 5px; text-align: right; width: 318px;"> 
                    <a style="color: red" href="javascript:" onclick="ver_mapa('<?php echo $row->cur_latitud; ?>','<?php echo $row->cur_longitud; ?>','<?php echo $row->cur_direccion; ?>');"> Abrir GoogleMaps </a> 
                </div>
            </div>       
            <?php    
                }else{
            ?>        
            <div class="form_div">
                <div class="form_modal_label">
                    Direcci&oacute;n:
                </div>
                <div class="form_modal_input">
                    <?php echo $row->cur_direccion; ?>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="boton_modal">
        <span class="boton_modal_fondo">
            <a rel="modal:close" href="#close-modal">
                Salir
            </a>
        </span>
    </div>
<?php
            break;
        }
    }else{
?>
    <div class="cuerpo_modal">
        No existe informaci&oacute;n para este Curso 
    </div>
<?php
    }
?>