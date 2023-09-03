<?php

$host = "localhost";
$dbUser = "root";
$dbPassword = "";
$database = "learn-ing";

$mysqli = new mysqli($host, $dbUser, $dbPassword, $database);

if($mysqli->connect_error){
    die('Error de conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

?>