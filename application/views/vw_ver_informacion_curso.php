<div id="seccion_interna">
    <div id="seccion_interna_contenido" >
        <?php
            if($resultado){
                foreach ($resultado->result() as $row) {
        ?>
            <div class="cuerpo_modal" style="margin-top:20px; margin-left: 36px;">
                <div class="form_modal_contenido">
                    <div class="filas" style="margin-top: 80px; width: 85%;">
                        <font size="5" weight="bold">
                            <?php echo $row->cur_nombre; ?>
                        </font>
                    </div>
                    <div class="filas" style="margin-top: 30px; width: 85%;">
                        <?php echo $row->cur_descripcion; ?>
                    </div>
                    <div class="filas" style="width: 85%;">
                        <div class="boton_modal" style="text-align: left;" >
                            <span class="boton_modal_fondo">
                                <a rel="modal:close" href="javascript:" onclick="registrarse('<?php echo $this->clslogin->getAuth(); ?>');">
                                    Registrarse Ahora
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="filas" style="margin-top: 40px;">
                        <font size="5" weight="bold">
                            Un vistazo al curso
                        </font>
                    </div>
                    <div class="filas" style="margin-top: 30px; width: 85%;">
                        <div>
                            <i class="icono-calendario"></i>
                            <?php echo "Del ".$row->cur_fecha_inicio." al ".$row->cur_fecha_fin; ?>
                        </div>
                        <div style="margin-top: 5px;">
                            <i class="icono-tiempo"></i>
                            <?php echo "Desde las ".$row->cur_hora_inicio." hasta las ".$row->cur_hora_fin; ?>
                        </div>
                    </div>
                    <div class="filas" style="margin-top: 40px;">
                        <font size="5" weight="bold">
                            Comparte
                        </font>
                    </div>
                    <div class="filas" style="margin-top: 20px; width: 95%;">
                        <div style="margin-bottom: 10px;">
                            <div class="opcion" style="float: left; margin-left: 0px;">
                                <a href="javascript:" onclick="crear_formulario('enviar_detalle_curso', 'id=<?php echo $row->cur_id; ?>');">
                                    <i class="icono-sobre-gris"></i>
                                    Enviar por correo electr&oacute;nico
                                </a>
                            </div>
                        </div>
                        <div id="redes-sociales" style="clear:both;">
                            <div style="float: left; margin-right: 10px; margin-bottom: 10px;">
                                <a href="http://www.facebook.com/sharer.php" class="socialite facebook-like" data-action="like" data-href="<?php echo base_url().'main/ver_informacion_cursos/'.$row->cur_id; ?>" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false" rel="nofollow" data-share="true" target="_blank"></a>
                            </div>
                            <div style="float: left; margin-bottom: 10px;">
                                <a href="https://plus.google.com/share" class="socialite googleplus-one" data-size="medium" data-href="<?php echo base_url().'main/ver_informacion_cursos/'.$row->cur_id; ?>" rel="nofollow" target="_blank"></a>
                            </div>
                            <div style="float: left; margin-bottom: 10px;">
                                <a href="http://twitter.com/share" class="socialite twitter-share" data-text="<?php echo $row->cur_nombre."\n"; ?>" data-url="<?php echo base_url().'main/ver_informacion_cursos/'.$row->cur_id; ?>" data-count="horizontal" rel="nofollow" target="_blank"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form_modal_contenido">
                    <div class="filas">
                        <a href="<?php echo $row->cur_url_imagen; ?>" data-lightbox="<?php echo $row->cur_nombre_imagen; ?>" >
                            <img width="60%" align="center" src="<?php echo base_url()?>recursos/images/Cursos/<?php echo $row->cur_nombre_imagen; ?>" />
                        </a>
                    </div>
                    <div class="filas" style="margin-top: 40px;">
                        <font size="5" weight="bold">
                            Acerca del Curso
                        </font>
                    </div>
                    <div class="filas" style="margin-top: 30px; width: 85%;">
                        <?php echo $row->cur_descripcion; ?>
                    </div>
                </div>
            </div>
            <div class="boton_modal" style="margin-top: 60px;">
                <span>
                    <a href="<?php echo base_url($controller)?>/buscador_cursos">
                        <span class="boton_blanco_izq">&nbsp;</span>
                        <span class="boton_blanco_centro">
                            Buscar m&aacute;s cursos
                        </span>
                        <span class="boton_blanco_der" >&nbsp;</span>
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
        <div id="fb-root"></div>
        <script>
            $(document).ready(function() {
                Socialite.setup({
                    facebook: {
                        lang     : 'es_LA'
                    },
                    googleplus: {
                        lang     : 'es_LA'
                    }
                });

                Socialite.load();
            });
        </script>

    </div>
</div>