<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    
     
    $sql = "DELETE FROM reservas WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        
        header("Location: index.php?deleted=1");
        exit();
    } else {
    
        echo "Error al eliminar la reserva: " . mysqli_error($conexion);
    }

    mysqli_stmt_close($stmt);
}
mysqli_close($conexion);
?>
