<?php session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  date_default_timezone_set('America/Mexico_City');
  $hoys = date("Y-m-d");
  ?>
  <!doctype html>
  <html class="no-js" lang="">
  <link rel="shortcut icon" type="image/x-icon" href="../img/logo/corona.png">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <div class="header-top-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="logo-area">
              <a href="sistema.php"><img src="../img/logo/LOGO-BLANCO.webp" height="100" /></a>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="header-top-menu">
              <ul class="nav navbar-nav notika-top-nav">
                <li>
                  <div class="chip">
                    <img <?php if($_SESSION['genero'] === 'H'){ echo "src='./img/avatar_h.png' "; }else{ echo "src='./img/avatar_m.png' ";} ?> alt="Person" width="96" height="96">
                    <b><?php echo ucwords($_SESSION['nombre_usuario']) . ' ' . ucwords($_SESSION['apellidos_usuario']);  ?></b>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a href="logout.php" role="button" aria-expanded="false" class="nav-link dropdown-toggle"> Salir <span><i class="fas fa-door-open"></i></span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
      include('css.php');
      ?>
  </head>

  <body>
    <?php
      include('../coni/Localhost.php');
      $id = $_SESSION['id_usuario'];
      $nick = $_SESSION['nick'];
      $correo_general = $_SESSION['correo_general'];
      $nombre_usuario = ucwords($_SESSION['nombre_usuario']);
      $rol = $_SESSION['rol'];
      $apellidos_usuario = ucwords($_SESSION['apellidos_usuario']);
      $result123 = mysqli_query($mysqliL, "SELECT contra from usu_me where id_usuario='$id'");
      $rowwe = mysqli_fetch_assoc($result123);
      $contra = $rowwe['contra'];
      if ($contra == '3d603c7c93fb63c7db2b1d99b1998bb6') {
        ?>
      <br>
      <div class="modals-default-cl">
        <button type="button" class="btn nk-deep-purple btn-info" data-toggle="modal" data-target="#myModaltwelve">ayuda</button>
        <div class="modal fade" id="myModaltwelve" role="dialog">
          <div class="modal-dialog modals-default nk-deep-purple">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <h2>Reestablece tu contraseña</h2>
                <p>*Tu contraseña debe ser diferente a DiplomadoRM.<br>*La contraseña deberá ser mayor a 4 dígitos</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
          echo "<div class='form-element-list'>
  <form action='password.php' method='POST'>
                                <div class='row'>
                                    <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
                                        <div class='form-group'>
                                            <div class='nk-int-st'>
                                                <input type='text' class='form-control' placeholder='$nombre_usuario.$apellidos_usuario' disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
                                        <div class='form-group'>
                                            <div class='nk-int-st'>
                                                <input type='Password' class='form-control' placeholder='Nueva Password' name='password' id='password'  required>
                                            </div>";
          ?>
      <?php echo "</div>
                                    </div>
                                    <button class='btn btn-primary notika-btn-primary waves-effect' type='button' onclick='m()'>Mostrar Contraseña</button>
                                    <input type='submit' value='cambiar password'>
                                </div>
                                </div>"
          ?>
    <?php
      } else {
        ?>
      <!-- [if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <!-- [endif]-->
      <!--//Start Header Top Area -->
      <!--//End Header Top Area -->
      <!--//Mobile Menu start -->
      <?php
          include('menu.php');
          ?>
      <?php
          $id_paciente = $_GET['id_paciente'];
          $id_estudio = $_GET['id_estudio'];
          $id_tipo_estudio = $_GET['id_tipo_estudio'];
          $id_usuario = $_GET['id_usuario']; #USUARIO QUIEN HIZO CONSULTA
          $id_atencion = $_GET['id_atencion'];
          $id_usu_pat = $_GET['id_usu_pat'];
          $clasificacion_medico = $_GET['clasificacion_medico'];
          $queryColposcopia = "SELECT CONCAT(p.nombre_paciente,' ',p.apellidos_paciente) AS paciente,CONCAT(u.nombre_usuario,' ',u.apellidos_usuario) AS medico,
c.id_paciente,c.id_estudio,c.id_tipo_estudio,c.id_usuario,c.id_atencion,c.id_usu_pat,c.clasificacion_medico,paps.observaciones_papinocolau,paps.antecedente_cancer,
paps.antecedente_infeccion_vagina,paps.fecha_estudio
FROM   estudio_papanicolau e INNER JOIN ctrl_paciente_estudios c ON
                                                e.id_estudio = c.id_estudio
                                                INNER JOIN usu_me AS u ON
                                                u.id_usuario=c.id_usuario
                                                INNER JOIN paciente AS p ON
                                                p.id_paciente=c.id_paciente
                                                INNER JOIN estudio_papanicolau AS paps
                                                ON paps.id_estudio=c.id_estudio
                                                AND c.id_tipo_estudio = '$id_tipo_estudio'
                                                	AND c.id_paciente = '$id_paciente'";
          $resultSetColposcopia = $mysqliL->query($queryColposcopia);
          while ($resultSet = $resultSetColposcopia->fetch_assoc()) {
            $paciente = $resultSet['paciente'];
            $medico = $resultSet['medico'];
            ///////////papa///////////////////////
            $antecedente_cancer = $resultSet['antecedente_cancer'];
            $observaciones_papinocolau = $resultSet['observaciones_papinocolau'];
            $antecedente_infeccion_vagina = $resultSet['antecedente_infeccion_vagina'];
            $fecha_estudio = $resultSet['fecha_estudio'];
          }
          if ($clasificacion_medico == 1) {
            ?>
        <?php
              $result123 = mysqli_query($mysqliL, "SELECT * from paciente where id_paciente=$id_paciente");
              $rowwe = mysqli_fetch_assoc($result123);
              $nombrepaciente = ucwords($rowwe['nombre_paciente']);
              $apellidospaciente = ucwords($rowwe['apellidos_paciente']);
              $edad_paciente = $rowwe['edad_paciente'];
              $fecha_nacimiento_paciente = $rowwe['fecha_nacimiento_paciente'];
              $re = mysqli_query($mysqliL, "  SELECT * FROM paciente AS p
INNER JOIN atencion_medica AS a
ON a.id_paciente=p.id_paciente
WHERE a.id_paciente=$id_paciente and a.id_atencion_medica='$id_atencion' ");
              $total = $re->num_rows;
              $ro = mysqli_fetch_assoc($re);
              $edad_inicio_menstruacion = $ro['edad_inicio_menstruacion'];
              $metodos_planificacion = $ro['metodos_planificacion'];
              $cual = $ro['cual'];
              $fecha_atencion_medica = $ro['fecha_atencion_medica'];
              $edad_inicio_vida_sexual = $ro['edad_inicio_vida_sexual'];
              $edad_en_que_fue_su_regla = $ro['edad_en_que_fue_su_regla'];
              $parejas_sexuales = $ro['parejas_sexuales'];
              $gestas = $ro['gestas'];
              $para = $ro['para'];
              $cesareas = $ro['cesareas'];
              $abortos = $ro['abortos'];
              $fecha_ultima_regla = $ro['fecha_ultima_regla'];
              $fecha_ultimo_papanicolau = $ro['fecha_ultimo_papanicolau'];
              $antecedentes_tratamiento = $ro['antecedentes_tratamiento'];
              $atecedentes_lesion = $ro['atecedentes_lesion'];
              $metrorragia = $ro['metrorragia'];
              $hormonoterapia = $ro['hormonoterapia'];
              $duracion_hormonoterapia = $ro['duracion_hormonoterapia'];
              $ritmo = $ro['ritmo'];
              $antecedente_cancer_cervicouterino = $ro['antecedente_cancer_cervicouterino'];
              $tratamiento_previo = $ro['tratamiento_previo'];
              $fecha_atencion_medica = $ro['fecha_atencion_medica'];
              $informacion_paps = "SELECT
  CONCAT(p.nombre_paciente,' ',p.apellidos_paciente ) as paciente,
  CONCAT(u.nombre_usuario,' ',u.apellidos_usuario ) as medico,
  p.edad_paciente,
  e.fecha_estudio,
  e.hallazgos_colposcopicos,
  e.observaciones_papinocolau,
  ct.clasificacion_medico,ec.posible_recomendacion_diagnostica
  FROM
  paciente p
  INNER JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_tipo_estudio = 7
  INNER JOIN usu_me u ON u.id_usuario = ct.id_usuario
  INNER JOIN estudio_papanicolau e ON ct.id_estudio = e.id_estudio
 INNER JOIN estudio_colposcopico AS ec ON ec.id_estudio=ct.id_estudio
  ";
              $res_paps = $mysqliL->query($informacion_paps);
              $info_pap = $res_paps->fetch_assoc();
              $fecha_paps = $info_pap['fecha_estudio'];
              $colposcopico_paps = $info_pap['hallazgos_colposcopicos'];
              $observaciones_paps = $info_pap['observaciones_papinocolau'];
              $posible_recomendacion_diagnostica = $info_pap['posible_recomendacion_diagnostica'];
              $clasificacion_medico_paps = $info_pap['clasificacion_medico'] == 0 ? "Normal" : "Urgente";
              ?>
        <div class='alert-list'>
          <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
                <i class='notika-icon notika-close'></i></span>
            </button>
            <CENTER>
              <H1>URGENTE</H1>
            </CENTER>
          </div>
        </div>
      <?php } ?>
      <div class="breadcomb-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="breadcomb-list">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="breadcomb-wp">
                      <div class="breadcomb-icon">
                        <i class="notika-icon notika-windows"></i>
                      </div>
                      <div class="breadcomb-ctn" style="margin: auto 15px;">
                        <h2>Resultados Patologicos Papanicolau <?php echo '<br>' . $nombrepaciente . ' ' . $apellidospaciente; ?></h2>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modals-default-cl">
        <center>
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalfive">Informacion De Atencion Medica</button>
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalsix">Biopsia De Papanicolaou</button>
        </center>
      </div><br><br>
      <div class="modal" id="myModalfive" role="dialog">
        <div class="modal-dialog modals-default">
          <div class="modal-content" style=" padding: 15px 65px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="row fila">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel-group" data-collapse-color="nk-purple" id="accordionPurple" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-collapse notika-accrodion-cus">
                      <div class="panel-body">
                        <div Class="row fila" style="text-align:center;">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="nk-int-mk sl-dp-mn">
                              <h4>Atención Médica</h4>
                            </div>
                            <div class="form-group nk-datapk-ctm form-elet-mg" id="data_3">
                              <div class="input-group date nk-int-st">
                                <span class="input-group-addon"></span>
                                <input type="text" class="form-control" style="text-align:center;" placeholder="
                                                                        <?php
                                                                            setlocale(LC_TIME, 'es_ES', 'esp_esp');
                                                                            $fe = date("d.M.Y", strtotime($fecha_atencion_medica));
                                                                            $inicio = strftime("%d de %B del %Y", strtotime($fe));
                                                                            echo 'Registro Del ' . $inicio;  ?>" disabled>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row fila">
                          <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                            <p><b>Primera Menstruación</b> A Los
                              <?php
                                  echo ' ' . $edad_inicio_menstruacion . ' Años';
                                  ?>
                            </p>
                          </div>
                          <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                            <p><b> Método de Planificación:</b>
                              <?php
                                  echo ' ' . $metodos_planificacion;
                                  ?>
                            </p>
                          </div>
                        </div>
                        <div Class="row fila">
                          <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                            <p><b>Inicio De Vida Sexual</b> A Los <?php echo ' ' . $edad_inicio_vida_sexual . ' Años'; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                            <p><b>Parejas Sexuales:</b><?php echo ' ' . $parejas_sexuales; ?></p>
                          </div>
                        </div>
                        <div class="row fila">
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <p><b>Gestas:</b> <?php echo ' ' . $gestas; ?></p>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <p><b>Paras:</b><?php echo ' ' . $para; ?></p>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <p><b>Césareas:</b> <?php echo ' ' . $cesareas; ?> </p>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <p><b>Abortos:</b> <?php echo ' ' . $abortos; ?> </p>
                          </div>
                        </div>
                        <div class="row fila">
                          <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                            <div>
                              <p><b>Fecha De Última Regla:</b>
                                <?php
                                    if ($fecha_ultima_regla != '1969-12-31' && $fecha_ultima_regla != NULL) {
                                      $fea = date("d.M.Y", strtotime($fecha_ultima_regla));
                                      $inicio1 = strftime("%d de %B del %Y", strtotime($fea));
                                      echo '<br>' . $inicio1;
                                    } else {
                                      echo '<br>Sin Registro De Fecha';
                                    }
                                    ?>
                              </p>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                            <div>
                              <p><b>Fecha Del Último Papanicolau:</b>
                                <?php
                                    if ($fecha_ultimo_papanicolau != '1969-12-31' && $fecha_ultimo_papanicolau != NULL) {
                                      $fea2 = date("d.M.Y", strtotime($fecha_ultimo_papanicolau));
                                      $inicio12 = strftime("%d de %B del %Y", strtotime($fea2));
                                      echo '<br>' . $inicio12;
                                    } else {
                                      echo '<br>Sin Registro De Fecha';
                                    }
                                    ?>
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="row fila">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group purple-border">
                              <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <FONT FACE="Arial" SIZE="3" style="color:rgb(144, 143, 143);">Antecedentes de Lesión</FONT>
                                </div>
                              </div>
                              <textarea class="form-control" rows="2" placeholder="<?php echo $atecedentes_lesion; ?>" name="atecedentes_lesion" form="f1" disabled></textarea>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group purple-border">
                              <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <FONT FACE="Arial" SIZE="3  " style="color:rgb(144, 143, 143);">Antecedente de Tratamiento</FONT>
                                </div>
                              </div>
                              <textarea class="form-control" rows="2" placeholder="<?php echo $antecedentes_tratamiento; ?>" name="antecedentes_tratamiento" form="f1" disabled></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row fila">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <p>Metrorragia:
                              <?php if ($metrorragia == 0) {
                                    echo " No";
                                  } else {
                                    echo " Si";
                                  }
                                  ?>
                            </p>
                          </div>
                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <p>Hormonoterapia:
                              <?php if ($hormonoterapia == 0) {
                                    echo " No";
                                  } else {
                                    echo " Si, duró " . $duracion_hormonoterapia;
                                  }
                                  ?>
                            </p>
                          </div>
                        </div>
                        <div class="row fila">
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <p>Ritmo <?php echo ' ' . $ritmo; ?> </p>
                          </div>
                          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <p>Antecedente De Cáncer Cervicouterino:
                              <?php if ($antecedente_cancer_cervicouterino == 0) {
                                    echo "No";
                                  } else {
                                    echo "Si";
                                  } ?>
                            </p>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <p>Tratamiento Previos:
                              <?php if ($tratamiento_previo == 0) {
                                    echo "No";
                                  } else {
                                    echo "Si";
                                  } ?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- modal -->
      <div class="modal animated rubberBand" id="myModalsix" role="dialog">
        <div class="modal-dialog modals-default">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div style="background-color:#fff">
                <div>
                  <center>
                    <div class="logo-area">
                      <a href="#">
                        <img src="../img/logo/reina.png" style="max-width: 90px; max-height: 90px" />
                      </a>
                    </div>
                  </center>
                </div>
                <div>
                  <p>
                    <center>
                      <b>Solicitud De Estudio De Papanicolaou</b>
                    </center>
                  </p>
                  <div class="row">
                    <div class="column">
                      <p><b>ID Atención</b> <?php echo $id_atencion ?></p>
                    </div>
                    <div class="column">
                      <p><b>Prioridad</b> <?php echo $clasificacion_medico_paps ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="column">
                      <p>
                        <b>Fecha:</b> <?php echo $fecha_paps; ?>
                      </p>
                    </div>
                    <div class="column">
                      <p>
                        <b>Edad:</b> <?php echo $edad_paciente; ?></p>
                      <p>
                    </div>
                  </div>
                  <p><b>Paciente:</b> <?php echo ucwords($paciente); ?></p>
                  <p><b>Medico:</b> <?php echo ucwords($medico); ?></p>
                  <p><b>Estudio Solicitado:</b> Citolog&iacute;a Exfoliativa</p>
                  <p class="txt-justificado"><b>Hallazgos Colposc&oacute;picos:</b><?php echo $posible_recomendacion_diagnostica; ?></p>
                  <p><b>Observaciones:</b></p>
                  <p class="txt-justificado"><?php echo $observaciones_paps; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--//Breadcomb area End-->
      <!--//Data Table area Start-->
      <form action='guardar_resultado_paps.php' method="post" id="gform">
        <input type="hidden" name="id_paciente" value="<?php echo $id_paciente; ?>">
        <input type="hidden" name="id_estudio" value="<?php echo $id_estudio; ?>">
        <input type="hidden" name="id_tipo_estudio" value="<?php echo $id_tipo_estudio; ?>">
        <input type="hidden" name="id_atencion" value="<?php echo $id_atencion; ?>">
        <div class="data-table-area">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sale-statistic-area">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                        <div class="sale-statistic-inner notika-shadow mg-tb-30">
                          <div class="breadcomb-area">
                            <div class="container">
                              <!-- aqui finaliza el atencion medica-->
                              <div class="breadcomb-area">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="breadcomb-list">
                                        <div class="row">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="breadcomb-wp">
                                              <div class="breadcomb-ctn">
                                                <h5>1.-CLASIFICACION</h5>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row fila">
                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <p>Número De Caso :<br></p>
                                            <input type="text" name="no_caso" maxlength="50">
                                          </div>
                                        </div>
                                        <div class="row fila">
                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <p>
                                              Clasificacion Urgencia :<br></p>
                                            <select name='clasifiacion_patologo' id='clasifiacion_patologo' class="form-control">
                                              <option value="0" selected>Bajo Grado - LIEBG</option>
                                              <option value="1">Alto Grado - LIEAG</option>
                                              <option value="2">Cancer escamoso incitu</option>
                                              <option value="3">Cancer Escamoso invasor</option>
                                            </select>
                                          </div>
                                        </div><br>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="breadcomb-wp">
                                            <div class="breadcomb-ctn">
                                              <h5>2.-Calidad de la muestra</h5>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row fila">
                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <select name='calidad_muestra' id='calidad_muestra' class="form-control">
                                              <option value="satisfactoria">Satisfactoria</option>
                                              <option value="insatisfactoria">Insatisfactoria</option>
                                            </select>
                                          </div>
                                        </div><br <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <p>¿Presenta células endocervicales?<br>
                                            <label><input type="radio" name="celulas_endocervicales" value="1"> Si</label>
                                            <label><input type="radio" name="celulas_endocervicales" value="0"> NO</label>
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="breadcomb-list">
                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="breadcomb-wp">
                                      <div class="breadcomb-ctn">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <font size=3> Indice De Maduración</font></b><br><br>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <label><input type="checkbox" name="flora_bacteriana[]" value='C.PARABASA'>C.PARABASAL</label>
                                      <label><input type="checkbox" name="flora_bacteriana[]" value='C.INTERMEDIA'>C.INTERMEDIA</label>
                                      <label><input type="checkbox" name="flora_bacteriana[]" value='C.SUPERFICIALE'>C.SUPERFICIALES</label>
                                    </div>
                                  </div><br><br><br><br>
                                  <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                      <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                          <input type="text" name="Valor_estrogeneo" class="form-control" placeholder="Valor Estrogeneo %">
                                        </div>
                                      </div>
                                    </div><br><br><br><br>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <font size=3> Flora Bacteriana</font></b><br><br>
                                      <b>
                                    </div>
                                  </div>
                                  <div class="row fila">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                      <label><input type="checkbox" name="flora_bacteriana_bacilar" value='BACILAR'>BACILAR</label>
                                      <label><input type="radio" name="flora_bacteriana_bacilar" value="1"> Si</label>
                                      <label><input type="radio" name="flora_bacteriana_bacilar" value="0"> NO</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                      <label><input type="checkbox" name="flora_bacteriana_cocoide" value='COCOIDE'>COCOIDE</label>
                                      <label><input type="radio" name="flora_bacteriana_cocoide" value="1"> Si</label>
                                      <label><input type="radio" name="flora_bacteriana_cocoide" value="0"> NO</label>
                                    </div><br><br><br><br>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                      <label><input type="checkbox" name="flora_bacteriana_mixta" value='MIXTA'>MIXTA</label>
                                      <label><input type="radio" name="flora_bacteriana_mixta" value="1"> Si</label>
                                      <label><input type="radio" name="flora_bacteriana_mixta" value="0"> NO</label>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <font size=3> 3.-ELEMENTOS INFLAMATORIOS</font></b><br><br>
                                      <b>
                                    </div>
                                  </div>
                                  <div class="row fila">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                      <p>
                                        Polimorfonucleares:<br></p>
                                      <select name="polimorfonucleares" class="form-control" required>
                                        <option value="">Selecciona</option>
                                        <option value="1">SI</option>
                                        <option value="0">NO</option>
                                      </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                      <p>
                                        Citolisis:<br></p>
                                      <select name="citolisis" class="form-control" required>
                                        <option value="">Selecciona</option>
                                        <option value="1">SI</option>
                                        <option value="0">NO</option>
                                      </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                      <p>
                                        Parásitos/Hongos:<br></p>
                                      <select name="parasitos_hongos" class="form-control" required>
                                        <option value="">Selecciona</option>
                                        <option value="1">SI</option>
                                        <option value="0">NO</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                      <p>
                                        Tricomonas:<br></p>
                                      <select name="tricomonas" class="form-control" required>
                                        <option value="">Selecciona</option>
                                        <option value="1">SI</option>
                                        <option value="0">NO</option>
                                      </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                      <p>
                                        Celulas Guia:<br></p>
                                      <select name="celulas_guia" class="form-control" required>
                                        <option value="">Selecciona</option>
                                        <option value="1">SI</option>
                                        <option value="0">NO</option>
                                      </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                      <p>
                                        Histiocitos:<br></p>
                                      <select name="histiocitos" class="form-control" required>
                                        <option value="">Selecciona</option>
                                        <option value="1">SI</option>
                                        <option value="0">NO</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="row fila">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                      <p>
                                        Eritrocitos:<br></p>
                                      <select name="eritrocitos" class="form-control" required>
                                        <option value="">Selecciona</option>
                                        <option value="1">SI</option>
                                        <option value="0">NO</option>
                                      </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                      <p>
                                        Candida:<br></p>
                                      <select name="candida" class="form-control" required>
                                        <option value="">Selecciona</option>
                                        <option value="1">SI</option>
                                        <option value="0">NO</option>
                                      </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                      <p>
                                        Otros:<br></p>
                                      <select name="otros" class="form-control" required>
                                        <option value="">Selecciona</option>
                                        <option value="1">SI</option>
                                        <option value="0">NO</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <font size=3> 4.-INTERPRETACIÓN</font></b><br><br>
                                      <b>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group purple-border">
                                          <textarea class="form-control" rows="2" placeholder="INTERPRETACIÓN" name="interpretacion" form="gform"></textarea>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <font size=3> 5.-OBSERVACIONES</font></b><br><br>
                                      <b>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group purple-border">
                                          <textarea class="form-control" rows="2" placeholder="OBSERVACIONES" name="observaciones" form="gform"></textarea>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="breadcomb-area">
                    <div class="container">
                      <center>
                        <p><input type="submit" value="Enviar datos"></p>
                      </center>
                    </div>
      </form>
      </div>
      </div>
      <!--      <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                              <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                                  <div class="past-day-statis">
                                      <h2>Paciente/Medico </h2>
                                      <p>Paciente:<?php echo $paciente; ?></p>
                                        <p>Medico:<?php echo $medico; ?></p>
                                  </div>
                                  <div class="past-day-statis">
                                      <h2>Atencion Medica </h2>
                                      <p>Paciente:<?php echo $paciente; ?></p>
                                  </div>
                                  <div class="past-day-statis">
                                      <h2>Datos Papanicolau </h2>
                                  </div>
                                  <div class="past-statistic-an">
                                      <div class="past-statistic-ctn">
                                          <h3><span >Observaciones</span></h3>
                                          <p><?php echo $observaciones_papinocolau; ?></p>
                                      </div>
                                  </div>
                                  <div class="past-statistic-an">
                                      <div class="past-statistic-ctn">
                                          <h3><span class="counter">1,03,000</span></h3>
                                          <p>Total Clicks</p>
                                      </div>
                                  </div>
                                  <div class="past-statistic-an">
                                      <div class="past-statistic-ctn">
                                          <h3><span class="counter">1,03,000</span></h3>
                                          <p>Total Clicks</p>
                                      </div>
                                  </div>
                                  <div class="past-statistic-an">
                                      <div class="past-statistic-ctn">
                                          <h3><span >Fecha:</span></h3>
                                          <p><?php
                                                  setlocale(LC_TIME, 'es_ES', 'esp_esp');
                                                  $fe = date("d.M.Y", strtotime($fecha_estudio));
                                                  $inicio = strftime("%d de %B del %Y", strtotime($fe));
                                                  echo $inicio; ?></p>
                                      </div>
                                  </div>
                              </div>
                          </div>-->
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <!--//Breadcomb area End-->
      <!--//Data Table area Start-->
      <?php
          include('pie.php');
          ?>
      <!--//End Footer area-->
      <!--//jquery		============================================ -->
      <script src="js/vendor/jquery-1.12.4.min.js"></script>
      <!--//bootstrap JS
		============================================ -->
      <script src="js/bootstrap.min.js"></script>
      <!--//wow JS
		============================================ -->
      <script src="js/wow.min.js"></script>
      <!--//price-slider JS
		============================================ -->
      <script src="js/jquery-price-slider.js"></script>
      <!--//owl.carousel JS
		============================================ -->
      <script src="js/owl.carousel.min.js"></script>
      <!--//scrollUp JS
		============================================ -->
      <script src="js/jquery.scrollUp.min.js"></script>
      <!--//counterup JS
		============================================ -->
      <script src="js/counterup/jquery.counterup.min.js"></script>
      <script src="js/counterup/waypoints.min.js"></script>
      <script src="js/counterup/counterup-active.js"></script>
      <!--//mCustomScrollbar JS
		============================================ -->
      <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
      <!--//sparkline JS
		============================================ -->
      <script src="js/sparkline/jquery.sparkline.min.js"></script>
      <script src="js/sparkline/sparkline-active.js"></script>
      <!--//flot JS
		============================================ -->
      <script src="js/flot/jquery.flot.js"></script>
      <script src="js/flot/jquery.flot.resize.js"></script>
      <script src="js/flot/flot-active.js"></script>
      <!--//knob JS
		============================================ -->
      <script src="js/knob/jquery.knob.js"></script>
      <script src="js/knob/jquery.appear.js"></script>
      <script src="js/knob/knob-active.js"></script>
      <!--// Chat JS
		============================================ -->
      <!--// todo JS
		============================================ -->
      <script src="js/todo/jquery.todo.js"></script>
      <!--// wave JS
		============================================ -->
      <script src="js/wave/waves.min.js"></script>
      <script src="js/wave/wave-active.js"></script>
      <!--//plugins JS
		============================================ -->
      <script src="js/plugins.js"></script>
      <!--//Data Table JS
		============================================ -->
      <script src="js/data-table/jquery.dataTables.min.js"></script>
      <script src="js/data-table/data-table-act.js"></script>
      <!--//main JS
		============================================ -->
      <!--//tawk chat JS
		============================================ -->
      <?php //include('js.php'); 
          ?>
  </body>

  </html>
<?php
  }
} else {
  header('Location: ../index.php');
  exit;
}
?>