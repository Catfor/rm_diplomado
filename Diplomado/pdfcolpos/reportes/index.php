<?php session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  ?>
<!DOCTYPE html>
<?php
$id_atencion=$_GET['id_atencion'];
$id_paciente=$_GET['id_paciente'];
$id_estudio=$_GET['id_estudio'];
include('../../../coni/Localhost.php');


 ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Colposcopia Reina Madre</title>
    <link rel="stylesheet" href="style.css" media="all" />
    <link rel="shortcut icon" type="image/x-icon" href="../../img/logo/corona.png">
  </head>
  <body>

    <header class="clearfix">

    <center><br>
    <img src="logo.png"  width="150" height="75"/>
          <h3>SISTEMA ÚNICO DE
REPORTE DE COLPOSCOPIA REINA MADRE: CLÍNICAS DE LA MUJER
</h3>


</center>
<br>
<?php
$consultasemanas = " SELECT CONCAT(p.nombre_paciente,'',p.apellidos_paciente) AS nombre,p.edad_paciente AS edad,a.fecha_atencion_medica AS fecha_atencion
,a.ritmo AS ritmo,a.gestas AS gestas,a.para AS para,a.abortos AS abortos,a.cesareas AS cesareas,a.fecha_ultima_regla AS fum
,a.fecha_ultimo_papanicolau AS fup,ec.cervix AS cervix
 FROM paciente AS p
 INNER JOIN ctrl_paciente_estudios AS c
 ON c.id_paciente=p.id_paciente
 INNER JOIN estudio_colposcopico AS ec
 ON ec.id_estudio=c.id_estudio
 INNER JOIN atencion_medica AS a
 ON a.id_atencion_medica=c.id_atencion
        WHERE c.id_estudio='$id_estudio' AND c.id_paciente='$id_paciente' AND c.id_tipo_estudio=2";

$resultadosemanas = $mysqliL->query($consultasemanas);

while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
    $nombre = ucwords($resultadosemanas1['nombre']);
    $edad = $resultadosemanas1['edad'];
        $fecha_atencion = $resultadosemanas1['fecha_atencion'];
        $ritmo = $resultadosemanas1['ritmo'];
        $gestas = $resultadosemanas1['gestas'];
        $para = $resultadosemanas1['para'];
        $abortos = $resultadosemanas1['abortos'];
        $cesareas = $resultadosemanas1['cesareas'];
        $fum = $resultadosemanas1['fum'];
          $fup = $resultadosemanas1['fup'];
            $cervix = $resultadosemanas1['cervix'];
            $fum1 = strftime("%d de %B del %Y", strtotime($fum));
              $fup1 = strftime("%d de %B del %Y", strtotime($fup));
  }

?>
      <div id="project">
        <div><FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Nombre Del Paciente :<?php     echo $nombre;?></FONT></div>
        <div><FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Edad:<?php echo  $edad; ?></FONT></div>
        <div><FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Fecha De Atencion Medica:<?php
setlocale(LC_TIME, 'es_ES', 'esp_esp');
       $fe = date("d.M.Y", strtotime($fecha_atencion));
  $inicio = strftime("%d de %B del %Y", strtotime($fe));

      echo  $inicio;  ?></FONT></div>
        <div><FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Envio</FONT></div>

        <div><span></span> </div>
        <div><span></span> </div>
      </div>
    </header>
    <div class="row ">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <FONT FACE="Arial" SIZE="3" style="color:rgb(93, 105, 117);"> DATOS GINECO -OBSTÉTRICOS </FONT>
  </div>
</div>
    <main>
      <table style="center">
        <thead>
          <tr>
            <th class="service">MENARCA</th>
            <th class="desc">RITMO</th>
            <th>MPF</th>
            <th>IVSA</th>
            <th>GESTA</th>
            <th>PARA</th>
            <th>ABORTO</th>
            <th>CESÁREA</th>
            <th>FUM</th>
            <th>ULTIMO PAP</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service"><?php  ?></td>
            <td class="service"><?php echo  $ritmo; ?></td>
            <td class="service"><?php  ?></td>
            <td class="service"><?php  ?></td>
            <td class="service"><?php echo  $gestas; ?></td>
            <td class="service"><?php echo  $para; ?></td>
            <td class="service"><?php echo  $abortos; ?></td>
            <td class="service"><?php echo  $cesareas; ?></td>
            <td class="service"><?php echo  $fum1; ?></td>
            <td class="service"><?php echo  $fup1; ?></td>

          </tr>






        </tbody>
      </table>

    </main>
    <div class="row ">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);"> DATOS COLPOSCÓPICOS </FONT>
  </div>
</div>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">COLPOSCOPIA</th>
            <th class="desc">CÉRVIX</th>
            <th>ZONA DE TRANSFORMACIÓN</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <td >Design</td>
            <td class="service"><?php echo $cervix; ?></td>
            <td class="service"></td>



          </tr>
          </tbody>
          <thead>
            <tr>
              <th>EPITELIO ACETOBLANCO</th>
              <th class="service">SUPERFICIE</th>
              <th class="desc">BORDES</th>


            </tr>
          </thead>
          <tbody>
            <tr>
                <td class="service">Design</td>
              <td class="service">Design</td>
              <td class="service">Design</td>





            </tr>
            </tbody>
            <thead>
              <tr>
                <th>PRUEBA DE SCHILLER</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="service">Design</td>



              </tr>
              </tbody>
      </table>




    </main>

    <main>
      <table>
        <thead>
          <tr>
            <th class="service"><FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">ANTECEDENTES DE IMPORTANCIA (CIRUGÍAS PREVIAS, CTRIOTERAPIA, LASSER, ELECTROCIRUGÍA) </FONT></th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Design</td>  </tr>
          </tbody>
          <thead>
            <tr>
              <th class="service"><FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">DIAGNÓSTICO COLPOSCÓPICOS </FONT></th>
         </tr>
          </thead>
          <tbody>
            <tr>

              <td class="service">Design</td>
            </tr>
            </tbody>
            <thead>
              <tr>
                <th class="service"><FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">OTRAS </FONT></th>
           </tr>
            </thead>
            <tbody>
              <tr>

                <td class="service">Design</td>
              </tr>
              </tbody>
              <thead>
                <tr>
                  <th class="service"><FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">PLAN DE TRATAMIENTO </FONT></th>
             </tr>
              </thead>
              <tbody>
                <tr>

                  <td class="service">Design</td>
                </tr>
                </tbody>

      </table>
<br><br>
<center>
  <?php
  $consultasemanas = "SELECT * FROM imagen AS i WHERE i.id_atencion_medica='$id_atencion'";

  $resultadosemanas = $mysqliL->query($consultasemanas);

  while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
      $ruta_imagen = $resultadosemanas1['ruta_imagen'];



   ?>
<img src="../.././imagesestudios/<?php echo $ruta_imagen; ?>"  width="250" height="105"/>
<?php  }   ?>
</center><br><br>
    </main>
    <footer>
DATOS DE MÉDICO TRATANTE
      <div id="company" class="clearfix">
        <div><FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">Reina Madre </FONT></div>
        <div><FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">Excelencia médica para quien más amas </FONT></div>
          <div><FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">Av. Paseo de Tollocan Pte. 402. Col Residencial Colon 50120 </FONT></div>
            <div><FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">Tel: 722 280 2002</FONT></div>

        <div><a >www.reinamadre.mx</a></div>
      </div>
    </footer>

  </body>
</html>
<?php

} else {
    header('Location: ../index.php');

    exit;
}





?>
