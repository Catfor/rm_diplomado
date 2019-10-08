<?php session_start();  ?>
<!doctype html>
<html class="no-js" lang="">
<link rel="shortcut icon" type="image/x-icon" href="../img/logo/corona.png">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <div class="header-top-area">
    <div class="container">
      <div class="row fila">
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
  include('css.php');
  ?>

</head>

<body>
  <?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
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





      <div class="breadcomb-area">
        <div class="container">

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="breadcomb-list">
              <div class="row fila">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="breadcomb-wp">
                    <div class="breadcomb-icon">
                      <i class="notika-icon notika-form"></i>
                    </div>
                    <div class="breadcomb-ctn">
                      <h2>CITOLOGÍA EXFOLIATIVA</h2>
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
      <div class="form-element-area">
        <div class="container">

          <div class="row fila">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="form-element-list">
                <div class="basic-tb-hd">
                  <h2 class="cabecera-morada">DATOS GENERALES</h2>

                </div>




                  <form id="f" action='guardar_atencion_medica.php' method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="idpaciente" value="<?php echo $idpaciente ?>">
<input type="hidden" class="form-control" name="id_usuario" value="<?php echo $id ?>">

<div class="row fila">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="form-group ic-cmp-int">
      <div class="form-ic-cmp">
          <i class="notika-icon notika-support"></i>
      </div>
      <div class="nk-int-st">
            <input type="text" name="nombre_paciente" id="nombre_paciente" class="form-control" placeholder="Nombres del paciente" value="" required>
      </div>
  </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <div class="nk-int-st">
            <input type="text" name="apellidos_paciente" id="apellidos_paciente" class="form-control" placeholder="Apellidos Del Paciente" value="" required>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group ic-cmp-int" id="data_3">
                        <div class="form-ic-cmp">
                            <i class="notika-icon notika-calendar"></i>
                        </div>
                        <div class="input-group date nk-int-st">
                            <span class="input-group-addon" style="border: 0px;"></span>
                            <input type="text" class="form-control" name="edad_paciente" placeholder="Ingresa Fecha de Nacimiento" value="" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <div class="nk-int-st">
                            <input type="text" class="form-control" name="edad_paciente" placeholder="Edad" value="" required>
                        </div>
                    </div>
                </div>

</div>
<div class="row fila">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<p>
  Sexo:<br>
  <label><input type="radio" name="antecedente_cancer" value="femenino">Femenino</label>
  <label><input type="radio" name="antecedente_cancer" value="masculino">Masculino</label>
</p>
</div>
</div>

  <div class="row fila">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group ic-cmp-int">
          <div class="form-ic-cmp">
              <i class="notika-icon notika-support"></i>
          </div>
            <div class="nk-int-st">
                <input type="text" class="form-control" name="medico_solicitante" placeholder="Medico Solicitante" value="" required>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <div class="nk-int-st">
                <input type="text" class="form-control" name="estudio" placeholder="Estudio" value="" required>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-default filaInterna">
        <div class="panel-heading">1.-Clasificación</div>

      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<label><input type="checkbox" name="personality">Bajo grado </label>
<label><input type="checkbox" name="personality">Alto grado  </label>

</div>
</div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

      <div class="bootstrap-select fm-cmp-mg">
        <select name="tratamiento_previo" class="selectpicker" required>
          <option value="">URGENTE</option>
          <option value="Satisfactoria">cancer Escamoso insitu</option>
          <option value="Insatisfactoria">cancer escamoso invasor</option>

        </select>
      </div>
    </div>





                      <div class="row fila">


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="panel panel-default filaInterna">
                            <div class="panel-heading">2.-Calidad de la muestra</div>

                          </div>
                        </div>


                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="bootstrap-select fm-cmp-mg">
                          <select name="tratamiento_previo" class="selectpicker" required>
                            <option value="">¿Presenta células endocervicales?</option>
                            <option value="Satisfactoria">Satisfactoria</option>
                            <option value="Insatisfactoria">Insatisfactoria</option>


                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="bootstrap-select fm-cmp-mg">
                          <select name="tratamiento_previo" class="selectpicker" required>
                            <option value="">Calidad de la muestra</option>
                            <option value="1">SI</option>
                            <option value="0">NO</option>

                          </select>
                        </div>
                      </div>


                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default filaInterna">
                          <div class="panel-heading">3.-Indice de mduracón</div>

                        </div>
                      </div>


  <div class="row fila">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="notika-btn-hd">
            <h4>Indice de maduración</h4>

          </div>
                  <label><input type="checkbox" name="personality">C.PARABASAL     </label>
                  <label><input type="checkbox" name="personality">C.INTERMEDIA    </label>
                  <label><input type="checkbox" name="personality">C.SUPERFICIALES </label>
            </div>
            </div>
  <div class="row fila">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group ic-cmp-int float-lb floating-lb">
                    <div class="nk-int-st">
                          <input type="text" name="Valor_estrogeneo" class="form-control">
                          <label class="nk-label">Valor Estrogeneo %</label>
                      </div>
                  </div>
              </div>
                </div>

  <div class="row fila">
    <div class="notika-btn-hd">
<h4>Flora Bacteriana
</h4>

