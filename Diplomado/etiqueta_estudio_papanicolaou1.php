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
                        <a href="#"><img src="../img/logo/LOGO-BLANCO.png" width="130" height="100" /></a>

                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">

                            <li class="nav-item dropdown">


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
$id_paciente=$_GET['id_paciente'];
$id_estudio=$_GET['id_estudio'];
$id_tipo_estudio=$_GET['id_tipo_estudio'];
$id_usuario=$_GET['id_usuario'];#USUARIO QUIEN HIZO CONSULTA
$id_atencion=$_GET['id_atencion'];
$id_usu_pat=$_GET['id_usu_pat'];
$clasificacion_medico=$_GET['clasificacion_medico'];


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


if($clasificacion_medico==1){
?>

                <div class='alert-list'>
                            <div class='alert alert-danger alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert'
                                aria-label='Close'><span aria-hidden='true'>
                                <i class='notika-icon notika-close'></i></span>
                                </button>
                                    <CENTER> <H1>URGENTE</H1></CENTER>
                            </div>
                        </div>
                        <?php }?>
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
                                    <h2>Resultados Patologicos</h2>
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
<!--//Breadcomb area End-->
<!--//Data Table area Start-->
<form action='guardar_resultado_paps.php' method="post" >
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
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="breadcomb-list">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcomb-wp">
                          <div class="breadcomb-ctn">
                            <h5>1.-CALIDAD DE LA MUESTRA</h5>
                          </div>
                          </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <p>¿Presenta células endocervicales?
                            <label><input type="radio" name="celulas_endocervicales" value="1" > Si</label>
                            <label><input type="radio" name="celulas_endocervicales" value="0" > NO</label>
                               </p>
                           </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p>Cuenta con algùn Tipo de Seguro:</p>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <label><input type="checkbox" name="personality">C.PARABASAL     </label>
                              <label><input type="checkbox" name="personality">C.INTERMEDIA    </label>
                              <label><input type="checkbox" name="personality">C.SUPERFICIALES </label>
                        </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group ic-cmp-int float-lb floating-lb">
                                <div class="nk-int-st">
                                      <input type="text" name="Valor_estrogeneo" class="form-control">
                                      <label class="nk-label">Valor Estrogeneo %</label>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <b>  <font size=3> Flora Bacteriana</font></b>
                    </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                          <p>BACILAR
                            <label><input type="radio" name="celulas_endocervicales" value="1" > Si</label>
                            <label><input type="radio" name="celulas_endocervicales" value="0" > NO</label>
                               </p>

                              </div>
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                             <p>COCOIDE
                               <label><input type="radio" name="celulas_endocervicales" value="1" > Si</label>
                               <label><input type="radio" name="celulas_endocervicales" value="0" > NO</label>
                                  </p>
                        </div><br><br><br><br>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <p>MIXTA
                            <label><input type="radio" name="celulas_endocervicales" value="1" > Si</label>
                            <label><input type="radio" name="celulas_endocervicales" value="0" > NO</label>
                               </p>
                     </div>
                        </div>



                  </div>
                </div>
              </div>
              </div>
              </div>

              <div class="breadcomb-area">
              <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="breadcomb-list">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcomb-wp">
                          <div class="breadcomb-ctn">
                            <h5>2.-CLASIFICACION</h5>
                          </div>
                          </div>
                          </div>
                        </div>
                        <div class="row fila">

                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <p>

                            Clasificacion Urgencia   :<br></p>
                            <select name='clasificacion_medicoendo' id='clasificacion_medicoendo' class="form-control">
                              <option value="0" selected>Bajo Grado</option>
                              <option value="1">Alto Grado</option>
                              <option value="2">Cancer escamoso incitu</option>
                              <option value="3">Cancer Escamoso invasor</option>




                            </select>

                          </div>
                        </div><br>
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <p>¿Presenta células endocervicales?
                            <label><input type="radio" name="celulas_endocervicales" value="1" > Si</label>
                            <label><input type="radio" name="celulas_endocervicales" value="0" > NO</label>
                               </p>
                           </div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="breadcomb-area">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcomb-list">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="breadcomb-wp">
                                <div class="breadcomb-ctn">
                                  <h5>3.-ELEMENTOS INFLAMATORIOS</h5>
                                </div>
                                </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select name="polimorfonucleares" class="selectpicker" >
                                          <option value="" >POLIMORFONUCLEARES</option>
                                          <option value="si">SI</option>
                                          <option value="no" >NO</option>
                                </select>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select name="citolisis" class="selectpicker" >
                                          <option value="" >CITOLISIS</option>
                                          <option value="si">SI</option>
                                          <option value="no" >NO</option>
                                </select>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select name="parasitos_hongos" class="selectpicker" >
                                          <option value="" >PARASITOS/HONGOS</option>
                                          <option value="si">SI</option>
                                          <option value="no" >NO</option>
                                </select>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select name="tricomonas" class="selectpicker" >
                                          <option value="" >TRICOMONAS</option>
                                          <option value="si">SI</option>
                                          <option value="no" >NO</option>
                                </select>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select name="celulas_guia" class="selectpicker" >
                                          <option value="" >CELULAS GUIA</option>
                                          <option value="si">SI</option>
                                          <option value="no" >NO</option>
                                </select>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select name="histiocitos" class="selectpicker" >
                                          <option value="" >HISTIOCITOS</option>
                                          <option value="si">SI</option>
                                          <option value="no" >NO</option>
                                </select>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select name="eritrocitos" class="selectpicker" >
                                          <option value="" >ERITROCITOS</option>
                                          <option value="si">SI</option>
                                          <option value="no" >NO</option>
                                </select>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select name="candida" class="selectpicker" >
                                          <option value="" >CANDIDA</option>
                                          <option value="si">SI</option>
                                          <option value="no" >NO</option>
                                </select>
                                    </div>
                                </div>
                              </div>    <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="bootstrap-select fm-cmp-mg">
                                            <select name="otros" class="selectpicker" >
                                              <option value="" >OTROS</option>
                                              <option value="si">SI</option>
                                              <option value="no" >NO</option>
                                    </select>
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
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="breadcomb-list">
                                <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="basic-tb-hd">
                                        <h4>4.-INTERPRETACIÓN</h4>
                                    </div>
                                  </div><br><br><br><br>
                                  <div class="row">
                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <div class="form-group">
                                              <div class="nk-int-st">
                                                  <textarea class="form-control auto-size" rows="2" placeholder="INTERPRETACIÓN"></textarea>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="basic-tb-hd">
                                        <h4>OBSERVACIONES</h4>
                                    </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <div class="form-group">
                                              <div class="nk-int-st">
                                                  <textarea class="form-control auto-size" rows="2" placeholder="OBSERVACIONES"></textarea>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <p><input type="submit" value="Enviar datos"></p>
                      </div>

                      </form>

                              </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                              <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                                  <div class="past-day-statis">
                                      <h2>Paciente/Medico </h2>
                                      <p>Paciente:<?php echo $paciente;?></p>
                                        <p>Medico:<?php echo $medico;?></p>
                                  </div>
                                  <div class="past-day-statis">
                                      <h2>Atencion Medica </h2>
                                      <p>Paciente:<?php echo $paciente;?></p>

                                  </div>
                                  <div class="past-day-statis">
                                      <h2>Datos Papanicolau </h2>


                                  </div>
                                  <div class="past-statistic-an">
                                      <div class="past-statistic-ctn">
                                          <h3><span >Observaciones</span></h3>
                                          <p><?php echo $observaciones_papinocolau;?></p>
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







                                           echo $inicio;?></p>
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
<?php //include('js.php'); ?>
</body>

</html>
<?php
    }
} else {
    header('Location: ../index.php');

    exit;
}





?>
