<div id="seccion_interna">
    <div id="seccion_interna_contenido" >
        <div class="filas" style="margin-top: 0px;">
            <div id="buscador">
                <input id="nombre_curso" name="nombre_curso" class="input_buscador" type="text" value="" placeholder="Busca un curso aqu&iacute;" />
                <img class="img_buscador" src="<?php echo HTTP_IMAGES_PATH; ?>Main/Contenido/Superior/btn_buscador.png" />
            </div>
        </div>
        <div class="filas">
            <font size="5" weight="bold">
                Cursos Disponibles
            </font>
        </div>
        <div style="margin-top: 20px; margin-right: 50px;">
            <?php
                if($resultado)
                {
                    if($resultado->num_rows() > 0)
                    {
                        foreach($resultado->result() as $row)
                        {
            ?>
                            <div class="filas-cursos">
                                <div class="imagen_buscador_curso">
                                    <img src="<?php echo HTTP_IMAGES_PATH ?>Cursos/Miniaturas/<?php echo $row->cur_nombre_imagen; ?>" />
                                </div>
                                <div class="caracteristicas_buscador_curso">
                                    <div>
                                        <font size="3" weight="bold">
                                            <?php echo $row->cur_nombre; ?>
                                        </font>
                                    </div>
                                    <div style="margin-top: 12px; margin-right: 25px;">
                                        <?php echo $row->cur_descripcion; ?>
                                    </div>
                                </div>
                                <div class="boton_detalles_buscador_curso">
                                    <span>
                                        <a href="javascript:" onclick="crear_formulario('lista_asistente');">
                                            <span class="boton_blanco_izq">&nbsp;</span>
                                            <span class="boton_blanco_centro">
                                                Ver m&aacute;s detalles
                                            </span>
                                            <span class="boton_blanco_der" >&nbsp;</span>
                                        </a>
                                   </span>
                                </div>
                            </div>
            <?php            
                        }
                    }
                    else
                    {
            ?>
                        <div class="filas-cursos">
                            No existen cursos disponibles
                        </div>
            <?php
                    }
                }
                else
                {
            ?>
                    <div class="filas-cursos">
                        No existen cursos disponibles
                    </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
