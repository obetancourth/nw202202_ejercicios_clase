<?php
require_once 'funciones.php';

$fecha = (new DateTime())->format("c");
$titular = "";
$habitaciones = 1;
$precio = 100;
$dias = 1;

if (isset($_POST["btnReservar"])) {
    $fecha = $_POST["fecha"];
    $titular = $_POST["titular"];
    $habitaciones = intval($_POST["habitaciones"]);
    $precio = floatval($_POST["precio"]);
    $dias = intval($_POST["dias"]);
    agregarReserva($fecha, $titular, $habitaciones, $precio, $dias);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
</head>

<body>
    <h1>Reservas</h1>
    <form action="reserva.php" method="post">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>">
        <label for="titular">Titular:</label>
        <input type="text" name="titular" id="titular" value="<?php echo $titular; ?>">
        <label for="habitaciones">Habitaciones:</label>
        <input type="number" name="habitaciones" id="habitaciones" value="<?php echo $habitaciones; ?>">
        <label for="precio">Precio:</label>
        <select name="precio" id="precio">
            <option value="100" <?php echo ($precio == 100 ? "selected" : ""); ?>>
                100
            </option>
            <option value="200" <?php echo ($precio == 200 ? "selected" : ""); ?>>
                200
            </option>
            <option value="300" <?php echo ($precio == 300 ? "selected" : ""); ?>>
                300
            </option>
        </select>
        <label for="dias">Días:</label>
        <input type="number" name="dias" id="dias" value="<?php echo $dias; ?>">
        <button type="submit" name="btnReservar">Reservar</button>
    </form>
</body>

</html>
