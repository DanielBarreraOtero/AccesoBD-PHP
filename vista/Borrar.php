<?php
    require_once "../modelo/AccesoDB.php";

    if (isset($_GET["page"])&&($_GET["page"])>1) {
        $page= $_GET["page"];
    }
    else {
        $page=1;
    }

    if (empty($_GET["id"])){
        header("Location: Error.php?error=0&page=$page");
    }
    else {
        $id=$_GET["id"];
    }

    if (isset($_POST["borrar"])) {
        deleteAlumById(newConn(),$id);
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
    <div class="cajaformu">
    <form class="formulario" method="post" action="" enctype="multipart/form-data">
        <h2>Información del alumno</h2>
        <label for="id">ID del alumno</label>
        <input type="text" name="id" id="country" size="1"><br><br>
        <label for="nombre">Nombre *</label>
        <input type="text" name="nombre" id="nombre">
        <br><br>
        <label for="apellido">1er Apellido *</label>
        <input type="text" name="apellido" id="apellido">
        <br><br>
        <input type="submit" value="Borrar" name="borrar" id="borrar">
    </form>
    </div>
    <div class="cajafoto">
        <img id="fotito" src=<?php echo "'../helpers/81yxfavkz2c51.png'"; ?>/>
    </div>
    <button name="volver" id="volver" page=<?php echo "$page";?>>Volver al listado</button><br><br>
    </div>
</body>
</html>