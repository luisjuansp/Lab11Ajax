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

//$stmt = $mysqli->prepare("UPDATE registrados SET " . $column . "=? WHERE id=" . $id);
///* BK: always check whether the prepare() succeeded */
//if ($stmt === false) {
//    trigger_error($mysqli->error);
//} else {
//    if (is_numeric($valor)) {
//        $stmt->bind_param('i', $valor);
//    } else {
//        $stmt->bind_param('s', $valor);
//    }
//    $status = $stmt->execute();
//    if ($status === false) {
//        trigger_error($stmt->error);
//    } else {
//        printf("%d Row inserted.\n", $stmt->affected_rows);
//    }
//}

?>