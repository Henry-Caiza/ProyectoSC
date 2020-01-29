<?php
function getPlantilla(){
   $plantilla='
   <!DOCTYPE html>
       <html lang="en">
       <head>
           <meta charset="UTF-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <meta http-equiv="X-UA-Compatible" content="ie=edge">
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
           <title></title>
           <link rel="stylesheet" href="stylecarnet.css">
           <!-- Add icon library -->
       </head>
       <body>
      
       <div id="General">
       <div id="Datos"> 
       <p>CAMPEONATO DE FUTBOL</p>
       <p>Cedula:_______________</p>
       <p>Nombre:_______________</p>
       <p>Apellido:_______________</p>
       <p>Equipo:_______________</p>
       <p>Fecha de Nac:_______________</p><br>
       <p>Firma:_______________</p>
       </div>
       <div id="Foto"><img src="../img/jugador1.jpg" width="110"
       height="110"></div><br><br><br><br><br><br><br>
       <p>Firm Dir:___________</p>
       </div>
       </body>
       </html> ';
       

return $plantilla;
}
