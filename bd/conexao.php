<?php
session_start();
$host = "localhost";
$usuario = "root";
$senha = "0301HeX@";
$bd = "teste";


try {
	$conn = new PDO("mysql:host=localhost;dbname=$bd", $usuario, $senha);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}
?>
