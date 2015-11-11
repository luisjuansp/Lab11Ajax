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
    <script type="text/javascript" src="modificacion.js"></script>

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

<!--    <tr>-->
<!--        <td id="nombre-1" class="celda" ondblclick="modificar(this)">Luis</td>-->
<!---->
<!--        <td id="apellido-1" class="celda" ondblclick="modificar(this)">Perez</td>-->
<!---->
<!--        <td id="direccion-1" class="celda" ondblclick="modificar(this)">G. Sada 2501</td>-->
<!---->
<!--        <td id="codigo-1" class="celda" ondblclick="modificar(this)">64849</td>-->
<!---->
<!--        <td id="ciudad-1" class="celda" ondblclick="modificar(this)">Monterrey</td>-->
<!---->
<!--        <td id="hijos-1" class="celda" ondblclick="modificar(this)">2</td>-->
<!---->
<!--        <td id="email-1" class="celda" ondblclick="modificar(this)">luis.perez@itesm.mx</td>-->
<!---->
<!--    </tr>-->
<!---->
<!--    <tr>-->
<!--        <td id="nombre-2" class="celda" ondblclick="modificar(this)">Pablo</td>-->
<!---->
<!--        <td id="apellido-2" class="celda" ondblclick="modificar(this)">Lopez</td>-->
<!---->
<!--        <td id="direccion-2" class="celda" ondblclick="modificar(this)">Blanco Encalada 100</td>-->
<!---->
<!--        <td id="codigo-2" class="celda" ondblclick="modificar(this)">66766</td>-->
<!---->
<!--        <td id="ciudad-2" class="celda" ondblclick="modificar(this)">Santiago</td>-->
<!---->
<!--        <td id="hijos-2" class="celda" ondblclick="modificar(this)">3</td>-->
<!---->
<!--        <td id="email-2" class="celda" ondblclick="modificar(this)">plopez@itesm.mx</td>-->
<!---->
<!--    </tr>-->


</table>

</body>
</html>
