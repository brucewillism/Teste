<?php
require_once '../../../bd/conexao.php';

$CLI_ID = $_GET['id'];
$sql = ("DELETE FROM tb_clientes WHERE CLI_ID = '$CLI_ID'");

$stmt = $conn->prepare($sql);

$stmt->bindParam(":CLI_ID", $CLI_ID);
$result = $stmt->execute();
if (!$result) {
	var_dump($stmt->errorInfo());
	exit;
}

header('location: ../Detalhes/ClientesList.php');
