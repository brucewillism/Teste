<?php
require_once '../../../bd/conexao.php';

$usuario_id = $_SESSION['id'];
$pro_id = $_GET['id'];


$pro_nome = addslashes($_POST['pro_nome']);
$pro_codigo_produto = addslashes($_POST['pro_codigo_produto']);
$pro_preco_compra = addslashes($_POST['pro_preco_compra']);
$pro_preco_venda = addslashes($_POST['pro_preco_venda']);
$pro_data_compra = addslashes($_POST['pro_data_compra']);
$id_categoria = addslashes($_POST['id_categoria']);

$sql = ("UPDATE tb_produtos
  SET pro_codigo_produto = :pro_codigo_produto, pro_nome = :pro_nome, pro_data_compra = :pro_data_compra, pro_preco_compra = :pro_preco_compra, pro_preco_venda = :pro_preco_venda, 
  id_categoria = :id_categoria, pro_id = :pro_id");

$stmt = $conn->prepare($sql);

$stmt->bindParam(':pro_id', $pro_id);
$stmt->bindParam(':pro_nome', $pro_nome);
$stmt->bindParam(':pro_codigo_produto', $pro_codigo_produto);
$stmt->bindParam(':pro_data_compra', $pro_data_compra);
$stmt->bindParam(':pro_preco_compra', $pro_preco_compra);
$stmt->bindParam(':pro_preco_venda', $pro_preco_venda);
$stmt->bindParam(':id_categoria', $id_categoria);

$result = $stmt->execute();
if (!$result) {
  var_dump($stmt->errorInfo());
  exit;
}

header('location:../Detalhes/ProdutosList.php');
