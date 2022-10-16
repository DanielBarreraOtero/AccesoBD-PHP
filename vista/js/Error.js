window.onload = function () {
    var volver = document.getElementById("volver");
    
    volver.onclick=function(){
        page= volver.attributes["page"].value;
        window.location.href = "Listado.php?page="+page;
    }
}