<?php
require_once '../../../bd/conexao.php';

$CLI_ID = $_GET['id'];
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

$sql = ("UPDATE tb_clientes SET nome_fantasia= :nome_fantasia, razao_social= :razao_social,
 tipo= :tipo,
 cgc= :cgc,
 cep= :cep,
 rua= :rua,
 numero= :numero,
 bairro= :bairro,
 cidade= :cidade,
 estado= :estado,
 pais= :pais where CLI_ID= :CLI_ID ");

$stmt = $conn->prepare($sql);
$stmt->bindParam(':CLI_ID', $CLI_ID);
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

header('location:../Detalhes/ClientesList.php');
