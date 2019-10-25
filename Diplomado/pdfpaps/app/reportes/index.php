<?php
include("../../../../coni/localhost.php");
$resultado=$_GET['resultado'];#
$id_paciente=$_GET['id_paciente'];#
$id_estudio=$_GET['id_estudio'];#
$id_tipo_estudio=$_GET['id_tipo_estudio'];#
$id_atencion=$_GET['id_atencion'];
/************************ saber que reporte es ******************************************************************/
$queryreporte="SELECT * FROM tipo_estudio WHERE  id_tipo_estudio='$id_tipo_estudio'";
$resultreporte = $mysqliL->query($queryreporte);
   while ($resultrepo = $resultreporte->fetch_assoc()) {
       $estudio_reporte = $resultrepo['estudio_reporte'];
       $pat_estudio = $resultrepo['pat_estudio'];

       }
/************************ ******************************************************************/
if($id_tipo_estudio==2){
  $reprotevulco = "SELECT c.clasifiacion_patologo,ec.antecedentes_de_importancia,er.observaciones,er.fecha,er.descripcion_microscopica,
er.descripcion_macroscopica,p.fecha_nacimiento_paciente,c.clasifiacion_patologo,er.impresion_diagnostica,
CONCAT(u.nombre_usuario,' ',u.apellidos_usuario) AS medico,CONCAT(p.nombre_paciente,' ',p.apellidos_paciente) AS nombre,
 p.edad_paciente, c.id_estudio_resultado,c.estatus_supervisor,c.estatus_patologo,c.id_paciente,
 c.id_estudio,c.id_tipo_estudio, c.id_usuario, c.id_atencion,c.id_usu_pat,c.clasificacion_medico
 FROM estudio_papanicolau e
 INNER JOIN ctrl_paciente_estudios c
 ON e.id_estudio = c.id_estudio AND c.id_tipo_estudio = 2
 INNER JOIN resultado_biopsia AS er
  ON er.id_resultado_biopsia=c.id_estudio_resultado
  INNER JOIN paciente AS p ON p.id_paciente=c.id_paciente
INNER JOIN usu_me AS u
ON u.id_usuario=c.id_usuario
INNER JOIN estudio_colposcopico AS ec
ON ec.id_estudio=c.id_estudio
   WHERE er.id_resultado_biopsia= '$resultado' AND c.id_paciente='$id_paciente' AND c.id_estudio='$id_estudio' AND c.id_atencion='$id_atencion'  ";

   $resultreprotevulco = $mysqliL->query($reprotevulco);
      while ($resultreprotevulco1 = $resultreprotevulco->fetch_assoc()) {

        $medico = ucwords($resultreprotevulco1['medico']);
        $nombre = ucwords($resultreprotevulco1['nombre']);
        $edad_paciente = $resultreprotevulco1['edad_paciente'];
          $fecha_nacimiento_paciente = $resultreprotevulco1['fecha_nacimiento_paciente'];
            $fecha = $resultreprotevulco1['fecha'];
              $descripcion_microscopica = $resultreprotevulco1['descripcion_microscopica'];
               $descripcion_macroscopica = $resultreprotevulco1['descripcion_macroscopica'];
                  $impresion_diagnostica= $resultreprotevulco1['impresion_diagnostica'];
                      $observaciones= $resultreprotevulco1['observaciones'];
                      $antecedentes_de_importancia= $resultreprotevulco1['antecedentes_de_importancia'];
      $fecha1 = date("d-m-Y", strtotime("$fecha"));
            $clasifiacion_patologo= $resultreprotevulco1['clasifiacion_patologo'];
      #2019-10-14
      #14-10-2019

  }
}
else if($id_tipo_estudio==4){
  $reprotevulco = "SELECT c.clasifiacion_patologo,ec.antecedentes_de_importancia,er.observaciones,er.fecha,er.descripcion_microscopica,
er.descripcion_macroscopica,p.fecha_nacimiento_paciente,c.clasifiacion_patologo,er.impresion_diagnostica,
CONCAT(u.nombre_usuario,' ',u.apellidos_usuario) AS medico,CONCAT(p.nombre_paciente,' ',p.apellidos_paciente) AS nombre,
 p.edad_paciente, c.id_estudio_resultado,c.estatus_supervisor,c.estatus_patologo,c.id_paciente,
 c.id_estudio,c.id_tipo_estudio, c.id_usuario, c.id_atencion,c.id_usu_pat,c.clasificacion_medico
 FROM estudio_papanicolau e
 INNER JOIN ctrl_paciente_estudios c
 ON e.id_estudio = c.id_estudio AND c.id_tipo_estudio = 4
 INNER JOIN resultado_biopsia AS er
  ON er.id_resultado_biopsia=c.id_estudio_resultado
  INNER JOIN paciente AS p ON p.id_paciente=c.id_paciente
INNER JOIN usu_me AS u
ON u.id_usuario=c.id_usuario
INNER JOIN estudio_colposcopico AS ec
ON ec.id_estudio=c.id_estudio
   WHERE er.id_resultado_biopsia= '$resultado' AND c.id_paciente='$id_paciente' AND c.id_estudio='$id_estudio' AND c.id_atencion='$id_atencion'  ";

   $resultreprotevulco = $mysqliL->query($reprotevulco);
      while ($resultreprotevulco1 = $resultreprotevulco->fetch_assoc()) {

        $medico = ucwords($resultreprotevulco1['medico']);
        $nombre = ucwords($resultreprotevulco1['nombre']);
        $edad_paciente = $resultreprotevulco1['edad_paciente'];
          $fecha_nacimiento_paciente = $resultreprotevulco1['fecha_nacimiento_paciente'];
            $fecha = $resultreprotevulco1['fecha'];
              $descripcion_microscopica = $resultreprotevulco1['descripcion_microscopica'];
               $descripcion_macroscopica = $resultreprotevulco1['descripcion_macroscopica'];
                  $impresion_diagnostica= $resultreprotevulco1['impresion_diagnostica'];
                      $observaciones= $resultreprotevulco1['observaciones'];
                      $antecedentes_de_importancia= $resultreprotevulco1['antecedentes_de_importancia'];
      $fecha1 = date("d-m-Y", strtotime("$fecha"));
            $clasifiacion_patologo= $resultreprotevulco1['clasifiacion_patologo'];
      #2019-10-14
      #14-10-2019

  }
}
else if($id_tipo_estudio==5){
  $reprotevulco = "SELECT c.clasifiacion_patologo,ec.antecedentes_de_importancia,er.observaciones,er.fecha,er.descripcion_microscopica,
er.descripcion_macroscopica,p.fecha_nacimiento_paciente,c.clasifiacion_patologo,er.impresion_diagnostica,
CONCAT(u.nombre_usuario,' ',u.apellidos_usuario) AS medico,CONCAT(p.nombre_paciente,' ',p.apellidos_paciente) AS nombre,
 p.edad_paciente, c.id_estudio_resultado,c.estatus_supervisor,c.estatus_patologo,c.id_paciente,
 c.id_estudio,c.id_tipo_estudio, c.id_usuario, c.id_atencion,c.id_usu_pat,c.clasificacion_medico
 FROM estudio_papanicolau e
 INNER JOIN ctrl_paciente_estudios c
 ON e.id_estudio = c.id_estudio AND c.id_tipo_estudio = 5
 INNER JOIN resultado_biopsia AS er
  ON er.id_resultado_biopsia=c.id_estudio_resultado
  INNER JOIN paciente AS p ON p.id_paciente=c.id_paciente
INNER JOIN usu_me AS u
ON u.id_usuario=c.id_usuario
INNER JOIN estudio_colposcopico AS ec
ON ec.id_estudio=c.id_estudio
   WHERE er.id_resultado_biopsia= '$resultado' AND c.id_paciente='$id_paciente' AND c.id_estudio='$id_estudio' AND c.id_atencion='$id_atencion'  ";

   $resultreprotevulco = $mysqliL->query($reprotevulco);
      while ($resultreprotevulco1 = $resultreprotevulco->fetch_assoc()) {

        $medico = ucwords($resultreprotevulco1['medico']);
        $nombre = ucwords($resultreprotevulco1['nombre']);
        $edad_paciente = $resultreprotevulco1['edad_paciente'];
          $fecha_nacimiento_paciente = $resultreprotevulco1['fecha_nacimiento_paciente'];
            $fecha = $resultreprotevulco1['fecha'];
              $descripcion_microscopica = $resultreprotevulco1['descripcion_microscopica'];
               $descripcion_macroscopica = $resultreprotevulco1['descripcion_macroscopica'];
                  $impresion_diagnostica= $resultreprotevulco1['impresion_diagnostica'];
                      $observaciones= $resultreprotevulco1['observaciones'];
                      $antecedentes_de_importancia= $resultreprotevulco1['antecedentes_de_importancia'];
      $fecha1 = date("d-m-Y", strtotime("$fecha"));
            $clasifiacion_patologo= $resultreprotevulco1['clasifiacion_patologo'];
      #2019-10-14
      #14-10-2019

  }
}
else if($id_tipo_estudio==6){
  /************************ datos del reporte vulvoscopia******************************************************************/
  $reprotevulco = "SELECT c.clasifiacion_patologo,ec.antecedentes_de_importancia,er.observaciones,er.fecha,er.descripcion_microscopica,
er.descripcion_macroscopica,p.fecha_nacimiento_paciente,c.clasifiacion_patologo,er.impresion_diagnostica,
CONCAT(u.nombre_usuario,' ',u.apellidos_usuario) AS medico,CONCAT(p.nombre_paciente,' ',p.apellidos_paciente) AS nombre,
 p.edad_paciente, c.id_estudio_resultado,c.estatus_supervisor,c.estatus_patologo,c.id_paciente,
 c.id_estudio,c.id_tipo_estudio, c.id_usuario, c.id_atencion,c.id_usu_pat,c.clasificacion_medico
 FROM estudio_papanicolau e
 INNER JOIN ctrl_paciente_estudios c
 ON e.id_estudio = c.id_estudio AND c.id_tipo_estudio = 6
 INNER JOIN resultado_biopsia AS er
  ON er.id_resultado_biopsia=c.id_estudio_resultado
  INNER JOIN paciente AS p ON p.id_paciente=c.id_paciente
INNER JOIN usu_me AS u
ON u.id_usuario=c.id_usuario
INNER JOIN estudio_colposcopico AS ec
ON ec.id_estudio=c.id_estudio
   WHERE er.id_resultado_biopsia= '$resultado' AND c.id_paciente='$id_paciente' AND c.id_estudio='$id_estudio' AND c.id_atencion='$id_atencion'  ";

   $resultreprotevulco = $mysqliL->query($reprotevulco);
      while ($resultreprotevulco1 = $resultreprotevulco->fetch_assoc()) {

        $medico = ucwords($resultreprotevulco1['medico']);
        $nombre = ucwords($resultreprotevulco1['nombre']);
        $edad_paciente = $resultreprotevulco1['edad_paciente'];
          $fecha_nacimiento_paciente = $resultreprotevulco1['fecha_nacimiento_paciente'];
            $fecha = $resultreprotevulco1['fecha'];
              $descripcion_microscopica = $resultreprotevulco1['descripcion_microscopica'];
               $descripcion_macroscopica = $resultreprotevulco1['descripcion_macroscopica'];
                  $impresion_diagnostica= $resultreprotevulco1['impresion_diagnostica'];
                      $observaciones= $resultreprotevulco1['observaciones'];
                      $antecedentes_de_importancia= $resultreprotevulco1['antecedentes_de_importancia'];
                              $clasifiacion_patologo= $resultreprotevulco1['clasifiacion_patologo'];
      $fecha1 = date("d-m-Y", strtotime("$fecha"));
      #2019-10-14
      #14-10-2019

  }
  /************************ saber que reporte es ******************************************************************/
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="../../../img/logo/corona.png">
    <title> <?php echo $estudio_reporte; ?></title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>

      <h2 class="name">Estudio Histopatológico </h2>
      <div id="invoice">
        <div class="no">No.Atencion:<?php echo "000".$id_atencion?></div>
      </div>

    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Paciente:<?php echo $nombre; ?></div>
          <div class="date">Fecha de Nacimiento:<?php echo $fecha_nacimiento_paciente; ?></div>
            <div class="to">Edad:<?php echo $edad_paciente; ?></div>
            <div class="to">Medico Solicitante:<?php echo $medico; ?></div>
            <div class="to">Estudio:<?php echo $pat_estudio; ?></div>

        </div>
        <div id="invoice">
          <div class="date">Fecha de Estudio <?php echo $fecha1; ?> </div>
        </div>




      </div>
      <div class="row " style="position: absolute;top: 226px;left: -2px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       Clasificación <?php
       if($clasifiacion_patologo==0){
         echo "<p style='color:#2EFE2E;margin:0;'><FONT SIZE=5>Bajo Grado - LIEBG</font></p>";
       }  else if($clasifiacion_patologo==1){
   echo "<p style='color:#298A08;margin:0;'><FONT SIZE=5>Alto Grado - LIEAG</font></p>";
       }
       else if($clasifiacion_patologo==2){
   echo "<p style='color:#FF0040;margin:0;'><FONT SIZE=5>Cancer Escamoso Incituoso</font></p>";
       }
       else if($clasifiacion_patologo==3){
   echo "<p style='color:#B40431;margin:0;'><FONT SIZE=5>Cancer Escamoso Invasor</font></p>";
       }?>
    </div>
  </div><br><br><br>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">Datos Clinicos</th>

          </tr>
        </thead>

              <tbody>
                <tr>
                  <td class="service"><?php echo $antecedentes_de_importancia; ?></td>
                </tr>
              </tbody>

      </table>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">1.-Descripción Macroscópica</th>

          </tr>
        </thead>

              <tbody>
                <tr>
                  <td class="service"><?php echo $descripcion_macroscopica;?></td>
                </tr>
              </tbody>

      </table>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">2.-Descripción Microscópica</th>

          </tr>
        </thead>

              <tbody>
                <tr>
                  <td class="service"><?php echo $descripcion_microscopica;?></td>
                </tr>
              </tbody>

      </table>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">3.-Impresión Diagnóstico</th>

          </tr>
        </thead>

              <tbody>
                <tr>
                  <td class="service"><?php echo $impresion_diagnostica;?></td>
                </tr>
              </tbody>

      </table>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">4.-Observaciones</th>

          </tr>
        </thead>

              <tbody>
                <tr>
                  <td class="service"><?php echo $observaciones;?></td>
                </tr>
              </tbody>

      </table>



    </main>
    <img src="micro.png" style="
      position: absolute;
      top: 712px;
      right: -21px;
      z-index: -1;
      opacity: 1.1;">

    <footer>
<h6>  DATOS DE MÉDICO TRATANTE </h6>

      <div id="company1" class="clearfix">
        <div><FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">Reina Madre </FONT></div>
        <div><FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">Excelencia médica para quien más amas </FONT></div>
          <div><FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">Av. Paseo de Tollocan Pte. 402. Col Residencial Colon 50120 </FONT></div>
            <div><FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">Tel: 722 280 2002</FONT></div>

        <div><a >www.reinamadre.mx</a></div>
      </div>

    </footer>
</html>
