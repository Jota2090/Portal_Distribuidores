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
            
            $.ajax({
                type:"post",
                url: "login/validar",
                data:"user="+user+"&password="+password,
                beforeSend: function () {
                    $( "#header" ).html( "<table><tr><td valign='center' height='40px' width='100%' align='center'>Cargando... <img src='recursos/images/loading.gif'><td></tr><table>" );
                },
                success:function(info){
                    var success = info.indexOf("true");
                    if(success > 0){
                        document.location = servidor+"main";
                    }else{
                        $( "#header" ).html( info );
                    }
                }
           });
       }
    }
}


