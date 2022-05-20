<?php

// $intEdad = 0;
/*
    comentario de bloque
*/
$intEdad = 0;
$txtResult = '';

if (isset($_POST['btnProcesar'])) {
    // Todo dato que proviene de HTTP (FORM POST; GET; ....) son cadenas de Texto.
    $intEdad = intval($_POST['intEdad']); //floatval
    for ($i = 0; $i < $intEdad; $i++) {
        $txtResult .= ( $i + 1 ) . ' Ingreso a Procesar<br/>';
    }
    // $txtResult = "Ingreso a Procesar";
}

if (isset($_POST['btnProcesar2'])) {
    $txtResult = "Ingreso a Procesar 2";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sintaxis Básica de PHP</title>
</head>

<body>
    <h1>Sintaxis de PHP</h1>
    <form action="sintaxis.php" method="post">
        <label for="intEdad">Edad</label>
        <input type="text" name="intEdad" id="intEdad" placeholder="Edad">
        <br>
        <button name="btnProcesar" type="submit">Procesar</button>
        <button name="btnProcesar2" type="submit">Procesar 2</button>
    </form>
    <section>
        <?php echo $txtResult; ?>
    </section>
</body>

</html>
