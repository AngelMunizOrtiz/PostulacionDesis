<?php


$mysqli = new mysqli('localhost', 'root', '', 'desisbd');

if ($mysqli->connect_errno > 0) {
    die("Error en la conexión" . $mysqli->connect_error);
}


?>