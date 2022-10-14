<?php
require_once "AccesoBD-PHP\modelo\AccesoDB.php";
$con = newConn();

if (isset($_GET['page']) && $_GET['page'] > 1){
    $page = $_GET['page'];
} else {
    $page = 1;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    <link rel="stylesheet" href="css/Listado.css">
    <script src="js/Listado.js"></script>
</head>
<body>
    <center>
        <h2>Listado de Alumnos</h2>
        <button id="nuevo" page=<?php echo "$page";?>>Nuevo Alumno</button>
        <table id="tabla">
            <tr>
                <th id="nombre">Nombre</th>
                <th id="apellido">Apellido</th>
                <th id="foto">Foto</th>
                <th id="accion">Acción</th>
            </tr>
            <?php
                $pagina = getAlumPage($con, $page, 10);
                if(empty($pagina)){
                    echo "<tr><td colspan='4'>No hay alumnos en este momento</td></tr>";
                } else {
                    foreach ($pagina as $value) {
                        echo "<tr><td>$value[1]</td><td>$value[2]</td>".
                        "<td><img src='$value[3]''></td><td><a href='Edita.php?id=".
                        "$value[0]&page=$page'>✏️</a><a href='Borrar.php?id=".
                        "$value[0]&page=$page'>🗑️</a></td></tr>";
                    }
                }
                ?>
            </tr>
            <tr>
                <td colspan="4">
                <button id="anterior" page=<?php echo "$page";?>>◀</button>
                Página: <?php echo $page?>
                <button id="siguiente" page=<?php echo "$page";?>>▶</button>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>