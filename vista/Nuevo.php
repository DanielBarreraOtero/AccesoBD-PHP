<?php
    require_once "../modelo/AccesoDB.php";
    if (isset($_GET["page"])&&($_GET["page"])>1) {
        $page= $_GET["page"];
    }
    else {
        $page=1;
    }

    if (isset($_POST["Guardar"])) {
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];

        if (isset($_FILES['foto'])&&!empty($nombre)&&!empty($apellido)) {
            $imagen=file_get_contents($_FILES['foto']['tmp_name']);
            $path = $_FILES['foto']['tmp_name'];
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $img= 'data:image/' . $type . ';base64,' . base64_encode($imagen);
            $datos=array($nombre,$apellido,$img);
            
            insertAlum(newConn(),$datos);
        }
        else {
            echo 'Faltan campos por rellenar';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/Nuevo.js"></script>
    <link rel="stylesheet" href="CSS/Nuevo.css">
    <title>Insertar alumno</title>
</head>
<body>
    <div class="caja">
    <form class="formulario" action="" method="post" enctype="multipart/form-data">
        <h2>Información del alumno</h2>
        <label for="nombre">Nombre *</label>
        <input type="text" name="nombre" id="nombre"> 
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <label for="apellido">1er Apellido *</label>
        <input type="text" name="apellido" id="apellido"><br><br>
        <label for="foto">Foto *</label>
        <input type="file" name="foto" id="foto" accept="image/png, image/jpeg"><br><br>
        <input type="submit" name="Guardar" value="Guardar">
    </form>
    <button name="volver" id="volver" page=<?php echo "$page";?>>Volver al listado</button><br><br>
    </div>
</body>
</html>
