<?php
// WW Work With Pattern
// Trabajar Con.
///----------------
// Lista
// Formulario CRUD (Create, Read, Update, Delete)

require_once 'CategoriasDao.php';
$catModel = new Categorias();
$catModel->setup();
$categories = $catModel->getAll();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <style>
        table{
            width: 80%;
            max-width: 1024px;
            margin: 1rem auto;
        }
    </style>
</head>

<body>
    <h1>Gestión Categorías</h1>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Categoría</th>
                <th>Estado</th>
                <th><a href="categoria.php?mode=INS">+ New</a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $categoria) {
            ?>
                <tr>
                    <td><?php echo $categoria["id"]; ?></td>
                    <td><?php echo $categoria["nombre"]; ?></td>
                    <td><?php echo $categoria["estado"]; ?></td>
                    <td>
                        <a href="categoria.php?mode=UPD&codigo=<?php echo $categoria["id"]; ?>">Editar</a><br>
                        <a href="categoria.php?mode=DSP&codigo=<?php echo $categoria["id"]; ?>">Ver</a><br>
                        <a href="categoria.php?mode=DEL&codigo=<?php echo $categoria["id"]; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
