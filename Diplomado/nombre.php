<?php
//error_reporting(0);
include('../coni/Localhost.php');
$nombrepaciente=$_POST['usuario'];
$apellidos_paciente=$_POST['apellidos_paciente'];

if(!empty($nombrepaciente) and !empty($apellidos_paciente)) {
  $result123 = mysqli_query($mysqliL, "SELECT * FROM paciente WHERE nombre_paciente='$nombrepaciente' and apellidos_paciente='$apellidos_paciente' ");
  $total=$result123->num_rows;
  if($total>0) {
      echo "<span class='estado-no-disponible-email'> Paciente No Disponible</span>";
  }else{
      echo "<span class='estado-disponible-email'> Paciente Disponible.</span>";
  }
}

?>
