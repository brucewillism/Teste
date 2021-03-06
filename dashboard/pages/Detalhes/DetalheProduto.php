<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Admin-Detalhe do Produto</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../../dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="../../index.php" class="nav-link">Home</a>
				</li>
			</ul>

			<!-- SEARCH FORM -->
			<form class="form-inline ml-3">
				<div class="input-group input-group-sm">
					<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-navbar" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</form>

			<?php
			require_once '../../../bd/conexao.php';
			$llogin = $_SESSION['nome'];
			echo "<a class='nav-link' href='../../../logout.php'><i class='fa fa-window-close' aria-hidden='true'></i>Sair</i></a>
              ";
			?>
			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Messages Dropdown Menu -->
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="../../index.php" class="brand-link">
				<img src="../../dist/img/AdminLogo.png" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Admin</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="../../dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<?php
						require_once '../../../bd/conexao.php';
						$llogin = $_SESSION['nome'];
						echo "<a href='#' class='d-block'>$llogin</a>";
						?>

					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item has-treeview menu-open">
							<a href="#" class="nav-link active">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Cadastro
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="../Cadastros/CadastroProduto.php" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Cadastro de Produtos</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="../Cadastros/CadastroCliente.php" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Cadastro de Clientes</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="ProdutosList.php" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Listagem de Produtos</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="ClientesList.php" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Listagem de Clientes</p>
									</a>
								</li>
							</ul>
						</li>

					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<?php
			require_once '../../../bd/conexao.php';
			$usuario_id = $_SESSION['id'];
			$stmt = $conn->query("SELECT *
				FROM tb_produtos
				INNER JOIN tb_categorias ON tb_produtos.id_categoria = tb_categorias.cat_id 
				where tb_produtos.usuario_id = '$usuario_id'");

			$produtos = $stmt->fetchAll();
			foreach ($produtos as $dados) {

				$pro_id = $dados['pro_id'];
				$pro_preco_compra = $dados['pro_preco_compra'];
				$pro_preco_venda = $dados['pro_preco_venda'];
				$pro_data_compra = $dados['pro_data_compra'];
				$pro_codigo_produto = $dados['pro_codigo_produto'];
				$nome_cat = $dados['nome_cat'];
				$pro_nome = $dados['pro_nome'];
			?>

				<section class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Detalhes do Produto <?php echo $pro_nome; ?></h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
									<li class="breadcrumb-item active">Detalhes do Produto</li>
								</ol>
							</div>
						</div>
					</div><!-- /.container-fluid -->
				</section>

				<!-- Main content -->
				<section class="content">

					<!-- Default box -->
					<div class="card card-solid">
						<div class="card-body">
							<div class="row">
								<div class="col-12 col-sm-6">
									<h3 class="d-inline-block d-sm-none"><?php echo $pro_nome; ?></h3>
								</div>
								<div class="col-12 col-sm-6">
									<h3 class="my-3"><?php echo $pro_nome; ?></h3>
									<hr>

									<div class="bg-gray py-2 px-3 mt-4">
										Preço de Compra:
										<h2 class="mb-0">
											R$<?php echo $pro_preco_compra; ?>
										</h2>
										Preço de Venda:
										<h4 class="mt-0">
											<small> R$<?php echo $pro_preco_venda; ?> </small>
										</h4>
										Codigo do produto:
										<h4 class="mt-0">
											<small><?php echo $pro_codigo_produto; ?> </small>
										</h4>
										Categoria do produto:
										<h4 class="mt-0">
											<small><?php echo $nome_cat; ?> </small>
										</h4>
										Data da Compra:
										<h4 class="mt-0">
											<small><?php echo $pro_data_compra; ?> </small>
										</h4>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				<?php
			}
				?>
				</section>
				<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<aside class="control-sidebar control-sidebar-dark">
		</aside>
		<footer class="main-footer">
			<strong>Teste &copy; 2020 <a href="http://adminlte.io">Admin</a>.</strong>
		</footer>
	</div>
	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="../../plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="../../dist/js/adminlte.js"></script>

	<!-- OPTIONAL SCRIPTS -->
	<script src="../../dist/js/demo.js"></script>

	<!-- PAGE PLUGINS -->
	<!-- jQuery Mapael -->
	<script src="../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
	<script src="../../plugins/raphael/raphael.min.js"></script>
	<script src="../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
	<script src="../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
	<!-- ChartJS -->
	<script src="../../plugins/chart.js/Chart.min.js"></script>

	<!-- PAGE SCRIPTS -->
	<script src="../../dist/js/pages/dashboard2.js"></script>
</body>

</html>