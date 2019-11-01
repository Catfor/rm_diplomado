<?php session_start();
setlocale(LC_ALL, 'es_ES.UTF-8');
date_default_timezone_set('America/Mexico_City');
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
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
              <a href="sistema.php"><img src="../img/logo/LOGO-BLANCO.png" height="100" /></a>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="header-top-menu">
              <ul class="nav navbar-nav notika-top-nav">
                <li class="nav-item dropdown">
                </li>
                <li class="nav-item dropdown">
                  <a href="logout.php" role="button" aria-expanded="false" class="nav-link dropdown-toggle"> Salir <span><i class="fas fa-door-open"></i></span></a>
                  <p style='color:white;'> Usuario: <b>
                      <?php echo ucwords($_SESSION['nombre_usuario']) . ' ' . ucwords($_SESSION['apellidos_usuario']);  ?></b></p>
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
        <div class="tarjetaTratamiento">
          <div style="width:100%;">
            <div id="listaTratamientos" style="float: right; cursor: pointer;"><i class="far fa-times-circle"></i></div>
            <h3>Tratamientos previos:</h3>
          </div>
          <div class="lista">
          </div>
        </div>
    <?php
      include('../coni/Localhost.php');
      $id = $_SESSION['id_usuario'];
      $nick = $_SESSION['nick'];
      $correo_general = $_SESSION['correo_general'];
      $nombre_usuario = ucwords(strtolower($_SESSION['nombre_usuario']));
      $rol = $_SESSION['rol'];
      $apellidos_usuario = ucwords(strtolower($_SESSION['apellidos_usuario']));
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
      <?php
          include('menu.php');
          ?>
      <?php
          if (isset($_GET['nombres'])) {
            if ($_GET['nombres']) {
              $nombre = $_GET['nombres'];
              //imprimes el error
              echo " <div class='alert-list'>
         <div class='alert alert-success alert-dismissible' role='alert'>
             <button type='button' class='close' data-dismiss='alert'
              aria-label='Close'><span aria-hidden='true'>
              <i class='notika-icon notika-close'></i></span>
              </button>
           Atencion Medica Agregada Correctamente de   $nombre
        </div>
     </div>";
            }
          }
          ?>
      <?php if ($rol == 'Medico' || $rol == 'Admin') { ?>
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
                          <h2>Pacientes Registrados</h2>
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
        <div class="data-table-area">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                  <div class="basic-tb-hd">
                  </div>
                  <div class="table-responsive">
                    <table id="data-table-basic" class="table table-striped">
                      <thead>
                        <tr>
                          <th>Id </th>
                          <th>Nombre Completo </th>
                          <th>Fecha Nac. </th>
                          <th>Fecha At. Médica </th>
                          <th style='text-align:center'>Opciones </th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                              $consultasemanas = "SELECT 	p.nombre_paciente, 	p.apellidos_paciente, 	p.fecha_nacimiento_paciente, 	p.edad_paciente, 	p.fecha_creacion, 	p.codigo_postal, 	p.id_paciente, 	a.fecha_atencion_medica, 	ct.id_receta FROM 	paciente AS p 	LEFT JOIN atencion_medica a ON a.id_paciente = p.id_paciente  	AND a.fecha_atencion_medica = ( SELECT MAX( a2.fecha_atencion_medica ) FROM atencion_medica a2 WHERE a2.id_paciente = p.id_paciente )  	LEFT JOIN ctrl_receta_medico ct ON ct.id_paciente =  p.id_paciente  	AND ct.id_receta = (SELECT MAX(ct2.id_receta) FROM ctrl_receta_medico ct2 WHERE ct2.id_paciente = p.id_paciente) ORDER BY 	p.apellidos_paciente, 	p.nombre_paciente ASC";
                              $resultadosemanas = $mysqliL->query($consultasemanas);
                              while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
                                $nombre_paciente = ucwords(strtolower($resultadosemanas1['nombre_paciente']));
                                $apellidos_paciente = ucwords(strtolower($resultadosemanas1['apellidos_paciente']));
                                $fecha_nacimiento_paciente = $resultadosemanas1['fecha_nacimiento_paciente'];
                                $edad_paciente = $resultadosemanas1['edad_paciente'];
                                $fecha_creacion = $resultadosemanas1['fecha_creacion'];
                                $codigo_postal = $resultadosemanas1['codigo_postal'];
                                $id_paciente = $resultadosemanas1['id_paciente'];
                                $fecha_atencion_medica = $resultadosemanas1['fecha_atencion_medica'];
                                $id_receta = $resultadosemanas1['id_receta'];
                                echo "<tr>
                                  <td>$id_paciente</td>
                                  <td>$nombre_paciente $apellidos_paciente</td>
                                  <td>$fecha_nacimiento_paciente</td>
                                  <td>$fecha_atencion_medica</td>
                                  <td style='text-align:center'>"; 
                                    echo (isset($id_receta) ? "<button id='btnTratamiento' type='button' class='btn btn-primary' data-toggle='tooltip' title='Mostrar Tratamientos'><i class='fas fa-list'></i></button> <input type='hidden' value='$id_paciente'>" : "") ;
                                    echo" <a href='form_receta.php?id_paciente=$id_paciente'><button type='button' class='btn btn-primary' data-toggle='tooltip' title='Nuevo Tratamiento'><i class='far fa-plus-square'></i></button></a>
                                  </td>
                                </tr>";
                              }
                              ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php }
          include('pie.php');
          ?>
      <!-- End Footer area-->
      <!-- jquery
		============================================ -->
      <script src="js/vendor/jquery-1.12.4.min.js"></script>
      <!-- bootstrap JS
		============================================ -->
      <script src="js/bootstrap.min.js"></script>
      <!-- wow JS
		============================================ -->
      <script src="js/wow.min.js"></script>
      <!-- price-slider JS
		============================================ -->
      <script src="js/jquery-price-slider.js"></script>
      <!-- owl.carousel JS
		============================================ -->
      <script src="js/owl.carousel.min.js"></script>
      <!-- scrollUp JS
		============================================ -->
      <script src="js/jquery.scrollUp.min.js"></script>
      <!-- counterup JS
		============================================ -->
      <script src="js/counterup/jquery.counterup.min.js"></script>
      <script src="js/counterup/waypoints.min.js"></script>
      <script src="js/counterup/counterup-active.js"></script>
      <!-- mCustomScrollbar JS
		============================================ -->
      <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
      <!-- sparkline JS
		============================================ -->
      <script src="js/sparkline/jquery.sparkline.min.js"></script>
      <script src="js/sparkline/sparkline-active.js"></script>
      <!-- flot JS
		============================================ -->
      <script src="js/flot/jquery.flot.js"></script>
      <script src="js/flot/jquery.flot.resize.js"></script>
      <script src="js/flot/flot-active.js"></script>
      <!-- knob JS
		============================================ -->
      <script src="js/knob/jquery.knob.js"></script>
      <script src="js/knob/jquery.appear.js"></script>
      <script src="js/knob/knob-active.js"></script>
      <!--  Chat JS
		============================================ -->
      <!--  todo JS
		============================================ -->
      <script src="js/todo/jquery.todo.js"></script>
      <!--  wave JS
		============================================ -->
      <script src="js/wave/waves.min.js"></script>
      <script src="js/wave/wave-active.js"></script>
      <!-- plugins JS
		============================================ -->
      <script src="js/plugins.js"></script>
      <!-- Data Table JS
		============================================ -->
<script src="js/data-table/jquery.dataTables.min.js"></script>
<script src="js/data-table/data-table-act.js"></script>
      <!-- main JS
		============================================ -->
      <script src="js/main.js"></script>
      <!-- tawk chat JS
		============================================ -->
      <script>
        $("body").on("click", "#listaTratamientos", function() {
          $(this).parents(".tarjetaTratamiento").slideUp();
        });
        $("body").on("click", "#btnTratamiento", function() {
          $(".tarjetaTratamiento").slideDown();
          idPaciente = $(this).nextAll("input").val();
          $.ajax({
            url: 'consulta_paciente_receta_peticion.php',
            type: 'POST',
            data: 'id=' + idPaciente,
            success: function(result) {
              $(".lista").html(result);
            }
          });
        });
      </script>
  </body>

  </html>
<?php
  }
} else {
  header('Location: ../index.php');
  exit;
}
?>