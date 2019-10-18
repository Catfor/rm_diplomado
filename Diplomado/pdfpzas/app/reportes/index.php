
<?php
include("../../../../coni/localhost.php");

$resultado=$_GET['resultado'];#
$id_paciente=$_GET['id_paciente'];#
$id_estudio=$_GET['id_estudio'];#
$id_tipo_estudio=$_GET['id_tipo_estudio'];#
$id_atencion=$_GET['id_atencion'];
$clasificacion_medico=$_GET['clasificacion_medico'];

$queryPapanicolaou = "SELECT er.polimorfonucleares,er.parasitos_Hongos,er.celulas_guia,er.citolisis,er.eritrocitos
,er.candida,er.tricomonas,er.histiocitos,er.otros,
er.id_estudio_resultado_paps,er.flora_bacteriana_cocoide,er.flora_bacteriana_mixta,
er.flora_bacteriana_bacilar,er.calidad_muestra,er.celulas_endocervicales,er.observaciones,
p.fecha_nacimiento_paciente,c.clasifiacion_patologo,er.interpretacion,
 CONCAT(u.nombre_usuario,' ',u.apellidos_usuario) AS medico,
 CONCAT(p.nombre_paciente,' ',p.apellidos_paciente) AS nombre,
 p.edad_paciente
 FROM estudio_papanicolau e
 INNER JOIN ctrl_paciente_estudios c
  ON e.id_estudio = c.id_estudio
  AND c.id_tipo_estudio = 7
  INNER JOIN etiqueta_resultado_estudio_papanicolaou AS er
  ON er.id_estudio_resultado_paps=c.id_estudio_resultado
  INNER JOIN paciente AS p
  ON p.id_paciente=c.id_paciente
  INNER JOIN usu_me AS u
  ON u.id_usuario=c.id_usuario
 WHERE er.id_estudio_resultado_paps= '$resultado'
 AND c.id_paciente='$id_paciente' AND c.id_estudio='$id_estudio'
 AND c.id_atencion='$id_atencion'  ";
 $resultSetPapanicolaou = $mysqliL->query($queryPapanicolaou);
    while ($resultSet = $resultSetPapanicolaou->fetch_assoc()) {
$polimorfonucleares = $resultSet['polimorfonucleares'];
$parasitos_Hongos = $resultSet['parasitos_Hongos'];
$celulas_guia = $resultSet['celulas_guia'];
$citolisis = $resultSet['citolisis'];
$eritrocitos = $resultSet['eritrocitos'];
$candida = $resultSet['candida'];
$tricomonas = $resultSet['tricomonas'];
$histiocitos = $resultSet['histiocitos'];
$otros = $resultSet['otros'];



        $fecha_nacimiento_paciente = $resultSet['fecha_nacimiento_paciente'];
              $edad_paciente = $resultSet['edad_paciente'];
                $interpretacion = $resultSet['interpretacion'];
$medico = ucwords($resultSet['medico']);
$nombre = ucwords($resultSet['nombre']);
      $clasifiacion_patologo = $resultSet['clasifiacion_patologo'];
      $observaciones = $resultSet['observaciones'];
        $celulas_endocervicales = $resultSet['celulas_endocervicales'];
          $calidad_muestra = $resultSet['calidad_muestra'];
            $flora_bacteriana_cocoide = $resultSet['flora_bacteriana_cocoide'];
              $flora_bacteriana_mixta= $resultSet['flora_bacteriana_mixta'];
                $flora_bacteriana_bacilar = $resultSet['flora_bacteriana_bacilar'];
                $id_estudio_resultado_paps = $resultSet['id_estudio_resultado_paps'];
}


 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <link rel="shortcut icon" type="image/x-icon" href="../../../img/logo/corona.png">

    <title>Reporte Paps</title>

    <title>Citologia Hispatologia Reina Madre</title>

    <link rel="stylesheet" href="style.css" media="all" />
    <link rel="shortcut icon" type="image/x-icon" href="corona.png">
  </head>
  <body>

    <header class="clearfix">

      <div  id="logo">
        <img src="logo.png"  >
    </div>
      <h2 class="name">Citología Exfoliativa</h2>
     <div id="invoice">
       <div class="no">No.Atencion:<?php echo "000".$id_atencion; ?></div>
     </div>
        </header>



    <div id="details" class="clearfix">
        <div id="client">
        <div>Paciente :<?php echo $nombre; ?></div>
        <div>Fecha de Nacimiento:<?php echo $fecha_nacimiento_paciente  ; ?></div>
        <div>Edad:<?php echo $edad_paciente  ; ?></div>
        <div>Sexo:Femenino</div>
        <div>Medico Solicitante:<?php echo $medico; ?></div>

      </div>
      </div>

    <div class="row " style="position: absolute;top: 226px;left: -2px;">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     Clasificación <?php
     if($clasifiacion_patologo==0){
       echo "<p style='color:#2EFE2E;margin:0;'><FONT SIZE=5>Bajo Grado</font></p>";
     }  else if($clasifiacion_patologo==1){
 echo "<p style='color:#298A08;margin:0;'><FONT SIZE=5>Alto Grado</font></p>";
     }
     else if($clasifiacion_patologo==2){
 echo "<p style='color:#FF0040;margin:0;'><FONT SIZE=5>Cancer Escamoso Incituoso</font></p>";
     }
     else if($clasifiacion_patologo==3){
 echo "<p style='color:#B40431;margin:0;'><FONT SIZE=5>Cancer Escamoso invasor</font></p>";
     }?>
  </div>
