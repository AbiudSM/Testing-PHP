<?php

$DBhost = 'localhost';
$DBuser = 'root';
$DBpassword = '';
$DBname = 'pruebas';

$conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBname);
if (!$conn) {
	die("No hay conexion: ".mysqli_connect_error());
}

?>