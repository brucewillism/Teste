<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin-Cadastro Clientes</title>

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
                  <a href="../../pages/Cadastros/CadastroProduto.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cadastro de Produtos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/Cadastros/CadastroCliente.php" class="nav-link active ">
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
              <h1 class="m-0 text-dark">Cadastro de Clientes</h1>
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
                  <h3 class="card-title">Dados do Cliente</h3>
                </div>
                <form action="../Adicionar/AddClientes.php" method="POST">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nome do Cliente:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                        </div>
                        <input name="nome_fantasia" type="text" placeholder="Digite o Nome Fantasia do Cliente">

                      </div>
                    </div>
                    <div class="form-group">
                      <label>Razão Social:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                        </div>
                        <input name="razao_social" type="text" placeholder="Digite a Razão Social">

                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tipo:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                        </div>
                        <input name="tipo" type="text" placeholder="Tipo do Cliente PF ou PJ">

                      </div>
                    </div>
                    <div class="form-group">
                      <label>Cgc:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                        </div>
                        <input name="cgc" type="text" min="11" max="14" placeholder="Digite o cgc do Cliente (11 digitos pra cpf e 14 para cnpj">

                      </div>
                    </div>
                    <div class="form-group">
                      <label>Cep:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                        </div>
                        <input name="cep" type="text" placeholder="Digite o Cep do Cliente">

                      </div>
                    </div>
                    <div class="form-group">
                      <label>Rua:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                        </div>
                        <input name="rua" type="text" placeholder="Digite o Rua do Cliente">

                      </div>
                    </div>
                    <div class="form-group">
                      <label>Bairro:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                        </div>
                        <input name="bairro" type="text" placeholder="Digite o bairro do Cliente">

                      </div>
                    </div>
                    <div class="form-group">
                      <label>Cidade:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                        </div>
                        <input name="cidade" type="text" placeholder="Digite a cidade do Cliente">

                      </div>
                    </div>
                    <div class="form-group">
                      <label>Numero:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                        </div>
                        <input name="numero" type="text" placeholder="Digite o numero">

                      </div>
                    </div>
                    <div class="form-group">
                      <label>Estado:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                        </div>
                        <input name="estado" type="text" placeholder="Digite o Estado do Cliente">

                      </div>
                    </div>
                    <div class="form-group">
                      <label>Pais:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                        </div>
                        <input name="pais" type="text" placeholder="Digite o Pais do Cliente">

                      </div>
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