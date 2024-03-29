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



      <!--[if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->
      <!-- Start Header Top Area -->

      <!-- End Header Top Area -->
      <!-- Mobile Menu start -->


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
                      <h2>ATENCIÓN MÉDICA</h2>
                    </div>
                  </div>
                  <div class="row fila">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group ic-cmp-int form-elet-mg">

                        <div class="nk-int-st">
                          <p>Paciente: </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group ic-cmp-int form-elet-mg">

                        <div class="nk-int-st">
                          <p>Edad Paciente: </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group ic-cmp-int form-elet-mg">

                        <div class="nk-int-st">
                          <p>Fecha Nacimiento: </p>
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
      <!-- Form Element area Start-->
      <div class="form-element-area">
        <div class="container">

          <div class="row fila">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="form-element-list">
                <div class="basic-tb-hd">
                  <h2 class="cabecera-morada">ATENCIÓN MÉDICA</h2>

                </div>

                <?php
                    if ($total == 0) { ?>


                  <form id="f" action='guardar_atencion_medica.php' method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="idpaciente" value="<?php echo $idpaciente ?>">
                    <input type="hidden" class="form-control" name="id_usuario" value="<?php echo $id ?>">

              </div>
            </div>
          </div>
          <div class="row fila">
            <div class="accordion-area">
              <div class="container">
                <div class="row fila">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="accordion-wn-wp">
                      <div class="basic-tb-hd">
                        <h2 class="cabecera-morada">ESTUDIOS MÉDICOS</h2>

                      </div>
                      <div class="row fila">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                          <div class="panel-body">

                            <div class="row fila">

                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='colposcopia' id='colposcopia' class="selectpicker">
                                  <option value="">Selecciona colposcopia</option>
                                  <option value="adecuada">ADECUADA</option>
                                  <option value="no_adecuada">NO ADECUADA</option>
                                </select>

                              </div>

                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='causa' id='causa' class="selectpicker" disabled>
                                  <option value="">Selecciona una Causa</option>
                                  <option value="sangrado">SANGRADO</option>
                                  <option value="inflamacion">INFLAMACIÓN</option>
                                  <option value="cicatrices">CICATRICES</option>
                                  <option value="no">OTRAS</option>
                                </select>

                              </div>




                            </div>


                            <div class="row fila">
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='cervix ' id='cervix' class="selectpicker">
                                  <option value="">Selecciona Cervix</option>
                                  <option value="eutrofico">EUTRÓFICO</option>
                                  <option value="atrofico">ATRÓFICO</option>
                                  <option value="hipotrofico">HIPOTRÓFICO</option>
                                  <option value="hipertrofico">HIPERTRÓFICO</option>
                                  <option value="ausencia_quirurgica">AUSENCIA QUIRÚRGICA</option>
                                  <option value="ausencia_otras_causas">AUSENCIA OTRAS CAUSAS</option>
                                </select>

                              </div>

                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='union_escamocolumnar ' id='union_escamocolumnar' class="selectpicker">
                                  <option value="">Selecciona Union Escamocolumnar </option>
                                  <option value="completamente_visible">COMPLETAMENTE VISIBLE</option>
                                  <option value="parcialmente_visible">PARCIALMENTE VISIBLE</option>
                                </select>

                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='zona_transformacion ' id='zona_transformacion' class="selectpicker">
                                  <option value="">Selecciona Zona De Transfromacion</option>
                                  <option value="tipo 1">TIPO 1</option>
                                  <option value="tipo 2 a">TIPO 2 A</option>
                                  <option value=" tipo 2 b">TIPO 2 B</option>
                                  <option value="tipo 3">TIPO 3</option>
                                </select>

                              </div>

                            </div>
                            <div class="row fila">

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-default filaInterna">
                                  <div class="panel-heading">EPITELIO ACETOBLANCO</div>

                                </div>
                              </div>


                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 fila">

                                <select name='epitelio_acetoblanco' id='epitelio_acetoblanco' class="selectpicker" onChange="pagoOnChange(this)">

                                  <option value="">AUSENTE</option>
                                  <option value="presente">PRESENTE</option>
                                </select>

                              </div>

                            </div>
                            <div id="ausente" style="display:none;">

                            </div>


                            <div id="presente" class="formularioOculto" style="display:none;">
                              <div class="row fila">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                  <select name='ep_criterios_menores' id='ep_criterios_menores' class="selectpicker" disabled>
                                    <option value="">Selecciona Criterios Menores</option>
                                    <option value="tenue">TENUE</option>
                                    <option value="blanco_intenso_c/brillo_superficial">BLANCO INTENSO C/BRILLO SUPERFICIAL</option>
                                    <option value="brillo_superficial">BRILLO SUPERFICIAL</option>
                                    <option value="transparente">TRANSPARENTE</option>
                                    <option value="fuera_zt">FUERA DE LA ZT</option>

                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                  <select name='ep_criterios_intermedios' id='ep_criterios_intermedios' class="selectpicker" disabled>
                                    <option value="">Selecciona Criterios Intermedios</option>
                                    <option value="blanco_intermedio_c/brillo">BLANCO INTERMEDIO C/BRILLO</option>
                                    <option value="mayoria_lesiones">(MAYORÍA DE LESIONES)</option>
                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                  <select name='ep_criterios_mayores' id='ep_criterios_mayores' class="selectpicker" disabled>
                                    <option value="">Selecciona Criterios Mayores</option>
                                    <option value="blanco_Denso">BLANCO DENSO</option>
                                    <option value="blanco_opaco">BLANCO OPACO</option>
                                    <option value="blanco_ostra">BLANCO OSTRA</option>
                                    <option value="gris">GRIS</option>
                                  </select>

                                </div>
                              </div>

                              <div class="row fila">


                                <div class="panel panel-default filaInterna">
                                  <div class="panel-heading">BORDE Y SUPERFICIE</div>

                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                  <select name='bs_criterios_menores' id='bs_criterios_menores' class="selectpicker">
                                    <option value="">Selecciona Criterios Menores</option>
                                    <option value="microcondilomatoso">MICROCONDILOMATOSO</option>
                                    <option value="micropapilar">MICROPAPILAR</option>
                                    <option value="borde_indefinido">BORDE INDEFINIDO</option>
                                    <option value="borde_pluma_dentado">BORDE EN PLUMA O DENTADO</option>
                                    <option value="lesion_angulada">LESIÓN ANGULADA</option>
                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                  <select name='bs_criterios_intermedios' id='bs_criterios_intermedios' class="selectpicker">
                                    <option value="">Selecciona Criterios Intermedios</option>
                                    <option value="lesion_regular">LESIÓN REGULAR</option>
                                    <option value="simetrica">SIMÉTRICA</option>
                                    <option value="contornos_netos">CONTORNOS NETOS</option>
                                    <option value="contornos_rectilineos">CONTORNOS RECTILÍNEOS</option>
                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                  <select name='bs_criterios_mayores' id='bs_criterios_mayores' class="selectpicker">
                                    <option value="">Selecciona Criterios Mayores</option>
                                    <option value="bordes_dehiscentes">BORDES DEHISCENTES</option>
                                    <option value="bordes_enrolaldos">BORDES ENROLLADOS</option>
                                    <option value="cambios_menores_perifericos_mayores">CAMBIOS MENORES PERIFÉRICOS Y MAYORES CENTRALES</option>
                                  </select>

                                </div>

                              </div>

                              <div class="row fila">
                                <div class="panel panel-default filaInterna">
                                  <div class="panel-heading">ANGIOARQUITECTURA</div>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                  <select name='ag_criterios_menores' id='ag_criterios_menores' class="selectpicker">
                                    <option value="">Selecciona Criterios Menores</option>
                                    <option value="capilar_fino">CAPILAR FINO</option>
                                    <option value="calibre_disposion_uniforme">CALIBRE Y DISPOSICIÓN UNIFORME</option>
                                    <option value="puntilleo_fino">PUNTILLEO FINO</option>
                                    <option value="nmosaico_fino">MOSAICO FINO</option>
                                    <option value="vasos_mas_alla_zt">VASOS MÁS ALLÁ DE ZT</option>
                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                  <select name='ag_criterios_intermedios' id='ag_criterios_intermedios' class="selectpicker">
                                    <option value="">Selecciona Criterios Intermedios</option>
                                    <option value="ausencia_vasos">AUSENCIA DE VASOS</option>

                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                  <select name='ag_criterios_mayores' id='ag_criterios_mayores' class="selectpicker">
                                    <option value="">Selecciona Criterios Mayores</option>
                                    <option value="puntilleo_grueso">PUNTILLEO GRUESO</option>
                                    <option value="mosaico_grueso">MOSAICO GRUESO</option>
                                  </select>

                                </div>

                              </div>

                              <div class="row fila ">
                                <div class="panel panel-default filaInterna">
                                  <div class="panel-heading">CAPTACIÓN DE YODO</div>

                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                  <select name='cy_menores' id='cy_menores' class="selectpicker">
                                    <option value="">CITERIOS MENORES</option>
                                    <option value="positiva">POSITIVA</option>
                                    <option value="negativa_puntos_criterios_anteriores">NEGATIVA CON < 3 PUNTOS EN CRITERIOS ANTERIORES</option> <option value="zonas_yodo_negativas">ZONAS YODONEGATIVAS MÁS ALLÁ DE LA ZT</option>
                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                  <select name='cy_intermedios' id='cy_intermedios' class="selectpicker">
                                    <option value="">CITERIOS INTERMEDIOS</option>
                                    <option value="capacitacion_parcial_yodo">CAPTACIÓN PARCIAL DE YODO</option>
                                    <option value="motedao_jaspeado">(MOTEADO-JASPEADO)</option>
                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                  <select name='cy_mayores' id='cy_mayores' class="selectpicker">
                                    <option value="">CITERIOS MAYORES</option>
                                    <option value="yodo_negativa_conmas_puntos">YODONEGATIVA CON 4 O MÁS PUNTOS</option>
                                    <option value="en_criterios_anteriores">EN CRITERIOS ANTERIORES</option>
                                  </select>

                                </div>
                              </div>
                            </div>

                            <div class="row fila">
                              <div class="panel panel-default filaInterna">
                                <div class="panel-heading">SCHILLER</div>

                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='schiller' id='schiller' class="selectpicker">
                                  <option value="">Selecciona Schiller</option>
                                  <option value="negativa">NEGATIVA</option>
                                  <option value="positiva">POSITIVA</option>

                                </select>

                              </div>

                            </div> <br>

                            <div class="row fila">
                              <div class="panel panel-default filaInterna">
                                <div class="panel-heading">VAGINOSCOPIA</div>

                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='vaginoscopia' id='vaginoscopia' class="selectpicker">
                                  <option value="">Selecciona Acético</option>
                                  <option value="positivo">Positivo</option>
                                  <option value="negativo">Negativo</option>
                                </select>

                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='vaginoscopia' id='vaginoscopia' class="selectpicker">
                                  <option value="">Selecciona lugol</option>
                                  <option value="positivo">Positivo</option>
                                  <option value="negativo">Negativo</option>
                                </select>

                              </div>
                            </div>
                            <div class="row fila">
                              <div class="panel panel-default filaInterna">
                                <div class="panel-heading">VULVOSCOPIA</div>

                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='vulvoscopia' id='vulvoscopia' class="selectpicker">
                                  <option value="">Selecciona Acético</option>
                                  <option value="acetico">ACÉTICO</option>

                                </select>

                              </div>

                            </div> <br>
                            <div class="row fila">
                              <div class="panel panel-default filaInterna">
                                <div class="panel-heading">MISCELANEOS</div>

                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='miscelaneos' id='miscelaneos' class="selectpicker">
                                  <option value="">Selecciona Miscelaneos</option>
                                  <option value="condilomas">CONDILOMAS</option>
                                  <option value="eversion_glandular">EVERSIÓN GLANDULAR</option>
                                  <option value="leucoplasia">LEUCOPLASIA</option>
                                  <option value="zt_congenita">ZT CONGÉNITA</option>
                                  <option value="inflamacion">INFLAMACIÓN</option>
                                  <option value="atrofia">ATROFIA</option>
                                  <option value="polipos">PÓLIPOS</option>
                                  <option value="deciduosis">DECIDUOSIS</option>
                                  <option value="queratosis">QUERATOSIS</option>
                                  <option value="hiperplasia_glandular">HIPERPLASIA GLANDULAR</option>
                                  <option value="micropapilomatosis_vestibular">MICROPAPILOMATOSIS VESTIBULAR</option>


                                </select>

                              </div>
                            </div> <br>

                            <h4 class="text-center">Imagenes Colposcopicas </h4>

                            <div class="form-group">

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <center> <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple=""> </center>
                              </div>
                            </div>
                            <br><br><br><br>

                            <div class="row fila">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="floating-numner">
                                  <p>POSIBLE RECOMENDACIÓN DIAGNOSTICA</p>
                                </div>
                              </div>
                            </div>
                            <div class="row fila">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <div class="nk-int-st">
                                    <textarea class="form-control auto-size" rows="2" placeholder="Escribe recomendacion Diagnostica" name="recomendacion_diagnostica" form="f"></textarea>

                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row fila">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="floating-numner">
                                  <p>RECOMENDACIÓN DIAGNOSTICA</p>
                                </div>
                              </div>
                            </div>
                            <div class="row fila">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <div class="nk-int-st">
                                    <textarea class="form-control auto-size" rows="2" placeholder="Escribe recomendacion Diagnostica" name="posible_recomendacion_diagnostica" form="f"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row fila">

                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="bootstrap-select fm-cmp-mg">
                                  <select name='apoyo_gubernamental_paciente ' id='apoyo_gubernamental_paciente' class="selectpicker">
                                    <option value="">DIAGNOSTICO MÉDICO</option>
                                    <option value="hallazgos_normales">HALLAZGOS NORMALES</option>
                                    <option value="hallazgos_sugestivos_">HALLAZGOS SUGESTIVOS DE INVASIÓN</option>
                                    <option value="miscelaneos_hallazgos_varios">MISCELANEOS O HALLAZGOS VARIOS</option>
                                    <option value="lesion_intraepitelial_bajogrado">LESIÓN INTRAEPITELIAL DE BAJO GRADO</option>
                                    <option value="lesion_intraepitelial_altogrado">LESIÓN INTRAEPITELIAL DE ALTO GRADO</option>



                                  </select>
                                </div>
                              </div>
                            </div> <br>
                            <br>


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
      </div>
      </div>
      </div>
      <br><br>
      <center> <button type="submit" class="btn btn-primary">Enviar</button></center>


      <br>

      <!--<center><input type="submit" style="border: #000 1px solid; background-color: #ed80a8" value="Enviar formulario"></center>-->


      </form>
    <?php  } else { ?>




      <form id="f1" action='guardar_atencion_medica.php' method="get" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="idpaciente" value="<?php echo $idpaciente ?>">
        <div class="row fila">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tu edad de inico de mestruacion fue</h6>
            </div>

            <div class="form-group nk-datapk-ctm form-elet-mg" id="data_3">
              <div class="input-group date nk-int-st">

                <span class="input-group-addon"></span>


                <input type="text" class="form-control" name="edad_inicio_menstruacion" placeholder="<?php

                                                                                                            $q = date("d.M.Y", strtotime($edad_inicio_menstruacion));
                                                                                                            $inicios = strftime("%d de %B del %Y", strtotime($q));







                                                                                                            echo "Fecha Anterior fue " . $inicios ?>">


              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tu método de planificacion fue</h6>
            </div>
            <div class="bootstrap-select fm-cmp-mg">

              <select id='metodos_planificacion' name="metodos_planificacion" class="selectpicker">
                <option value=""><?php echo "Seleccion Anterior Fue " . $metodos_planificacion ?></option>
                <option value="hormonales_orales">Hormonales orales</option>
                <option value="hormonales_inyectables">Hormonales inyectables</option>
                <option value="condon">Condon</option>
                <option value="otro">Otro</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tu método de planificacion fue</h6>
            </div>
            <div class="form-group ic-cmp-int form-elet-mg">
              <div class="form-ic-cmp">
                <i class="notika-icon notika-edit"></i>
              </div>
              <div class="nk-int-st">
                <input id="cual" name="cual" type="text" class="form-control" placeholder="Eleccion Anterior:<?php echo $cual ?>" disabled>
              </div>
            </div>
          </div>


        </div>

        <div class="row  fila">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tu edad de inicio de vida sexual fue</h6>
            </div>
            <select name="edad_inicio_vida_sexual" class="selectpicker">
              <option value="">Eleccion Anterior: <?php echo $edad_inicio_vida_sexual ?></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
              <option value="32">32</option>
              <option value="33">33</option>
              <option value="34">34</option>
              <option value="35">35</option>
              <option value="36">36</option>
              <option value="37">37</option>
              <option value="38">38</option>
              <option value="39">39</option>
              <option value="40">40</option>
              <option value="41">42</option>
              <option value="43">43</option>
              <option value="44">44</option>
              <option value="45">45</option>
              <option value="46">46</option>
              <option value="47">47</option>
              <option value="48">48</option>
              <option value="49">49</option>
              <option value="50">50</option>
              <option value="51">51</option>
              <option value="52">52</option>
              <option value="53">53</option>
              <option value="54">54</option>
              <option value="55">55</option>
              <option value="56">56</option>
              <option value="57">57</option>
              <option value="58">58</option>
              <option value="59">59</option>
              <option value="60">60</option>
              <option value="61">61</option>
              <option value="62">62</option>
              <option value="63">63</option>
              <option value="64">64</option>
              <option value="65">65</option>
              <option value="66">66</option>
              <option value="67">67</option>
              <option value="68">68</option>
              <option value="69">69</option>
              <option value="70">70</option>
              <option value="71">71</option>
              <option value="72">72</option>
              <option value="73">73</option>
              <option value="74">74</option>
              <option value="75">75</option>
              <option value="76">76</option>
              <option value="77">77</option>
              <option value="78">78</option>
              <option value="79">79</option>
              <option value="80">80</option>
              <option value="81">81</option>
              <option value="82">82</option>
              <option value="83">83</option>
              <option value="84">84</option>
              <option value="85">85</option>
              <option value="86">86</option>
              <option value="87">87</option>
              <option value="88">88</option>
              <option value="89">89</option>
              <option value="90">90</option>
              <option value="91">91</option>
              <option value="92">92</option>
              <option value="93">93</option>
              <option value="94">94</option>
              <option value="95">95</option>
              <option value="96">96</option>
              <option value="97">97</option>
              <option value="98">98</option>
              <option value="99">99</option>
              <option value="100">100</option>
              <option value="101">101</option>
              <option value="102">102</option>
              <option value="103">103</option>
              <option value="104">104</option>
              <option value="105">105</option>
              <option value="106">106</option>
              <option value="107">107</option>
              <option value="108">108</option>
              <option value="109">109</option>
              <option value="110">110</option>
              <option value="111">111</option>
              <option value="112">112</option>
              <option value="113">113</option>
              <option value="114">114</option>
              <option value="115">115</option>
              <option value="116">116</option>
              <option value="117">117</option>
              <option value="118">118</option>
              <option value="119">119</option>
              <option value="120">120</option>
            </select>

          </div>

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tus Parejas sexuales fueron</h6>
            </div>
            <select name="parejas_sexuales" class="selectpicker">
              <option value="">Eleccion Anterior: <?php echo $parejas_sexuales ?></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
            </select>

          </div>

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tus gestas fueron:</h6>
            </div>
            <select name="gestas" class="selectpicker">
              <option value=""> Eleccion Anterior: <?php echo $gestas ?></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>>
            </select>

          </div>
        </div>
        <div class="row fila">


          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tus para fueron:</h6>
            </div>
            <select name="para" class="selectpicker">
              <option value=""> Eleccion Anterior: <?php echo $para ?></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>>
            </select>

          </div>

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tus cesareas fueron:</h6>
            </div>
            <select name="cesareas" class="selectpicker">
              <option value=""> Eleccion Anterior: <?php echo $cesareas ?></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>>
            </select>

          </div>

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tus abortos fueron:</h6>
            </div>
            <select name="abortos" class="selectpicker">
              <option value="">Eleccion Anterior: <?php echo $abortos ?></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>>
            </select>

          </div>

        </div> <br>

        <div class="row fila">

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tu Fecha de la última regla (FUM) fue</h6>
            </div>
            <div class="form-group nk-datapk-ctm form-elet-mg" id="data_3">
              <div class="input-group date nk-int-st">

                <span class="input-group-addon"></span>
                <input type="text" class="form-control" name="fecha_ultima_regla" placeholder="<?php

                                                                                                      $fecha_ultima_regla1 = date("d.M.Y", strtotime($fecha_ultima_regla));
                                                                                                      $fecha_ultima_regla11 = strftime("%d de %B del %Y", strtotime($fecha_ultima_regla1));







                                                                                                      echo "Fecha Anterior " . $fecha_ultima_regla11 ?>">
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tu Fecha del último papanicolau (FUP) fue</h6>
            </div>
            <div class="form-group nk-datapk-ctm form-elet-mg" id="data_3">
              <div class="input-group date nk-int-st">

                <span class="input-group-addon"></span>
                <input type="text" class="form-control" name="fecha_ultimo_papanicolau" placeholder="<?php

                                                                                                            $fecha_ultimo_papanicolau1 = date("d.M.Y", strtotime($fecha_ultimo_papanicolau));
                                                                                                            $fecha_ultimo_papanicolau11 = strftime("%d de %B del %Y", strtotime($fecha_ultimo_papanicolau1));







                                                                                                            echo "Fecha Anterior " . $fecha_ultimo_papanicolau11 ?>">
              </div>
            </div>
          </div>

        </div>
        <div class="row fila">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="floating-numner">
              <p>Tus antecedentes de lesión fueron</p>
            </div>
          </div>
        </div>
        <div class="row fila">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
              <div class="nk-int-st">
                <textarea class="form-control auto-size" rows="2" name="atecedentes_lesion" form="f1"></textarea>

              </div>
            </div>
          </div>
        </div>
        <div class="row fila">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="floating-numner">
              <p>Tus antecedente de tratamiento fueron</p>
            </div>
          </div>
        </div>
        <div class="row fila">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
              <div class="nk-int-st">
                <textarea class="form-control auto-size" rows="2" name="antecedentes_tratamiento" form="f1"></textarea>

              </div>
            </div>
          </div>
        </div>
        <div class="row fila">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tu metrorragia fue</h6>
            </div>
            <div class="bootstrap-select fm-cmp-mg">
              <select name="metrorragia" class="selectpicker" required>
                <option value="">Metrorragia</option>
                <option value="si">SI</option>
                <option value="no">NO</option>

              </select>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tu hormonoterapia fue</h6>
            </div>
            <div class="bootstrap-select fm-cmp-mg">
              <select name="hormonoterapia" class="selectpicker" required>
                <option value="">Hormonoterapia</option>
                <option value="si">SI</option>
                <option value="no">NO</option>

              </select>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tu duración fue</h6>
            </div>
            <div class="form-group ic-cmp-int">

              <div class="nk-int-st">
                <input type="text" name="cual" class="form-control" placeholder="¿Duración?">
              </div>
            </div>
          </div>
        </div>

        <div class="row fila">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tu ritmo fue</h6>
            </div>
            <div class="bootstrap-select fm-cmp-mg">
              <select name="ritmo" class="selectpicker" required>
                <option value="">Ritmo</option>
                <option value="regular">Regular</option>
                <option value="irregular">Irregular</option>
                <option value="ausente">Ausente</option>

              </select>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tus antecedente de cáncer cervicouterino fueron</h6>
            </div>
            <div class="bootstrap-select fm-cmp-mg">
              <select name="antecedente_cancer_cervicouterino" class="selectpicker" required>
                <option value="">Antecedente de Cáncer cervicouterino</option>
                <option value="1">SI</option>
                <option value="0">NO</option>

              </select>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="nk-int-mk sl-dp-mn">
              <h6>Tus tratamientos previos fueron</h6>
            </div>
            <div class="bootstrap-select fm-cmp-mg">
              <select name="tratamiento_previo" class="selectpicker" required>
                <option value="">Tratamientos previos:</option>
                <option value="1">SI</option>
                <option value="0">NO</option>

              </select>
            </div>
          </div>




        </div>

        </div>
        </div>
        </div>
        </div>

        <div class="row fila">
          <div class="accordion-area">
            <div class="container">
              <div class="row fila">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                  <div class="row fila">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                      <div id="accordionPurple-one" class="collapse" role="tabpanel">
                        <div class="panel-body">
                          <p>
                            <div class="row fila">

                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='colposcopia' id='colposcopia' class="form-control">
                                  <option value="">Selecciona colposcopia</option>
                                  <option value="adecuada">ADECUADA</option>
                                  <option value="no_adecuada">NO ADECUADA</option>
                                </select>

                              </div>

                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='causa' id='causa' class="form-control" disabled>
                                  <option value="">Selecciona una Causa</option>
                                  <option value="sangrado">SANGRADO</option>
                                  <option value="inflamacion">INFLAMACIÓN</option>
                                  <option value="cicatrices">CICATRICES</option>
                                  <option value="no">OTRAS</option>
                                </select>

                              </div>




                            </div>


                            <div class="row fila">
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='cervix ' id='cervix' class="form-control">
                                  <option value="">Selecciona Cervix</option>
                                  <option value="eutrofico">EUTRÓFICO</option>
                                  <option value="atrofico">ATRÓFICO</option>
                                  <option value="hipotrofico">HIPOTRÓFICO</option>
                                  <option value="hipertrofico">HIPERTRÓFICO</option>
                                  <option value="ausencia_quirurgica">AUSENCIA QUIRÚRGICA</option>
                                  <option value="ausencia_otras_causas">AUSENCIA OTRAS CAUSAS</option>
                                </select>

                              </div>

                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='union_escamocolumnar ' id='union_escamocolumnar' class="form-control">
                                  <option value="">Selecciona Union Escamocolumnar </option>
                                  <option value="completamente_visible">COMPLETAMENTE VISIBLE</option>
                                  <option value="parcialmente_visible">PARCIALMENTE VISIBLE</option>
                                </select>

                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <select name='zona_transformacion ' id='zona_transformacion' class="form-control">
                                  <option value="">Selecciona Zona De Transfromacion</option>
                                  <option value="tipo 1">TIPO 1</option>
                                  <option value="tipo 2 a">TIPO 2 A</option>
                                  <option value=" tipo 2 b">TIPO 2 B</option>
                                  <option value="tipo 3">TIPO 3</option>
                                </select>

                              </div>

                            </div>
                            <div class="row fila">

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="panel panel-default filaInterna">
                                  <div class="panel-heading">EPITELIO ACETOBLANCO</div>

                                </div>



                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 fila">

                                <div class="nk-int-mk sl-dp-mn">
                                  <h6>Tu epitelio acetoblanco fue</h6>
                                </div>

                                <select name='epitelio_acetoblanco' id='epitelio_acetoblanco' class="form-control" onChange="pagoOnChange(this)">

                                  <option value="">Ausente</option>
                                  <option value="presente">Presente</option>
                                </select>

                              </div>

                            </div>
                            <div id="ausente" style="display:none;">

                            </div>


                            <div id="presente" class="formularioOculto" style="display:none;">
                              <div class="row fila">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                  <div class="nk-int-mk sl-dp-mn">
                                    <h6>Tus Criterios menores fueron</h6>
                                  </div>
                                  <select name='ep_criterios_menores' id='ep_criterios_menores' class="form-control" disabled>
                                    <option value="">Selecciona Criterios Menores</option>
                                    <option value="tenue">Tenue</option>
                                    <option value="blanco_intenso_c/brillo_superficial">Blanco intenso c/brillo superficial</option>
                                    <option value="brillo_superficial">Brillo superficial</option>
                                    <option value="transparente">Transparente</option>
                                    <option value="fuera_zt">Fuera de la ZT</option>

                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="nk-int-mk sl-dp-mn">
                                    <h6>Tus Criterios intermedios fueron</h6>
                                  </div>
                                  <select name='ep_criterios_intermedios' id='ep_criterios_intermedios' class="form-control" disabled>
                                    <option value="">Selecciona Criterios Intermedios</option>
                                    <option value="blanco_intermedio_c/brillo">Blanco intermedio c/brillo</option>
                                    <option value="mayoria_lesiones">(Mayoria lesiones)</option>
                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="nk-int-mk sl-dp-mn">
                                    <h6>Tus Criterios mayores fueron</h6>
                                  </div>
                                  <select name='ep_criterios_mayores' id='ep_criterios_mayores' class="form-control" disabled>
                                    <option value="">Selecciona Criterios Mayores</option>
                                    <option value="blanco_Denso">Blanco denso</option>
                                    <option value="blanco_opaco">Blanco opaco</option>
                                    <option value="blanco_ostra">Blanco ostra</option>
                                    <option value="gris">Gris</option>
                                  </select>

                                </div>
                              </div>

                              <div class="row fila">
                                <div class="panel cabecera-morada filaInterna">
                                  <div class="panel-heading">BORDE Y SUPERFICIE</div>

                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="nk-int-mk sl-dp-mn">
                                    <h6>Tus Criterios menores fueron</h6>
                                  </div>
                                  <select name='bs_criterios_menores' id='bs_criterios_menores' class="form-control">
                                    <option value="">Selecciona Criterios Menores</option>
                                    <option value="microcondilomatoso">Microcondilomatoso</option>
                                    <option value="micropapilar">Micropapilar</option>
                                    <option value="borde_indefinido">Borde indefinido</option>
                                    <option value="borde_pluma_dentado">Borde en pluma o dentado</option>
                                    <option value="lesion_angulada">Lesión angulada</option>
                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="nk-int-mk sl-dp-mn">
                                    <h6>Tus Criterios intermedios fueron</h6>
                                  </div>
                                  <select name='bs_criterios_intermedios' id='bs_criterios_intermedios' class="form-control">
                                    <option value="">Selecciona Criterios Intermedios</option>
                                    <option value="lesion_regular">Lesión regular</option>
                                    <option value="simetrica">Simétrica</option>
                                    <option value="contornos_netos">Contornos netos</option>
                                    <option value="contornos_rectilineos">Contornos Rrectilineos</option>
                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="nk-int-mk sl-dp-mn">
                                    <h6>Tus Criterios mayores fueron</h6>
                                  </div>
                                  <select name='bs_criterios_mayores' id='bs_criterios_mayores' class="form-control">
                                    <option value="">Selecciona Criterios Mayores</option>
                                    <option value="bordes_dehiscentes">Bordes dehiscentes</option>
                                    <option value="bordes_enrolaldos">Bordes enrollados</option>
                                    <option value="cambios_menores_perifericos_mayores">Cambios menores periféricos ymayores centrales</option>
                                  </select>

                                </div>

                              </div>

                              <div class="row fila">
                                <div class="panel cabecera-morada filaInterna">
                                  <div class="panel-heading">ANGIOARQUITECTURA</div>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="nk-int-mk sl-dp-mn">
                                    <h6>Tus Criterios menores fueron</h6>
                                  </div>
                                  <select name='ag_criterios_menores' id='ag_criterios_menores' class="form-control">
                                    <option value="">Selecciona Criterios Menores</option>
                                    <option value="capilar_fino">Capilar fino</option>
                                    <option value="calibre_disposion_uniforme">Calibre y disposión uniforme</option>
                                    <option value="puntilleo_fino">Puntilleo fino</option>
                                    <option value="nmosaico_fino">Mosaico fino</option>
                                    <option value="vasos_mas_alla_zt">Vasos más allá de ZT</option>
                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="nk-int-mk sl-dp-mn">
                                    <h6>Tus Criterios intermedios fueron</h6>
                                  </div>
                                  <select name='ag_criterios_intermedios' id='ag_criterios_intermedios' class="form-control">
                                    <option value="">Selecciona Criterios Intermedios</option>
                                    <option value="ausencia_vasos">Ausencia de vasos</option>

                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="nk-int-mk sl-dp-mn">
                                    <h6>Tus Criterios mayores fueron</h6>
                                  </div>
                                  <select name='ag_criterios_mayores' id='ag_criterios_mayores' class="form-control">
                                    <option value="">Selecciona Criterios Mayores</option>
                                    <option value="puntilleo_grueso">PUNTILLEO GRUESO</option>
                                    <option value="mosaico_grueso">MOSAICO GRUESO</option>
                                  </select>

                                </div>

                              </div>

                              <div class="row fila ">
                                <div class="panel cabecera-morada filaInterna">
                                  <div class="panel-heading">CAPTACIÓN DE YODO</div>

                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="nk-int-mk sl-dp-mn">
                                    <h6>Tus Criterios menores fueron</h6>
                                  </div>
                                  <select name='cy_menores' id='cy_menores' class="form-control">

                                    <option value="positiva">Positiva</option>
                                    <option value="negativa_puntos_criterios_anteriores">Negativa con < 3 puntos en criterios anteriores</option> <option value="zonas_yodo_negativas">ZONAS YODONEGATIVAS MÁS ALLÁ DE LA ZT</option>
                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="nk-int-mk sl-dp-mn">
                                    <h6>Tus Criterios intermedios fueron</h6>
                                  </div>
                                  <select name='cy_intermedios' id='cy_intermedios' class="form-control">

                                    <option value="capacitacion_parcial_yodo">Capacitación parcial de yodo</option>
                                    <option value="motedao_jaspeado">(Motedao-jaspeado)</option>
                                  </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="nk-int-mk sl-dp-mn">
                                    <h6>Tus Criterios mayores fueron</h6>
                                  </div>
                                  <select name='cy_mayores' id='cy_mayores' class="form-control">
                                    <option value="">CITERIOS MAYORES</option>
                                    <option value="yodo_negativa_conmas_puntos">Yodonegativa con 4 o más puntos</option>
                                    <option value="en_criterios_anteriores">En criterios anteriores</option>
                                  </select>

                                </div>
                              </div>
                            </div>

                            <div class="row fila">

                              <div class="panel panel-default filaInterna">
                                <div class="panel-heading">SCHILLER</div>
                              </div>


                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn">
                                  <h6>Tu schiller fue </h6>
                                </div>

                                <select name='schiller' id='schiller' class="form-control">
                                  <option value="">Selecciona Schiller</option>
                                  <option value="positivo">Positivo</option>
                                  <option value="negativo">Negativo</option>

                                </select>

                              </div>

                            </div>

                            <div class="panel panel-default filaInterna">
                              <div class="panel-heading">VAGINOSCOPIA</div>
                            </div>

                            <div class="row fila">

                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn">
                                  <h6>Tu acético fue</h6>
                                </div>
                                <select name='vaginoscopia' id='vaginoscopia' class="form-control">
                                  <option value=""></option>
                                  <option value="positivo">Positivo</option>
                                  <option value="negativo">Negativo</option>
                                </select>

                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn">
                                  <h6>Tu lugol fue</h6>
                                </div>
                                <select name='vaginoscopia' id='vaginoscopia' class="form-control">
                                  <option value</option> <option value="positivo">Positivo</option>
                                  <option value="negativo">Negativo</option>

                                </select>

                              </div>
                            </div>
                            <div class="row fila">
                              <div class="panel panel-default filaInterna">
                                <div class="panel-heading">VULVOSCOPIA</div>
                              </div>

                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn">
                                  <h6>Tu acético fue</h6>
                                </div>
                                <select name='vulvoscopia' id='vulvoscopia' class="form-control">
                                  <option value=""></option>
                                  <option value="positivo">Positivo</option>
                                  <option value="negativo">Negativo</option>

                                </select>

                              </div>
                            </div>
                            <div class="row fila">
                              <div class="panel panel-default filaInterna">
                                <div class="panel-heading">MISCELANEOS</div>
                              </div>

                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn">
                                  <h6>Tus miscelaneos fueron</h6>
                                </div>

                                <select name='miscelaneos' id='miscelaneos' class="form-control">
                                  <option value="">Selecciona Miscelaneos</option>
                                  <option value="condilomas">Condilomas </option>
                                  <option value="eversion_glandular">Eversion glandular</option>
                                  <option value="leucoplasia">Leucoplasia</option>
                                  <option value="zt_congenita">ZT congénita</option>
                                  <option value="inflamacion">Inflamación</option>
                                  <option value="atrofia">Atrofia</option>
                                  <option value="polipos">PÓLIPOS</option>
                                  <option value="deciduosis">Deciduosis</option>
                                  <option value="queratosis">Queratosis</option>
                                  <option value="hiperplasia_glandular">Hperplasia_glandular</option>
                                  <option value="micropapilomatosis_vestibular">Micropapilomatosis vestibular</option>


                                </select>

                              </div>
                            </div> <br>

                            <h4 class="text-center">Imagenes Colposcopicas </h4>

                            <div class="form-group">

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <center> <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple=""> </center>
                              </div>
                            </div>
                            <br><br><br><br>

                            <div class="row fila">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="floating-numner">
                                  <p>POSIBLE RECOMENDACIÓN DIAGNOSTICA</p>
                                </div>
                              </div>
                            </div>
                            <div class="row fila">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <div class="nk-int-st">
                                    <textarea class="form-control auto-size" rows="2" placeholder="Escribe recomendacion Diagnostica" name="recomendacion_diagnostica" form="f1"></textarea>

                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row fila">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="floating-numner">
                                  <p>RECOMENDACIÓN DIAGNOSTICA</p>
                                </div>
                              </div>
                            </div>
                            <div class="row fila">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                  <div class="nk-int-st">
                                    <textarea class="form-control auto-size" rows="2" placeholder="Escribe recomendacion Diagnostica" name="posible_recomendacion_diagnostica" form="f1"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row fila">

                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn">
                                  <h6>Tu diagnostico medico</h6>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                  <select name='diagnostico_medico ' id='diagnostico_medico' class="form-control">
                                    <option value="">Diagnostico medico</option>
                                    <option value="hallazgos_normales">Hallazgos normales</option>
                                    <option value="hallazgos_sugestivos_">Hallazgos sugestivo de invasión</option>
                                    <option value="miscelaneos_hallazgos_varios">Miscelaneos o hallazgos varios</option>
                                    <option value="lesion_intraepitelial_bajogrado">lesión intraepitelial de bajo grado </option>
                                    <option value="lesion_intraepitelial_altogrado">lesión intraepitelial de alto grado</option>



                                  </select>
                                </div>
                              </div>
                            </div> <br>
                            <br>


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
        </div>
        <br><br>
        <center> <button type="submit" class="btn btn-primary">Enviar</button></center>

        <br>

        <!--<center><input type="submit" style="border: #000 1px solid; background-color: #ed80a8" value="Enviar formulario"></center>-->


      </form><?php } ?>
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




    <!-- main JS
		============================================ -->

    <script language="JavaScript">
      $(function() {
        $("#metodos_planificacion").change(function() {
          if ($(this).val() === "hormonales_orales") {
            $("#cual ").prop("disabled", true);
          } else if ($(this).val() === "") {
            $("#cual").prop("disabled", true);
          } else if ($(this).val() === "hormonales_inyectables") {
            $("#cual").prop("disabled", true);
          } else if ($(this).val() === "condon") {
            $("#cual").prop("disabled", true);
          } else {
            $("#cual").prop("disabled", false);
          }
        });
      });
    </script>
    <!-- ----------------------------------------------------------------------------------------------------->
    <script language="JavaScript">
      $(function() {
        $("#colposcopia").change(function() {
          if ($(this).val() !== "no_adecuada") {
            $("#causa ").prop("disabled", true);
          } else {
            $("#causa").prop("disabled", false);
          }
        });
      });
    </script>
    <!-- ----------------------------------------------------------------------------------------------------->
    <!-- ----------------------------------------------------------------------------------------------------->
    <script language="JavaScript">
      $("#epitelio_acetoblanco").change(function() {
        if ($("#epitelio_acetoblanco").val() === "presente") {
          $('#ep_criterios_menores').prop('disabled', false);
          $('#ep_criterios_intermedios').prop('disabled', false);
          $('#ep_criterios_mayores').prop('disabled', false);

        } else {
          $('#ep_criterios_menores').prop('disabled', 'disabled');
          $('#ep_criterios_intermedios').prop('disabled', 'disabled');
          $('#ep_criterios_mayores').prop('disabled', 'disabled');
        }
      });


      $("#ep_criterios_menores").change(function() {
        if ($("#ep_criterios_menores").val() === "") {
          $('#ep_criterios_intermedios').prop('disabled', false);
          $('#ep_criterios_mayores').prop('disabled', false);
        } else {

          $('#ep_criterios_intermedios').prop('disabled', 'disabled');
          $('#ep_criterios_mayores').prop('disabled', 'disabled');
        }
      });

      $("#ep_criterios_intermedios").change(function() {
        if ($("#ep_criterios_intermedios").val() === "") {
          $('#ep_criterios_menores').prop('disabled', false);
          $('#ep_criterios_mayores').prop('disabled', false);
        } else {

          $('#ep_criterios_menores').prop('disabled', 'disabled');
          $('#ep_criterios_mayores').prop('disabled', 'disabled');
        }
      });




      $("#ep_criterios_mayores").change(function() {
        if ($("#ep_criterios_mayores").val() === "") {
          $('#ep_criterios_menores').prop('disabled', false);
          $('#ep_criterios_intermedios').prop('disabled', false);
        } else {
          $('#ep_criterios_menores').prop('disabled', 'disabled');
          $('#ep_criterios_intermedios').prop('disabled', 'disabled');
        }
      });
      ///////////////////////////////////////////////////////////////////////////////////////////
      $("#bs_criterios_menores").change(function() {
        if ($("#bs_criterios_menores").val() === "") {
          $('#bs_criterios_intermedios').prop('disabled', false);
          $('#bs_criterios_mayores').prop('disabled', false);
        } else {

          $('#bs_criterios_intermedios').prop('disabled', 'disabled');
          $('#bs_criterios_mayores').prop('disabled', 'disabled');
        }
      });

      $("#bs_criterios_intermedios").change(function() {
        if ($("#bs_criterios_intermedios").val() === "") {
          $('#bs_criterios_menores').prop('disabled', false);
          $('#bs_criterios_mayores').prop('disabled', false);
        } else {

          $('#bs_criterios_menores').prop('disabled', 'disabled');
          $('#bs_criterios_mayores').prop('disabled', 'disabled');
        }
      });




      $("#bs_criterios_mayores").change(function() {
        if ($("#bs_criterios_mayores").val() === "") {
          $('#bs_criterios_menores').prop('disabled', false);
          $('#bs_criterios_intermedios').prop('disabled', false);
        } else {
          $('#bs_criterios_menores').prop('disabled', 'disabled');
          $('#bs_criterios_intermedios').prop('disabled', 'disabled');
        }
      });
      ////////////////////////////////////////////////

      $("#ag_criterios_menores").change(function() {
        if ($("#ag_criterios_menores").val() === "") {
          $('#ag_criterios_intermedios').prop('disabled', false);
          $('#ag_criterios_mayores').prop('disabled', false);
        } else {

          $('#ag_criterios_intermedios').prop('disabled', 'disabled');
          $('#ag_criterios_mayores').prop('disabled', 'disabled');
        }
      });

      $("#ag_criterios_intermedios").change(function() {
        if ($("#ag_criterios_intermedios").val() === "") {
          $('#ag_criterios_menores').prop('disabled', false);
          $('#ag_criterios_mayores').prop('disabled', false);
        } else {

          $('#ag_criterios_menores').prop('disabled', 'disabled');
          $('#ag_criterios_mayores').prop('disabled', 'disabled');
        }
      });




      $("#ag_criterios_mayores").change(function() {
        if ($("#ag_criterios_mayores").val() === "") {
          $('#ag_criterios_menores').prop('disabled', false);
          $('#ag_criterios_intermedios').prop('disabled', false);
        } else {
          $('#ag_criterios_menores').prop('disabled', 'disabled');
          $('#ag_criterios_intermedios').prop('disabled', 'disabled');
        }
      });
      //////////////////////////////////////////////////////

      $("#cy_menores").change(function() {
        if ($("#cy_menores").val() === "") {
          $('#cy_intermedios').prop('disabled', false);
          $('#cy_mayores').prop('disabled', false);
        } else {

          $('#cy_intermedios').prop('disabled', 'disabled');
          $('#cy_mayores').prop('disabled', 'disabled');
        }
      });

      $("#cy_intermedios").change(function() {
        if ($("#cy_intermedios").val() === "") {
          $('#cy_menores').prop('disabled', false);
          $('#cy_mayores').prop('disabled', false);
        } else {

          $('#cy_menores').prop('disabled', 'disabled');
          $('#cy_mayores').prop('disabled', 'disabled');
        }
      });




      $("#cy_mayores").change(function() {
        if ($("#cy_mayores").val() === "") {

          $('#cy_menores').prop('disabled', false);
          $('#cy_intermedios').prop('disabled', false);
        } else {
          $('#cy_menores').prop('disabled', 'disabled');
          $('#cy_intermedios').prop('disabled', 'disabled');
        }
      });
    </script>


    <script>
      function pagoOnChange(sel) {
        if (sel.value == "ausente") {
          divC = document.getElementById("ausente");
          divC.style.display = "";

          divT = document.getElementById("presente");
          divT.style.display = "none";

        } else if (sel.value == "") {
          divC = document.getElementById("ausente");
          divC.style.display = "";

          divT = document.getElementById("presente");
          divT.style.display = "none";

        } else {

          divC = document.getElementById("ausente");
          divC.style.display = "none";

          divT = document.getElementById("presente");
          divT.style.display = "";
        }
      }
    </script>
    <!-- ----------------------------------------------------------------------------------------------------->
    <script language="JavaScript">

    </script>




    <!-- ----------------------------------------------------------------------------------------------------->
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