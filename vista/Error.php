<?php
if (isset($_GET["page"]) && ($_GET["page"]) > 1) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$errores[] = "Es necesario el ID del alumno para continuar.";
$errores[] = "Es necesario rellenar todos los campos antes de editar un alumno.";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Error.css">
    <script src="js/Error.js"></script>
    <title>Document</title>
</head>
<body>
    <center><h1><?php echo $errores[$_GET["error"]]; ?></h1></center>
    <center><button name="volver" id="volver" page=<?php echo "$page";?>>Volver al listado</button></center>
    <img src="../helpers/81yxfavkz2c51.png"/>
    <audio controls>
        <source src="../helpers/Vegeta bajo la lluvia - la oreja de Van Gogh - mil rosas [TubeRipper.com].mp3" type="audio/mpeg">
    </audio>
    
</body>
</html>