</div><br><br><br>

<main>
  <table>
    <thead>
      <tr>
        <th class="service">Calidad de la Muestra</th>
        </tr>
    </thead>
    <tbody>
      <tr>

        <td class="service"><?php
  echo "$calidad_muestra";


        ?></td>  </tr>
      </tbody>
    </table>
  <table>
    <thead>
      <tr>
        <th class="service">¿Presenta Celulas Endo cervicales?</th>
        </tr>
    </thead>
    <tbody>
      <tr>

        <td class="service"><?php
if($celulas_endocervicales==0){
  echo "Si";
}else{
  echo "No";
}

        ?></td>  </tr>
      </tbody>
    </table>
  </main>

<TABLE >
  <thead>
    <tr>
      <th class="service">Indice de  maduaricion</th>
      <th class="service"> </th>
      <th class="service"> </th>
      </tr>
  </thead>
	<TR>
<?php
$query = "SELECT * from flora_bacteriana where id_resultado_papa='$id_estudio_resultado_paps' ";

 $resultquery = $mysqliL->query($query);
    while ($resultquery2 = $resultquery->fetch_assoc()) {

              $flora_bacteriana = $resultquery2['flora_bacteriana'];



?>
    <Td class="service"><?php echo $flora_bacteriana."(Si)";?></Td>

    <?php
}
    ?>
  </Tr>

	</TABLE>
<TABLE >
  <thead>
    <tr>
      <th class="service">Flora Bacteriana</th>
      <th class="service"> </th>
      <th class="service"> </th>

      </tr>
  </thead>
  <TR>

        <?php
        if($flora_bacteriana_bacilar==0){
echo "<Td class='service'>Bacilar (No)</Td>";
        }
        elseif($flora_bacteriana_bacilar==1){
echo "<Td class='service'>Bacilar (Si)</Td>";
        }
        else{
echo "<Td class='service'>Bacilar (N/a)</Td>";
        }?>

<?php
if($flora_bacteriana_cocoide==0){
echo "<Td class='service'>Cocoide (No)</Td>";
}
elseif($flora_bacteriana_cocoide==1){
echo "<Td class='service'>Cocoide (Si)</Td>";
}
else{
echo "<Td class='service'>Cocoide (N/a)</Td>";
}?>

    <?php
    if($flora_bacteriana_mixta==0){
    echo "<Td Colspan=2>Mixta (No)</Td>";
    }
    elseif($flora_bacteriana_mixta==1){
    echo "<Td Colspan=2>Mixta (Si)</Td>";
    }
    else{
    echo "<Td Colspan=2>Mixta (N/a)</Td>";
    }?>
</Tr>

  </TABLE>

