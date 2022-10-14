window.onload=function(){
    var check1=document.getElementById("check1");
    var check2=document.getElementById("check2");
    var check3=document.getElementById("check3");

    var nombre=document.getElementById("nombre");
    var apellido=document.getElementById("apellido");
    var foto=document.getElementById("foto");

    check1.onclick = function () {
        if (check1.checked) {
            nombre.readOnly = false;
            nombre.style.backgroundColor="";    
        } else {
            nombre.readOnly = true;
            nombre.style.backgroundColor="LightGray";
        }
    }
    check2.onclick = function () {
        if (check2.checked) {
            apellido.readOnly = false; 
            apellido.style.backgroundColor="";   
        } else {
            apellido.readOnly = true;
            apellido.style.backgroundColor="LightGray";
        }
    }
    check3.onclick = function () {
        if (check3.checked) {
            foto.style.display="";
        } else {
            foto.style.display="none";
        }
    }

    window.onload = function () {
        var volver = document.getElementById("volver");
        
        volver.onclick=function(){
            page= volver.attributes["page"].value;
            window.location.href = "Listado.php?page="+page;
        }
    }
}