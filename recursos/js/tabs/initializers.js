$(document).ready(function()
{
    refrescar_seccion('ver_usuarios/activos','listado_usuario');
});

function cambiar_pestana(id, funcion, seccion)
{
    var tabs = ["activos", "inactivos", "pendientes", "rechazados"];
    
    for(i=0; i<tabs.length; i++)
    {
        if(id === tabs[i])
        {
            document.getElementById(tabs[i]).className = "tabs_enlace active";
        }
        else
        {
            document.getElementById(tabs[i]).className = "tabs_enlace";
        }
    }
    
    refrescar_seccion(funcion, seccion);
}