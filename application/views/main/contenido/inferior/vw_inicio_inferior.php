<div id="seccion_inferior">
    <div id="seccion_inferior_contenido" >
        <div class="filas">
            <div class="titulo_tabla">CURSOS DESTACADOS DEL D&Iacute;A</div>
        </div>
        <div class="filas display-flex">
            <?php
                $cont_max = 3;
                $cont_inicial = 0;
                
                $meses = array( "01" => "Enero", "02" => "Febrero", "03" => "Marzo", "04" => "Abril", "05" => "Mayo", "06" => "Junio",
                                "07" => "Julio", "08" => "Agosto", "09" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre" );
                
                if($cursos)
                {
                    if($cursos->num_rows() > 0)
                    {
                        foreach($cursos->result() as $row)
                        {
                            $cont_inicial++;
            ?>
                        <div class="cursos_destacados">
                            <div class="titulo_curso_destacados" onclick="document.location.href='<?php echo base_url().'main/ver_informacion_cursos/'.$row->cur_id; ?>'">
                                <div class="top">&nbsp;</div>
                                <div class="body">
                                    <?php echo $row->cur_nombre; ?>
                                </div>
                                <div class="bottom">&nbsp;</div>
                            </div>
                            <div class="cuerpo_curso_destacados" onclick="document.location.href='<?php echo base_url().'main/ver_informacion_cursos/'.$row->cur_id; ?>'">
                                <div class="fecha">
                                    <?php 
                                        $fecha = explode("/", $row->cur_fecha_inicio);
                                        echo $fecha[0]." de ".$meses[$fecha[1]]." del ".$fecha[2]; 
                                    ?>
                                </div>
                                <img src="<?php echo HTTP_IMAGES_PATH; ?>Cursos/<?php echo $row->cur_nombre_imagen; ?>" />
                                <div class="descripcion">
                                    <?php echo $row->cur_descripcion; ?> 
                                </div>
                            </div>
                            <div class="footer_curso_destacados">&nbsp;</div>
                            <div class="boton_curso_destacados" onclick="registrarse('<?php echo $this->clslogin->getAuth(); ?>');">
                                Registrarse
                            </div>
                        </div>
            <?php
                            if($cont_inicial == $cont_max)
                            {
                                break;
                            }
                        }
                    }
                    else
                    {
                        echo "No existen Cursos Destacados";
                    }
                }
                else
                {
                    echo "No existen Cursos Destacados";
                }
            ?>
        </div>
    </div>
</div>