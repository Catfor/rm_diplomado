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
$paps=$_GET['paps'];
$vulva=$_GET['vulva'];
$vagi=$_GET['vagi'];
$cervix=$_GET['cervix'];
$endo=$_GET['endo'];


if (isset($paps)){
  /*
  for ($y = 0; $y < count($paps); $y++) {
    $paps1 = $paps[$y];

    $queryPapanicolaou = "SELECT c.id_paciente AS paciente ,c.id_estudio AS estudio,c.id_tipo_estudio AS tipo_estudio
     FROM estudio_papanicolau e
    INNER JOIN ctrl_paciente_estudios c ON
    e.id_estudio = c.id_estudio 	AND c.id_tipo_estudio = 7 	AND c.id_atencion =  $paps1; ";
                                                 $resultSetPapanicolaou = $mysqliL->query($queryPapanicolaou) ;
                                                     while ($resultSet = $resultSetPapanicolaou->fetch_assoc()) {
                                                         $pacientepa = $resultSet['paciente'];
                                                         $estudiopa = $resultSet['estudio'];
                                                         $tipo_estudiopa = $resultSet['tipo_estudio'];

                                                             echo $estudiopa."<br>";

                                                                 $sql11 = "INSERT INTO bitacora_ingreso
                                                                     (id_u,fecha_ingreso,id_atencion,accion,id_asignacion,id_tipo_estudio,id_estudio,paciente)
                                                                     VALUES
                                                                     ('$id','$hoys','$paps1','se autorizo entrega de muestras de papanicolau','$patologo','7','$estudiopa','$pacientepa')";

                                                            //     $resultaq = $mysqliL->query($sql11);


                                                                     $Modifi = "UPDATE ctrl_paciente_estudios
                                                                     SET id_usu_pat='$patologo'
                                                                     WHERE id_paciente='$pacientepa' and id_estudio='$estudiopa' and id_tipo_estudio='7' and id_atencion='$paps1'";

                                                                    //$Mo= $mysqliL->query($Modifi);


                                                       }






  }*/
}
if (isset($vulva)){
  /*
  for ($y = 0; $y < count($vulva); $y++) {
    $vulva1 = $vulva[$y];
    echo $vulva1.'<br>';

    $queryestudio_vulvoscopia = "SELECT c.id_paciente AS paciente ,c.id_estudio AS estudio,c.id_tipo_estudio AS tipo_estudio
     FROM estudio_vulvoscopia e
    INNER JOIN ctrl_paciente_estudios c ON
    e.id_estudio = c.id_estudio 	AND c.id_tipo_estudio = 6	AND c.id_atencion =  $vulva1; ";
                                                 $resultestudio_vulvoscopia= $mysqliL->query($queryestudio_vulvoscopia) ;
                                                     while ($resultSetestudio_vulvoscopia = $resultestudio_vulvoscopia->fetch_assoc()) {
                                                         $pacientevul = $resultSetestudio_vulvoscopia['paciente'];
                                                         $estudiovul = $resultSetestudio_vulvoscopia['estudio'];
                                                         $tipo_estudiovul = $resultSetestudio_vulvoscopia['tipo_estudio'];



                                                                 $sql11 = "INSERT INTO bitacora_ingreso
                                                                     (id_u,fecha_ingreso,id_atencion,accion,id_asignacion,id_tipo_estudio,id_estudio,paciente)
                                                                     VALUES
                                                                     ('$id','$hoys','$vulva1','se autorizo entrega de muestras de vulvoscopia','$patologo','6','$estudiovul','$pacientevul')";

                                                            //     $resultaq = $mysqliL->query($sql11);


                                                                     $Modifi = "UPDATE ctrl_paciente_estudios
                                                                     SET id_usu_pat='$patologo'
                                                                     WHERE id_paciente='$pacientevul' and id_estudio='$estudiovul' and id_tipo_estudio='6' and id_atencion='$vulva1'";
echo $Modifi."<br>";
                                                                    //$Mo= $mysqliL->query($Modifi);


                                                       }





  }
  */
}

if (isset($vagi)){

}
if (isset($cervix)){
  for ($y = 0; $y < count($cervix); $y++) {
    $cervix1 = $cervix[$y];


    $queryestudio_vulvoscopia = "SELECT c.id_paciente AS paciente ,c.id_estudio AS estudio,c.id_tipo_estudio AS tipo_estudio
     FROM estudio_biopsia_cervix e
    INNER JOIN ctrl_paciente_estudios c ON
    e.id_estudio = c.id_estudio 	AND c.id_tipo_estudio = 2	AND c.id_atencion =  $cervix1; ";
                                                 $resultestudio_vulvoscopia= $mysqliL->query($queryestudio_vulvoscopia) ;
                                                     while ($resultSetestudio_vulvoscopia = $resultestudio_vulvoscopia->fetch_assoc()) {
                                                         $pacientec = $resultSetestudio_vulvoscopia['paciente'];
                                                         $estudioc = $resultSetestudio_vulvoscopia['estudio'];
                                                         $tipo_estudioc = $resultSetestudio_vulvoscopia['tipo_estudio'];



                                                                 $sql11 = "INSERT INTO bitacora_ingreso
                                                                     (id_u,fecha_ingreso,id_atencion,accion,id_asignacion,id_tipo_estudio,id_estudio,paciente)
                                                                     VALUES
                                                                     ('$id','$hoys','$cervix1','se autorizo entrega de muestras de cervix','$patologo','2','$estudioc','$pacientec')";

                                                         $resultaq = $mysqliL->query($sql11);


                                                                     $Modifi = "UPDATE ctrl_paciente_estudios
                                                                     SET id_usu_pat='$patologo'
                                                                     WHERE id_paciente='$pacientec' and id_estudio='$estudioc' and id_tipo_estudio='2' and id_atencion='$cervix1'";

                                                                    $Mo= $mysqliL->query($Modifi);


                                                       }





  }
}
if (isset($endo)){

}
/*
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
      //$resultaq = $mysqliL->query($sql11);


      $Modifi = "UPDATE ctrl_paciente_estudios
      SET id_usu_pat='1'
      WHERE id_estudio='$idusuariopatos'";

    //  $Mo= $mysqliL->query($Modifi);
    }


//header("Location:consulta_estudios.php");

}







*/



}
else {
    header('Location: accesos.php');

    exit;
}






 ?>
