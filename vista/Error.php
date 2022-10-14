<?php
if (isset($_GET["page"]) && ($_GET["page"]) > 1) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$errores = ["Acceso denegado la chupas"];

echo "<h1>".$errores[$_GET["error"]]."</h1>";
