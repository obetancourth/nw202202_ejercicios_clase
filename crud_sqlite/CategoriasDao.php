<?php
require_once 'dao.php';
class Categorias {
    private $conexion = null;
    public function __construct() {
        $this->conexion = Conexion::getConn();
    }
    public function setup() {
        $sql = "CREATE TABLE IF NOT EXISTS categorias (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre TEXT,
            descripcion TEXT,
            estado TEXT
        )";
        $this->conexion->exec($sql);
    }

    public function insertar($nombre, $descripcion, $estado) {
        $sql = "INSERT INTO categorias (nombre, descripcion, estado)
            VALUES ('$nombre', '$descripcion', '$estado')";
        $this->conexion->exec($sql);
    }

    public function getAll() {
        $sql = "SELECT * FROM categorias";
        $result = $this->conexion->query($sql);
        $categorias = array();
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $categorias[] = $row;
        }
        return $categorias;
    }

    public function getById($codigo)
    {
        $sql = "SELECT * FROM categorias where id=$codigo";
        $result = $this->conexion->query($sql);
        //$categorias = array();
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            return $row;
        }
        return array();
    }

    public function update($nombre, $descripcion, $estado, $id) {
        $sql = "UPDATE categorias SET nombre = '$nombre',
            descripcion = '$descripcion', estado = '$estado' WHERE id = $id";
        $this->conexion->exec($sql);
    }

    public function delete( $id ) {
        $sql = "DELETE FROM categorias WHERE id = $id";
        $this->conexion->exec($sql);
    }
}

?>
