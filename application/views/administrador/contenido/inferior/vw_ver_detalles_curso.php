<?php
    if($resultado){
        foreach ($resultado->result() as $row) {
?>
    <div class="titulo_modal">
        <span>
            <img src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/btn_blanco_izq.png" />
            <span class="titulo_modal_cuerpo">
                <?php echo $row->cur_nombre; ?>
            </span>
            <img class="titulo_modal_imagen_izq" src="<?php echo HTTP_IMAGES_PATH?>Administrador/Contenido/btn_blanco_der.png" />
        </span>
    </div>
    <div class="cuerpo_modal" style="height: 330px;">
        <div class="form_modal_contenido">
            <div class="form_div">
                <div class="form_modal_label">
                    Descripci&oacute;n:
                </div>
                <div class="form_modal_input right">
                    <?php echo $row->cur_descripcion; ?>
                </div>
            </div>
            <div class="form_div">
                <div class="form_modal_label">
                    Fecha de Inicio:
                </div>
                <div class="form_modal_input right">
                    <?php echo $row->cur_fecha_inicio; ?>
                </div>
            </div>
            <div class="form_div">
                <div class="form_modal_label">
                    Fecha Finalizaci&oacute;n:
                </div>
                <div class="form_modal_input right">
                    <?php echo $row->cur_fecha_fin; ?>
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
                    Tiempo de duraci&oacute;n:
                </div>
                <div class="form_modal_input right">
                    <?php echo $row->cur_duracion." horas"; ?>
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
                    <?php echo $row->cur_cupos_disponibles; ?> 
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
        </div>
        <div class="form_modal_contenido">
            <div class="form_div">
                <div class="form_modal_label">
                    Instructor:
                </div>
                <div class="form_modal_input">
                    <?php echo $row->ins_nombre." ".$row->ins_apellido; ?>
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
            <div class="form_div">
                <div class="form_modal_label">
                    Subtema:
                </div>
                <div class="form_modal_input">
                    <?php echo $row->cur_subtema; ?>
                </div>
            </div>
            <div class="form_div">
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
            <div class="form_div">
                <div class="form_modal_label">
                    Comentarios:
                </div>
                <div class="form_modal_input">
                    <?php echo $row->cur_comentarios; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="boton_modal">
        <span class="boton_modal_fondo">
            Salir
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