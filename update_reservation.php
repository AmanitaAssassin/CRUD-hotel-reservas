<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $id = $_POST['id'];
    $nombre_huesped = $_POST['nombre_huesped'];
    $telefono_huesped = $_POST['telefono_huesped'];
    $numero_habitacion = $_POST['numero_habitacion'];
    $fecha_alojamiento = $_POST['fecha_alojamiento'];
    $fecha_salida = $_POST['fecha_salida'];
    $estado = $_POST['estado'];

     
    $sql = "UPDATE reservas SET nombre_huesped = ?, telefono_huesped = ?, numero_habitacion = ?, fecha_alojamiento = ?, fecha_salida = ?, estado = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssi", $nombre_huesped, $telefono_huesped, $numero_habitacion, $fecha_alojamiento, $fecha_salida, $estado, $id);
    
    if (mysqli_stmt_execute($stmt)) {
   
        header("Location: index.php?success=1");
        exit();
    } else {
     
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
}
?>
