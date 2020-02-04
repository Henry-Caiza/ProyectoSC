<?php
include_once 'conexion.php';

$mysqli = new mysqli('localhost', 'root', '', 'scf');
       // $resultado = $mysqli -> query ("SELECT * FROM campeonato WHERE nombre = 'aa'");
      // echo $resultado;
         $resultado = mysqli_query($mysqli,"SELECT * FROM personal WHERE cedula = 1715405579");
      /* if(is_null($resultado)){
        echo "aaaaaaaaaaaaa";
       }*/
      // else
          //echo $filas['nombre'];
       while($filas=mysqli_fetch_assoc($resultado)){
          $nombre= $filas['cedula'];
         /* if(empty($filas['nombre'])){
            echo "aaaaaaaaaaaaa";
          }
          else
          echo $filas['nombre'];*/
         //  $horario=$filas['horario'];
       }
       if(empty($nombre)){
        echo "aaaaaaaaaaaaa";
      }
      else {
        echo $nombre;
      }
       /*$hora_inicial = '07:00';
		  $hora_final = '16:00';
        echo $hora_final;
        echo $horario;*/
?>