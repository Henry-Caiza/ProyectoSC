<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/demo/logo.png">
    <title>Registrar Equipos</title>
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
                        <a href="registrarequipo.php" class="waves-effect"><i class="fa fa-shield fa-fw"
                                aria-hidden="true"></i>Resultados</a>
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
                                aria-hidden="true"></i>Tablas</a>
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
                            <li class="active">Registrar Equipos</li>
                        </ol>

                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <!-- ############################################## DATOS DEL REGISTRO ################################### -->
                            
                                
                            <!-- ############################################## DATOS DEL REGISTRO ################################### -->
                            <h3 class="box-title">Registro de Equipos</h3>
                            <?php
                            include 'conexion.php';
                            

                            $resultado=mysqli_query($conn,"SELECT * FROM  equipo ");
                            ?>
                             <div class="contenedor">
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar nombre del club" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="CRUD/insert_equipos.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table> 
			<tr class="head">
			<td><font size = "2">  Id</font> </td>
            <td><font size = "2">  Nombre Club</font> </td>
            <td><font size = "2">  Nombre del Presidente</font> </td>	
            <td><font size = "2">  Localidad</font> </td>		
            <td><font size = "2">  Teléfono</font> </td>	
            <td><font size = "2">  Email</font> </td>	
            <td><font size = "2">  Número Máximo de jugadores</font> </td>	
			<td colspan="2" >Acción  </td>
			
			</tr>

			
			<?php while($filas=mysqli_fetch_assoc($resultado)) {
                                        ?>
				<tr >
				 <td><?php echo $filas['id'] ?></td>
                  <td><?php echo $filas['nombreClub'] ?></td>
                  <td><?php echo $filas['nombrePresi'] ?></td>
                  <td><?php echo $filas['localidad'] ?></td>
                  <td><?php echo $filas['telefono'] ?></td>
				  <td><?php echo $filas['email'] ?></td>
				  <td><?php echo $filas['numMaxjug'] ?></td>

					<td><a href="update.php?id= <?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
				<?php } ?>

		</table>
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
</body>

</html>