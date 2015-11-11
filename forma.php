<?php
/**
 * Created by PhpStorm.
 * User: lsanchez
 * Date: 11/11/15
 * Time: 11:00 AM
 */

require 'mysql.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>

    <title>Modificación "en línea" desde una página web</title>

    <link rel="StyleSheet" type="text/css" href="tabla.css"/>
    <script type="text/javascript" src="modificacion.js"> </script>


</head>

<body>

<h1>Lista de usuarios</h1>


<table id="tabla-usuarios">
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Dirección</th>
        <th>Código Postal</th>
        <th>Ciudad</th>
        <th>Hijos</th>
        <th>Email</th>
        <th>&nbsp;</th>

    </tr>

    <?php
        getTable();
    ?>

</table>
<br>
<input type="button" value="Agregar Fila" onclick="addRow()"><input>

</body>
</html>
