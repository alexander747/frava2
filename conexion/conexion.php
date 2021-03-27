<?php
// $server = 'localhost';
// $user = 'syscalad_chema';
// $password = 'Password747';
// $database = 'syscalad_chema';

$server = 'localhost';
$user = 'root';
$password = '';
$database = 'syscalad_chema';

$conexion = mysqli_connect($server, $user, $password, $database);
mysqli_set_charset($conexion, "utf8");
if (!$conexion) {
	die('Error de Conexi��n: ' . mysqli_connect_errno());
}