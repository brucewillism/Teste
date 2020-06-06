<?php
require_once '../bd/conexao.php';

$ds_nome = addslashes($_POST['ds_nome']);
$ds_login = addslashes($_POST['ds_login']);
$ds_senha = md5(addslashes($_POST['ds$ds_senha']));

$sql = "INSERT INTO tb_usuarios 
(ds_nome, ds_login, ds_senha)
VALUES	(:ds_nome, :ds_login, :ds_senha);";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':ds_nome', $ds_nome);
$stmt->bindParam(':ds_login', $ds_login);
$stmt->bindParam(':ds_senha', $ds_senha);
$result = $stmt->execute();
if (!$result) {
	var_dump($stmt->errorInfo());
	exit;
}

header('location:index.html');
