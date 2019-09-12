<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  include('../coni/Localhost.php');
  date_default_timezone_set('America/Mexico_City');
  $hoys = date("Y-m-d H:i:s");
$password=md5($_GET['password']);
  $id = $_SESSION['id_usuario'];
$email=$_GET['email'];
$patologo=$_GET['patologo'];
$idusuariopato=$_GET['idusuariopato'];


if (!empty($password) && !empty($email) && !empty($patologo)) {

  $result123 = mysqli_query($mysqliL, "SELECT apellidos_usuario,rol,id_usuario,nick,nombre_usuario,activo,correo_general, contra
    FROM usu_me WHERE correo_general = '$email' and contra='$password' and id_usuario='$patologo'");


  $rowwe = mysqli_fetch_assoc($result123);
  $activo = $rowwe['activo'];
  $correo_general = $rowwe['correo_general'];
  $contra = $rowwe['contra'];
  $id_usuario = $rowwe['id_usuario'];
  $nombre_usuario = $rowwe['nombre_usuario'];
  $rol = $rowwe['rol'];
  $total = $result123->num_rows;
  if ($total == 0) {
    header('Location: accesos.php?error=1');
  } else {

    for ($y = 0; $y < count($idusuariopato); $y++) {
      $idusuariopatos = $idusuariopato[$y];

      $sql11 = "INSERT INTO bitacora_ingreso
          (id_u,fecha_ingreso,id_atencion,accion,id_asignacion)
          VALUES
          ('$id','$hoys','$idusuariopatos','se autorizo entrega de muestras','$patologo')";
      $resultaq = $mysqliL->query($sql11);


      $Modifi = "UPDATE ctrl_paciente_estudios
      SET id_usu_pat='1'
      WHERE id_estudio='$idusuariopatos'";

      $Mo= $mysqliL->query($Modifi);
    }


header("Location:consulta_estudios.php");

}










} else{

  header('Location: accesos.php?error=3');
}
}
else {
    header('Location: accesos.php');

    exit;
}






 ?>
