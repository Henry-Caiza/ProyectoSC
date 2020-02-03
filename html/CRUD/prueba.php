<?php
include_once 'conexion.php';

$mysqli = new mysqli('localhost', 'root', '', 'scf');
        $fechaFin = $mysqli -> query ("SELECT horario FROM calendario where fechaJuego = '2020-01-23'");
       while($filas=mysqli_fetch_assoc($fechaFin)){
         //  echo $filas['fechaFin'];
           $horario=$filas['horario'];
       }
       $hora_inicial = '07:00';
		  $hora_final = '16:00';
        echo $hora_final;
        echo $horario;
?>