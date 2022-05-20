<?php
session_start();

$_SESSION["isLogged"] = false;
$_SESSION["user"] = "obetancourthunicah";
// $_SESSION["tmpSessionKey"] = 'hashx';


$_SESSION = array();
session_destroy();


?>
