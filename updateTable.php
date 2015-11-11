<?php
/**
 * Created by PhpStorm.
 * User: lsanchez
 * Date: 11/11/15
 * Time: 11:40 AM
 */

$mysqli = new mysqli("localhost", "root", "", "usuarios");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$valor = $_POST["valor"];
$id = $_POST["id"];
$column = $_POST["column"];


$sql = "UPDATE registrados SET ".$column."='".$valor."' WHERE id=".$id;

if ($mysqli->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$mysqli->close();

?>