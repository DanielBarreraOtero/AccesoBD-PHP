<?php

require_once "AccesoBD-PHP\modelo\AccesoDB.php";

$con = newConn();


if (isset($_POST['crear'])) {
    echo insertAlum($con, ["victor", "esquinas", "foto"]);
}

if (isset($_POST['select1'])) {
    var_dump(getAlumById($con, 3, PDO::FETCH_ASSOC));
}

if (isset($_POST['selectAll'])) {
    var_dump(getAllAlums($con, PDO::FETCH_ASSOC));
}

if (isset($_POST['selectPage'])) {
    var_dump(getAlumPage($con, 1, 4, PDO::FETCH_ASSOC));
}

if (isset($_POST['borrar'])) {
    echo deleteAlumById($con, 5);
}

if (isset($_POST['modificar'])) {
    echo updateAlumById($con, 5,["Nombre","Apellido"],["Victor","Esquinas"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testbd</title>
</head>

<body>
    <form action="" method="post">
        <input type="submit" name="crear" value="crear">
        <input type="submit" name="borrar" value="borrar">
        <input type="submit" name="modificar" value="modificar">
        <input type="submit" name="select1" value="select1">
        <input type="submit" name="selectAll" value="selectAll">
        <input type="submit" name="selectPage" value="selectPage">
    </form>
</body>

</html>