<?php
// ESTO ES EN EL CASO DE QUE SE TRABAJE EN SERVIDOR LOCAL
$server="localhost";
$user="root";
$pass="";   // password
$database="reservas_de_hotel"; //NOMBRE DE LA BASE DE DATOS, NO DE LA TABLA

$conexion=mysqli_connect($server,$user,$pass) or die ("Error de conexion");

mysqli_select_db($conexion,$database);

?>