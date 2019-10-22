<?php session_start();   if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  include('../coni/Localhost.php');
  $idpaciente = $_GET['id_paciente'];
$id_atencion = $_GET['id_atencion'];
            $re3 = mysqli_query($mysqliL,"SELECT ct.id_paciente,ec.colposcopia,ec.causa,ec.cervix,ec.union_escamocolumnar,ec.zona_transformacion,
  ec.ag_criterios_intermedios,ec.ag_criterios_mayores,ec.ag_criterios_menores
  ,ec.bs_criterios_intermedios,ec.bs_criterios_mayores,ec.bs_criterios_menores
  ,ec.cy_intermedios,ec.cy_mayores,ec.cy_menores,ec.epitelio_acetoblanco,ec.ep_criterios_intermedios,ec.ep_criterios_mayores,ec.ep_criterios_menores,
  ec.schiller,ec.vaginoscopia_acetico,ec.vaginoscopia_lugol,ec.vulvoscopia_acetico,ec.miscelaneos,ec.antecedentes_de_importancia,ec.plan_de_tratamiento
  ,ec.posible_recomendacion_diagnostica

   FROM atencion_medica AS  a
  INNER JOIN ctrl_paciente_estudios AS ct
  ON ct.id_paciente=a.id_paciente

  INNER JOIN estudio_colposcopico AS ec
  ON ec.id_estudio=ct.id_estudio




  WHERE ct.id_paciente='$idpaciente' AND ct.id_atencion='$id_atencion'  AND ct.id_tipo_estudio='1' ");



            $ro2 = mysqli_fetch_assoc($re3);
              $colposcopia = $ro2['colposcopia'];
    $causa = $ro2['causa'];
      $cervix = $ro2['cervix'];
        $union_escamocolumnar = $ro2['union_escamocolumnar'];
          $zona_transformacion = $ro2['zona_transformacion'];
            $ag_criterios_intermedios = $ro2['ag_criterios_intermedios'];
              $ag_criterios_mayores= $ro2['ag_criterios_mayores'];
                $ag_criterios_menores = $ro2['ag_criterios_menores'];
                  $bs_criterios_intermedios = $ro2['bs_criterios_intermedios'];
                    $bs_criterios_mayores = $ro2['bs_criterios_mayores'];
                      $bs_criterios_menores = $ro2['bs_criterios_menores'];
                        $cy_intermedios = $ro2['cy_intermedios'];
                          $cy_mayores = $ro2['cy_mayores'];
                            $cy_menores = $ro2['cy_menores'];
                              $epitelio_acetoblanco = $ro2['epitelio_acetoblanco'];
                                $ep_criterios_intermedios = $ro2['ep_criterios_intermedios'];
  $ep_criterios_mayores = $ro2['ep_criterios_mayores'];
  $ep_criterios_menores = $ro2['ep_criterios_menores'];
  $schiller = $ro2['schiller'];
  $vaginoscopia_acetico = $ro2['vaginoscopia_acetico'];
  $vaginoscopia_lugol = $ro2['vaginoscopia_lugol'];
  $vulvoscopia_acetico = $ro2['vulvoscopia_acetico'];
  $antecedentes_de_importancia = $ro2['antecedentes_de_importancia'];
  $plan_de_tratamiento = $ro2['plan_de_tratamiento'];
        $posible_recomendacion_diagnostica = $ro2['posible_recomendacion_diagnostica'];

    $miscelaneos = $ro2['miscelaneos']; ?>
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
            <a href="#"><img src="../img/logo/LOGO-BLANCO.png" width="130" height="100" /></a>

          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <div class="header-top-menu">
            <ul class="nav navbar-nav notika-top-nav">

              <li class="nav-item dropdown">


              </li>
              <li class="nav-item dropdown">

                <a href="logout.php" role="button" aria-expanded="false" class="nav-link dropdown-toggle"> Salir <span><i class="fas fa-door-open"></i></span></a><p style='color:white;'> Usuario: <b>
<?php echo ucwords($_SESSION['nombre_usuario']) . ' ' .ucwords($_SESSION['apellidos_usuario']);  ?></b></p>

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
                                                <input type='Password' class='form-control' placeholder='Nueva Password' name='password' id='password'  >
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
      <?php

          include('menu.php');

          $result123 = mysqli_query($mysqliL, "SELECT * from paciente where id_paciente=$idpaciente");


          $rowwe = mysqli_fetch_assoc($result123);
          $nombrepaciente = ucwords($rowwe['nombre_paciente']);
          $apellidospaciente = ucwords($rowwe['apellidos_paciente']);
          $edad_paciente = $rowwe['edad_paciente'];
          $fecha_nacimiento_paciente = $rowwe['fecha_nacimiento_paciente'];

          $re = mysqli_query($mysqliL, "  SELECT * FROM paciente AS p
INNER JOIN atencion_medica AS a
ON a.id_paciente=p.id_paciente



WHERE a.id_paciente=$idpaciente and a.id_atencion_medica='$id_atencion' ");
          $total = $re->num_rows;


          $ro = mysqli_fetch_assoc($re);
          $edad_inicio_menstruacion = $ro['edad_inicio_menstruacion'];
          $metodos_planificacion = $ro['metodos_planificacion'];
          $cual = $ro['cual'];
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


          ?>
      <script language="JavaScript">
        //Bloque de codigo

        function offset(el) {
          var rect = el.getBoundingClientRect(),
            scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
            scrollTop = window.pageYOffset || document.documentElement.scrollTop;
          return {
            top: rect.top,
            left: rect.left
          }
        }

        window.onload = function() {
          var canvasDona = document.getElementById("canvasDona");
          var ctxDona = canvasDona.getContext("2d");
          var dona = document.getElementById("recuadroDona");

          var canvasVulva = document.getElementById("canvasVulva");
          var ctxVulva = canvasVulva.getContext("2d");
          var vulva = document.getElementById("recuadroVulva");
          var donax = document.getElementById("x");
          var donay = document.getElementById("y");
          var vulvax = document.getElementById("xy");
          var vulvay = document.getElementById("yx");

          ctxVulva.drawImage(vulva, 0, 0, 200, 200);
          ctxDona.drawImage(dona, 0, 0, 200, 200);
          ctxVulva.lineWidth = 3;

          $("#canvasDona").on("click", function(event) {
            var offsetImg = offset(this);
            var x = (event.clientX - offsetImg.left).toFixed(2);
            var y = (event.clientY - offsetImg.top).toFixed(2);
            donax.value = x;
            donay.value = y;
            console.log("X: " + x + " Y: " + y);
            ctxDona.drawImage(dona, 0, 0, 200, 200);
            ctxDona.lineWidth = 4;
            ctxDona.strokeStyle = "#FFF";
            ctxDona.beginPath();
            ctxDona.arc(x, y, 10, 0, 2 * Math.PI);
            ctxDona.stroke();
            ctxDona.lineWidth = 2;
            ctxDona.strokeStyle = "#000";
            ctxDona.beginPath();
            ctxDona.arc(x, y, 10, 0, 2 * Math.PI);
            ctxDona.stroke();
          });

          $("#canvasVulva").on("click", function(event) {
            var offsetImg = offset(this);
            var x = (event.clientX - offsetImg.left).toFixed(2);
            var y = (event.clientY - offsetImg.top).toFixed(2);
            vulvax.value = x;
            vulvay.value = y;
            console.log("X: " + x + " Y: " + y);
            ctxVulva.drawImage(vulva, 0, 0, 200, 200);
            ctxVulva.lineWidth = 4;
            ctxVulva.strokeStyle = "#FFF";
            ctxVulva.beginPath();
            ctxVulva.arc(x, y, 10, 0, 2 * Math.PI);
            ctxVulva.stroke();
            ctxVulva.lineWidth = 2;
            ctxVulva.strokeStyle = "#000";
            ctxVulva.beginPath();
            ctxVulva.arc(x, y, 10, 0, 2 * Math.PI);
            ctxVulva.stroke();
          });

        };
      </script>

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
                            <p>Paciente: <?php echo ' ' . $nombrepaciente . ' ' . $apellidospaciente; ?></p>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group ic-cmp-int form-elet-mg">

                          <div class="nk-int-st">
                            <p>Edad Paciente: <?php echo ' ' . $edad_paciente; ?></p>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group ic-cmp-int form-elet-mg">

                          <div class="nk-int-st">
                            <p>Fecha Nacimiento: <?php echo ' ' . $fecha_nacimiento_paciente; ?></p>
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
                    <h2 class="cabecera-morada">EDITAR ATENCIÓN MÉDICA</h2>

                  </div>
                  <div class="row fila"><br>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <div class="nk-int-mk sl-dp-mn">
                        <h6>Fecha</h6>
                      </div>

                      <div class="form-group nk-datapk-ctm form-elet-mg" id="data_3">
                        <div class="input-group date nk-int-st">

                          <span class="input-group-addon"></span>
                          <input type="text" class="form-control" placeholder="<?php
                                                                                    setlocale(LC_TIME, 'es_ES', 'esp_esp');


                                                                                    date_default_timezone_set('America/Mexico_City');

                                                                                    $hoys = date("Y-m-d");



                                                                                    $fe = date("d.M.Y", strtotime($hoys));
                                                                                    $inicio = strftime("%d de %B del %Y", strtotime($fe));



                                                                                    echo $inicio;
                                                                                    ?>" disabled>
                        </div>
                      </div>
                    </div>

                  </div><br><br>







      <form id="f1" action='editar_guardar_atencion_medica.php' method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="idpaciente" value="<?php echo $idpaciente ;?>">
        <input type="hidden" class="form-control" name="id_usuario" value="<?php echo $id; ?>">
        <input type="hidden" class="form-control" name="id_atencion" value="<?php echo $id_atencion; ?>">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="form-group purple-border">
            <div class="row fila">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Antecedentes De Importancia (Cirugías Previas, Ctrioterapia, Lasser, Electrocirugía)</FONT>
              </div>
            </div>
            <textarea class="form-control" rows="1" placeholder="<?php echo $antecedentes_de_importancia;?>" name="antecedentes de importancia" form="f" disabled> </textarea>
          </div>
        </div>



        <div class="row fila">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <p>Seleccion Anterior Menstruacion  Fue:<?php echo $edad_inicio_menstruacion;?></p>
              <select name="edad_inicio_menstruacion" class="form-control">
              <option value="<?php echo $edad_inicio_menstruacion; ?>">Seleccion Anterior  Menstruacion  Fue:</option>
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

            </select>

          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <p> Anterior Metodos de Planificacion Fue:<?php echo $metodos_planificacion; ?></p>
              <select id='metodos_planificacion' name="metodos_planificacion" class="form-control">
              <option value="<?php echo $metodos_planificacion; ?>">Seleccion Anterior Metodos de Planificacion Fuer:</option>
              <option value="hormonales_orales">Hormonales orales</option>
              <option value="hormonales_inyectables">Hormonales inyectables</option>
              <option value="condon">Condon</option>
              <option value="otro">Otro</option>
            </select>

          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">


            <div class="form-group ic-cmp-int form-elet-mg"><p>Cual</p>


              <div class="nk-int-st">
                <input id="cual" name="cual" type="text" class="form-control" value='<?php echo $cual; ?>' >
              </div>
            </div>
          </div>


        </div>fffffffffff
        <div class="row fila">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <p>Edad de Regla Anterior fue:<?php echo $edad_en_que_fue_su_regla; ?></p>
              <select name="edad_en_que_fue_su_regla" class="form-control">
              <option value="<?php echo $edad_en_que_fue_su_regla; ?>">Edad de Regla Anterior fue:</option>
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
            <p>Edad de inicio de vida sexual elegida:<?php echo $edad_inicio_vida_sexual; ?></p>
              <select name="edad_inicio_vida_sexual" class="form-control">
              <option value="<?php echo $edad_inicio_vida_sexual; ?>">Edad de inicio de vida sexual elegida:</option>
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
          <p>Seleccion Anterior de Parejas sexuales:<?php echo $edad_inicio_vida_sexual; ?></p>
          <select name="parejas_sexuales" class="form-control">
              <option value="<?php echo $edad_inicio_vida_sexual; ?>">Seleccion Anterior de Parejas sexuales:</option>
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


        </div>
        <div class="row fila">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <p>Seleccion Ateriror Gestas Fue:<?php echo $gestas;?></p>
              <select name="gestas" class="form-control">
              <option value="<?php echo $gestas;?>">Seleccion Ateriror Gestas Fue:</option>
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
            <p>Seleccion Anterior Para fue:<?php echo $para;?></p>
              <select name="para" class="form-control">
              <option value="<?php echo $para;?>">Seleccion Anterior Para fue:</option>
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
          <p>Seleccion Anterior de Césareas Fue:<?php echo $cesareas;?> </p>
            <select name="cesareas" class="form-control">
              <option value="<?php echo $cesareas;?>">Seleccion Anterior de Césareas Fue:</option>
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
            <p>Seleccion Anterior de Abortos Fue: <?php echo $abortos; ?> </p>
            <select name="abortos" class="form-control">
              <option value="<?php echo $abortos; ?>">Selecciona Abortos </option>
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
            <div>
<label for="bday">Fecha de ultima regla Fue:<?php echo $fecha_ultima_regla; ?></label>
<input type="date" id="bday" name="fecha_ultima_regla" value='<?php echo $fecha_ultima_regla; ?>'>
</div>

          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div>
<label for="bday">Fecha de ultimo papanicolau Fue:  <?php echo $fecha_ultimo_papanicolau; ?></label>
<input type="date" id="bday" name="fecha_ultimo_papanicolau" value='<?php echo $fecha_ultimo_papanicolau; ?>'>
</div>

          </div>

        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group purple-border">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Antecedentes de Lesión</FONT>
                </div>
              </div>
              <textarea class="form-control" rows="2" placeholder="<?php echo $atecedentes_lesion; ?>" name="atecedentes_lesion" form="f1"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group purple-border">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Antecedente de Tratamiento</FONT>
                </div>
              </div>
              <textarea class="form-control" rows="2" placeholder="<?php echo $antecedentes_tratamiento; ?>" name="antecedentes_tratamiento" form="f1"></textarea>
            </div>
          </div>
        </div>

        <div class="row fila">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

<p>Metrorragia anterior:<?php if($metrorragia==0) {
  echo "No";
}else{
  echo "Si";
} ?></p>
            <select name="metrorragia" class="form-control">
              <option value="<?php echo $metrorragia; ?>">Metrorragia</option>
              <option value="1">SI</option>
              <option value="0">NO</option>

            </select>

          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <p>Hormonoterapia anterior:<?php if($hormonoterapia==0) {
              echo "No";
            }else{
              echo "Si";
            } ?></p>

            <select name="hormonoterapia" class="form-control">
              <option value="<?php echo $hormonoterapia; ?>">Hormonoterapia</option>
              <option value="1">SI</option>
              <option value="0">NO</option>

            </select>

          </div>

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

            <div class="form-group">
<p>duracion anterior:</p>
              <div class="nk-int-st">
                <input type="text" name="duracion_hormonoterapia" class="form-control" value="<?php echo $duracion_hormonoterapia;  ?>">
              </div>
            </div>
          </div>
        </div>

        <div class="row fila">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
       <p>Ritmo anterior: <?php echo $ritmo; ?> </p>

            <select name="ritmo" class="form-control">
              <option value="<?php echo $ritmo; ?>">Ritmo</option>
              <option value="regular">Regular</option>
              <option value="irregular">Irregular</option>
              <option value="ausente">Ausente</option>

            </select>

          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <p>Antecedente de Cáncer cervicouterino :<?php if($antecedente_cancer_cervicouterino==0) {
              echo "No";
            }else{
              echo "Si";
            } ?></p>


              <select name="antecedente_cancer_cervicouterino" class="form-control">
              <option value="">Antecedente de Cáncer cervicouterino</option>
              <option value="1">SI</option>
              <option value="0">NO</option>
          </select>
          </div>


          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <p>Tratamiento Previos anterior:<?php if($tratamiento_previo==0) {
              echo "No";
            }else{
              echo "Si";
            } ?></p>
            <select name="tratamiento_previo" class="form-control">
              <option value="<?php echo $tratamiento_previo; ?>">Tratamientos previos:</option>
              <option value="1">SI</option>
              <option value="0">NO</option>

            </select>

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
      <div class="accordion-wn-wp">
        <div class="basic-tb-hd">
          <?php


          ?>
          <h2 class="cabecera-morada">ESTUDIOS MÉDICOS</h2>

        </div>
        <div class="row fila">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="accordion-stn mg-t-30">
              <div class="panel-group" data-collapse-color="nk-purple" id="accordionPurple" role="tablist" aria-multiselectable="true">
                <div class="panel panel-collapse notika-accrodion-cus">
                  <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordionPurple" href="#accordionPurple-one" aria-expanded="false">
                        DATOS COLPOSCOPICOS
                      </a>
                    </h4>
                  </div>
                  <div id="accordionPurple-one" class="collapse" role="tabpanel">
                    <div class="panel-body">
                      <p>
                        <div class="row fila">

                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p> Colposcopica Anterior fue:<?php echo $colposcopia; ?> </p>
                            <select name='colposcopia' id='colposcopia' class="form-control">
                              <option value="<?php echo  $colposcopia; ?>">Selecciona colposcopia</option>
                              <option value="adecuada">Adecuada</option>
                              <option value="no_adecuada">No Adecuada</option>
                            </select>

                          </div>

                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p> Causa Anterior fue:<?php echo $causa; ?> </p>
                            <select name='causa' id='causa' class="form-control">
                              <option value="<?php echo $causa; ?>">Selecciona una Causa</option>
                              <option value="sangrado">Sangrado</option>
                              <option value="inflamacion">Inflamación</option>
                              <option value="cicatrices">Cicatrices</option>
                              <option value="no">Otras</option>
                            </select>

                          </div>




                        </div>


                        <div class="row fila">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p> cervix Anterior fue:<?php echo $cervix; ?> </p>
                            <select name='cervix' id='cervix' class="form-control">
                              <option value="<?php echo $cervix; ?>">Selecciona Cervix</option>
                              <option value="eutrofico">Eutrófico</option>
                              <option value="atrofico">Atrófico</option>
                              <option value="hipotrofico">Hipotrófico</option>
                              <option value="hipertrofico">Hipertrófico</option>
                              <option value="ausencia_quirurgica">Ausencia Quirúrgica</option>
                              <option value="ausencia_otras_causas">Ausencia Otras Causas</option>
                            </select>

                          </div>

                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p>escamocolumnar Anterior fue:<?php echo $union_escamocolumnar; ?> </p>
                            <select name='union_escamocolumnar' id='union_escamocolumnar' class="form-control">
                              <option value="<?php echo $union_escamocolumnar; ?>">Selecciona Union Escamocolumnar </option>
                              <option value="completamente_visible">Completamente Visible</option>
                              <option value="parcialmente_visible">Parcialmente Visible</option>
                            </select>

                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p> zona transformacion Anterior fue:<?php echo $zona_transformacion; ?> </p>
                            <select name='zona_transformacion' id='zona_transformacion' class="form-control">
                              <option value="<?php echo $zona_transformacion; ?>">Selecciona Zona De Transfromacion</option>
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
                              <div class="panel-heading">Epitelio Acetoblanco</div>

                            </div>
                          </div>


                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 fila">
<p> Epitelio Acetoblanco Anterior fue:<?php echo $epitelio_acetoblanco; ?> </p>
                            <select name='epitelio_acetoblanco' id='epitelio_acetoblanco' onChange="pagoOnChange(this)" class="form-control">

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
<p>  Anterior fue:<?php echo $ep_criterios_menores; ?> </p>
                              <select name='ep_criterios_menores' id='ep_criterios_menores' class="form-control">
                                <option value="<?php echo $ep_criterios_menores; ?>">Selecciona Criterios Menores</option>
                                <option value="tenue">Tenue</option>
                                <option value="blanco_intenso_c/brillo_superficial">Blanco Intenso C/Brillo Superficial</option>
                                <option value="brillo_superficial">Brillo Superficial</option>
                                <option value="plano">Plano</option>
                                <option value="transparente">Transparente</option>
                                <option value="fuera_zt">Fuera de la ZT</option>

                              </select>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p>  Anterior fue:<?php echo $ep_criterios_intermedios; ?> </p>
                              <select name='ep_criterios_intermedios' id='ep_criterios_intermedios' class="form-control">
                                <option value="<?php echo $ep_criterios_intermedios; ?>">Selecciona Criterios Intermedios</option>
                                <option value="blanco_intermedio_c/brillo">Blanco Intermedio C/Brillo</option>
                                <option value="mayoria_lesiones">(Mayoría de Lesiones)</option>
                              </select>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p>  Anterior fue:<?php echo $ep_criterios_mayores; ?> </p>
                              <select name='ep_criterios_mayores' id='ep_criterios_mayores' class="form-control">
                                <option value="<?php echo $ep_criterios_mayores; ?>">Selecciona Criterios Mayores</option>
                                <option value="blanco_denso">Blanco Denso</option>
                                <option value="blanco_opaco">Blanco Opaco</option>
                                <option value="blanco_ostra">Blanco Ostra</option>
                                <option value="gris">Gris</option>
                              </select>

                            </div>
                          </div>

                          <div class="row fila">


                            <div class="panel panel-default filaInterna">
                              <div class="panel-heading">Borde y Superficie</div>

                            </div>
                          </div>
                          <div class="row fila">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p>  Anterior fue:<?php echo $bs_criterios_menores; ?> </p>
                              <select name='bs_criterios_menores' id='bs_criterios_menores' class="form-control">
                                <option value="<?php echo $bs_criterios_menores; ?>">Selecciona Criterios Menores</option>
                                <option value="microcondilomatoso">Microcondilomatoso</option>
                                <option value="micropapilar">Micropapilar</option>
                                <option value="borde_indefinido">Borde Indefinido</option>
                                <option value="borde_pluma_dentado">Borde en Pluma o Dentado</option>
                                <option value="lesion_angulada">Lesión Angulada</option>
                              </select>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p>  Anterior fue:<?php echo $bs_criterios_intermedios; ?> </p>
                              <select name='bs_criterios_intermedios' id='bs_criterios_intermedios' class="form-control">
                                <option value="<?php echo $bs_criterios_intermedios; ?>">Selecciona Criterios Intermedios</option>
                                <option value="lesion_regular">Lesión Regular</option>
                                <option value="simetrica">Simétrica</option>
                                <option value="contornos_netos">Contornos Netos</option>
                                <option value="contornos_rectilineos">Contornos Rectilíneos</option>
                              </select>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p>  Anterior fue:<?php echo $bs_criterios_mayores; ?> </p>
                              <select name='bs_criterios_mayores' id='bs_criterios_mayores' class="form-control">
                                <option value="<?php echo $bs_criterios_mayores; ?>">Selecciona Criterios Mayores</option>
                                <option value="bordes_dehiscentes">Bordes Dehiscentes</option>
                                <option value="bordes_enrolaldos">Bordes Enrollados</option>
                                <option value="cambios_menores_perifericos_mayores">Cambios Menores Periféricos Y Mayores Centrales</option>
                              </select>

                            </div>

                          </div>

                          <div class="row fila">
                            <div class="panel panel-default filaInterna">
                              <div class="panel-heading">Angioarquitectura</div>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p>  Anterior fue:<?php echo $ag_criterios_menores; ?> </p>
                              <select name='ag_criterios_menores' id='ag_criterios_menores' class="form-control">
                                <option value="<?php echo $ag_criterios_menores; ?>">Selecciona Criterios Menores</option>
                                <option value="capilar_fino">Capilar Fino</option>
                                <option value="calibre_disposion_uniforme">Calibre y Disposición Uniforme</option>
                                <option value="puntilleo_fino">Puntilleo Fino</option>
                                <option value="nmosaico_fino">Mosaico Fino</option>
                                <option value="vasos_mas_alla_zt">Vasos Más Allá de ZT</option>
                              </select>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p>  Anterior fue:<?php echo $ag_criterios_intermedios; ?> </p>
                              <select name='ag_criterios_intermedios' id='ag_criterios_intermedios' class="form-control">
                                <option value="<?php echo $ag_criterios_intermedios; ?>">Selecciona Criterios Intermedios</option>
                                <option value="ausencia_vasos">Ausencia de Vasos</option>

                              </select>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p>  Anterior fue:<?php echo $ag_criterios_mayores; ?> </p>
                              <select name='ag_criterios_mayores' id='ag_criterios_mayores' class="form-control">
                                <option value="<?php echo $ag_criterios_mayores; ?>">Selecciona Criterios Mayores</option>
                                <option value="puntilleo_grueso">Puntilleo Grueso</option>
                                <option value="mosaico_grueso">Mosaico Grueso</option>
                              </select>

                            </div>

                          </div>

                          <div class="row fila ">
                            <div class="panel panel-default filaInterna">
                              <div class="panel-heading">Captación de Yodo</div>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p>  Anterior fue:<?php echo $cy_menores; ?> </p>
                              <select name='cy_menores' id='cy_menores' class="form-control">
                                <option value="<?php echo $cy_menores; ?>">Criterios Menores</option>
                                <option value="positiva">Positivo</option>
                                <option value="negativa_puntos_criterios_anteriores">Negativa Con < 3 Puntos En Criterios Anteriores</option>
                                <option value="zonas_yodo_negativas">Zonas Yodonegativas Más Allá De La ZT</option>
                              </select>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p>  Anterior fue:<?php echo $cy_intermedios; ?> </p>
                              <select name='cy_intermedios' id='cy_intermedios' class="form-control">
                                <option value="<?php echo $cy_intermedios; ?>">Citerios Intermedios</option>
                                <option value="capacitacion_parcial_yodo">Captación Parcial De Yodo</option>
                                <option value="motedao_jaspeado">(Moteado-Jaspeado)</option>
                              </select>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p>  Anterior fue:<?php echo $cy_mayores; ?> </p>
                              <select name='cy_mayores' id='cy_mayores' class="form-control">
                                <option value="<?php echo $cy_mayores; ?>">Citerios Mayores</option>
                                <option value="yodo_negativa_conmas_puntos">Yodonegativa Con 4 O Más Puntos</option>
                                <option value="en_criterios_anteriores">En Criterios Anteriores</option>
                              </select>

                            </div>
                          </div>
                        </div>

                        <div class="row fila">
                          <div class="panel panel-default filaInterna">
                            <div class="panel-heading">Schiller</div>

                          </div>
                        </div>
                        <div class="row fila">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p> schiller Anterior fue:<?php echo $schiller; ?> </p>
                            <select name='schiller' id='schiller' class="form-control">
                              <option value="<?php echo $schiller; ?>">Selecciona Schiller</option>
                              <option value="negativa">Negativa</option>
                              <option value="positiva">Positiva</option>

                            </select>

                          </div>

                        </div> <br>

                        <div class="row fila">
                          <div class="panel panel-default filaInterna">
                            <div class="panel-heading">Vaginoscopia</div>

                          </div>
                        </div>
                        <div class="row fila">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p> vaginoscopia acetico Anterior fue:<?php echo $vaginoscopia_acetico; ?> </p>
                            <select name='vaginoscopia_acetico' id='vaginoscopia_acetico' class="form-control">
                              <option value="<?php echo $vaginoscopia_acetico; ?>">Selecciona Acético</option>
                              <option value="positivo">Positivo</option>
                              <option value="negativo">Negativo</option>
                            </select>

                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p> vaginoscopia lugol Anterior fue:<?php echo $vaginoscopia_lugol; ?> </p>
                            <select name='vaginoscopia_lugol' id='vaginoscopia_lugol' class="form-control">
                              <option value="<?php echo $vaginoscopia_lugol; ?>">Selecciona Lugol</option>
                              <option value="positivo">Positivo</option>
                              <option value="negativo">Negativo</option>
                            </select>

                          </div>
                        </div>
                        <div class="row fila">
                          <div class="panel panel-default filaInterna">
                            <div class="panel-heading">Vulvoscopia</div>

                          </div>
                        </div>
                        <div class="row fila">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p> vulvoscopia acetico Anterior fue:<?php echo $vulvoscopia_acetico; ?> </p>
                            <select name='vulvoscopia_acetico' id='vulvoscopia_acetico' class="form-control">
                              <option value="<?php echo $vulvoscopia_acetico; ?>">Selecciona Acético</option>
                              <option value="positivo">Positivo</option>
                              <option value="negativo">Negativo</option>
                            </select>

                          </div>
                        </div> <br>
                        <div class="row fila">
                          <div class="panel panel-default filaInterna">
                            <div class="panel-heading">Misceláneos</div>
                          </div>
                        </div>
                        <div class="row fila">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p> Misceláneos Anterior fue:<?php echo $miscelaneos; ?> </p>
                            <select name='miscelaneos' id='miscelaneos' class="form-control">
                              <option value="<?php echo $miscelaneos; ?>">Selecciona Miscelaneos</option>
                              <option value="condilomas">Condilomas</option>
                              <option value="eversion_glandular">Eversión Glandular</option>
                              <option value="leucoplasia">Leucoplasia</option>
                              <option value="zt_congenita">ZT Congénita</option>
                              <option value="inflamacion">Inflamación</option>
                              <option value="atrofia">Atrofia</option>
                              <option value="polipos">Pólipos</option>
                              <option value="deciduosis">Deciduosis</option>
                              <option value="queratosis">Queratosis</option>
                              <option value="hiperplasia_glandular">Hiperplasia Glandular</option>
                              <option value="micropapilomatosis_vestibular">Micropapilomatosis Vestibular</option>
                            </select>
                          </div>

              


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group purple-border">
                                <div class="row fila">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Plan de Tratamiento</FONT>
                                  </div>
                                </div>
                                <textarea class="form-control" rows="1" placeholder="<?php echo $plan_de_tratamiento; ?>" name="plan_de_tratamiento" form="f"></textarea>
                              </div>
                            </div>

                        </div>

                        <div class="row fila">
                          <center>
                            <?php
                            $consultasemanas = "SELECT * FROM imagen AS i WHERE i.id_atencion_medica='$id_atencion'";

                            $resultadosemanas = $mysqliL->query($consultasemanas);

                            while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
                                $ruta_imagen = $resultadosemanas1['ruta_imagen'];
    $id_imagen = $resultadosemanas1['id_imagen'];




                             ?>
                 <img src="imagesestudios/<?php echo $ruta_imagen; ?>"  width="150" height="75"> <a href='eliminarimagen.php?id_paciente=<?php echo $idpaciente;?>&id_atencion=<?php echo $id_atencion;?>&id_imagen=<?php echo $id_imagen;?>'>eliminar</a></img>
                          <?php  }   ?>
                      <br><br>  <br><br>  <br><br>
                          <h4 class="text-center">Imagenes Colposcopicas </h4>
                          <div class="form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <center> <input type="file" class="form-control" id="archivo" name="archivo[]" multiple> </center>
                            </div>
                          </div>
                        </div>
                        <div class="row fila">
                          <div id="vectorFotos" style="width: 100%;display:inline-block; text-align:center;">
                          </div>
                        </div>
                        <div class="row fila">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="floating-numner">
                              <p> RECOMENDACIÓN </p>
                            </div>
                          </div>
                        </div>
                        <div class="row fila">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                              <div class="nk-int-st">
                                <textarea class="form-control auto-size" rows="3" placeholder="LIEBG" name="recomendacion_diagnostica" disabled form="f"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--  <div class="row fila">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="floating-numner">
                              <p> DIAGNOSTICA</p>
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
                        </div>-->
                        <div class="row fila">

                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p> DIAGNOSTICO MÉDICO Anterior fue:<?php echo $posible_recomendacion_diagnostica; ?> </p>
                            <select name='posible_recomendacion_diagnostica' id='posible_recomendacion_diagnostica' class="form-control">
                              <option value="<?php echo $posible_recomendacion_diagnostica; ?>">DIAGNOSTICO MÉDICO</option>
                              <option value="hallazgos_normales">HALLAZGOS NORMALES</option>
                              <option value="hallazgos_sugestivos_">HALLAZGOS SUGESTIVOS DE INVASIÓN</option>
                              <option value="miscelaneos_hallazgos_varios">MISCELANEOS O HALLAZGOS VARIOS</option>
                              <option value="lesion_intraepitelial_bajogrado">LESIÓN INTRAEPITELIAL DE BAJO GRADO</option>
                              <option value="lesion_intraepitelial_altogrado">LESIÓN INTRAEPITELIAL DE ALTO GRADO</option>



                            </select>

                          </div>
                        </div> <br>
                        <br>


                      </p>

                    </div>
                  </div>
                </div>
            <?php     $re4 = mysqli_query($mysqliL,"SELECT ep.antecedente_cancer,ep.antecedente_infeccion_vagina,ep.observaciones_papinocolau

 FROM atencion_medica AS  a
INNER JOIN ctrl_paciente_estudios AS ct
ON ct.id_paciente=a.id_paciente

INNER JOIN estudio_papanicolau AS ep
ON ep.id_estudio=ct.id_estudio



WHERE ct.id_paciente='$idpaciente' AND ct.id_atencion='$id_atencion'  AND ct.id_tipo_estudio='7' ");



                $ro2 = mysqli_fetch_assoc($re4);
                  $antecedente_cancer = $ro2['antecedente_cancer'];
                    $antecedente_infeccion_vagina = $ro2['antecedente_infeccion_vagina'];
                      $observaciones_papinocolau= $ro2['observaciones_papinocolau'];

                  ?>
                <div class="panel panel-collapse notika-accrodion-cus">
                  <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordionPurple" href="#accordionPurple-two" aria-expanded="false">
                        PAPANICOLAOU
                      </a>
                    </h4>
                  </div>
                  <div id="accordionPurple-two" class="collapse" role="tabpanel">
                    <div class="panel-body">
                      <p>
                        <div class="row fila">

                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                            <div class="nk-int-st">
                              <input id="" name="" type="text" class="form-control" placeholder="PAPANICOLAOU/CITOLOGIA EXFOLIATIVA" disabled>
                            </div>





                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <p>

                              Antecedenctes de cancer:<br>
<?php if($antecedente_cancer==0){

?>
<label><input type="radio" name="antecedente_cancer" value="1"> Si</label>

<label><input type="radio" name="antecedente_cancer" value="0" checked> NO</label>
<?php } else{ ?>
  <label><input type="radio" name="antecedente_cancer" value="1" checked> Si</label>

  <label><input type="radio" name="antecedente_cancer" value="0"> NO</label>
  <?php
}?>




                            </p>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <p>

                              Antecedenctes de infecciòn vaginal :<br>

                              <?php if($antecedente_infeccion_vagina==0){

                              ?>
                              <label><input type="radio" name="antecedente_infeccion_vagina" value="1" > Si</label>

                              <label><input type="radio" name="antecedente_infeccion_vagina" value="0" checked> NO</label>
                              <?php } else{ ?>
                                <label><input type="radio" name="antecedente_infeccion_vagina" value="1" checked> Si</label>

                                <label><input type="radio" name="antecedente_infeccion_vagina" value="0"> NO</label>
                                <?php
                              }?>





                            </p>
                          </div>
                        </div>
                        <div class="row fila">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group purple-border">
                              <div class="row fila">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Observaciones</FONT>
                                </div>
                              </div>
                              <textarea class="form-control" rows="3" placeholder="<?php echo $observaciones_papinocolau; ?>" name="observaciones_papinocolau" form="f"></textarea>
                            </div>
                          </div>
                        </div>
                    </div>
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-collapse notika-accrodion-cus">
                <div class="panel-heading" role="tab">
                  <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionPurple" href="#accordionPurple-three" aria-expanded="false">
                      BIOPSIAS
                    </a>
                  </h4>
                </div>
                <div id="accordionPurple-three" class="collapse" role="tabpanel">
                  <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="accordion-stn mg-t-30">
                        <div class="panel-group" data-collapse-color="nk-purple" id="accordionPurple" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-collapse notika-accrodion-cus">
                            <div class="panel-heading" role="tab">
                              <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionPurple" href="#accordionPurple-four" aria-expanded="false">
                                  BIOPSIAS CERVIX
                                </a>
                              </h4>
                            </div>
                            <div id="accordionPurple-four" class="collapse" role="tabpanel">
                              <?php     $re4 = mysqli_query($mysqliL,"SELECT ep.senalizacion

 FROM atencion_medica AS  a
INNER JOIN ctrl_paciente_estudios AS ct
ON ct.id_paciente=a.id_paciente

INNER JOIN estudio_biopsia_cervix AS ep
ON ep.id_estudio=ct.id_estudio



                  WHERE ct.id_paciente='$idpaciente' AND ct.id_atencion='$id_atencion'  AND ct.id_tipo_estudio='2' ");



                                  $ro2 = mysqli_fetch_assoc($re4);
                                    $senalizacion = $ro2['senalizacion'];


                                    ?>
                              <div class="panel-body">
                                <p>
                                  <div class="row fila">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="floating-numner">
                                        <p>Señala Donde Fue Tomada la muetra</p>
                                        <img id="recuadroDona" src="../img/dona.JPG" width="200" height="200" ismap style="display:none">
                                        <canvas id="canvasDona" width="200" height="200">
                                          <input id="x" name="x" value="0" style="display:none">
                                          <input id="y" name="y" value="0" style="display:none">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row fila">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="form-group purple-border">
                                        <div class="row fila">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Anotaciones</FONT>
                                          </div>
                                        </div>
                                        <textarea class="form-control" rows="3" placeholder="<?php echo $senalizacion;?> " name="senalizacion" form="f"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </p>

                              </div>
                            </div>
                          </div>
                          <div class="panel panel-collapse notika-accrodion-cus">
                            <div class="panel-heading" role="tab">
                              <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionPurple" href="#accordionPurple-five" aria-expanded="false">
                                  BIOPSIAS DE VULVOSCOPIA
                                </a>
                              </h4>
                            </div>
                            <div id="accordionPurple-five" class="collapse" role="tabpanel">
                              <?php     $re4 = mysqli_query($mysqliL,"SELECT ep.anotaciones_vulvoscopia

 FROM atencion_medica AS  a
INNER JOIN ctrl_paciente_estudios AS ct
ON ct.id_paciente=a.id_paciente

INNER JOIN estudio_vulvoscopia AS ep
ON ep.id_estudio=ct.id_estudio



                  WHERE ct.id_paciente='$idpaciente' AND ct.id_atencion='$id_atencion'  AND ct.id_tipo_estudio='6' ");



                                  $ro2 = mysqli_fetch_assoc($re4);
                                    $anotaciones_vulvoscopia = $ro2['anotaciones_vulvoscopia'];


                                    ?>
                              <div class="panel-body">
                                <p>
                                  <div class="row fila">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="floating-numner">
                                        <p>Señala Donde Fue Tomada la muetra</p>
                                        <img id="recuadroVulva" src="../img/vulva.JPG" width="200" height="200" ismap style="display:none">
                                        <canvas id="canvasVulva" width="200" height="200">
                                          <input id="xy" name="xy" value="0" style="display:none">
                                          <input id="yx" name="yx" value="0" style="display:none">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row fila">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="form-group purple-border">
                                        <div class="row fila">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Anotaciones</FONT>
                                          </div>
                                        </div>
                                        <textarea class="form-control" rows="3" placeholder="<?php echo $anotaciones_vulvoscopia;?>" name="anotaciones_vulvoscopia" form="f"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-collapse notika-accrodion-cus">
                            <div class="panel-heading" role="tab">
                              <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionPurple" href="#accordionPurple-seven" aria-expanded="false">
                                  BIOPSIAS DE VAGINOSCOPIA
                                </a>
                              </h4>
                            </div>
                            <div id="accordionPurple-seven" class="collapse" role="tabpanel">
                              <div class="panel-body">
                                <p>
                                  <div class="row fila">
                                    <?php     $re4 = mysqli_query($mysqliL,"SELECT ep.anotaciones_vaginoscopia,ep.estudio_solicitar_vaginoscopia

 FROM atencion_medica AS  a
INNER JOIN ctrl_paciente_estudios AS ct
ON ct.id_paciente=a.id_paciente

INNER JOIN estudio_vaginoscopia AS ep
ON ep.id_estudio=ct.id_estudio




                                  WHERE ct.id_paciente='$idpaciente' AND ct.id_atencion='$id_atencion'  AND ct.id_tipo_estudio='5' ");



                                        $ro2 = mysqli_fetch_assoc($re4);
                                          $anotaciones_vaginoscopia = $ro2['anotaciones_vaginoscopia'];
                                  $estudio_solicitar_vaginoscopia = $ro2['estudio_solicitar_vaginoscopia'];

                                          ?>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<p>Seleccion Anterior fue:<?php echo $estudio_solicitar_vaginoscopia;?></p>
                                      <select name='estudio_solicitar_vaginoscopia' id='estudio_solicitar_vaginoscopia' class="form-control">
                                        <option value="<?php echo $estudio_solicitar_vaginoscopia;?>">Selecciona Estudio A Solicitar</option>
                                        <option value="institucional">INSICIONAL</option>
                                        <option value="trucut">TRUCUT</option>
                                        <option value="aspiracion">ASPIRACIÒN</option>
                                      </select>


                                    </div>

                                    <div class="row fila">
                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group purple-border">
                                          <div class="row fila">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                              <FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Anotaciones</FONT>
                                            </div>
                                          </div>
                                          <textarea class="form-control" rows="3" placeholder="<?php echo $anotaciones_vaginoscopia;?> " name="anotaciones_vaginoscopia" form="f"></textarea>
                                        </div>
                                      </div>
                                    </div>




                                  </div>

                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-collapse notika-accrodion-cus">
                            <?php     $re4 = mysqli_query($mysqliL,"SELECT ep.observaciones_endometrio

 FROM atencion_medica AS  a
INNER JOIN ctrl_paciente_estudios AS ct
ON ct.id_paciente=a.id_paciente

INNER JOIN estudio_biopsia_endometrio AS ep
ON ep.id_estudio=ct.id_estudio




                WHERE ct.id_paciente='$idpaciente' AND ct.id_atencion='$id_atencion'  AND ct.id_tipo_estudio='4' ");



                                $ro2 = mysqli_fetch_assoc($re4);
                                  $observaciones_endometrio = $ro2['observaciones_endometrio'];


                                  ?>
                            <div class="panel-heading" role="tab">
                              <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionPurple" href="#accordionPurple-six" aria-expanded="false">
                                  BIOPSIA DE ENDOMETRIO

                                </a>
                              </h4>
                            </div>
                            <div id="accordionPurple-six" class="collapse" role="tabpanel">
                              <div class="panel-body">
                                <p>

                                  <div class="row fila">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="form-group purple-border">
                                        <div class="row fila">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Observaciones</FONT>
                                          </div>
                                        </div>
                                        <textarea class="form-control" rows="3" placeholder="<?php echo $observaciones_endometrio;?>" name="observaciones_endometrio" form="f"></textarea>
                                      </div>
                                    </div>
                                  </div>
                              </div>

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
</div>
</div>
</div>
<br><br>
<center> <button type="submit" class="btn btn-primary">Enviar</button></center>
</div>
</div>

<!--<center><input type="submit" style="border: #000 1px solid; background-color: #ed80a8" value="Enviar formulario"></center>-->

      </form>
        <!--<center><input type="submit" style="border: #000 1px solid; background-color: #ed80a8" value="Enviar formulario"></center>-->


    <!-- Form Element area End-->

    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
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



    <script>



      screenshotButton.onclick = videoElement.onclick = function() {
        //<input id="img" type="hidden" name="archivo[]">
        var formulario = document.getElementById('f');
        var img = document.createElement('img');
        var canvas = document.createElement('canvas');
        canvas.width = 300 //videoElement.videoWidth;
        canvas.height = 300 //videoElement.videoHeight;
        canvas.getContext('2d').drawImage(videoElement, 0, 0, 300, 300);
        // Other browsers will fall back to image/png
        //img.src = canvas.toDataURL('image/webp');
        img.src = canvas.toDataURL('image/jpeg');
        img.setAttribute("id", "imgFoto" + contadorCanvas);
        var input = document.createElement('input');
        input.setAttribute("id", "inputImg" + contadorCanvas);
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "canvas[]");
        //input.setAttribute("class", "form-control captura");
        input.setAttribute("value", canvas.toDataURL('image/jpeg'));
        //input.style.display = "none";
        //input.addEventListener('submit', functSubmit);
        input.style.display = "none";
        document.getElementById('vectorFotos').appendChild(img);
        formulario.appendChild(input);
        contadorCanvas = contadorCanvas + 1;
      }

      function capturaFoto() {
        var formulario = document.getElementById('f');
        var img = document.createElement('img');
        var canvas = document.createElement('canvas');
        canvas.width = 300 //videoElement.videoWidth;
        canvas.height = 300 //videoElement.videoHeight;
        canvas.getContext('2d').drawImage(videoElement, 0, 0, 300, 300);
        // Other browsers will fall back to image/png
        img.src = canvas.toDataURL('image/jpeg');
        img.setAttribute("id", "imgFoto" + contadorCanvas);
        var input = document.createElement('input');
        input.setAttribute("id", "inputImg" + contadorCanvas);
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "canvas[]");
        //input.setAttribute("class", "form-control captura");
        input.setAttribute("value", canvas.toDataURL('image/jpeg'));
        //input.style.display = "none";
        //input.addEventListener('submit', functSubmit);
        document.getElementById('vectorFotos').appendChild(img);
        formulario.appendChild(input);
        contadorCanvas = contadorCanvas + 1;
      };

      function handleSuccess(stream) {
        screenshotButton.disabled = false;
        videoElement.srcObject = stream;
      }

      document.addEventListener("keyup", function(event) {
        if (event.keyCode == 44) {
          capturaFoto();
        }
      });

      function functSubmit(event) {

      }
    </script>


    <!-- ----------------------------------------------------------------------------------------------------->





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
