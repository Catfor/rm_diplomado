<?php session_start();
error_reporting(1);
setlocale(LC_ALL, 'es_ES.UTF-8');
date_default_timezone_set('America/Mexico_City');
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  include('../coni/Localhost.php');
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

    <!-- Breadcomb area Start-->
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
                    <div class="breadcomb-ctn">
                      <h2>Resultados</h2>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      include('menu.php');
      ?>
    <div class="breadcomb-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="breadcomb-list">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <p> Fecha de Atención:</p><input id="ifecha" type="text" placeholder="yyyy/mm/dd">
                </div>


                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 input-group">
                  <p> Folio de Atención:</p><input id="iatencion" type="search" placeholder="id de atencion medica">
                </div>



                <div id="boton" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <div style="position: absolute;top: -34px;right: -802px;padding:10px;background:#a25cbf;color:#ffffff;"> Buscar
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcomb area End-->

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
                      <th>Paciente</th>
                      <th>Biopsias</th>
                      <th>Atencion</th>
                      <th>Resultados</th>
                      <th>Tratamientos</th>
                    </tr>
                  </thead>
                  <tbody id="contenidos">
                    <?php
                      $condiciones = "WHERE 1=1";
                      $query = "SELECT 	CONCAT( p.nombre_paciente, ' ', p.apellidos_paciente ) AS paciente, 	COUNT( * ) AS biopsias, 	COUNT( DISTINCT ct.id_atencion ) AS atencion, 	COUNT( ct.id_estudio_resultado ) AS resultados, 	COUNT( cm.id_receta) AS tratamientos FROM 	paciente p 	INNER JOIN ctrl_paciente_estudios ct ON p.id_paciente = ct.id_paciente  	INNER JOIN atencion_medica a on a.id_atencion_medica = ct.id_atencion AND ct.id_tipo_estudio <> 0  	LEFT JOIN ctrl_receta_medico cm on cm.id_paciente = p.id_paciente " . $condiciones . " GROUP BY 	p.nombre_paciente, 	p.apellidos_paciente";
                      $resultset = $mysqliL->query($query);
                      while ($fila = $resultset->fetch_assoc()) {
                        $paciente = ucwords($fila['paciente']);
                        $biopsias = $fila['biopsias'];
                        $atencion = $fila['atencion'];
                        $resultados = $fila['resultados'];
                        $tratamientos = $fila['tratamientos'];
                        echo "  <tr>
                                                  <td>$paciente </td>
                                                  <td>$biopsias</td>
                                                  <td>$atencion</td>
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

    <?php
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
      $(document).ready(function() {

        $("body").on("click", "#boton", function() {

          $.ajax({
            url: 'reportes_peticion.php',
            type: 'POST',
            data: 'fecha=' + $("#ifecha").val() + '&atencion=' + $("#iatencion").val(),
            success: function(result) {
              $("#contenidos").html(result)
            }
          });
        });

      });
    </script>

  </body>

  </html>

<?php } ?>