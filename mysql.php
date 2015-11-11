<?php
/**
 * Created by PhpStorm.
 * User: lsanchez
 * Date: 11/11/15
 * Time: 11:07 AM
 */


function getTable(){
    $mysqli = new mysqli("localhost", "root", "", "usuarios");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $query = "select * from registrados";
    $result = $mysqli->query($query);
    while($row = $result->fetch_assoc()) {
        print("<tr><td id='nombre-".$row["id"]."' class=\"celda\" ondblclick=\"modificar(this)\">".$row["nombre"]."</td>");
        print("<td id='apellido-".$row["id"]."' class=\"celda\" ondblclick=\"modificar(this)\">".$row["apellido"]."</td>");
        print("<td id='direccion-".$row["id"]."' class=\"celda\" ondblclick=\"modificar(this)\">".$row["direccion"]."</td>");
        print("<td id='codigo-".$row["id"]."' class=\"celda\" ondblclick=\"modificar(this)\">".$row["codigo"]."</td>");
        print("<td id='ciudad-".$row["id"]."' class=\"celda\" ondblclick=\"modificar(this)\">".$row["ciudad"]."</td>");
        print("<td id='hijos-".$row["id"]."' class=\"celda\" ondblclick=\"modificar(this)\">".$row["hijos"]."</td>");
        print("<td id='email-".$row["id"]."' class=\"celda\" ondblclick=\"modificar(this)\">".$row["email"]."</td>");
        print("<td class=\"celda\"><button name=\"borrar\" value=\"".$row["id"]."\">Borrar fila</button></td></tr>");
    }
    $result->free();
    $mysqli->close();
}

?>