</div>

              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                          <p>BACILAR
                            <label><input type="radio" name="celulas_endocervicales" value="1" required> Si</label>
                            <label><input type="radio" name="celulas_endocervicales" value="0" required> NO</label>
                               </p>

                              </div>


                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                             <p>COCOIDE
                               <label><input type="radio" name="celulas_endocervicales" value="1" required> Si</label>
                               <label><input type="radio" name="celulas_endocervicales" value="0" required> NO</label>
                                  </p>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <p>MIXTA
                            <label><input type="radio" name="celulas_endocervicales" value="1" required> Si</label>
                            <label><input type="radio" name="celulas_endocervicales" value="0" required> NO</label>
                               </p>
                     </div>
                     </div>

              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default filaInterna">
                  <div class="panel-heading">4.-Elementos inflamantorios</div>

                </div>

              </div>
              <div class="row fila">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="bootstrap-select fm-cmp-mg">
                            <select name="polimorfonucleares" class="selectpicker" required>
                              <option value="" >POLIMORFONUCLEARES</option>
                              <option value="si">SI</option>
                              <option value="no" >NO</option>
                    </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="bootstrap-select fm-cmp-mg">
                        <select name="citolisis" class="selectpicker" required>
                          <option value="" >CITOLISIS</option>
                          <option value="si">SI</option>
                          <option value="no" >NO</option>
                </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <div class="bootstrap-select fm-cmp-mg">
                          <select name="parasitos_hongos" class="selectpicker" required>
                            <option value="" >PARASITOS/HONGOS</option>
                            <option value="si">SI</option>
                            <option value="no" >NO</option>
                  </select>
                      </div>
                  </div>
                  </div>
                  <div class="row fila">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select name="tricomonas" class="selectpicker" required>
                                                  <option value="" >TRICOMONAS</option>
                                                  <option value="si">SI</option>
                                                  <option value="no" >NO</option>
                                        </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <div class="bootstrap-select fm-cmp-mg">
                              <select name="celulas_guia" class="selectpicker" required>
                                <option value="" >CELULAS GUIA</option>
                                <option value="si">SI</option>
                                <option value="no" >NO</option>
                      </select>
                          </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <div class="bootstrap-select fm-cmp-mg">
                              <select name="histiocitos" class="selectpicker" required>
                                <option value="" >HISTIOCITOS</option>
                                <option value="si">SI</option>
                                <option value="no" >NO</option>
                      </select>
                          </div>
                      </div>
                                      </div>
                                      <div class="row fila">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="bootstrap-select fm-cmp-mg">
                        <select name="eritrocitos" class="selectpicker" required>
                          <option value="" >ERITROCITOS</option>
                          <option value="si">SI</option>
                          <option value="no" >NO</option>
                </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <div class="bootstrap-select fm-cmp-mg">
                          <select name="candida" class="selectpicker" required>
                            <option value="" >CANDIDA</option>
                            <option value="si">SI</option>
                            <option value="no" >NO</option>
                  </select>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <div class="bootstrap-select fm-cmp-mg">
                          <select name="otros" class="selectpicker" required>
                            <option value="" >OTROS</option>
                            <option value="si">SI</option>
                            <option value="no" >NO</option>
                  </select>
                      </div>
                  </div>
              </div>
              <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default filaInterna">
                  <div class="panel-heading">5.-Interpretaciòn</div>

                </div>

              </div>
              </div>

              <div class="row fila">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <div class="floating-numner">
                      <p>Interpretaciòn</p>
                    </div>
                    <div class="nk-int-st">
                      <textarea class="form-control auto-size" rows="2"  name="atecedentes_lesion" form="f1"></textarea>

                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default filaInterna">
                  <div class="panel-heading">6.-Observaciones</div>

                </div>

              </div>
              </div>

              <div class="row fila">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <div class="floating-numner">
                      <p>Observaciones</p>
                    </div>
                    <div class="nk-int-st">
                      <textarea class="form-control auto-size" rows="2"  name="atecedentes_lesion" form="f1"></textarea>

                    </div>
                  </div>
                </div>
              </div>




  </div>








              </div>
            </div>
          </div>
        </div>

          <center> <button type="submit" class="btn btn-primary">Enviar</button></center>


        <br>

        <!--<center><input type="submit" style="border: #000 1px solid; background-color: #ed80a8" value="Enviar formulario"></center>-->


        </form>


    <!-- Form Element area End-->

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
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
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
    <!-- Input Mask JS
		============================================ -->
    <script src="js/jasny-bootstrap.min.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!--  Chat JS
		============================================ -->

    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- rangle-slider JS
    ============================================ -->
    <script src="js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
    <script src="js/rangle-slider/rangle-active.js"></script>
    <!-- datapicker JS
    ============================================ -->
    <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>
    <!-- bootstrap select JS
    ============================================ -->
    <script src="js/bootstrap-select/bootstrap-select.js"></script>
    <!--  color-picker JS
    ============================================ -->
    <script src="js/color-picker/farbtastic.min.js"></script>
    <script src="js/color-picker/color-picker.js"></script>
    <!--  notification JS
    ============================================ -->
    <script src="js/notification/bootstrap-growl.min.js"></script>
    <script src="js/notification/notification-active.js"></script>
    <!--  summernote JS
    ============================================ -->
    <script src="js/summernote/summernote-updated.min.js"></script>
    <script src="js/summernote/summernote-active.js"></script>
    <!-- dropzone JS
    ============================================ -->

    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  chosen JS
		============================================ -->
    <script src="js/chosen/chosen.jquery.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- autosize JS
		============================================ -->
    <script src="js/autosize.min.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- and drop JS
		============================================ -->

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
