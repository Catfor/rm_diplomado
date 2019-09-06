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
                        <a href="#"><img src="../img/logo/LOGO-BLANCO.png" width="100" height="100" /></a>

                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">

                            <li class="nav-item dropdown">


                            </li>
                            <li class="nav-item dropdown">
           <a href="logout.php"  role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class='notika-icon notika-close'></i></span></a>

                            </li>
                          </ul>
          </div>    </div>  </div>
        </div>
    </div>
    <?php include('css.php');  ?>


</head>
<body>
  <?php
  session_start();
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
  {
    include ('../coni/Localhost.php');
     $id=$_SESSION['id_usuario'];
        $nick=$_SESSION['nick'];
           $correo_general=$_SESSION['correo_general'];
              $nombre_usuario=ucwords($_SESSION['nombre_usuario']);
                       $rol=$_SESSION['rol'];
                        $apellidos_usuario=ucwords($_SESSION['apellidos_usuario']);

                       $result123 = mysqli_query($mysqliL, "SELECT contra from usu_me where id_usuario='$id'");


                         $rowwe = mysqli_fetch_assoc($result123);
                          $contra = $rowwe['contra'];
                          if($contra=='3d603c7c93fb63c7db2b1d99b1998bb6'){
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

                                      <?php  echo "</div>
                                    </div>
                                    <button class='btn btn-primary notika-btn-primary waves-effect' type='button' onclick='m()'>Mostrar Contraseña</button>
                                    <input type='submit' value='cambiar password'>
                                </div>






                                </div>"
                                ?>


  <?php

                          }
  else{
  ?>



      <!--[if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->
      <!-- Start Header Top Area -->

      <!-- End Header Top Area -->
      <!-- Mobile Menu start -->
    <?php

  include('menu.php');
     ?>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->

    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->

    <!-- Main Menu area End-->
	<!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">


              <!----------- ----------->
              <?php
              if(isset($_GET['nombre'])){
              if($_GET['nombre']){
            $nombre= $_GET['nombre'];
              //imprimes el error
              echo " <div class='alert-list'>
                  <div class='alert alert-success alert-dismissible' role='alert'>
                      <button type='button' class='close' data-dismiss='alert'
                       aria-label='Close'><span aria-hidden='true'>
                       <i class='notika-icon notika-close'></i></span>
                       </button>
                    Se dio de alta el paciente  $nombre
                 </div>



              </div>";
              }

              }

              ?>


              <!----------- ----------->
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-form"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Alta Paciente</h2>
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
    <!-- Form Element area Start-->
      <form id="tuformulario" name="tuformulario" action="alta_guardar_paciente.php" method="GET" onsubmit="pregunta()">
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>Datos Generales Del Paciente</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="nombre_paciente" id="nombre_paciente" class="form-control" placeholder="Nombres del paciente"  required>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="apellidos_paciente" id="apellidos_paciente" class="form-control" placeholder="Apellidos Del Paciente"  required>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group nk-datapk-ctm form-elet-mg" id="data_3">
                                <div class="input-group date nk-int-st">

                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="edad_paciente" placeholder="Ingresa Fecha de Nacimiento" required>
                                    </div>
                                </div>
                            </div>

                        </div> <br>
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="bootstrap-select fm-cmp-mg">
                                  <select name="estado_civil" class="selectpicker" required>
                                    <option value="" >Selecciona Estado Civil</option>
                                    <option value="soltera" >Soltera</option>
                                    <option value="Casada" >Casada</option>
                                    <option value="Divorciada" >Divorciada</option>
                                    <option value="Viuda" >Viuda</option>
                          </select>
                              </div>
                          </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-house"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="direccion_paciente" class="form-control" placeholder="Dirección Paciente">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="municipio_paciente" class="form-control" placeholder="Municipio">
                                    </div>
                                </div>
                            </div>




                        </div> <br>
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group ic-cmp-int form-elet-mg res-mg-fcs">
                                  <div class="form-ic-cmp">
                                      <i class="notika-icon notika-star"></i>
                                  </div>
                                  <div class="nk-int-st">
                                      <input type="text" name="codigo_postal"class="form-control" data-mask="99999" placeholder="Código Postal:">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="bootstrap-select fm-cmp-mg">
                                  <select name="ingresomensual" class="selectpicker" required>
                                        <option value="">Selecciona Ingreso Mensual</option>
                                    <option value="Menos de $2,000" >Menos de $2,000</option>
                                    <option value="Entre $2,000 y $6,000">Entre $2,001 y $6,000</option>
                                    <option value="Entre $6,001 y $12,000" >Entre $6,001 y $12,000</option>
                                    <option value="Entre $6,001 y $12,000" >Entre $12,001 y $18,000</option>
                                    <option value="Entre $6,001 y $12,000" >Entre $18,001 y $23,000</option>
                                    <option value="Más de $12,001" >Más de $23,001</option>
                          </select>
                              </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="bootstrap-select fm-cmp-mg">
                                  <select name="escolaridad_paciente" class="selectpicker" required>
                                    <option value="">Selecciona Grado de Escolaridad</option>
                                    <option value="sin estudios" >Sin estudios</option>
                                    <option value="primaria">Primaria</option>
                                    <option value="secundaria" >Secundaria</option>
                                    <option value="preparatoria">Preparatoria</option>
                                    <option value="universidad">Universidad</option>
                          </select>
                              </div>
                          </div>

                        </div> <br><br>
                        <div class="row">

                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="bootstrap-select fm-cmp-mg">
                                  <select name='apoyo_gubernamental_paciente' id='apoyo_gubernamental_paciente' class="selectpicker" required>
                                    <option value="" >¿Cuenta con algún tipo de seguro?...</option>
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                          </select>
                              </div>
                          </div>
                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                              <div class="form-group ic-cmp-int">

                                  <div class="nk-int-st">
                                      <input id="razon_apoyo_paciente" name='razon_apoyo_paciente' type="text" class="form-control" placeholder="¿Cùal?" disabled>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                  <div class="basic-tb-hd">
                                <p>Cuenta con algún Tipo de Seguro:</p>
                                  </div>


                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        <label class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><input type="checkbox"  value='imss' name="tipo_seguro[]"> IMSS    </label>
                                        <label class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><input type="checkbox"  value='isste' name="tipo_seguro[]"> ISSTE  </label>
                                        <label class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><input type="checkbox"  value='seguro_popular' name="tipo_seguro[]"> Seguro Popular  </label>
                                        <label class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><input type="checkbox"  value='sgmm' name="tipo_seguro[]"> SGMM  </label>
                                      </div>


                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="cmp-tb-hd">
                            <h2>DATOS DE UN FAMILIAR</h2>

                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="nombre_familiar_paciente" class="form-control">
                                        <label class="nk-label">Nombre de un Familiar</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-phone"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input name='telefono_familiar_paciente' type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Telefon de Casa de Familiar">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-phone"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input name='celular_familiar_paciente' type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Numero Celular de Familiar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="cmp-tb-hd">
                            <h2>DATOS DE UN CONTACTO</h2>

                        </div>
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group ic-cmp-int float-lb floating-lb">
                                  <div class="form-ic-cmp">
                                      <i class="notika-icon notika-support"></i>
                                  </div>
                                  <div class="nk-int-st">
                                      <input type="text" name="nombre_contacto_paciente" class="form-control">
                                      <label class="nk-label">Nombre de Contacto</label>
                                  </div>
                              </div>
                          </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-phone"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input name='telefono_contacto_paciente' type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Telefono de Casa de Contacto">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-phone"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input name='celular_contacto_paciente'  type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Numero Celular de Contacto">
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
<br>
    <input type="submit" style="border: #000 1px solid; background-color: #ed80a8" value="Enviar formulario">
</form>

<script language="JavaScript">
$( function() {
    $("#apoyo_gubernamental_paciente ").change( function() {
        if ($(this).val() === "no") {
            $("#razon_apoyo_paciente ").prop("disabled", true);
        }
else if($(this).val() === ""){
$("#razon_apoyo_paciente ").prop("disabled", true);
}

        else {
            $("#razon_apoyo_paciente ").prop("disabled", false);
        }
    });
});</script>
<script language="JavaScript">
function pregunta(){
    if (confirm('¿Estas seguro de enviar este formulario?')){
       document.tuformulario.submit()
    }
}
</script>
<!-- Contact area End-->
<!-- Start Footer area--><br><br>
<?php
include('pie.php');
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

<script src="../js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
============================================ -->
<script src="../js/bootstrap.min.js"></script>
  <!-- wow JS
============================================ -->
<script src="../js/wow.min.js"></script>
  <!-- price-slider JS
============================================ -->
<script src="../js/jquery-price-slider.js"></script>
<!-- owl.carousel JS
============================================ -->
<script src="../js/owl.carousel.min.js"></script>
  <!-- scrollUp JS
============================================ -->
<script src="../js/jquery.scrollUp.min.js"></script>
<!-- meanmenu JS
============================================ -->
<script src="../js/meanmenu/jquery.meanmenu.js"></script>
<!-- counterup JS
============================================ -->
<script src="../js/counterup/jquery.counterup.min.js"></script>
<script src="../js/counterup/waypoints.min.js"></script>
<script src="../js/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS
============================================ -->
<script src="../js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- sparkline JS
============================================ -->
<script src="../js/sparkline/jquery.sparkline.min.js"></script>
<script src="../js/sparkline/sparkline-active.js"></script>
<!-- flot JS
============================================ -->
<script src="../js/flot/jquery.flot.js"></script>
<script src="../js/flot/jquery.flot.resize.js"></script>
<script src="../js/flot/flot-active.js"></script>

<!-- knob JS
============================================ -->
<script src="../js/knob/jquery.knob.js"></script>
<script src="../js/knob/jquery.appear.js"></script>
<script src="../js/knob/knob-active.js"></script>
<script src="../js/wave/waves.min.js"></script>
<script src="../js/wave/wave-active.js"></script>
<!-- Input Mask JS
============================================ -->
<script src="../js/jasny-bootstrap.min.js"></script>
<!-- icheck JS
============================================ -->
<script src="../js/icheck/icheck.min.js"></script>
<script src="../js/icheck/icheck-active.js"></script>
<!--  Chat JS
============================================ -->

<!--  todo JS
============================================ -->
<script src="../js/todo/jquery.todo.js"></script>
<!-- icheck JS
============================================ -->
<script src="../js/icheck/icheck.min.js"></script>
<script src="../js/icheck/icheck-active.js"></script>
<!-- rangle-slider JS
============================================ -->
<script src="../js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
<script src="../js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
<script src="../js/rangle-slider/rangle-active.js"></script>
<!-- datapicker JS
============================================ -->
<script src="../js/datapicker/bootstrap-datepicker.js"></script>
<script src="../js/datapicker/datepicker-active.js"></script>
<!-- bootstrap select JS
============================================ -->
<script src="../js/bootstrap-select/bootstrap-select.js"></script>
<!--  color-picker JS
============================================ -->
<script src="../js/color-picker/farbtastic.min.js"></script>
<script src="../js/color-picker/color-picker.js"></script>
<!--  notification JS
============================================ -->
<script src="../js/notification/bootstrap-growl.min.js"></script>
<script src="../js/notification/notification-active.js"></script>
<!--  summernote JS
============================================ -->
<script src="../js/summernote/summernote-updated.min.js"></script>
<script src="../js/summernote/summernote-active.js"></script>
<!-- dropzone JS
============================================ -->
<script src="../js/dropzone/dropzone.js"></script>
<!--  wave JS
============================================ -->
<script src="../js/wave/waves.min.js"></script>
<script src="../js/wave/wave-active.js"></script>
<!--  chosen JS
============================================ -->
<script src="../js/chosen/chosen.jquery.js"></script><script src="../js/main.js"></script>
<!--  todo JS
============================================ -->

<!-- autosize JS
============================================ -->
<script src="../js/autosize.min.js"></script>
<!-- plugins JS
============================================ -->
<script src="../js/plugins.js"></script>
<!-- and drop JS
============================================ -->
<script src="../jquery-3.0.0.js" type="text/javascript"></script>

<script src="../dropzone.min.js"></script>
<script src="../script.js" type="text/javascript"></script>
<!-- main JS
============================================ -->
<script src="../js/main.js"></script>
<script language="JavaScript">
$( function() {
    $("#apoyo_gubernamental_paciente").change( function() {
        if ($(this).val() === "no") {
            $("#razon_apoyo_paciente ").prop("disabled", true);
        }
else if($(this).val() === ""){
$("#razon_apoyo_paciente").prop("disabled", true);
}



        else {
            $("#razon_apoyo_paciente").prop("disabled", false);
        }
    });
});
</script>
</body>

</html>
