<?php
    $attributes = array('id' => 'f_contrasena', 'name' => 'f_contrasena');
    $hidden = array('ced' => $ced);
    echo form_open('usuarios/cambiar_contrasena', $attributes, $hidden);
?>
<div class="titulo_modal fondo_titulo_modal_small">
    <span>
        <span class="titulo_modal_imagen_izq">&nbsp;</span>
        <span class="titulo_modal_cuerpo">
            <span class="titulo_modal_flecha">
                Cambiar Contrase&ntilde;a
            </span>
        </span> 
        <span class="titulo_modal_imagen_der" >&nbsp;</span>
    </span>
</div>
<div class="cuerpo_modal fondo_cuerpo_modal_small">
<?php
    $data = array('name'=>'contrasena_actual', 'id'=>'contrasena_actual', 'value'=>set_value("contrasena_actual"), 'autocomplete'=>'off', 'type'=>'password', 'placeholder' => '8 caracteres m&iacute;nimo');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Contrase&ntilde;a Actual *
            </div>
            <div class='form_modal_input'>
                ".form_input($data)."
            </div>
          </div>";
    
    $js = 'onchange="validar_contrasenas()"';
    $data = array('name'=>'contrasena_nueva', 'id'=>'contrasena_nueva', 'value'=>set_value("contrasena_nueva"), 'autocomplete'=>'off', 'type'=>'password', 'placeholder' => '8 caracteres m&iacute;nimo');
    echo "<div class='form_div'>
            <div class='form_modal_label'>
                Nueva Contrase&ntilde;a *
            </div>
            <div class='form_modal_input'>
                ".form_input($data, '', $js)."   
                <div class='form_modal_input' style='height: 35px; text-align: right; float: right; margin-right: 55px;' id='validador_contrasena'>
                    <img src='".  base_url()."recursos/images/Main/Header/barra_gris_contrasena.png' />
                </div>
            </div>
          </div>";
    
    $data = array('name'=>'contrasena_nueva_2', 'id'=>'contrasena_nueva_2', 'value'=>set_value("contrasena_nueva_2"), 'autocomplete'=>'off', 'type'=>'password', 'placeholder' => '8 caracteres m&iacute;nimo');
    echo "<div class='form_div' style='padding-top:15px;'>
            <div class='form_modal_label'>
                Repetir Nueva Contrase&ntilde;a *
            </div>
            <div class='form_modal_input'>
                ".form_input($data)."
                <div class='form_modal_input' style='color: #ff0000; text-align: left; float: right; margin-right: 55px; margin-top:5px;' id='validador_contrasena_2'></div>
            </div>
          </div>";

?>
</div>
<div class="fondo_footer_modal_small">
    <div class="boton_modal">
        <button type="submit" class="boton_modal_fondo" onclick="enviar_formulario('f_contrasena','','');">
            <i class="icono-guardar">&nbsp;</i>
            Guardar Cambios
        </button>
    </div>
</div>
<?php
    echo form_close();
?>
<script>
    $('#contrasena_nueva').keyup(function(e)
    {
        var strongRegex = new RegExp("^(?=.{10,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{9,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{8,}).*", "g");

        if (false == enoughRegex.test($(this).val())) {
             $('#validador_contrasena').html("<img src='<?php echo base_url() ?>recursos/images/Main/Header/barra_gris_contrasena.png' /><div>8 caracteres m&iacute;nimo</div>");
        } else if (strongRegex.test($(this).val())) {
             $('#validador_contrasena').html("<img src='<?php echo base_url() ?>recursos/images/Main/Header/barra_fuerte_contrasena.png' /><div>Segura</div>");
        } else if (mediumRegex.test($(this).val())) {
             $('#validador_contrasena').html("<img src='<?php echo base_url() ?>recursos/images/Main/Header/barra_medio_contrasena.png' /><div>Medio</div>");
        } else {
             $('#validador_contrasena').html("<img src='<?php echo base_url() ?>recursos/images/Main/Header/barra_debil_contrasena.png' /><div>D&eacute;bil</div>");
        }
        return true;
    });
    
    
    $('#contrasena_nueva_2').keyup(function(e)
    {
        var contrasena_nueva = document.getElementById('contrasena_nueva').value;
        var contrasena_nueva_2 = document.getElementById('contrasena_nueva_2').value;

        if(contrasena_nueva != contrasena_nueva_2) 
        {
             $('#validador_contrasena_2').html("<div>Las contrase&ntilde;as no coinciden.</div>");
        } 
        else
        {
             $('#validador_contrasena_2').html("");
        }
        
        return true;
    });
    
    function validar_contrasenas()
    {
        var contrasena_nueva = document.getElementById('contrasena_nueva').value;
        var contrasena_nueva_2 = document.getElementById('contrasena_nueva_2').value;

        if(contrasena_nueva != contrasena_nueva_2 || contrasena_nueva == null || contrasena_nueva_2 == null
            || contrasena_nueva == '' || contrasena_nueva_2 == '') 
        {
            $('#validador_contrasena_2').html("<div>Las contrase&ntilde;as no coinciden.</div>");
        } 
        else
        {
            $('#validador_contrasena_2').html("");
        }
    }
</script>