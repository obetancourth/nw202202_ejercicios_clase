<?php
session_start();

$num1 = 0;
$num2 = 0;
$resultado = 0;
$operaciones = array();

if (isset($_SESSION["operaciones"])) {
    $operaciones = $_SESSION["operaciones"];
}

if (isset($_POST["btnSumar"])) {
    $num1 = floatval($_POST["num1"]);
    $num2 = floatval($_POST["num2"]);
    $resultado = $num1 + $num2;
    $operaciones[] = array(
        "num1" => $num1,
        "num2" => $num2,
        "operacion" => "Suma",
        "resultado" => $resultado
    );
}
if (isset($_POST["btnRestar"])) {
    $num1 = floatval($_POST["num1"]);
    $num2 = floatval($_POST["num2"]);
    $resultado = $num1 - $num2;
    $operaciones[] = array(
        "num1" => $num1,
        "num2" => $num2,
        "operacion" => "Resta",
        "resultado" => $resultado
    );
}
if (isset($_POST["btnMultiplicar"])) {
    $num1 = floatval($_POST["num1"]);
    $num2 = floatval($_POST["num2"]);
    $resultado = $num1 * $num2;
    $operaciones[] = array(
        "num1" => $num1,
        "num2" => $num2,
        "operacion" => "Multiplicación",
        "resultado" => $resultado
    );
}
if (isset($_POST["btnDividir"])) {
    $num1 = floatval($_POST["num1"]);
    $num2 = floatval($_POST["num2"]);
    if ($num2 === 0) {
        $resultado = "No se puede dividir por cero";
    } else {
        $resultado = $num1 / $num2;
    }
    $operaciones[] = array(
        "num1" => $num1,
        "num2" => $num2,
        "operacion" => "Divición",
        "resultado" => $resultado
    );
}

$_SESSION["operaciones"] = $operaciones;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h1>Calculadora</h1>
    <form action="calculadora.php" method="post">
        <label for="num1">Numero 1</label>
        <input type="text" name="num1" id="num1" placeholder="Numero 1" value="<?php echo $num1 ;?>">
        <br>
        <label for="num2">Numero 2</label>
        <input type="text" name="num2" id="num2" placeholder="Numero 2" value="<?php echo $num2 ;?>">
        <br>
        <button name="btnSumar" type="submit">Sumar</button>
        <button name="btnRestar" type="submit">Restar</button>
        <button name="btnMultiplicar" type="submit">Multiplicar</button>
        <button name="btnDividir" type="submit">Dividir</button>
    </form>
    <hr>
    <section>
            <?php echo $resultado; ?>
            <hr>
            <?php
            foreach ($operaciones as $operacion) {
                echo $operacion["num1"] . " " . $operacion["operacion"] . " " . $operacion["num2"] . " = " . $operacion["resultado"] . "<br>";
            }
            ?>
    </section>
</body>
</html>
