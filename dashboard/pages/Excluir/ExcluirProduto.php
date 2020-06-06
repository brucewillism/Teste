<?php
require_once '../../../bd/conexao.php';

$pro_id = $_GET['id'];
$sql = ("DELETE FROM tb_produtos WHERE pro_id = '$pro_id'");

$stmt = $conn->prepare($sql);

$stmt->bindParam(":pro_id", $pro_id);
$result = $stmt->execute();
if (!$result) {
	var_dump($stmt->errorInfo());
	exit;
}

header('location: ../Detalhes/ProdutosList.php');
