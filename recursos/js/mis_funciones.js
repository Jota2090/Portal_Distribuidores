/* 
    Document   : mis_funciones
    Created on : 21/06/2014
    Author     : Edson Jonathan Franco Borja
    Description: Funciones sobre procesos de validación del portal 
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
        alert("Debe llenar los campos requeridos");
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
                }
           });
       }
    }
}


function crear_formulario(form){
    $( "#modal" ).modal('', form);
    
    $.ajax({
        type:"post",
        url: servidor+"administrador/form_crear_"+form,
        beforeSend: function () {
            $( "#contenido_modal" ).html( "<div style='width: 100%; text-align: center;'>Cargando... <img src='"+servidor+"recursos/images/loading.gif'></div>" );
        },
        success:function(info){
            $( "#contenido_modal" ).html( info );
        }
    });
    /*Ext.get('contenido_modal').load({
            url: 'administrador/form_crear_'+form,
            scripts:true,
            nocache: true,
            text: "<div style='width:300px; height:50px;' align='center'><img src='"+servidor+"recursos/images/loading.gif'></div>"
    });*/
}


