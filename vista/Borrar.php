<?php
    require_once "../modelo/AccesoDB.php";
    $id=$_GET["id"];
    $resul=getAlumById(newConn(),$id);

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
    <script src="js/Borrar.js"></script>
    <title>Borrar alumno</title>
</head>
<body>
    <div class="caja">
    <div class="cajaformu">
    <form class="formulario" method="post" action="" enctype="multipart/form-data">
        <h2>Ficha del alumno</h2>
        <label for="id">ID del alumno</label>
        <input type="text" name="id" id="idalum" size="1" value=<?php echo "$id"?> readonly><br><br>
        <label for="nombre">Nombre *</label>
        <input type="text" name="nombre" id="nombre" value=<?php echo "$resul[1]"?> readonly>
        <br><br>
        <label for="apellido">1er Apellido *</label>
        <input type="text" name="apellido" id="apellido" value=<?php echo "$resul[2]"?> readonly>
        <br><br>
        <input type="submit" value="Borrar" name="borrar" id="borrar">
    </form>
    </div>
    <div class="cajafoto">
        <img id="fotito" src=<?php echo "'$resul[3]'"?>/>
    </div>
    <button name="volver" id="volver" page=<?php echo "$page";?>>Volver al listado</button><br><br>
    </div>
</body>
</html>