<TABLE >
  <thead>
    <tr>
      <th class="service"> Elementos Inflamatorios</th>
      <th class="service"> </th>
      <th class="service"> </th>

      </tr>
  </thead>
	<TR>
    <?php
    if($polimorfonucleares==0){
    echo "<Td class='service'>Polimorfonucleares (No)</Td>";
    }
    elseif($polimorfonucleares==1){
    echo "<Td class='service'>Polimorfonucleares (Si)</Td>";
    }
    else{
    echo "<Td class='service'>Polimorfonucleares (N/a)</Td>";
    }?>
    <?php
    if($citolisis==0){
    echo "<Td class='service'>Citólisis (No)</Td>";
    }
    elseif($citolisis==1){
    echo "<Td class='service'>Citólisis (Si)</Td>";
    }
    else{
    echo "<Td class='service'>Citólisis (N/a)</Td>";
    }?>
    <?php
    if($tricomonas==0){
    echo "<Td class='service'>Tricomonas (No)</Td>";
    }
    elseif($tricomonas==1){
    echo "<Td class='service'>Tricomonas (Si)</Td>";
    }
    else{
    echo "<Td class='service'>Tricomonas (N/a)</Td>";
    }?>



	</TR>
	<TR>
    <?php
    if($parasitos_Hongos==0){
    echo "<Td class='service'>Parásitos/Hongos (No)</Td>";
    }
    elseif($parasitos_Hongos==1){
    echo "<Td class='service'>Parásitos/Hongos (Si)</Td>";
    }
    else{
    echo "<Td class='service'>Parásitos/Hongos (N/a)</Td>";
    }?>

    <?php
    if($histiocitos==0){
    echo "<Td class='service'>Histiocitos (No)</Td>";
    }
    elseif($histiocitos==1){
    echo "<Td class='service'>Histiocitos (Si)</Td>";
    }
    else{
    echo "<Td class='service'>Histiocitos (N/a)</Td>";
    }?>


    <?php
    if($eritrocitos==0){
    echo "<Td class='service'>Eritrocitos (No)</Td>";
    }
    elseif($eritrocitos==1){
    echo "<Td class='service'>Eritrocitos (Si)</Td>";
    }
    else{
    echo "<Td class='service'>Eritrocitos (N/a)</Td>";
    }?>



	</TR>
  <TR>
    <?php
    if($celulas_guia==0){
    echo "<Td class='service'>Celulas Guia (No)</Td>";
    }
    elseif($celulas_guia==1){
    echo "<Td class='service'>Celulas Guia (Si)</Td>";
    }
    else{
    echo "<Td class='service'>Celulas Guia (N/a)</Td>";
    }?>

    <?php
    if($candida==0){
    echo "<Td class='service'>Candida (No)</Td>";
    }
    elseif($candida==1){
    echo "<Td class='service'>Candida (Si)</Td>";
    }
    else{
    echo "<Td class='service'>Candida (N/a)</Td>";
    }?>

    <?php
    if($otros==0){
    echo "<Td class='service'>Otros (No)</Td>";
    }
    elseif($otros==1){
    echo "<Td class='service'>Otros (Si)</Td>";
    }
    else{
    echo "<Td class='service'>Otros (N/a)</Td>";
    }?>

  </TR>
</TABLE>


    <main>
      <table>
        <thead>
          <tr>
            <th class="service"><FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">Interpretacion </FONT></th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service"><?php echo $interpretacion; ?></td>  </tr>
          </tbody>
          <thead>
            <tr>
              <th class="service"><FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">OBSERVACIONES </FONT></th>
         </tr>
          </thead>
            <tbody>
              <tr>

                <td class="service"><?php echo $observaciones; ?></td>
              </tr>
              </tbody>


      </table>




    </main>
    <img src="micro.png" style="
      position: absolute;
      top: 712px;
      right: -21px;
      z-index: -1;
      opacity: 0.1;">

  <footer>


DATOS DE MÉDICO TRATANTE

      <div id="company" class="clearfix">
        <div>Reina Madre </div>
        <div>Excelencia médica para quien más amas</div>
          <div>Av. Paseo de Tollocan Pte. 402. Col Residencial Colon 50120 </div>
            <div>Tel: 722 280 2002</div>

        <div><a >www.reinamadre.mx</a></div>
      </div>
    </footer>

  </body>
</html>
