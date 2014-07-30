/* 
    Document   : funciones_main
    Created on : 30/06/2014
    Author     : Edson Jonathan Franco Borja
    Description: Funciones sobre procesos del portal 
*/

    var servidor = ((location.href.split('/'))[0])+'//'+((location.href.split('/'))[2])+'/'+((location.href.split('/'))[3])+'/';

    function validar_formulario(form){
        var frm = document.getElementById(form);
        var validador = 0;

        for (i=0;i<frm.elements.length;i++) 
        { 
            var value = frm.elements[i].value;
            var type = frm.elements[i].type;

            if(type=="text" || type=="password"){
                if(value.trim() == "" || value.trim() == null){
                    validador++;
                }
            }  
        }

        if(validador > 0){
            Ext.Msg.alert("Error","Debe llenar los campos requeridos");
            return false;

        }else{
            if(form == 'f_login'){
                var user = document.getElementById('user').value;
                var password = document.getElementById('password').value;
                var tipo = document.getElementById('tipo').value;

                $.ajax({
                    type:"post",
                    url: servidor+"login/validar",
                    data:"user="+user+"&password="+password+"&tipo="+tipo,
                    beforeSend: function () {
                        $( "#header" ).html( "<div style='width: 100%; text-align: center;'>Cargando... <img src='"+servidor+"recursos/images/loading.gif'></div>" );
                    },
                    success:function(info){
                        var success = info.indexOf("true");
                        if(success > 0){
                            document.location = servidor+tipo;
                        }else{
                            $( "#header" ).html( info );
                        }
                    },
                    error: function(){
                        Ext.Msg.alert('Error','Ha ocurrido un problema con el servidor, por favor vuelva a intentarlo');
                    }
               });
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
                
                if(success > 0)
                {
                    result = result.replace(/false/gi, "");
                    result = result.replace(/<\/p>\n/gi, "");
                    
                    Ext.Msg.alert('Error',result);
                }
                else
                {
                    result = result.replace(/st:1/gi, "");
                    
                    Ext.Msg.alert('Informaci\xf3n',result, function()
                    { 
                        $.modal.close(); 
                        refrescar_seccion(funcion, seccion); 
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
            },
            error: function(){
                Ext.Msg.alert('Error','Ha ocurrido un problema con el servidor, por favor vuelva a intentarlo');
            }
        });
        
        return false;
    }


    function crear_formulario(form, parametros){
        $( "#modal" ).modal('', form);

        if(parametros == undefined || parametros == null){
            parametros = "";
        }

        $.ajax({
            type:"post",
            url: servidor+"main/form_crear_"+form,
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
    
    
    function ver_detalles(form,parametros){
        $( "#modal" ).modal('', form);

        $.ajax({
            type:"post",
            url: servidor+"main/ver_"+form,
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
    
    
    function editar(form,parametros){
        $( "#modal" ).modal('', form);

        $.ajax({
            type:"post",
            url: servidor+"main/editar_"+form,
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


    function eliminar(form,parametros,funcion,seccion){
        
        var recurso = form.split('_');
        
        if(recurso[0] === 'lista'){
            recurso[0] = "la "+recurso[0];
        }else{
            recurso[0] = "el "+recurso[0];
        }
        
        Ext.Msg.confirm('Confirmaci\xF3n', 'Confirma que desea eliminar '+recurso[0]+' seleccionado?', function(buttonText) {
            if (buttonText == "yes"){
                $.ajax({
                    type:"post",
                    url: servidor+"main/eliminar_"+form,
                    data: parametros,
                    beforeSend: function () {
                        $( "#"+form ).html( "<div style='position: relative; top: 40%; vertical-align: middle; text-align: center;'>Cargando... <img src='"+servidor+"recursos/images/loading.gif'></div>" );
                    },
                    success:function(info){
                        $( "#"+form ).html( info );
                        
                        if(funcion != undefined && seccion != undefined)
                        {
                            refrescar_seccion(funcion, seccion, parametros);
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
    
    function quitar(form, parametros, funcion, seccion){
        
        var recurso = form.split('_');
        
        Ext.Msg.confirm('Confirmaci\xF3n', 'Confirma que desea quitar el '+recurso[0]+' seleccionado?', function(buttonText) {
            if (buttonText == "yes"){
                $.ajax({
                    type:"post",
                    url: servidor+"main/quitar_"+form,
                    data: parametros,
                    beforeSend: function () {
                        $( "#"+form ).html( "<div style='position: relative; top: 40%; vertical-align: middle; text-align: center;'>Cargando... <img src='"+servidor+"recursos/images/loading.gif'></div>" );
                    },
                    success:function(info){
                        $( "#"+form ).html( info );
                        
                        if(funcion !== "" && funcion !== null){
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
    
    
    function refrescar_seccion(funcion, seccion, parametros){
        
        if(parametros == undefined || parametros == null){
            parametros = "";
        }
        
        $.ajax({
            type:"post",
            url: servidor+"main/"+funcion,
            data: parametros,
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


    function cambiar(funcion, parametros, seccion){
        
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


    function ver_mapa(latitud, longitud, direccion){
        if(latitud === "" || longitud === "" || latitud === undefined || longitud === undefined){
            latitud = document.getElementById('latitud').value;
            longitud = document.getElementById('longitud').value;
        }
        
        if(direccion === "" || direccion === undefined){
            direccion = document.getElementById('direccion_curso').value;
        }
        
        if(latitud === "" || longitud === ""){
            Ext.Msg.alert("Atenci\xf3n","Debe ingresar Latitud y Longitud");
            return ;
        }
        
        if(direccion === ""){
            Ext.Msg.alert("Atenci\xf3n","Debe ingresar la Direcci\xf3n del Curso");
            return ;
        }
        
        direccion = direccion.replace(/ /gi, "_");
        
        window.open(servidor+'administrador/google_maps/'+latitud+'/'+longitud+'/'+direccion,'_newtab');
    }


    function validarSoloNumeros(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true;
        else if (tecla==0||tecla==9) return true;
        patron =/[0-9\\]/;
        te = String.fromCharCode(tecla);
        return patron.test(te);
    }
    
    
    function validarSoloLetras(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true;
        else if (tecla==0||tecla==9) return true;
        patron =/[A-Za-z\s\xf1\xd1\xe1\xe9\xed\xf3\xfa\xc1\xc9\xcd\xd3\xda\xfc\xdc]/;
        te = String.fromCharCode(tecla);
        return patron.test(te);
    } 
    
    
    function tabs(id, position, opcion, color, funcion, seccion){
        
        var esquinas = ["izq", "der"];
        
        switch(opcion) {
            case "0":
                var tabs = ["agregados", "disponibles"];
                break;
                
            case "1":
                var tabs = ["disponibles", "nuevo"];
                break;
        } 
        
        for(i=0; i<esquinas.length; i++){
            if(position === esquinas[i]){
                document.getElementById("tab_"+esquinas[i]).className = "selected_boton_"+color+"_"+esquinas[i];
            }else{
                document.getElementById("tab_"+esquinas[i]).className = "boton_"+color+"_"+esquinas[i];
            }
        }
        
        for(i=0; i<tabs.length; i++){
            if(id === tabs[i]){
                document.getElementById("tab_menu_"+tabs[i]).className = "tabs_content selected_boton_"+color+"_centro";
            }else{
                document.getElementById("tab_menu_"+tabs[i]).className = "tabs_content boton_"+color+"_centro";
            }
        }
        
        refrescar_seccion(funcion, seccion);
    }


    function desplegar(menu){
        $("#"+menu).toggle();
    }


    function marcar_todos(table)
    {
        var TABLE = document.getElementById(table);
        for (var i=0; i<TABLE.rows.length; i++) {
            var chk = TABLE.rows[i].cells[1].childNodes[1];
            if(chk)
            {
                $('input[type=checkbox]').attr('checked','checked');
            }
        }
    }
    

    function redirect_by_post(form)
    {
        var formulario = document.getElementById(form);
        formulario.submit();
         
        return false;
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

