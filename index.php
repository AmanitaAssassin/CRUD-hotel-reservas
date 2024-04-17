<?php
require_once 'conexion.php'; 

$sql = "SELECT * FROM reservas WHERE fecha_salida >= CURDATE() ORDER BY fecha_alojamiento ASC";
$resultado = mysqli_query($conexion, $sql) or die (mysqli_error($conexion));

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Gestión de Reservas de Hotel</title>
 
</head>
<body>
<div id="contenedor">
    <fieldset>
        <h1>Agregar nueva reserva</h1>
    <form action="bd_insert_reserva.php" method="post">
        <label for="nombre_huesped">Nombre del huésped:</label>
        <input type="text" id="nombre_huesped" name="nombre_huesped" placeholder="Nombre del huésped" required>
        
        <label for="telefono_huesped">Teléfono del huésped:</label>
        <input type="text" id="telefono_huesped" name="telefono_huesped" placeholder="Teléfono del huésped" required>
        
        <label for="numero_habitacion">Número de habitación:</label>
        <input type="text" id="numero_habitacion" name="numero_habitacion" placeholder="Número de habitación" required>
        
        <label for="fecha_alojamiento">Fecha de alojamiento:</label>
        <input type="date" id="fecha_alojamiento" name="fecha_alojamiento" required>
        
        <label for="fecha_salida">Fecha de salida:</label>
        <input type="date" id="fecha_salida" name="fecha_salida" required>
        
        <button type="submit" name="enviar_reserva">Añadir reserva</button>
    </form>
</fieldset>

<h2>Lista de Reservas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Huésped</th>
                <th>Teléfono</th>
                <th>Número Habitación</th>
                <th>Fecha Alojamiento</th>
                <th>Fecha Salida</th>
                <th>Fecha Adición</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre_huesped']; ?></td>
                    <td><?php echo $row['telefono_huesped']; ?></td>
                    <td><?php echo $row['numero_habitacion']; ?></td>
                    <td><?php echo $row['fecha_alojamiento']; ?></td>
                    <td><?php echo $row['fecha_salida']; ?></td>
                    <td><?php echo $row['fecha_adicion']; ?></td>
                    <td><?php echo $row['estado']; ?></td>
                    <td>
    <form action="edit_reservation.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>"> 
        <input type="submit" value="Editar">
    </form>
    <form action="delete_reservation.php" method="post" onsubmit="return confirm('¿Está seguro de que desea eliminar esta reserva?');">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
        <input type="submit" value="Eliminar">
    </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>