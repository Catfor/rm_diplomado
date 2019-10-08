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
                        <a href="#"><img src="../img/logo/LOGO-BLANCO.png" height="100" /></a>

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
    include('../css.php');
    ?>
</head>

<body>
    <?php

        include('../../coni/Localhost.php');
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

        include('../menu.php');
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
FROM   estudio_vulvoscopia e INNER JOIN ctrl_paciente_estudios c ON
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
<form action='guardar_resultado_biopsa.php' method="get" id="gform">


  <input type="hidden" name="id_paciente" value="<?php echo $id_paciente;?>">
  <input type="hidden" name="id_estudio" value="<?php echo $id_estudio;?>">
  <input type="hidden" name="id_tipo_estudio" value="<?php echo $id_tipo_estudio;?>">
  <input type="hidden" name="id_atencion" value="<?php echo $id_atencion;?>"><div class="breadcomb-area">
  <input type="hidden" name="idusuario" value="<?php echo $idusuario;?>"><div class="breadcomb-area">

	<div class="breadcomb-area">
			<div class="container">
				<div class="row">



					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="breadcomb-list">
							<div class="row">


								Clasificacion Urgencia   :<br></p>
								<select name='clasifiacion_patologo' id='clasifiacion_patologo' class="form-control">
									<option value="0" selected>Bajo Grado</option>
									<option value="1">Alto Grado</option>
									<option value="2">Cancer escamoso incitu</option>
									<option value="3">Cancer Escamoso invasor</option>




								</select>
							</div>
						</div>
					</div>







					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="breadcomb-list">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                <div class="basic-tb-hd">
	                    <h4>DESCRIPCION MICROSCOPICA</h4>

	                </div>
								</div>

	              <div class="row">
	                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                      <div class="form-group">
	                          <div class="nk-int-st">
	                              <textarea class="form-control auto-size" rows="2" placeholder="DESCRIPCION MICROSCOPICA" name='descripcion_microscopica' form="gform"></textarea>
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
	      <div class="row">
	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	          <div class="breadcomb-list">
	            <div class="row">
	              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                <div class="basic-tb-hd">
	                    <h4>DESCRIPCION MACROSCOPICA</h4>
	                </div>
	              </div>
	              <div class="row">
	                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                      <div class="form-group">
	                          <div class="nk-int-st">
	                              <textarea class="form-control auto-size" rows="2" placeholder="DESCRIPCION MACROSCOPICA" name='descripcion_macroscopica' form="gform"></textarea>
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
		<!-- Breadcomb area End-->
	  <div class="breadcomb-area">
	    <div class="container">
	      <div class="row">
	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	          <div class="breadcomb-list">
	            <div class="row">
	              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                <div class="basic-tb-hd">
	                    <h4>IMPRESIÓN DIAGNOSTICA</h4>
	                </div>
	              </div>
	              <div class="row">
	                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                      <div class="form-group">
	                          <div class="nk-int-st">
	                              <textarea class="form-control auto-size" rows="2" placeholder="IMPRESIÓN DIAGNOSTICA" name='impresion_diagnostica' form="gform"></textarea>
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
	      <div class="row">
	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	          <div class="breadcomb-list">
	            <div class="row">
	              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                <div class="basic-tb-hd">
	                    <h4>OBSERVACIONES</h4>
	               </div>
	              </div>
	              <div class="row">
	                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                      <div class="form-group">
	                          <div class="nk-int-st">
	                              <textarea class="form-control auto-size" rows="2" placeholder="OBSERVACIONES" name='observaciones' form="gform"></textarea>
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
                        <center><p><input type="submit" value="Enviar datos"></p></center>




 <!--//Breadcomb area End-->
 <!--//Data Table area Start-->


<?php
        include('../pie.php');
        ?>
<!--//End Footer area-->
<!--//jquery		============================================ -->
<script src="../js/vendor/jquery-1.12.4.min.js"></script>
<!--//bootstrap JS
		============================================ -->
<script src="../js/bootstrap.min.js"></script>
<!--//wow JS
		============================================ -->
<script src="../js/wow.min.js"></script>
<!--//price-slider JS
		============================================ -->
<script src="../js/jquery-price-slider.js"></script>
<!--//owl.carousel JS
		============================================ -->
<script src="../js/owl.carousel.min.js"></script>
<!--//scrollUp JS
		============================================ -->
<script src="../js/jquery.scrollUp.min.js"></script>

<!--//counterup JS
		============================================ -->
<script src="../js/counterup/jquery.counterup.min.js"></script>
<script src="../js/counterup/waypoints.min.js"></script>
<script src="../js/counterup/counterup-active.js"></script>
<!--//mCustomScrollbar JS
		============================================ -->
<script src="../../js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!--//sparkline JS
		============================================ -->
<script src="../js/sparkline/jquery.sparkline.min.js"></script>
<script src="../js/sparkline/sparkline-active.js"></script>
<!--//flot JS
		============================================ -->
<script src="../js/flot/jquery.flot.js"></script>
<script src="../js/flot/jquery.flot.resize.js"></script>
<script src="../js/flot/flot-active.js"></script>
<!--//knob JS
		============================================ -->
<script src="../js/knob/jquery.knob.js"></script>
<script src="../js/knob/jquery.appear.js"></script>
<script src="../js/knob/knob-active.js"></script>
<!--// Chat JS
		============================================ -->

<!--// todo JS
		============================================ -->
<script src="../js/todo/jquery.todo.js"></script>
<!--// wave JS
		============================================ -->
<script src="../js/wave/waves.min.js"></script>
<script src="../js/wave/wave-active.js"></script>
<!--//plugins JS
		============================================ -->
<script src="../js/plugins.js"></script>
<!--//Data Table JS
		============================================ -->
<script src="../js/data-table/jquery.dataTables.min.js"></script>
<script src="../js/data-table/data-table-act.js"></script>
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
