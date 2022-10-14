window.onload = function () {
    var nuevo = document.getElementById('nuevo');
    var anterior = document.getElementById('anterior');
    var siguiente = document.getElementById('siguiente');

    nuevo.onclick = function () {
        page = nuevo.attributes['page'].value;
        window.location.href = "Nuevo.php?page=" + page;
    }

    anterior.onclick = function () {
        page = anterior.attributes['page'].value;
        if (page > 1) {
            page--;
            window.location.href = "Listado.php?page=" + page;
        }
    }

    siguiente.onclick = function () {
        page = siguiente.attributes['page'].value;
        page++;
        window.location.href = "Listado.php?page=" + page;
    }
}