
<?php

include 'conexion.php';
$mysqli = new mysqli('localhost', 'root', '', 'scf');

        $cedula=$_POST['cedula'];
        $resultado = mysqli_query($mysqli,"SELECT * FROM jugadores WHERE cedula = $cedula");
        While($consulta = mysqli_fetch_assoc($resultado)){
          $ced=$consulta['cedula'];
            echo'  <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:9px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:9px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-ycr8{background-color:#ffffff;text-align:left;vertical-align:top}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-yofg{background-color:#9aff99;text-align:left;vertical-align:top}
.tg .tg-i81m{background-color:#ffffff;text-align:center;vertical-align:top}
.tg .tg-ozja{background-color:#ecf4ff;text-align:center;vertical-align:top}
.tg .tg-0qe0{background-color:#ecf4ff;text-align:left;vertical-align:top}
</style>
<table class="tg" style="undefined;table-layout: fixed; width: 403px">
<colgroup>
<col style="width: 140px">
<col style="width: 158px">
<col style="width: 25px">
<col style="width: 124px">
</colgroup>
  <tr>
    <th class="tg-i81m">Foto</th>
    <th class="tg-ozja" colspan="3"> CAMPEONATO DE FUTBOL</th>
  </tr>
  <tr>
    <td class="tg-baqh" rowspan="4"><img src="data:image/jpg;base64,';echo base64_encode($consulta['foto']),' 
    "  width="120" height="150"/></td>
    <td class="tg-0qe0">Cedula: </td>
    <td class="tg-yofg" colspan="2">'.$consulta['cedula'].'</td>
  </tr>
  <tr>
    <td class="tg-0qe0">Nombres:</td>
    <td class="tg-yofg" colspan="2">'.$consulta['nombres'].'</td>
  </tr>
  <tr>
    <td class="tg-0qe0">Apellidos:</td>
    <td class="tg-yofg" colspan="2">'.$consulta['apellidos'].'</td>
  </tr>
  <tr>
    <td class="tg-0qe0">Equipo:</td>
    <td class="tg-yofg" colspan="2">'.$consulta['equipo'].'</td>
  </tr>
  <tr>
    <td class="tg-baqh" rowspan="3"></td>
    <td class="tg-0qe0">Fecha de Nacimiento:</td>
    <td class="tg-yofg" colspan="2">'.$consulta['fechanac'].'</td>
  </tr>
  <tr>
    <td class="tg-ycr8" colspan="3" rowspan="3"><br><br>Firma del Jugador</td>
  </tr>
  <tr>
  </tr>
  <tr>
    <td class="tg-0qe0">Firma Director</td>
  </tr>
  
</table>

';
}
if(empty($ced)){
  echo "<script> alert('No existe');</script>";
  header('Location: Carnets.php');
}
        
?>



