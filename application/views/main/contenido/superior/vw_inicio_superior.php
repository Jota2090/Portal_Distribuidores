<div id="seccion_superior">
    <div id="seccion_superior_contenido" >
        <div class="filas">
            <div id="slogan_publicidad">
                CAPAC&Iacute;TATE
            </div>
        </div>
        <div class="filas">
            <?php
                $attributes = array('id' => 'f_buscador_curso', 'name' => 'f_buscador_curso');
                echo form_open('main/buscador_cursos', $attributes);
            ?>
                <div id="buscador">
                    <input id="nombre_curso" name="nombre_curso" class="input_buscador" type="text" value="" placeholder="Busca un curso aqu&iacute;" />
                    <img class="img_buscador" src="<?php echo HTTP_IMAGES_PATH; ?>Main/Contenido/Superior/btn_buscador.png" onclick="document.forms.f_buscador_curso.submit(); return false;" />
                </div>
            <?php
                echo form_close();
            ?>
        </div>
        <div class="filas">
            <div style="float: right;">
                <img height="160px" src="<?php echo HTTP_IMAGES_PATH; ?>Main/Contenido/Superior/txt_curso_online.png" />
            </div>
        </div>
    </div>
</div>