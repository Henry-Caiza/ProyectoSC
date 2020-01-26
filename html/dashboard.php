<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/demo/logo.png">
    <title>Panel Administrativo</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="dashboard.php">
                        <!-- Logo icon image, you can use font-icon also --><b>

                            <!--This is dark logo icon--><img src="../plugins/images/logoAdmin2.png" alt="home"
                                class="dark-logo" />
                            <!--This is light logo icon--><img src="../plugins/images/logoAdmin2.png" alt="home"
                                class="light-logo" />
                        </b>
                        </a>                
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg"
                            href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>
                    <li><a href="../index.html">Cerrar Sesion</a></li>  
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span
                            class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="dashboard.php" class="waves-effect"><i class="fa fa-clock-o fa-fw"
                                aria-hidden="true"></i>Inicio</a>
                    <li>
                        <a href="registrar_campeonato.php" class="waves-effect"><i class="fa fa-shield fa-fw"
                                aria-hidden="true"></i>Campeonato</a>
                    </li>

                    <li>
                        <a href="Registro_Personal.php" class="waves-effect"><i class="fa fa-user fa-fw"
                                aria-hidden="true"></i>Personal Arbitrario</a>
                    </li>
                    
                    <li>
                        <a href="registrarequipo.php" class="waves-effect"><i class="fa fa-shield fa-fw"
                                aria-hidden="true"></i>Equipos</a>
                    </li>
                    <li>
                        <a href="registrar_jugadores.php" class="waves-effect"><i class="fa fa-users fa-fw"
                                aria-hidden="true"></i>Jugadores</a>
                    </li>
                    <li>
                        <a href="Registrar_calendario.php" class="waves-effect"><i class="fa fa-columns fa-fw"
                                aria-hidden="true"></i>Calendario</a>
                    </li>
                    <li>
                        <a href="tablas.php" class="waves-effect"><i class="fa fa-table fa-fw"
                                aria-hidden="true"></i>Tabla de Posiciones</a>
                    </li>

                    <li>
                        <a href="registrarequipo.php" class="waves-effect"><i class="fa fa-shield fa-fw"
                                aria-hidden="true"></i>Resultados</a>
                    </li>
                    
                    <li>
                        <a href="transferencias.php" class="waves-effect"><i class="fa  fa-retweet fa-fw"
                     aria-hidden="true"></i>Transferencias</a>
                    </li>
                    <li>
                        <a href="Reportes.php" class="waves-effect"><i class="fa fa-file-text-o fa-fw"
                                aria-hidden="true"></i>Reportes</a>
                    </li>
                    <li>
                        <a href="Carnets.php" class="waves-effect"><i class="fa fa-credit-card fa-fw"
                                aria-hidden="true"></i>Carnets</a>
                    </li>
                   
                </ul>
                
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">SISTEMA DE CAMPEONATO DE FÚTBOL</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
                        <ol class="breadcrumb">
                            <li><a href="#">Inicio</a></li>
                        
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">SISTEMA DE CAMPEONATO DE FUTBOL</h3>
                            <p class="text-muted"></p>
                            <div class="table-responsive">
                                <font size = "20">BIENVENIDO</font> 
                                <img src="../img/ac198c217df0bbc58195e48afd92de5e-jugador-de-futbol-tiro-pelota-by-vexels.png">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; CopyRigth SOFTWARE </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>