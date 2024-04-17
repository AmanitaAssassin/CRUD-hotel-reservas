<?php

require_once 'conexion.php';

// Здесь мы используем $_POST, чтобы получить 'id', так как форма отправляется методом POST
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM reservas WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $reserva = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($stmt);

    if (!$reserva) {
        die("No se encontró una reserva con el ID especificado.");
    }
    ?>

    <form action="update_reservation.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($reserva['id']); ?>">

        <label for="nombre_huesped">Nombre del huésped:</label>
        <input type="text" id="nombre_huesped" name="nombre_huesped" value="<?php echo htmlspecialchars($reserva['nombre_huesped']); ?>" required>

        <label for="telefono_huesped">Teléfono del huésped:</label>
        <input type="text" id="telefono_huesped" name="telefono_huesped" value="<?php echo htmlspecialchars($reserva['telefono_huesped']); ?>" required>

        <label for="numero_habitacion">Número de habitación:</label>
        <input type="text" id="numero_habitacion" name="numero_habitacion" value="<?php echo htmlspecialchars($reserva['numero_habitacion']); ?>" required>

        <label for="fecha_alojamiento">Fecha de alojamiento:</label>
        <input type="date" id="fecha_alojamiento" name="fecha_alojamiento" value="<?php echo htmlspecialchars($reserva['fecha_alojamiento']); ?>" required>

        <label for="fecha_salida">Fecha de salida:</label>
        <input type="date" id="fecha_salida" name="fecha_salida" value="<?php echo htmlspecialchars($reserva['fecha_salida']); ?>" required>

        <label for="estado">Estado de la reserva:</label>
        <select name="estado" id="estado">
            <option value="pendiente" <?php echo $reserva['estado'] === 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
            <option value="confirmada" <?php echo $reserva['estado'] === 'confirmada' ? 'selected' : ''; ?>>Confirmada</option>
            <option value="cancelada" <?php echo $reserva['estado'] === 'cancelada' ? 'selected' : ''; ?>>Cancelada</option>
        </select>

        <input type="submit" value="Actualizar">
    </form>

    <?php
} else {
    die("ID no proporcionado o no es numérico.");
}
?>
