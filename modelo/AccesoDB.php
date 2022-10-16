<?php

function newConn()
{
    $con = new PDO("mysql:host=localhost;dbname=dwese", "root", "");
    //accesobd-php 
    return $con;
}

function insertAlum($con, array $datos): bool
{
    $query = "INSERT INTO alumnos(nombre, apellido, foto) VALUES('$datos[0]','$datos[1]','$datos[2]')";
    return $con->exec($query);
}

function getAlumById(PDO $con, $id, int $mode = PDO::FETCH_BOTH)
{
    $query = "SELECT * FROM alumnos WHERE id = '$id'";
    $resul = $con->query($query);
    return $resul->fetch($mode);
}

function getAllAlums(PDO $con, int $mode = PDO::FETCH_BOTH)
{
    $query = "SELECT * FROM alumnos";
    $resul = $con->query($query);
    return $resul->fetchAll($mode);
}

function getAlumPage(
    PDO $con,
    int $NPagina,
    int $NLineas = 10,
    int $mode = PDO::FETCH_BOTH
) {
    $PIni = ($NPagina - 1) * $NLineas + 1;
    $query = "SELECT * FROM alumnos WHERE id >= $PIni ORDER BY id LIMIT $NLineas";
    $resul = $con->query($query);
    return $resul->fetchAll($mode);
}

function deleteAlumById(PDO $con, $id)
{
    $query = "DELETE FROM alumnos WHERE id = $id";
    return $con->exec($query);
}

function updateAlumById(PDO $con, $id, $arrayCol, $arrayDatos)
{
    $query = "UPDATE alumnos SET ";
    for ($i = 1; $i <= count($arrayCol); $i++) {
        if (count($arrayCol) > $i) {
            $query = $query . $arrayCol[$i - 1] . " = '" . $arrayDatos[$i - 1] . "', ";
        } else {
            $query = $query . $arrayCol[$i - 1] . " = '" . $arrayDatos[$i - 1] . "' ";
        }
    }
    $query = $query . "WHERE id = $id";
    return $con->exec($query);
}
