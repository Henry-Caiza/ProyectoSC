<?php
include_once 'conexion.php';

$mysqli = new mysqli('localhost', 'root', '', 'scf');
        $fechaFin = $mysqli -> query ("SELECT fechaFin FROM campeonato where nombre = 'Sub20'");
       while($filas=mysqli_fetch_assoc($fechaFin)){
         //  echo $filas['fechaFin'];
           $fe=$filas['fechaFin'];
       }
        echo $fe;?>