<?php
    require_once "../modelo/AccesoDB.php";
    $id=$_GET["id"];
    $resul=getAlumById(newConn(),$id);

    //comprobación de que recibimos un id
    if (empty($_GET["id"])){
        header("Location: Error.php?error=0&page=$page");
    }
    else {
        $id=$_GET["id"];
    }

    //comprobación de que recibimos una página mayor que 1, si no, se la asignamos
    if (isset($_GET["page"])&&($_GET["page"])>1) {
        $page= $_GET["page"];
    }
    else {
        $page=1;
    }

    //cuando se pulse el botón guardar, obtenemos los datos de los campos
    if (isset($_POST["Guardar"])) {
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];

        //comprobamos que se haya seleccionado una foto, si no mandamos el error
        if (!empty($_FILES['foto'])) {
            $imagen=file_get_contents($_FILES['foto']['tmp_name']);
            $path = $_FILES['foto']['tmp_name'];
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $img= 'data:image/' . $type . ';base64,' . base64_encode($imagen);
        }
        else {
            header("Location: Error.php?error=1&page=$page");
        }
        

        //definimos dos array, uno que guarda los campos que vamos a cambiar, y otro con los datos nuevos
        $campos=array();
        $valoresnuevos=array();

        //comprobamos que los campos no esten vacios, y vamos mirando uno a uno si el valor nuevo es 
        //distinto al anterior, de ser así los añadimos a la lista. Finalmente realizamos el update
        if (isset($_FILES['foto'])&&!empty($nombre)&&!empty($apellido)) {
            if (strcmp($nombre,$resul[0]!==0)) {
                $campos[]="nombre";
                $valoresnuevos[]="$nombre";
            }
            if (strcmp($apellido,$resul[1]!==0)) {
                $campos[]="apellido";
                $valoresnuevos[]="$apellido";
            }
            if (strcmp($img,$resul[2]!==0)) {
                $campos[]="foto";
                $valoresnuevos[]="$img";
            }
            updateAlumById(newConn(),$id,$campos,$valoresnuevos);
            header("Location:http://localhost/AccesoBD-PHP/Vista/Edita.php?id=$id");
        }
        else {
            header("Location: Error.php?error=1&page=$page");
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
    <div class="cajaformu">
    <form class="formulario" method="post" action="" enctype="multipart/form-data">
        <h2>Ficha del alumno</h2>
        <label for="id">ID</label>
        <input type="text" name="id" id="idalum" readonly size="1" value=<?php echo "$id"?>><br><br>
        <label for="nombre">Nombre *</label>
        <input type="text" name="nombre" id="nombre" value=<?php echo "$resul[1]"?>>&nbsp&nbsp&nbsp<input name="nombrecheck" id="check1" type="checkbox" checked>
        <br><br>
        <label for="apellido">1er Apellido *</label>
        <input type="text" name="apellido" id="apellido" value=<?php echo "$resul[2]"?>>&nbsp&nbsp&nbsp<input name="apellidocheck" id="check2" type="checkbox" checked>
        <br><br>
        <label for="foto">Foto *</label>
        <input type="file" name="foto" id="foto" value=<?php echo "$resul[3]"?>>&nbsp&nbsp&nbsp<input name="fotocheck" id="check3" type="checkbox" checked>
        <br><br>
        <input type="submit" name="Guardar" value="Guardar cambios">
    </form>
    </div>
    <div class="cajafoto">
        <img id="fotito" src=<?php echo "'$resul[3]'"?>/>
    </div>
    <button name="volver" id="volver" page=<?php echo "$page";?>>Volver al listado</button><br><br>
    <div>
</body>
</html>