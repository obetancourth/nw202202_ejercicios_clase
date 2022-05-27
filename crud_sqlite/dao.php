<?php
// DAO == DATA ACCESS OBJECT
// SINGLETON PATTERN
class Conexion
{
    private static $conn = null;
    private function __construct()
    {
    }
    public static function getConn()
    {
        if (self::$conn == null) {
            self::$conn = new SQLite3('categorias.db');
        }
        return self::$conn;
    }
}

?>
