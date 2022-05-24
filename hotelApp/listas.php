<?php
    require_once 'funciones.php';
    $reservas = getReservas();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Reservas</title>
</head>
<body>
    <h1>Listado de Reservas</h1>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Titular</th>
                <th>Habitaciones</th>
                <th>Precio</th>
                <th>Días</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $reserva) { ?>
            <tr>
                <td><?php echo $reserva["fecha"]; ?></td>
                <td><?php echo $reserva["titular"]; ?></td>
                <td><?php echo $reserva["habitaciones"]; ?></td>
                <td><?php echo $reserva["precio"]; ?></td>
                <td><?php echo $reserva["dias"]; ?></td>
                <td><?php echo $reserva["total"]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
