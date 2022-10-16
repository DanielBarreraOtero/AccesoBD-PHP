<?php
if (isset($_GET["page"]) && ($_GET["page"]) > 1) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$error=[$_GET["error"]];
$errores[] = "Es necesario el ID del alumno para continuar.";
$errores[] = "Es necesario rellenar todos los campos antes de editar un alumno.";
$errores[] = "El archivo subido debe ser del tipo JPG, JPEG o PNG. ";

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
    <div class="error">
        <p class="linea1">Ups...</p>
        <p class="linea2">españa no va bien.</p>
        <p class="linea2"><?php echo $errores[$_GET["error"]]; ?></p>
    </div>
    <button name="volver" id="volver" page=<?php echo "$page";?>>Volver al listado</button>
    
</body>
</html>