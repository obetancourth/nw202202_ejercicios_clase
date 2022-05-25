<?php
$texto = "";
if (isset($_POST["texto"])) {
    $texto = $_POST["texto"];
    $textoAAnalizar = strtolower($texto);
    $textoAAnalizar = str_replace(".", "", $textoAAnalizar);
    $textoAAnalizar = str_replace(",", "", $textoAAnalizar);
    $textoAAnalizar = str_replace(";", "", $textoAAnalizar);
    $textoAAnalizar = str_replace(":", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("!", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("?", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("¿", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("¡", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("(", "", $textoAAnalizar);
    $textoAAnalizar = str_replace(")", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("[", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("]", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("{", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("}", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("<", "", $textoAAnalizar);
    $textoAAnalizar = str_replace(">", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("/", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("+", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("-", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("*", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("=", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("%", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("&", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("#", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("$", "", $textoAAnalizar);

    $textoAAnalizar = str_replace("“", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("”", "", $textoAAnalizar);
    $textoAAnalizar = str_replace("’", "", $textoAAnalizar);
    $arrPalabras = explode(" ", $textoAAnalizar);

    $frecuenciaPalabras = array();
    foreach ($arrPalabras as $palabra) {
        if (isset($frecuenciaPalabras[$palabra])) {
            $frecuenciaPalabras[$palabra]++;
        } else {
            $frecuenciaPalabras[$palabra] = 1;
        }
    }
    arsort($frecuenciaPalabras);
    $arrHistograma = array();
    foreach ($frecuenciaPalabras as $frecuencia) {
        if (isset($arrHistograma[$frecuencia])) {
            $arrHistograma[$frecuencia]++;
        } else {
            $arrHistograma[$frecuencia] = 1;
        }
    }
    arsort($arrHistograma);
    $arrAnalisis = array(
        "palabras" => count($arrPalabras),
        "palabrasDistintas" => count($frecuenciaPalabras),
        "palabraModa" => array_keys($frecuenciaPalabras)[0],
        "histograma" => $arrHistograma
    );
    print_r($arrAnalisis); // imprime el array de palabras
    die();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analizador de Palabras</title>
</head>
<body>
    <h1>Analizador de Palabras</h1>
    <form action="form.php" method="post">
        <label for="texto">Texto:</label>
        <textarea name="texto" id="texto" cols="30" rows="10"><?php echo $texto; ?></textarea>
        <input type="submit" value="Analizar">
    </form>
    <hr>
</body>
</html>
