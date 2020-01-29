<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/demo/logo.png">
    <title>Registrar Resultados</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Tabla CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">

    <link href="./CRUD/css/tabla.css" id="theme" rel="stylesheet">
    
 
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
        </nav>
        
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
                                aria-hidden="true"></i>Personal</a>
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
                        <a href="registrar_resultados.php" class="waves-effect"><i class="fa fa-shield fa-fw"
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
                            <li class="active">Registrar Resultados</li>
                        </ol>

                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <!-- ############################################## DATOS DEL REGISTRO ################################### -->
                            <h3 class="box-title">  Resultados</h3>
                            <?php
                            include 'conexion.php';
                            $resultado=mysqli_query($conn,"SELECT * FROM  tablaresultadoscopia ");
                          //  $resultado2=mysqli_query($conn,"SELECT * FROM  calendario ");
                            ?>
                            <div align="center"><img src="../img/9.png"  width="200" height="200"></div>
                             <div class="contenedor">
                             <div class="barra__buscador"> 
			    <form action="" class="formulario" method="post">
                    <a href="buscar_equipo.php" class="btn btn__buscar">Buscar</a>
                    
			   </form>
	    	</div>
        <table> 
			<tr class="head">
            <td><font size = "2">  Id</font> </td>
			<td><font size = "2">  FechaJuego</font> </td> 
            <td><font size = "2">  Horario</font> </td>
            <td><font size = "2">  Código partido</font> </td>	
            <td><font size = "2">  Equipo</font> </td>	
            <td><font size = "2">  Goles</font> </td>
			<td><font size = "2">  Tarjetas Amarillas</font> </td>	
            <td><font size = "2">  Tarjetas Rojas</font> </td>
            <td><font size = "2">  Equipo</font> </td>	
            <td><font size = "2">  Goles</font> </td>
            <td><font size = "2">  Tarjetas Amarrillas</font> </td>	
            <td><font size = "2">  Tarjetas Rojas</font> </td>	
			<td colspan="2" >Acción  </td>
			</tr>

			<?php while($filas=mysqli_fetch_assoc($resultado)) {
                /*  $mysqli = new mysqli('localhost', 'root', '', 'scf');
                  $query= $mysqli -> query("INSERT INTO tablaresultados(equipo1, equipo2, idcalendario, fechaJuego, horario)
                  SELECT calendario.equipo1, calendario.equipo2, calendario.id, calendario.fechaJuego, calendario.horario FROM calendario 
                  ");
                                    */    ?>
				<tr >
                  <td><?php echo $filas['id'] ?></td>
                  <td><?php echo $filas['fechaJuego'] ?></td>
                  <td><?php echo $filas['horario'] ?></td>
				  <td><?php echo $filas['id'] ?></td>
                  <td><?php echo $filas['equipo1'] ?></td>
                  <td><?php echo $filas['goles_equipo1'] ?></td>
				  <td><?php echo $filas['tarj_ama_eq1'] ?></td>
                  <td><?php echo $filas['tarj_roj_eq1'] ?></td>
                  <td><?php echo $filas['equipo2'] ?></td>
				  <td><?php echo $filas['goles_equipo2'] ?></td>
                  <td><?php echo $filas['tarj_ama_eq2'] ?></td>
                  <td><?php echo $filas['tarj_roj_eq2'] ?></td>
				  <td><a href='CRUD/update_resultados.php?id= <?php echo $filas['id']; ?>'  class="btn__update" >Editar</a></td>
				  <td><a href='CRUD/delete_jugadores.php?id= <?php echo $filas['id']; ?>' class="btn__delete" onclick=" return preguntar()">Eliminar</a></td>
                </tr>
				<?php } ?>
                
                </table>
        
      
		
	</div>
</body>
                            <!-- ############################################## DATOS DEL REGISTRO ################################### -->
                        </div>
                    </div>

                    
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; CopyRigth SOFTWARE </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
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
    <script type = "text/javascript" >
function preguntar(){
    if(confirm('Estas seguro de que deeas eliminar?')){
     //   windows.location.href="registrarequipo.php";
      return true;
    }
    else {
    return false;
    }
}
</script>
</body>

</html>
