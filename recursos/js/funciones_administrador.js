/* 
    Document   : funciones_administrador
    Created on : 21/06/2014
    Author     : Edson Jonathan Franco Borja
    Description: Funciones sobre procesos del portal 
*/
    var servidor = ((location.href.split('/'))[0])+'//'+((location.href.split('/'))[2])+'/'+((location.href.split('/'))[3])+'/';

    function validar_formulario(form)
    {
        var frm = document.getElementById(form);
        var validador = 0;

        for (i=0;i<frm.elements.length;i++) 
        { 
            var value = frm.elements[i].value;
            var type = frm.elements[i].type;

            if(type=="text" || type=="password")
            {
                if(value.trim() == "" || value.trim() == null)
                {
                    validador++;
                }
            }  
        }

        if(validador > 0)
        {
            Ext.Msg.alert("Error","Debe llenar los campos requeridos");
            return false;
        }
        else
        {
            if(form == 'f_login')
            {
                var user = document.getElementById('user').value;
                var password = document.getElementById('password').value;
                var tipo = document.getElementById('tipo').value;

                $.ajax({
                    type:"post",
                    url: servidor+"login/validar",
                    data:"user="+user+"&password="+password+"&tipo="+tipo,
                    beforeSend: function () 
                    {
                        $( "#header" ).html( "<div style='width: 100%; text-align: center;'>Cargando... <img src='"+servidor+"recursos/images/loading.gif'></div>" );
                    },
                    success:function(info)
                    {
                        var success = info.indexOf("true");
                        if(success > 0)
                        {
                            document.location = servidor+tipo;
                        }
                        else
                        {
                            $( "#header" ).html( info );
                        }
                    },
                    error: function(){
                        Ext.Msg.alert('Error','Ha ocurrido un problema con el servidor, por favor vuelva a intentarlo');
                    }
               });
           }
           else if(form == 'f_contrasena')
           {
                var contrasena_nueva = document.getElementById('contrasena_nueva').value;
                var contrasena_nueva_2 = document.getElementById('contrasena_nueva_2').value;

                if(contrasena_nueva != contrasena_nueva_2) 
                {
                    $('#validador_contrasena_2').html("<div>Las contrase&ntilde;as no coinciden.</div>");
                    Ext.Msg.alert('Error', 'Las contrase\u00F1as no coinciden.');
                } 
                else
                {
                    $('#validador_contrasena_2').html("");
                    enviar_formulario(form, '', '');
                }
                
                return false;
           }
        }
    }
    
    
    function enviar_formulario_multipart(form, funcion, seccion)
    {
        $('#'+form).ajaxForm({ 
            beforeSubmit:  function beforeJson(){
                $( "#contenido_modal" ).hide();
                $( "#cargando" ).show();
            },
            success:   function processJson(result)
            { 
                $( "#cargando" ).hide();
                $( "#contenido_modal" ).show();
            
                var success = result.indexOf("false");
                
                if(success >= 0)
                {
                    result = result.replace(/false/gi, "");
                    result = result.replace(/<\/p>\n/gi, "");
                    
                    Ext.Msg.alert('Error',result);
                }
                else
                {
                    var pestana = result.indexOf("cursos_pestana_");
                    result = result.replace(/cursos_pestana_/gi, "");
                    
                    Ext.Msg.alert('Informaci\xf3n',result, function()
                    { 
                        $.modal.close();
                        
                        if(pestana >= 0)
                        {
                            cambiar_pestana('disponibles','tabs_cursos/disponibles','listado_curso');
                        }
                        else
                        {
                            refrescar_seccion(funcion, seccion); 
                        }
                    });
                }
            },
            error: function(){
                Ext.Msg.alert('Error','Ha ocurrido un problema con el servidor, por favor vuelva a intentarlo');
            }
        });
        
        return false;
    }
    
    
    function enviar_formulario(form, funcion, seccion)
    {
        $('#'+form).ajaxForm({ 
            dataType:  'json',
            beforeSubmit:  function beforeJson(){
                $( "#contenido_modal" ).hide();
                $( "#cargando" ).show();
            },
            success:   function processJson(result)
            { 
                $( "#cargando" ).hide();
                $( "#contenido_modal" ).show();
                
                if(result.st == 0)
                {
                    Ext.Msg.alert('Error',result.msg);
                }
                else if(result.st == 1)
                {
                    Ext.Msg.alert('Informaci\xf3n',result.msg, function()
                    { 
                        $.modal.close(); 
                        refrescar_seccion(funcion, seccion); 
                    });
                }
                else if(result.st == 2)
                {
                    Ext.Msg.alert('Informaci\xf3n',result.msg, function(){
                        refrescar_seccion(funcion, seccion);
                    });
                }
                else if(result.st == 3)
                {
                    Ext.Msg.alert('Informaci\xf3n',result.msg, function(){
                        $.modal.close();
                    });
                }
                else if(result.st == 4)
                {
                    Ext.Msg.alert('Informaci\xf3n',result.msg, function(){
                        $.modal.close();
                        cambiar_pestana('pendientes','ver_usuarios/pendientes','listado_usuario');
                    });
                }
                else if(result.st == 5)
                {
                    Ext.Msg.alert('Informaci\xf3n',result.msg, function(){
                        $.modal.close();
                        window.location.replace(result.url);
                    });
                }
            },
            error: function(){
                Ext.Msg.alert('Error','Ha ocurrido un problema con el servidor, por favor vuelva a intentarlo');
            }
        });
        
        return false;
    }


    function crear_formulario(form)
    {
        $( "#modal" ).modal('', form);

        $.ajax({
            type:"post",
            url: servidor+"administrador/form_crear_"+form,
            beforeSend: function () {
                $( "#contenido_modal" ).html( "<div style='position: relative; top: 40%; vertical-align: middle; text-align: center;'>Cargando... <img src='"+servidor+"recursos/images/loading.gif'></div>" );
            },
            success:function(info){
                $( "#contenido_modal" ).html( info );
            },
            error: function(){
                Ext.Msg.alert('Error','Ha ocurrido un problema con el servidor, por favor vuelva a intentarlo');
            }
        });
    }
    
    
    function ver_detalles(form,parametros)
    {
        $( "#modal" ).modal('', form);

        $.ajax({
            type:"post",
            url: servidor+"administrador/ver_"+form,
            data: parametros,
            beforeSend: function () {
                $( "#contenido_modal" ).html( "<div style='position: relative; top: 40%; vertical-align: middle; text-align: center;'>Cargando... <img src='"+servidor+"recursos/images/loading.gif'></div>" );
            },
            success:function(info){
                $( "#contenido_modal" ).html( info );
            },
            error: function(){
                Ext.Msg.alert('Error','Ha ocurrido un problema con el servidor, por favor vuelva a intentarlo');
            }
        });
    }
    
    
    function editar(form,parametros)
    {
        $( "#modal" ).modal('', form);

        $.ajax({
            type:"post",
            url: servidor+"administrador/editar_"+form,
            data: parametros,
            beforeSend: function () {
                $( "#contenido_modal" ).html( "<div style='position: relative; top: 40%; vertical-align: middle; text-align: center;'>Cargando... <img src='"+servidor+"recursos/images/loading.gif'></div>" );
            },
            success:function(info){
                $( "#contenido_modal" ).html( info );
            },
            error: function(){
                Ext.Msg.alert('Error','Ha ocurrido un problema con el servidor, por favor vuelva a intentarlo');
            }
        });
    }


    function eliminar(form,parametros,funcion,seccion)
    {
        Ext.Msg.confirm('Confirmaci\xF3n', 'Confirma que desea eliminar el '+form+' seleccionado?', function(buttonText) {
            if (buttonText == "yes"){
                $.ajax({
                    type:"post",
                    url: servidor+"administrador/eliminar_"+form,
                    data: parametros,
                    beforeSend: function () {
                        $( "#listado_"+form ).html( "<div style='position: relative; top: 40%; vertical-align: middle; text-align: center;'>Cargando... <img src='"+servidor+"recursos/images/loading.gif'></div>" );
                    },
                    success:function(info){
                        $( "#listado_"+form ).html( info );

                        if(funcion !== "" && funcion !== null && funcion !== undefined)
                        {
                            refrescar_seccion(funcion, seccion);
                        }
                    },
                    error: function(){
                        Ext.Msg.alert('Error','Ha ocurrido un problema con el servidor, por favor vuelva a intentarlo');
                    }
                });
            }
    	});
    					
    	return false;
    }


    function inactivar(form,parametros,funcion,seccion)
    {
        Ext.Msg.confirm('Confirmaci\xF3n', 'Confirma que desea inactivar el '+form+' seleccionado?', function(buttonText) {
            if (buttonText == "yes"){
                $.ajax({
                    type:"post",
                    url: servidor+"administrador/inactivar_"+form,
                    data: parametros,
                    beforeSend: function () {
                        $( "#listado_"+form ).html( "<div style='position: relative; top: 40%; vertical-align: middle; text-align: center;'>Cargando... <img src='"+servidor+"recursos/images/loading.gif'></div>" );
                    },
                    success:function(info){
                        $( "#listado_"+form ).html( info );

                        if(funcion !== "" && funcion !== null && funcion !== undefined)
                        {
                            refrescar_seccion(funcion, seccion);
                        }
                    },
                    error: function(){
                        Ext.Msg.alert('Error','Ha ocurrido un problema con el servidor, por favor vuelva a intentarlo');
                    }
                });
            }
        });
                        
        return false;
    }


    function activar(form,parametros,funcion,seccion)
    {
        Ext.Msg.confirm('Confirmaci\xF3n', 'Confirma que desea activar el '+form+' seleccionado?', function(buttonText) {
            if (buttonText == "yes"){
                $.ajax({
                    type:"post",
                    url: servidor+"administrador/activar_"+form,
                    data: parametros,
                    beforeSend: function () {
                        $( "#listado_"+form ).html( "<div style='position: relative; top: 40%; vertical-align: middle; text-align: center;'>Cargando... <img src='"+servidor+"recursos/images/loading.gif'></div>" );
                    },
                    success:function(info){
                        $( "#listado_"+form ).html( info );

                        if(funcion !== "" && funcion !== null && funcion !== undefined)
                        {
                            refrescar_seccion(funcion, seccion);
                        }
                    },
                    error: function(){
                        Ext.Msg.alert('Error','Ha ocurrido un problema con el servidor, por favor vuelva a intentarlo');
                    }
                });
            }
        });
                        
        return false;
    }
    

    function rechazar(form,parametros,funcion,seccion)
    {
        Ext.Msg.confirm('Confirmaci\xF3n', 'Confirma que desea rechazar el '+form+' seleccionado?', function(buttonText) {
            if (buttonText == "yes"){
                $.ajax({
                    type:"post",
                    url: servidor+"administrador/rechazar_"+form,
                    data: parametros,
                    beforeSend: function () {
                        $( "#listado_"+form ).html( "<div style='position: relative; top: 40%; vertical-align: middle; text-align: center;'>Cargando... <img src='"+servidor+"recursos/images/loading.gif'></div>" );
                    },
                    success:function(info){
                        $( "#listado_"+form ).html( info );

                        if(funcion !== "" && funcion !== null && funcion !== undefined)
                        {
                            refrescar_seccion(funcion, seccion);
                        }
                    },
                    error: function(){
                        Ext.Msg.alert('Error','Ha ocurrido un problema con el servidor, por favor vuelva a intentarlo');
                    }
                });
            }
        });
                        
        return false;
    }

    
    function refrescar_seccion(funcion, seccion)
    {
        $.ajax({
            type:"post",
            url: servidor+"administrador/"+funcion,
            beforeSend: function () {
                $( "#"+seccion ).html( "<div style='position: relative; top: 40%; vertical-align: middle; text-align: center;'>Cargando... <img src='"+servidor+"recursos/images/loading.gif'></div>" );
            },
            success:function(info){
                $( "#"+seccion ).html( info );
            },
            error: function(){
                Ext.Msg.alert('Error','Ha ocurrido un problema con el servidor, por favor vuelva a intentarlo');
            }
        });
    }


    function cambiar(funcion, parametros, seccion)
    {
        var parametros_string = "";
        var parametros_array = parametros.split(",");
        
        if(parametros_array.length > 0){
            for(i=0; i<parametros_array.length; i++){
                parametros_string = parametros_string + parametros_array[i]+"="+document.getElementById(parametros_array[i]).value+"&";
            }
        }else{
            parametros_string = "";
        }
        
        $.ajax({
            type:"post",
            url: servidor+funcion,
            data:parametros_string,
            beforeSend: function () {
                $( "#"+seccion ).html( "<div class='form_modal_input' style='text-align: left;'>Cargando... <img src='"+servidor+"recursos/images/loading_small.gif'></div>" );
            },
            success:function(info){
                $( "#"+seccion ).html( info );
            },
            error: function(){
                Ext.Msg.alert('Error','Ha ocurrido un problema con el servidor, por favor vuelva a intentarlo');
            }
        });
    }
    

    function ver_mapa()
    {
        window.open(servidor+'administrador/google_maps/','_newtab');
    }


    function validarSoloNumeros(e)
    {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true;
        else if (tecla==0||tecla==9) return true;
        patron =/[0-9\\]/;
        te = String.fromCharCode(tecla);
        return patron.test(te);
    }
    
    
    function validarSoloLetras(e)
    {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true;
        else if (tecla==0||tecla==9) return true;
        patron =/[A-Za-z\s\xf1\xd1\xe1\xe9\xed\xf3\xfa\xc1\xc9\xcd\xd3\xda\xfc\xdc]/;
        te = String.fromCharCode(tecla);
        return patron.test(te);
    }


    function desplegar(menu)
    {
        $("#"+menu).toggle();
    }
    
    
    function registrarse(valor)
    {
        if(valor === "1")
        {
            document.location.href = servidor+"main/cursos_usuarios";
        }
        else
        {
            Ext.Msg.alert("Informaci\xf3n", "Debes Loguearte en el Portal para registrarte en un curso", function(){
                desplegar("iniciar_sesion");
            });
        }
    }


    