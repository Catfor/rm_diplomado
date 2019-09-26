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

$consultarusuario = "SELECT * FROM usu_me WHERE correo_general='$email' AND contra='$password' AND id_usuario='$patologo'";
                                             $resultconsultarusuario = $mysqliL->query($consultarusuario) ;
$siono=$resultconsultarusuario->num_rows;
                                        if($siono==0){
                                          header("Location:consulta_estudios.php?error=4");
                                        }
else{


if (isset($paps)){

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



                                                                 $sql11 = "INSERT INTO bitacora_ingreso
                                                                     (id_u,fecha_ingreso,id_atencion,accion,id_asignacion,id_tipo_estudio,id_estudio,paciente)
                                                                     VALUES
                                                                     ('$id','$hoys','$paps1','se autorizo entrega de muestras de papanicolau','$patologo','7','$estudiopa','$pacientepa')";

                                                                $resultaq = $mysqliL->query($sql11);


                                                                     $Modifi = "UPDATE ctrl_paciente_estudios
                                                                     SET id_usu_pat='$patologo'
                                                                     WHERE id_paciente='$pacientepa' and id_estudio='$estudiopa' and id_tipo_estudio='7' and id_atencion='$paps1'";

                                                                    $Mo= $mysqliL->query($Modifi);


                                                       }






}
}
else{}
if (isset($vulva)){

  for ($y = 0; $y < count($vulva); $y++) {
    $vulva1 = $vulva[$y];


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

                                                                $resultaq = $mysqliL->query($sql11);


                                                                     $Modifi = "UPDATE ctrl_paciente_estudios
                                                                     SET id_usu_pat='$patologo'
                                                                     WHERE id_paciente='$pacientevul' and id_estudio='$estudiovul' and id_tipo_estudio='6' and id_atencion='$vulva1'";

                                                                    $Mo= $mysqliL->query($Modifi);


                                                       }





  }

}
else{}
if (isset($vagi)){
  for ($y = 0; $y < count($vagi); $y++) {
    $vagi1 = $vagi[$y];


    $queryestudio_vulvoscopia = "SELECT c.id_paciente AS paciente ,c.id_estudio AS estudio,c.id_tipo_estudio AS tipo_estudio
     FROM estudio_vulvoscopia e
    INNER JOIN ctrl_paciente_estudios c ON
    e.id_estudio = c.id_estudio 	AND c.id_tipo_estudio = 5	AND c.id_atencion =  $vagi1; ";
                                                 $resultestudio_vulvoscopia= $mysqliL->query($queryestudio_vulvoscopia) ;
                                                     while ($resultSetestudio_vulvoscopia = $resultestudio_vulvoscopia->fetch_assoc()) {
                                                         $pacienteva = $resultSetestudio_vulvoscopia['paciente'];
                                                         $estudiova = $resultSetestudio_vulvoscopia['estudio'];
                                                         $tipo_estudiova = $resultSetestudio_vulvoscopia['tipo_estudio'];



                                                                 $sql11 = "INSERT INTO bitacora_ingreso
                                                                     (id_u,fecha_ingreso,id_atencion,accion,id_asignacion,id_tipo_estudio,id_estudio,paciente)
                                                                     VALUES
                                                                     ('$id','$hoys','$vagi1','se autorizo entrega de muestras de vaginoscopia','$patologo','6','$estudiova','$pacienteva')";

                                                               $resultaq = $mysqliL->query($sql11);


                                                                     $Modifi = "UPDATE ctrl_paciente_estudios
                                                                     SET id_usu_pat='$patologo'
                                                                     WHERE id_paciente='$pacienteva' and id_estudio='$estudiova' and id_tipo_estudio='5' and id_atencion='$vagi1'";

                                                                    $Mo= $mysqliL->query($Modifi);


                                                       }





  }
}
else{}
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
else{}
if (isset($endo)){

  for ($y = 0; $y < count($endo); $y++) {
    $endo1 = $endo[$y];


    $queryestudio_vulvoscopia = "SELECT c.id_paciente AS paciente ,c.id_estudio AS estudio,c.id_tipo_estudio AS tipo_estudio
     FROM estudio_biopsia_endometrio e
    INNER JOIN ctrl_paciente_estudios c ON
    e.id_estudio = c.id_estudio 	AND c.id_tipo_estudio = 4	AND c.id_atencion =  $endo1; ";
                                                 $resultestudio_vulvoscopia= $mysqliL->query($queryestudio_vulvoscopia) ;
                                                     while ($resultSetestudio_vulvoscopia = $resultestudio_vulvoscopia->fetch_assoc()) {
                                                         $pacienteen = $resultSetestudio_vulvoscopia['paciente'];
                                                         $estudioen = $resultSetestudio_vulvoscopia['estudio'];
                                                         $tipo_estudioen = $resultSetestudio_vulvoscopia['tipo_estudio'];



                                                                 $sql11 = "INSERT INTO bitacora_ingreso
                                                                     (id_u,fecha_ingreso,id_atencion,accion,id_asignacion,id_tipo_estudio,id_estudio,paciente)
                                                                     VALUES
                                                                     ('$id','$hoys','$endo1','se autorizo entrega de muestras de vulvoscopia','$patologo','4','$estudioen','$pacienteen')";

                                                                $resultaq = $mysqliL->query($sql11);


                                                                     $Modifi = "UPDATE ctrl_paciente_estudios
                                                                     SET id_usu_pat='$patologo'
                                                                     WHERE id_paciente='$pacienteen' and id_estudio='$estudioen' and id_tipo_estudio='4' and id_atencion='$endo1'";

                                                                    $Mo= $mysqliL->query($Modifi);


                                                       }





  }

}

header("Location:consulta_estudios.php");


}







}
else {
  header("Location:consulta_estudios.php?error=4");


    exit;
}
 ?>
