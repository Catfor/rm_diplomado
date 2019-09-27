<?php session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  error_reporting(0);
  setlocale(LC_ALL, 'es_ES.UTF-8');
  date_default_timezone_set('America/Mexico_City');
  ?>
  <!DOCTYPE html>
  <?php
    $id_atencion = $_GET['id_atencion'];
    $id_paciente = $_GET['id_paciente'];
    $id_estudio = $_GET['id_estudio'];
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

    <header class="clearfix" style=" margin-bottom: 0px; ">

      <div id="logo" style="margin-bottom:0px;">
        <img src="logo.png">
        <font color="#A25CBF" face="Comic Sans MS,arial">

          <h2 align="center">EXCELENCIA MÉDICA PARA QUIEN MÁS AMAS</h2>
        </font>

        <h1>REPORTE DE COLPOSCOPIA</h1>
      </div>
      <?php
        $consultasemanas = "SELECT CONCAT(p.nombre_paciente,' ',p.apellidos_paciente) AS nombre,p.edad_paciente AS edad,a.fecha_atencion_medica AS fecha_atencion
,a.ritmo AS ritmo,a.gestas AS gestas,a.para AS para,a.abortos AS abortos,a.cesareas AS cesareas,a.fecha_ultima_regla AS fum
,a.fecha_ultimo_papanicolau AS fup,ec.cervix AS cervix,a.metodos_planificacion AS m,a.cual AS cual,a.edad_inicio_vida_sexual AS ivsa
,ec.colposcopia AS colposcopia,ec.zona_transformacion AS zona_transformacion,a.edad_en_que_fue_su_regla AS menarca
,ec.epitelio_acetoblanco AS epitelio_acetoblanco,ec.bs_criterios_menores AS bs_criterios_menores,ec.bs_criterios_intermedios AS bs_criterios_intermedios
,ec.bs_criterios_mayores AS bs_criterios_mayores,ec.schiller AS schiller,ec.antecedentes_de_importancia AS antecedentes_de_importancia,ec.plan_de_tratamiento AS plan_de_tratamiento
,ec.miscelaneos AS miscelaneos,ec.posible_recomendacion_diagnostica
 FROM paciente AS p
 INNER JOIN ctrl_paciente_estudios AS c
 ON c.id_paciente=p.id_paciente
 INNER JOIN estudio_colposcopico AS ec
 ON ec.id_estudio=c.id_estudio
 INNER JOIN atencion_medica AS a
 ON a.id_atencion_medica=c.id_atencion
        WHERE c.id_estudio='$id_estudio' AND c.id_paciente='$id_paciente' AND c.id_tipo_estudio=1";
        $resultadosemanas = $mysqliL->query($consultasemanas);

        while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
          $nombre = ucwords($resultadosemanas1['nombre']);
          $posible_recomendacion_diagnostica = ucwords(str_replace("_", " ", $resultadosemanas1['posible_recomendacion_diagnostica']));
          $miscelaneos = ucwords($resultadosemanas1['miscelaneos']);



          $plan_de_tratamiento = ucwords($resultadosemanas1['plan_de_tratamiento']);
          $antecedentes_de_importancia = ucwords($resultadosemanas1['antecedentes_de_importancia']);

          $schiller = ucwords($resultadosemanas1['schiller']);

          $bs_criterios_menores = ucwords($resultadosemanas1['bs_criterios_menores']);
          $bs_criterios_intermedios = ucwords($resultadosemanas1['bs_criterios_intermedios']);
          $bs_criterios_mayores = ucwords($resultadosemanas1['bs_criterios_mayores']);

          $menarca = ucwords($resultadosemanas1['menarca']);
          $zona_transformacion = ucwords($resultadosemanas1['zona_transformacion']);
          $colposcopia = ucwords($resultadosemanas1['colposcopia']);
          $ivsa = ucwords($resultadosemanas1['ivsa']);
          $m = ucwords(str_replace("_", " ", $resultadosemanas1['m']));
          $cual = ucwords(str_replace("_", " ", $resultadosemanas1['cual']));
          $edad = ucwords($resultadosemanas1['edad']);
          $fecha_atencion = ucwords($resultadosemanas1['fecha_atencion']);
          $ritmo = ucwords($resultadosemanas1['ritmo']);
          $gestas = ucwords($resultadosemanas1['gestas']);
          $para = ucwords($resultadosemanas1['para']);
          $abortos = ucwords($resultadosemanas1['abortos']);
          $cesareas = ucwords($resultadosemanas1['cesareas']);
          $fum = ucwords($resultadosemanas1['fum']);
          $fup = ucwords($resultadosemanas1['fup']);
          $cervix = ucwords($resultadosemanas1['cervix']);
          $fum1 = ucwords(strftime("%d de %B del %Y", strtotime($fum)));
          $fup1 = ucwords(strftime("%d de %B del %Y", strtotime($fup)));
        }

        ?>
      <div id="project">
        <div>
          <FONT FACE="Arial" SIZE="5" style="color:rgb(144, 143, 143);"> Nombre Del Paciente: <?php echo $nombre; ?></FONT>
        </div>
        <div>
          <FONT FACE="Arial" SIZE="5" style="color:rgb(144, 143, 143);"> Edad: <?php echo  $edad; ?></FONT>
        </div>
        <div>
          <FONT FACE="Arial" SIZE="5" style="color:rgb(144, 143, 143);"> Fecha De Atencion Medica: <?php
                                                                                                      $fe = date("d.M.Y", strtotime($fecha_atencion));
                                                                                                      $inicio = strftime("%d de %B del %Y", strtotime($fe));

                                                                                                      echo  $inicio;  ?></FONT>
        </div>

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
            <td class="service"><?php echo $menarca; ?></td>
            <td class="service"><?php echo  $ritmo; ?></td>
            <?php
              if ($m == 'otro') {
                echo "  <td class='service'>otro/$cual</td>";
              } else {
                ?>
              <td class='service'><?php echo $m; ?></td>
            <?php
              }
              ?>

            <td class="service"><?php echo $ivsa; ?></td>
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
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 5px;">
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
            <td><?php echo $colposcopia; ?></td>
            <td class="service"><?php echo $cervix; ?></td>
            <td class="service"><?php echo $zona_transformacion; ?></td>
          </tr>
        </tbody>
      </table>
      <table>
        <thead>
          <tr>

            <th>EPITELIO ACETOBLANCO</th>
            <th colspan="3" class="service">BORDE Y SUPERFICIE </th>
            <th>PRUEBA DE SCHILLER</th>



          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service"><?php echo $colposcopia; ?></td>
            <td class="service"><?php echo $bs_criterios_menores; ?> </td>
            <td class="service"><?php echo $bs_criterios_intermedios; ?></td>
            <td class="service"><?php echo $bs_criterios_mayores; ?></td>
            <td class="service"><?php echo $schiller; ?></td>
          </tr>

        </tbody>
      </table>




    </main>

    <main>
      <table>
        <thead>
          <tr>
            <th class="service">
              <FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">ANTECEDENTES DE IMPORTANCIA (CIRUGÍAS PREVIAS, CTRIOTERAPIA, LASSER, ELECTROCIRUGÍA) </FONT>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>

            <td class="service"><?php echo $antecedentes_de_importancia; ?> </td>
          </tr>
        </tbody>
        <thead>
          <tr>
            <th class="service">
              <FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">DIAGNÓSTICO COLPOSCÓPICOS </FONT>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>

            <td class="service"><?php echo  $posible_recomendacion_diagnostica; ?></td>
          </tr>
        </tbody>
        <thead>
          <tr>
            <th class="service">
              <FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">OTRAS </FONT>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>

            <td class="service"><?php echo  $miscelaneos; ?> </td>
          </tr>
        </tbody>
        <thead>
          <tr>
            <th class="service">
              <FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">PLAN DE TRATAMIENTO </FONT>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>

            <td class="service"><?php echo $plan_de_tratamiento; ?> </td>
          </tr>
        </tbody>

      </table>
      <br><br>
      <center>
        <?php
          $consultasemanas = "SELECT * FROM imagen AS i WHERE i.id_atencion_medica='$id_atencion' AND i.seleccion = 1";

          $resultadosemanas = $mysqliL->query($consultasemanas);

          while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
            $ruta_imagen = $resultadosemanas1['ruta_imagen'];



            ?>
          <img src="../../imagesestudios/<?php echo $ruta_imagen; ?>" width="250" height="105" />
        <?php  }   ?>
      </center>
    </main>
    <div>
      <footer>
      <center style="margin-top: -40px;margin-bottom: 20px;">
        <div style=" border-bottom: 1px solid black; width: 240px; margin-bottom: 5px; "></div>
        <div>FIRMA MÉDICO</div>
      </center>
      <div>DATOS DE MÉDICO TRATANTE</div>
        <div id="company" class="clearfix">
          <div>
            <FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">Reina Madre </FONT>
          </div>
          <div>
            <FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">Excelencia médica para quien más amas </FONT>
          </div>
          <div>
            <FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">Av. Paseo de Tollocan Pte. 402. Col Residencial Colon 50120 </FONT>
          </div>
          <div>
            <FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">Tel: 722 280 2002</FONT>
          </div>

          <div><a>www.reinamadre.mx</a></div>
        </div>
      </footer>
    </div>
  </body>

  </html>
<?php

} else {
  header('Location: ../index.php');

  exit;
}





?>