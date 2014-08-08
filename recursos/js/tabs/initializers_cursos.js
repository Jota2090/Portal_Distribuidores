$(document).ready(function()
{
    refrescar_seccion('tabs_cursos/disponibles','listado_curso');
});

function cambiar_pestana(id, funcion, seccion)
{
    var tabs = ["disponibles", "terminados", "cancelados"];
    
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


