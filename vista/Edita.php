<?php
    require_once "../modelo/AccesoDB.php";

    if (isset($_GET["page"])&&($_GET["page"])>1) {
        $page= $_GET["page"];
    }
    else {
        $page=1;
    }

    if (isset($_POST["Guardar"])) {
        $page=$_GET["page"];
        $id=$_GET["id"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];

        if (isset($_FILES['foto'])&&!empty($nombre)&&!empty($apellido)) {
            $imagen=file_get_contents($_FILES['foto']['tmp_name']);
            $img= base64_encode($imagen);
            $datos=array($nombre,";",$apellido,";",$img);
            var_dump($datos);
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
    <link href="CSS/Edita.css" rel="stylesheet">
    <script src="js/Edita.js"></script>
    <title>Editar alumno</title>
</head>
<body>
    <div class="caja">
    <form class="formulario" method="post" action="" enctype="multipart/form-data">
        <h2>Información del alumno</h2>
        <label for="id">ID</label>
        <input type="text" name="id" id="idalum" readonly size="1"><br><br>
        <label for="nombre">Nombre *</label>
        <input type="text" name="nombre" id="nombre">&nbsp&nbsp&nbsp<input name="nombrecheck" id="check1" type="checkbox" checked>
        <br><br>
        <label for="apellido">1er Apellido *</label>
        <input type="text" name="apellido" id="apellido">&nbsp&nbsp&nbsp<input name="apellidocheck" id="check2" type="checkbox" checked>
        <br><br>
        <label for="foto">Foto *</label>
        <input type="file" name="foto" id="foto">&nbsp&nbsp&nbsp<input name="fotocheck" id="check3" type="checkbox" checked>
        <br><br>
        <input type="submit" name="Guardar">
    </form>
    <button name="volver" id="volver" page=<?php echo "$page";?>>Volver al listado</button><br><br>
    <div>
</body>
</html>