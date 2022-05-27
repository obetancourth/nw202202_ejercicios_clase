<?php
$numeros = "";
$resultado = array();
$errors = array();
if (isset($_POST['btnAnalizar'])) {
    $numeros = $_POST['numeros'];
    $resultado = numerosprimos($numeros);
}

function numerosprimos($numeros)
{
    global $errors;
    $resultado = array();
    if (preg_match('/^\s*$/', $numeros)) {
        $errors[] = "No has introducido ningún número";
        return $resultado;
    }
    $arrNumeros = array_unique(explode(",", $numeros));
    if (count($arrNumeros) > 10) {
        $errors[] = "Solo se pueden ingresar 10 numeros";
        return $resultado;
    }
    foreach ($arrNumeros as $numero) {
        $numero = intval($numero);
        $contador = 0;
        for ($i = 1; $i <= $numero; $i++) {
            if ($numero % $i == 0) {
                $contador++;
            }
        }
        $resultado[$numero] = ($contador >= 1 && $contador <= 2);
    }
    return $resultado;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis de Números Primos</title>
</head>
<body>
    <h1>Análisis de Números Primos</h1>
    <form action="numerosprimos.php" method="post">
        <label for="numeros">Números: Separados por coma</label>
        <textarea name="numeros" id="numeros"
            cols="30" rows="10"><?php echo $numeros; ?></textarea>
        <button type="submit" name="btnAnalizar">Analizar</button>
    </form>
    <hr>
    <?php if (count($errors) > 0) { ?>
        <ul>
            <?php foreach ($errors as $error) { ?>
                <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
    <?php if (count($resultado) > 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Es primo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $numero => $esPrimo) { ?>
                    <tr>
                        <td><?php echo $numero; ?></td>
                        <td><?php echo $esPrimo ? "Si" : "No"; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
    </section>
</body>
</html>
