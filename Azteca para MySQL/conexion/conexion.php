<?php
$dbserver = "localhost";
$dbuser = "root";
$dbpass = "inves";
$dbname = "azteca";
$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
if (!$conn) {
	die("Conexi�n fallida: " . mysqli_connect_error());
}
?>