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
        } else {
            nombre.readOnly = true;
        }
    }
    check2.onclick = function () {
        if (check2.checked) {
            apellido.readOnly = false;    
        } else {
            apellido.readOnly = true;
        }
    }
    check3.onclick = function () {
        if (check3.checked) {
            foto.readOnly = false;    
        } else {
            foto.readOnly = true;
        }
    }
}