<!DOCTYPE html>
<!--
Template Name: Interlingua
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html lang="">
<head>
<link rel="icon" type="image/png" sizes="16x16" href="../images/demo/logo.png">
<title>Equipos</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<!-- animation CSS -->
<link href="../html/css/animate.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="../html/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="../html/css/colors/default.css" id="theme" rel="stylesheet">

    <link href="../html/CRUD/css/tabla.css" id="theme" rel="stylesheet">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul>
        <li><i class="fa fa-phone"></i> +593 939525732</li>
        <li><i class="fa fa-envelope-o"></i> sistemacs@gmail.com</li>
      </ul>
    </div>
    <div class="fl_right">
      <ul>
        <li><a href="../index.html"><i class="fa fa-lg fa-home"></i></a></li>
        <li><a href="../loginsis.html">Login</a></li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1>SISTEMA DE CAMPEONATOS DE FUTBOL</h1>
      <div class="one_half"><img src="../images/demo/logo2.jpg" alt=""></div> 
    
    </div>
  <div id="quickinfo" class="fl_right">
    <ul class="nospace inline">
      <li><strong>Telefono:</strong><br>
        09393525732</li>
      <li><strong>Correo:</strong><br>
        siscf@gmail.com</li>
    </ul>
  </div>
    <!-- ################################################################################################ -->
  </header>
  <nav id="mainav" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="clear">
        <li><a href="../index.html">Inicio</a></li>
        <li><a class="drop" href="#">Campeonato</a>
          <ul>
            <li ><a href="../pages/calendario.php">Calendario</a></li>
            <li><a href="./resultados.php">Resultados</a></li>
          </ul>
        </li>
        <li class="active"><a href="equipos.php">Equipos</a></li>
     

        <li><a href="./jugadores.php">Jugadores</a></li>
        <li><a class="drop" href="#">Tablas</a>
          <ul>
            <li><a href="./posiciones.php">Posiciones</a></li>
            <li><a href="#">Goleadores</a></li>
          </ul>
        </li>
    
      </ul>
    <!-- ################################################################################################ -->
  </nav>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('../images/demo/pc.jpg');">
  <section id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul>
      <li><a href="#">Inicio</a></li>
      <li><a href="#">Equipos</a></li>
    </ul>
    <!-- ################################################################################################ -->

    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
      <div id="gallery">
        <figure>
          <header class="heading">Equipos del Campeonato de Fútbol </header>
          <ul class="nospace clear">
            
          </ul>
        </figure>
      </div>
      <!-- lugar para programar los equipos -->
      <!-- ################################################################################################ -->

      <?php
        include 'conexion.php';
        $resultado=mysqli_query($conn,"SELECT * FROM  equipo ");
      ?> 
      <div class="contenedor">
          <table> 
            <tr class="head">
              <td><font size = "3">  Id</font> </td>
              <td><font size = "3">  Escudo</font> </td>
              <td><font size = "3">  Nombre Club</font> </td>
              <td><font size = "3">  Presidente</font> </td>	
              <td><font size = "3">  Localidad</font> </td>		
              <td><font size = "3">  Teléfono</font> </td>	
              <td><font size = "3">  Email</font> </td>	
              <td><font size = "3">  Nº jugadores</font> </td>	
			      </tr>

			
			<?php while($filas=mysqli_fetch_assoc($resultado)) {
      ?>
				<tr >
				 <td><?php echo $filas['id'] ?></td>
                 <td><img src="data:image/jpg;base64,<?php echo base64_encode($filas['escudo']);?> " width="10"
                  height="10"/></td>
                  <td><?php echo $filas['nombreClub'] ?></td>
                  <td><?php echo $filas['nombrePresi'] ?></td>
                  <td><?php echo $filas['localidad'] ?></td>
                  <td><?php echo $filas['telefono'] ?></td>
                  <td><?php echo $filas['email'] ?></td>
                  <td><?php echo $filas['numMaxjug'] ?></td>
          </tr>
          <?php } ?>

		    </table>
      </div>
                        
  </div>

                    
                </div>
            </div>
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4 bgded overlay" style="background-image:url('../images/demo/fondocontactos.jpg');">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h6 class="heading">REDES SOCIALES</h6>
      <figure><a href="https://www.twitter.com"></a><img class="borderedbox inspace-10 btmspace-15" src="../images/demo/tw1.png" alt="">TWITTER</a>
        <figure><a href="https://www.instagram.com"><img class="borderedbox inspace-10 btmspace-15" src="../images/demo/ins.png" alt="">INSTAGRAM</a>
          <figure><a href="https://www.facebook.com"><img class="borderedbox inspace-10 btmspace-15" src="../images/demo/fac1.png" alt="">FACEBOOK</a>
    </div>
    <div class="one_third">
      <h6 class="heading">INSTITUCIÓN</h6>
      <figure><a href="#"><img class="borderedbox inspace-10 btmspace-15" src="../images/demo/desarrollosocial.jpg" alt=""></a>
        <figcaption>
          <h6 class="nospace font-x1"><a href="#">Dirección</a></h6>
          <li><i class="fa fa-dir"></i> Barrio San Martín, Calles Bolívar Chiriboga y Heriberto Merino (Esquina)</li>
    
        </figcaption>
      </figure>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2020 - All Rights Reserved - <a href="#">FIE - SOFTWARE</a></p>
    <p class="fl_right">Desarrollado por: <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">ESPOCH</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>