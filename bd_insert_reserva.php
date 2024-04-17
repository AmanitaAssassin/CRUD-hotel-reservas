<?php
require_once 'conexion.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre_huesped = mysqli_real_escape_string($conexion, $_POST['nombre_huesped']);
    $telefono_huesped = mysqli_real_escape_string($conexion, $_POST['telefono_huesped']);
    $numero_habitacion = mysqli_real_escape_string($conexion, $_POST['numero_habitacion']);
    $fecha_alojamiento = mysqli_real_escape_string($conexion, $_POST['fecha_alojamiento']);
    $fecha_salida = mysqli_real_escape_string($conexion, $_POST['fecha_salida']);
 
    $sql = "INSERT INTO reservas (nombre_huesped, telefono_huesped, numero_habitacion, fecha_alojamiento, fecha_salida) VALUES ('$nombre_huesped', '$telefono_huesped', '$numero_habitacion', '$fecha_alojamiento', '$fecha_salida')";
 
    if (mysqli_query($conexion, $sql)) {
        echo "Reserva agregada con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
}
 
mysqli_close($conexion);
?>
