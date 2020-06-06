<?php
require_once 'bd/conexao.php';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Autenticação</title>
	<script type="text/javascript">
		function loginsucess() {
			window.location = 'dashboard/index.php';
		}

		function loginfailed() {
			alert('Login e/ou senha incorretos');
			window.location = 'Login/index.html';
		}
	</script>
</head>

<body>
	<?php

	$user = addslashes($_POST['user']);
	$pw = md5(addslashes($_POST['pw']));
	// Usuário não forneceu a pw ou o user 
	if (!$user || !$pw) {
		echo "Você deve digitar sua senha e login!";
		exit;
	}
	$sql = ("SELECT *
	FROM tb_usuarios 
	WHERE
	ds_login='$user' 
	AND ds_senha='$pw'");
	$res = $conn->query($sql);
	foreach ($res as $dados) {
		$nome = $dados['ds_nome'];
		$result = $res->fetch(PDO::FETCH_ASSOC);
		// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão 

		if ($res) {
			if ($dados['ds_login'] == $user && $dados['ds_senha'] == $pw) {

				// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário 
				$_SESSION['user'] = $user;
				$_SESSION['password'] = $pw;
				$_SESSION['logado'] = true;
				$_SESSION['nome'] = $dados['ds_nome'];
				$_SESSION['id'] = $dados['id_usuario'];

				if ($_SESSION['logado'] == true) {

					echo "<script>loginsucess()</script>";
				}
			} else {

				echo "<script>loginfailed()</script>";
			}
		}
	}
	?>

</body>

</html>