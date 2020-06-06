<?php
require_once '../../../bd/conexao.php';
?>
<main>
  <?php
  // pega o ID da URL
  $pro_id = isset($_GET['id']) ? (int) $_GET['id'] : null;
  //Valida a variavel da URL
  if (empty($pro_id)) {
    echo "ID para alteração não definido";
    exit;
  }

  $sql = "SELECT * FROM tb_produtos 
  INNER JOIN tb_categorias ON tb_produtos.id_categoria = tb_categorias.cat_id 
  WHERE pro_id = '$pro_id'";
  $result = $conn->prepare($sql);
  $result->bindParam(':pro_id', $pro_id, PDO::PARAM_INT);
  $result->execute();

  $resultado = $result->fetch(PDO::FETCH_ASSOC);
  if (sizeof($resultado) <= 0) {
    echo "Nunhum dado encontrado";
    exit;
  }

  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin-Cadastro Produto</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script type="text/javascript" src="../../jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../jquery.mask.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function($) {
        $("#data").mask("99/99/9999");
        $("#preco").mask("R$ 999.999.999,99");
        $("#preco2").mask("R$ 999.999.999,99");
      });
    </script>


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
                    <a href="../Cadastros/CadastroProduto.php" class="nav-link active">
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
                    <a href="../Detalhes/ProdutosList.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listagem de Produtos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../Detalhes/ClientesList.php" class="nav-link">
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
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Cadastro de Produtos</h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">

                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Dados do Produto</h3>
                  </div>
                  <form action="../Editar/EditeProduto.php?id=<?= $pro_id ?>" method="POST">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Nome do produto:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                          </div>
                          <input value="<?php echo $resultado['pro_nome']; ?>" type="text" name="pro_nome" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Codigo do produto:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                          </div>
                          <input value="<?php echo $resultado['pro_codigo_produto']; ?>" type="text" name="pro_codigo_produto" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Preco de Compra do produto:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                          </div>
                          <input value="<?php echo $resultado['pro_preco_compra']; ?>" id="preco" type="text" name="pro_preco_compra" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Preco de Venda do produto:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                          </div>
                          <input value="<?php echo $resultado['pro_preco_venda']; ?>" id="preco2" type="text" name="pro_preco_venda" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Categoria do produto:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                          </div>
                          <select value="<?php echo $resultado['id_categoria']; ?>" name="id_categoria" class="form-control" data-inputmask="'alias': 'ip'" data-mask required>
                            <?php
                            include '../../../bd/conexao.php';
                            $sql = "SELECT * FROM tb_categorias";
                            foreach ($conn->query($sql) as $registro) {
                              $cat_id = $registro['cat_id'];
                              $nome = $registro['nome_cat'];
                              echo "<option value='" . $cat_id . "'>" . $nome . "</option>";
                            }
                            ?>

                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Data Compra:</label>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input value="<?php echo $resultado['pro_data_compra']; ?>" id="data" name="pro_data_compra" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                          </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                          </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
      </section>
    </div>
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