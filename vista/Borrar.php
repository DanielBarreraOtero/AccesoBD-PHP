<?php
    require_once "../modelo/AccesoDB.php";

    $id=$_POST["id"];
    if (isset($_POST["borrar"])) {
        deleteAlumById(newConn(),id);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/Borrar.css" rel="stylesheet">
    <title>Borrar alumno</title>
</head>
<body>
    <div class="caja">
    <form class="formulario" method="post" action="" enctype="multipart/form-data">
        <h2>Información del alumno</h2>
        <label for="id">ID del alumno</label>
        <input type="text" name="id" id="country" size="1"><br><br>
        <label for="nombre">Nombre *</label>
        <input type="text" name="nombre" id="nombre">&nbsp&nbsp&nbsp<input name="nombrecheck" id="check1" type="checkbox" checked>
        <br><br>
        <label for="apellido">1er Apellido *</label>
        <input type="text" name="apellido" id="apellido">&nbsp&nbsp&nbsp<input name="apellidocheck" id="check2" type="checkbox" checked>
        <br><br>
        <label for="foto">Foto *</label>
        <input type="file" name="foto" id="foto">&nbsp&nbsp&nbsp<input name="fotocheck" id="check3" type="checkbox" checked>
        <br><br>
        <input type="submit" value="Borrar" name="borrar" id="borrar">
    </form>
    </div>
</body>
</html>