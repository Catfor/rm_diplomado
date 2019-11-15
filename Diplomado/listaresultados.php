<?php session_start();

setlocale(LC_ALL, 'es_ES.UTF-8');
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

  ?>
  <!doctype html>
  <html class="no-js" lang="">
  <link rel="shortcut icon" type="image/x-icon" href="../img/logo/corona.png">
  <script src="jquery.min.js"></script>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <style>
      td:not(:first-child) {
        text-align: center;
      }
    </style>
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

      include('menu.php');
      ?>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Start Header Top Area -->

    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->

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
                      <h2>Registro De Atenciones</h2>

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
    <!-- Breadcomb area End-->
    <!-- Data Table area Start-->

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
                      <th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Paciente</th>
                      <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Atenciones</th>
                      <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Paps</th>
                      <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Biopsias</th>
                      <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Pendientes</th>
                      <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Resultados</th>
                      <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Tratamientos</th>
                    </tr>
                  </thead>
                  <tbody id="contenidos">
                    <?php
                      $condiciones = "WHERE 1=1";
                      $query = "SELECT CONCAT(LOWER(p.nombre_paciente),' ',LOWER(p.apellidos_paciente)) AS paciente,COUNT(DISTINCT ct.id_atencion) AS atencion,COUNT(IF (ct.id_tipo_estudio IN (2,4,5,6),1,NULL)) AS biopsias,COUNT(IF (ct.id_tipo_estudio IN (7),1,NULL)) AS paps,COUNT(IF (ct.estatus_patologo = 0 AND ct.id_tipo_estudio IN ( 2, 4, 5, 6, 7 ),1,NULL)) AS pendientes,COUNT(IF (ct.estatus_patologo=1,1,NULL)) AS resultados,COUNT(cm.id_receta) AS tratamientos FROM paciente p INNER JOIN ctrl_paciente_estudios ct ON p.id_paciente=ct.id_paciente INNER JOIN atencion_medica a ON a.id_atencion_medica=ct.id_atencion AND ct.id_tipo_estudio<> 0 LEFT JOIN ctrl_receta_medico cm ON cm.id_paciente=p.id_paciente " . $condiciones . " GROUP BY 	p.nombre_paciente, 	p.apellidos_paciente";
                      $resultset = $mysqliL->query($query);
                      while ($fila = $resultset->fetch_assoc()) {
                        $paciente = ucwords($fila['paciente']);
                        $atencion = $fila['atencion'];
                        $paps = $fila['paps'];
                        $biopsias = $fila['biopsias'];
                        $pendientes = $fila['pendientes'];
                        $resultados = $fila['resultados'];
                        $tratamientos = $fila['tratamientos'];
                        echo "  <tr>";
                                     echo" <td>$paciente </td>
                                     <td>$atencion</td>
                                      <td>$paps</td>
                                      <td>$biopsias</td>
                                      <td>$pendientes</td>
                                      <td>$resultados</td>
                                      <td>$tratamientos</td>";
                        echo "</tr>";
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
    <!-- Data Table area End-->
    <!-- Start Footer area-->
    <?php
      include('pie.php');
      ?>
    <?php include('modal.php'); ?>
    <script src="custom.js"></script>
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

    <!-- tawk chat JS
		============================================ -->
    <?php include('js.php'); ?>
  </body>

  </html>
<?php

} else {
  header('Location: ../index.php');

  exit;
}





?>