<?php

session_start();
include('verificar_login.php');

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Siga Cegonheiro
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="css/estilo.css" rel="stylesheet" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="caminhao">
            <img src="assets/img/caminhao.png">
          </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Siga Cegonheiro
          <div class="logo-image-big">
            <img src="assets/img/caminhao.png">
          </div> 
        </a>


        <div class="wrapper">
          <main class="container destaque">

            <div id="lateral">
              <div id="menu">

                <h3 class="link-titulo">Departamento Administrativo</h3>
                <ul class="box">
                  <li><a href="cadastrar_empresas.php">Cadastrar Empresas</a></li>
                  <li><a href="cadastrar_usuarios.php">Cadastrar Usuários</a></li>
                  <li><a href="cadastrar_clientes.php">Cadastrar Clientes</a></li>
                  <li><a href="cadastrar_fornecedores.php">Cadastrar Fornecedores</a></li>

                </ul>

                <h3 class="link-titulo">Departamento Operacional</h3>
                <ul class="box">
                  <li><a href="cadastrar_caminhoes.php">Cadastrar Caminhões</a></li>
                  <li><a href="cadastrar_carretas.php">Cadastrar Carretas</a></li>
                  <li><a href="cadastrar_frotas.php">Cadastrar Frotas</a></li>
                  <li><a href="cadastrar_destinos.php">Cadastrar Destinos</a></li>
                  <li><a href="cadastrar_veiculos.php">Cadastrar Veículos de Pequeno Porte</a></li>
                  <li><a href="lancar_manutencoes_em_caminhoes.php">Lançar manutenções em CAMINHÕES</a></li>
                  <!-- mais links -->
                </ul>

                <h3 class="link-titulo">Departamento Pessoal</h3>
                <ul class="box">
                  <li><a href="cadastrar_funcionarios.php">Cadastrar Funcionários</a></li>
                  <li><a href="lancar_movimento_pessoal.php">Lançar movimento pessoal</a></li>
                  <!-- mais links -->
                </ul>


                <h3 class="link-titulo">Departamento Financeiro</h3>
                <ul class="box">
                  <li><a href="cadastrar_plano_de_contas.php">Plano de Contas</a></li>
                  <li><a href="cadastrar_documentos.php">Cadastrar tipos de Documentos</a></li>
                  <!-- mais links -->
                </ul>


                <!-- mais seções -->

              </div> <!-- /#menu -->
            </div id="link"> <!-- vazio -->
            <div>
            </div> <!-- /#lateral -->



        </div>



      </div>
      <div class="sidebar-wrapper">

      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo"></a>
          </div>

          <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">

              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION['nome_usuario']; ?>
                  <i class="nc-icon nc-bell-55"></i>
                  <p>

                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Sair</a>

                </div>
              </li>

            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>


</div> -->
      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Saldo em Bancos</p>
                      <p class="card-title">150GB
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i> Atualizar Agora
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Quinzena Atual</p>
                      <p class="card-title">$ 1,345
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar-o"></i> Por Data
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-vector text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Caixa</p>
                      <p class="card-title">23
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i> In the last hour
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-favourite-28 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Despesas</p>
                      <p class="card-title">+45K
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i> Atualizar Agora
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="credits ml-auto">
          <span class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script>. Sistema de Gestão Administrativa e Financeira. </i>
            Osmar Saraiva Junior </span>
        </div>
      </div>
    </div>
    </footer>
  </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>