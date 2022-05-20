<?php
    $txtNombre = "";
    $txtResult = "Favor ingresar su nombre y luego dar click en Procesar.";
    if (isset($_POST['txtNombre'])) {
        $txtNombre = $_POST['txtNombre'];
        $txtResult = "Hola " . $txtNombre . "!";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer documento PHP</title>
</head>

<body>
    <h1>Mi Primer PHP Script</h1>
    <form action="first.php" method="post">
        <label for="txtNombre">
            Nombre: <input type="text" name="txtNombre" placeholder="Nombre Completo" id="txtNombre" />
        </label>
        <br>
        <button id="btnProcesar" type="submit" name="btnProcesar">Procesar</button>
    </form>
    <section>
        <?php echo $txtResult; ?>
    </section>
</body>
</html>
