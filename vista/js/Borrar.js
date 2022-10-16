window.onload = function () {
    var volver = document.getElementById("volver");
    var borrar = document.getElementById("borrar");

    volver.onclick=function(){
        page= volver.attributes["page"].value;
        window.location.href = "Listado.php?page="+page;
    }

    borrar.onclick=function(){
        var respuesta = confirm("¿Estas seguro de que deseas eliminar el alumno?");
        
        if (respuesta == true)
        { 
        return true;
        }
        else
        {
            return false;
        }
    }

}
