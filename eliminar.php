<?php
/**
 * Created by PhpStorm.
 * User: fofo
 * Date: 11/11/2015
 * Time: 11:41 AM
 */
// Insertar el anuncio en la Base de Datos
$mysqli = new mysqli("localhost", "root", "", "usuarios");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$id = $_POST["id"];

$instruccion =
    "DELETE FROM registrados WHERE id=".$id;
if (!$mysqli->query($instruccion))
    echo "Table insertion failed: (" . $mysqli->errno . ") " . $mysqli->error;
$mysqli->close();

?>