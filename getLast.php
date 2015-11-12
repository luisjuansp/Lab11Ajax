<?php
/**
 * Created by PhpStorm.
 * User: lsanchez
 * Date: 11/11/15
 * Time: 1:05 PM
 */

$mysqli = new mysqli("localhost", "root", "", "usuarios");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$query = "select * from registrados ORDER BY id DESC LIMIT 1";

$result = $mysqli->query($query);
$rowdata = "";
while ($row = $result->fetch_assoc()) {
    $rowdata = $rowdata . "nombre-" . $row["id"] . "," . $row["nombre"];
    $rowdata = $rowdata . "//apellido-" . $row["id"] . "," . $row["apellido"];
    $rowdata = $rowdata . "//direccion-" . $row["id"] . "," . $row["direccion"];
    $rowdata = $rowdata . "//codigo-" . $row["id"] . "," . $row["codigo"];
    $rowdata = $rowdata . "//ciudad-" . $row["id"] . "," . $row["ciudad"];
    $rowdata = $rowdata . "//hijos-" . $row["id"] . "," . $row["hijos"];
    $rowdata = $rowdata . "//email-" . $row["id"] . "," . $row["email"];
    $rowdata = $rowdata . "//" . $row["id"];
}
$result->free();
$mysqli->close();

echo $rowdata;

?>