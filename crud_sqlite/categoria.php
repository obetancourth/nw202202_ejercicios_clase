<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoría</title>
</head>

<body>
    <h1>Gestión de Categoría</h1>
    <form action="categoria.php" method="post">
        <input type="hidden" name="id" value="">
        <label for="categoria">Categoría</label>
        <input type="text" name="categoria" id="categoria" value="">
        <br>
        <label for="descripcion">Descripción</label>
        <input type="text" name="descripcion" id="descripcion" value="">
        <br>
        <label for="estado">Estado</label>
        <select name="estado" id="estado">
            <option value="ACT">Activo</option>
            <option value="INA">Inactivo</option>
        </select>
        <br>
        <button type="submit" name="btnConfirmar">Confirmar</button>
        <a href="categorias.php">Cancelar</a>
    </form>
</body>

</html>
