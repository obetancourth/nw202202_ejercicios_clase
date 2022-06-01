<?php
require_once 'CategoriasDao.php';

function redirectTo($msg, $url) {
    echo '<script> alert("'.$msg.'"); window.location.assign("'.$url.'"); </script>';
    die();
}

$catModel = new Categorias();

$mode = 'DSP';
$id = 0;
$categoria = "";
$estado = "ACT";
$descripcion = "";
$modeDesc = "";
$readOnly = "";

$arrModeDesc = array (
    "INS" => "Nueva Categoría",
    "UPD" => "Actualizar %s",
    "DEL" => "Eliminar %s",
    "DSP" => "Detalles de %s",
);

// Cuando se ejecuta el script por medio de método GET
if (isset($_POST["btnConfirmar"])) {
    $mode = $_POST["mode"];
    $id = intval($_POST["id"]);
    $categoria = $_POST["categoria"];
    $estado = $_POST["estado"];
    $descripcion = $_POST["descripcion"];
    // Validaciones de entrada de datos
    // TODO HACER

    //Procesamiento
    switch ($mode) {
    case 'INS':
        $catModel->insertar(
            $categoria,
            $descripcion,
            $estado
        );
        redirectTo("Categorías Agregada Satisfactoriamente.", "categorias.php");
        break;
    case 'UPD':
        $catModel->update(
            $categoria,
            $descripcion,
            $estado,
            $id
        );
        redirectTo("Categorías Actualizada Satisfactoriamente.", "categorias.php");
        break;
    case 'DEL':
        $catModel->delete(
            $id
        );
        redirectTo("Categorías Eliminada Satisfactoriamente.", "categorias.php");
        break;
    default:
        break;
    }
}
// Mostrar información dependiendo de las variables que se reciben.
if (isset($_GET["mode"])) {
    $mode = $_GET["mode"];
}
if (isset($_GET["codigo"])) {
    $id = intval($_GET["codigo"]);
}

if (!isset($arrModeDesc[$mode])) {
    error_log("Intento de abrir el formulario en modalidad desconocida: $mode");
    header("Location: categorias.php");
    die();
}
if ($mode !== "INS") {
    $arrCategorias = $catModel->getById($id);
    $categoria = $arrCategorias["nombre"];
    $estado = $arrCategorias["estado"];
    $descripcion = $arrCategorias["descripcion"];
    $modeDesc = sprintf($arrModeDesc[$mode], $categoria);
} else {
    $modeDesc = $arrModeDesc[$mode];
}

if ($mode ==='DEL' || $mode === 'DSP') {
    $readOnly ="readonly disabled";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoría</title>
</head>

<body>
    <h1><?php echo $modeDesc; ?></h1>
    <form action="categoria.php?mode=<?php echo $mode; ?>&codigo=<?php echo $id; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="hidden" name="mode" value="<?php echo $mode;?>">
        <label for="categoria">Categoría</label>
        <input <?php echo $readOnly;?> type="text" name="categoria" id="categoria" value="<?php echo $categoria;?>">
        <br>
        <label for="descripcion">Descripción</label>
        <input  <?php echo $readOnly;?> type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion;?>">
        <br>
        <label for="estado">Estado</label>
        <select name="estado" id="estado" <?php echo $readOnly;?> >
            <option value="ACT" <?php echo ($estado==="ACT")?"selected":""; ?>>Activo</option>
            <option value="INA" <?php echo ($estado==="INA")?"selected":""; ?>>Inactivo</option>
        </select>
        <br>
        <?php if ($mode !== 'DSP') { ?>
                <button type="submit" name="btnConfirmar">Confirmar</button>
        <?php } ?>
        <a href="categorias.php">Cancelar</a>
    </form>
</body>

</html>
