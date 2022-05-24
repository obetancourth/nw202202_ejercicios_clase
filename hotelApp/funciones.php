<?php
session_start();
$_reservaStructure = array(
    "fecha" => "",
    "titular" => "",
    "habitaciones" => 0,
    "precio" => 0,
    "dias" => 0
);
function agregarReserva($fecha, $titular, $habitaciones, $precio, $dias)
{
    global $_reservaStructure;
    $reserva = $_reservaStructure;
    $reserva["fecha"] = $fecha;
    $reserva["titular"] = $titular;
    $reserva["habitaciones"] = $habitaciones;
    $reserva["precio"] = $precio;
    $reserva["dias"] = $dias;
    $reserva["total"] = $dias * $precio;

    $reservas = array();
    if (isset($_SESSION["reservas"])) {
        $reservas = $_SESSION["reservas"];
    }
    $reservas[] = $reserva;
    $_SESSION["reservas"] = $reservas;
}
function getReservas()
{
    $reservas = array();
    if (isset($_SESSION["reservas"])) {
        $reservas = $_SESSION["reservas"];
    }
    return $reservas;
}
?>
