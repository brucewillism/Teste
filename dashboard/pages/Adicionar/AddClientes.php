<?php
require_once '../../../bd/conexao.php';

$usuario_id = $_SESSION['id'];

$nome_fantasia = addslashes($_POST['nome_fantasia']);
$razao_social = addslashes($_POST['razao_social']);
$tipo = addslashes($_POST['tipo']);
$cgc = addslashes($_POST['cgc']);
$cep = addslashes($_POST['cep']);
$rua = addslashes($_POST['rua']);
$numero = addslashes($_POST['numero']);
$bairro = addslashes($_POST['bairro']);
$cidade = addslashes($_POST['cidade']);
$estado = addslashes($_POST['estado']);
$pais = addslashes($_POST['pais']);

$sql = "INSERT INTO tb_clientes 
(nome_fantasia, razao_social, tipo, cgc, cep, rua, numero, bairro, cidade, estado, pais, usuario_id)
VALUES	(:nome_fantasia, :razao_social, :tipo, :cgc, :cep, :rua, :numero, :bairro,
:cidade, :estado, :pais, :usuario_id);";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':usuario_id', $usuario_id);
$stmt->bindParam(':nome_fantasia', $nome_fantasia);
$stmt->bindParam(':razao_social', $razao_social);
$stmt->bindParam(':tipo', $tipo);
$stmt->bindParam(':cgc', $cgc);
$stmt->bindParam(':cep', $cep);
$stmt->bindParam(':rua', $rua);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':bairro', $bairro);
$stmt->bindParam(':cidade', $cidade);
$stmt->bindParam(':estado', $estado);
$stmt->bindParam(':pais', $pais);

$result = $stmt->execute();
if (!$result) {
	var_dump($stmt->errorInfo());
	exit;
}

header('location:../../index.php');
