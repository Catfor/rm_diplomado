
<?php
include("../../../../coni/localhost.php");
$resultado=$_GET['resultado'];#
$id_paciente=$_GET['id_paciente'];#
$id_estudio=$_GET['id_estudio'];#
$id_tipo_estudio=$_GET['id_tipo_estudio'];#
$id_atencion=$_GET['id_atencion'];
$clasificacion_medico=$_GET['clasificacion_medico'];

$queryPapanicolaou = "SELECT er.observaciones,p.fecha_nacimiento_paciente,c.clasifiacion_patologo,er.interpretacion,
CONCAT(u.nombre_usuario,' ',u.apellidos_usuario) AS medico,CONCAT(p.nombre_paciente,' ',p.apellidos_paciente) AS nombre,
p.edad_paciente,
c.id_estudio_resultado,c.estatus_supervisor,c.estatus_patologo,c.id_paciente,c.id_estudio,c.id_tipo_estudio,
c.id_usuario,c.id_atencion,c.id_usu_pat,c.clasificacion_medico FROM estudio_papanicolau e INNER JOIN ctrl_paciente_estudios c
ON e.id_estudio = c.id_estudio AND c.id_tipo_estudio = 7
 INNER JOIN etiqueta_resultado_estudio_papanicolaou AS er
ON er.id_estudio_resultado_paps=c.id_estudio_resultado
INNER JOIN paciente AS p
ON p.id_paciente=c.id_paciente
INNER JOIN  usu_me   AS u
ON u.id_usuario=c.id_usuario
 WHERE er.id_estudio_resultado_paps= '$resultado' AND c.id_paciente='$id_paciente' AND c.id_estudio='1' AND c.id_atencion='$id_atencion'  ";

 $resultSetPapanicolaou = $mysqliL->query($queryPapanicolaou);
    while ($resultSet = $resultSetPapanicolaou->fetch_assoc()) {
        $fecha_nacimiento_paciente = $resultSet['fecha_nacimiento_paciente'];
              $edad_paciente = $resultSet['edad_paciente'];
                $interpretacion = $resultSet['interpretacion'];
$medico = ucwords($resultSet['medico']);
$nombre = ucwords($resultSet['nombre']);
      $clasifiacion_patologo = $resultSet['clasifiacion_patologo'];
      $observaciones = $resultSet['observaciones'];
}


 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="../../../img/logo/corona.png">

    <title>Reporte Paps</title>
    <link rel="stylesheet" href="style.css" media="all" />
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
     1-.Clasificación <?php
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
<div class="row " style="position: absolute;top: 266px;left: -2px;">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<FONT FACE="Arial" SIZE="3" style="color:rgb(93, 105, 117);"> 2-.Calidad de la  muestra </FONT>
</div>
</div> <br><br>
<main>
  <table>
    <thead>
      <tr>
        <th class="service">¿Presenta Celulas Endo cervicales?</th>
        </tr>
    </thead>
    <tbody>
      <tr>

        <td class="service">Design</td>  </tr>
      </tbody>
    </table>
  </main>

<TABLE >
  <thead>
    <tr>
      <th class="service">Indice de  maduaricion</th>
      <th class="service"></th>
      <th class="service"></th>
      </tr>
  </thead>
	<TR>
    <Td class="service">C.Parabasal ()</Td>
    	<Td class="service">C.Intermediads() </Td>
		<Td colspan=2>C.Superficiales () </Td></Tr>

	</TABLE>
<TABLE >
  <thead>
    <tr>
      <th class="service">Flora Bacteriana</th>
      <th class="service"></th>
      <th class="service"></th>
      </tr>
  </thead>
  <TR>
    <Td class="service">Bacilar ()</Td>
    <Td class="service">Cocoide() </Td>
    <Td Colspan=2>Mixta () </Td></Tr>

  </TABLE>
<TABLE >
  <thead>
    <tr>
      <th class="service"> Elementos Inflamatorios</th>
      <th class="service"></th>
      <th class="service"></th>
      </tr>
  </thead>
	<TR>
		<TD class="service">Polimorfonucleares  ()</TD>
    	<TD class="service">Citólisis () </TD>
		<TD class="service">Tricomonas () </TD>

	</TR>
	<TR>
		<TD class="service"> Parásitos/Hongos() </Td> <Td class="service">Eritrocitos () </Td><Td class="service">Histiocitos ()</TD>

	</TR>
  <TR>
    <Td class="service">Celulas Guia  () </Td> <Td class="service">Candida () </Td><Td class="service">Otros () </Td>
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
