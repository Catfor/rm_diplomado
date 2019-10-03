<?php session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
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

    <div class="loader">
      <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
        <path fill="#000" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
          <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite" />
        </path>
      </svg>
    </div>

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
          $idpaciente = $_GET['id_paciente'];

          $result123 = mysqli_query($mysqliL, "SELECT * from paciente where id_paciente=$idpaciente");


          $rowwe = mysqli_fetch_assoc($result123);
          $nombrepaciente = ucwords(strtolower($rowwe['nombre_paciente']));
          $apellidospaciente = ucwords(strtolower($rowwe['apellidos_paciente']));
          $edad_paciente = $rowwe['edad_paciente'];
          $fecha_nacimiento_paciente = $rowwe['fecha_nacimiento_paciente'];

          $re = mysqli_query($mysqliL, "  SELECT * FROM paciente AS p
INNER JOIN atencion_medica AS a
ON a.id_paciente=p.id_paciente



WHERE a.id_paciente=$idpaciente ORDER BY a.id_atencion_medica  DESC LIMIT 1");
          $total = $re->num_rows;


          $ro = mysqli_fetch_assoc($re);
          $edad_inicio_menstruacion = $ro['edad_inicio_menstruacion'];
          $metodos_planificacion = $ro['metodos_planificacion'];
          $cual = $ro['cual'];
          $edad_inicio_vida_sexual = $ro['edad_inicio_vida_sexual'];
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

        var posDona = new Array();
        var posVulva = new Array();
        var limiteCoordDona = 5;
        var limiteCoordVulva = 5;

        window.onload = function() {
          var canvasDona = document.getElementById("canvasDona");
          var ctxDona = canvasDona.getContext("2d");
          var dona = document.getElementById("recuadroDona");
          var contDona = document.getElementById("contCoordCervix");

          var canvasVulva = document.getElementById("canvasVulva");
          var ctxVulva = canvasVulva.getContext("2d");
          var vulva = document.getElementById("recuadroVulva");
          var contVulva = document.getElementById("contCoordVulva");

          var donax = document.getElementById("coordCervix");

          var vulvax = document.getElementById("coordVulva");

          ctxVulva.drawImage(vulva, 0, 0, 200, 200);
          ctxDona.drawImage(dona, 0, 0, 200, 200);
          ctxVulva.lineWidth = 3;


          $("#canvasDona").on("click", function(event) {
            var offsetImg = offset(this);
            var x = (event.clientX - offsetImg.left).toFixed(2);
            var y = (event.clientY - offsetImg.top).toFixed(2);
            if ($(posDona).size() < limiteCoordDona) {
              posDona.push(x + "," + y);
              var btnCoord = document.createElement("div");
              btnCoord.style.margin = "10px";
              var txtCoord = document.createElement("input");
              txtCoord.setAttribute("type", "text");
              txtCoord.setAttribute("value", x + "," + y);
              var i = document.createElement('i');
              i.setAttribute("class", "far fa-times-circle");
              i.setAttribute("id", "delCoordCervix");
              i.setAttribute("onclick", "eliminaCoordDona(this)");
              i.style.color = "red";
              txtCoord.style.textAlign = "center";
              btnCoord.appendChild(txtCoord);
              btnCoord.appendChild(i);
              $(contDona).append(btnCoord);
            }
            ctxDona.drawImage(dona, 0, 0, 200, 200);

            $(posDona).each(function(index, value) {
              var coordsTemp = value.split(",");
              ctxDona.lineWidth = 4;
              ctxDona.strokeStyle = "#FFF";
              ctxDona.beginPath();
              ctxDona.arc(coordsTemp[0], coordsTemp[1], 10, 0, 2 * Math.PI);
              ctxDona.stroke();
              ctxDona.lineWidth = 2;
              ctxDona.strokeStyle = "#000";
              ctxDona.beginPath();
              ctxDona.arc(coordsTemp[0], coordsTemp[1], 10, 0, 2 * Math.PI);
              ctxDona.stroke();
            });
            donax.value = posDona.join("|");
          });

          $("#canvasVulva").on("click", function(event) {
            var offsetImg = offset(this);
            var x = (event.clientX - offsetImg.left).toFixed(2);
            var y = (event.clientY - offsetImg.top).toFixed(2);
            if ($(posVulva).size() < limiteCoordDona) {
              posVulva.push(x + "," + y);
              var btnCoord = document.createElement("div");
              btnCoord.style.margin = "10px";
              var txtCoord = document.createElement("input");
              txtCoord.setAttribute("type", "text");
              txtCoord.setAttribute("value", x + "," + y);
              var i = document.createElement('i');
              i.setAttribute("class", "far fa-times-circle");
              i.setAttribute("id", "delCoordCervix");
              i.setAttribute("onclick", "eliminaCoordVulva(this)");
              i.style.color = "red";
              txtCoord.style.textAlign = "center";
              btnCoord.appendChild(txtCoord);
              btnCoord.appendChild(i);
              $(contVulva).append(btnCoord);
            }
            vulvax.value = posVulva.join("|");
            ctxVulva.drawImage(vulva, 0, 0, 200, 200);
            $(posVulva).each(function(index, value) {
              var coordsTemp = value.split(",");
              ctxVulva.lineWidth = 4;
              ctxVulva.strokeStyle = "#FFF";
              ctxVulva.beginPath();
              ctxVulva.arc(coordsTemp[0], coordsTemp[1], 10, 0, 2 * Math.PI);
              ctxVulva.stroke();
              ctxVulva.lineWidth = 2;
              ctxVulva.strokeStyle = "#000";
              ctxVulva.beginPath();
              ctxVulva.arc(coordsTemp[0], coordsTemp[1], 10, 0, 2 * Math.PI);
              ctxVulva.stroke();
            });
          });


        }
      </script>
      <div id="formulario" style="padding-left: 400px;">
        <div class="breadcomb-area">
          <div class="container">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

              <div id="modalCam" style="position: fixed;top: 10px;left: 10px;z-index: 5;max-width: 200px;" class="tarjeta">
                <div style="display: none;">
                  <div class="select">
                    <label for="audioSource">Audio source: </label><select id="audioSource" onchange="iniciaTransmicion()"></select>
                  </div>
                  <div class="select">
                    <label for="videoSource">Video source: </label><select id="videoSource" onchange="iniciaTransmicion()"></select>
                  </div>
                </div>
                <!-- #region -->
                <video id="pantallaVideo" style="max-width: 450px;max-height: 450px; display:none" autoplay="true" muted="muted"></video>
                <p>
                  <button id="btn-activar" type="button" class="btn btn-default filaInterna" style="display: none" onclick="iniciaTransmicion()">Activar cámara en vivo</button>
                  <button id="btn-detener" type="button" class="btn btn-default filaInterna" style="display: none" onclick="detenTransmision()">Detener cámara</button>
                  <button id="btn-captura" type="button" class="btn btn-default filaInterna" style="display: none">Tomar Foto</button>
                </p>
              </div>
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
                    <h2 class="cabecera-morada">ATENCIÓN MÉDICA</h2>

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



                  <form id="f" action='guardar_atencion_medica.php' method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="idpaciente" value="<?php echo $idpaciente ?>">
                    <input type="hidden" class="form-control" name="id_usuario" value="<?php echo $id ?>">

                    <div class="row fila">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <select name="edad_inicio_menstruacion" class="form-control">
                          <option value="">Edad de Inicio de menstruación</option>
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




                        <select id='metodos_planificacion' name="metodos_planificacion" class="form-control">
                          <option value="">Selecciona Método de Planificación Familiar:</option>
                          <option value="hormonales_orales">Hormonales orales</option>
                          <option value="hormonales_inyectables">Hormonales inyectables</option>
                          <option value="condon">Condon</option>
                          <option value="ninguno">Ninguno</option>
                          <option value="otro">Otro</option>
                        </select>

                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">


                        <div class="form-group ic-cmp-int form-elet-mg">
                          <div class="form-ic-cmp">
                            <i class="notika-icon notika-edit"></i>
                          </div>
                          <div class="nk-int-st">
                            <input id="cual" name="cual" type="text" class="form-control" placeholder="¿Cùal?" disabled>
                          </div>
                        </div>
                      </div>


                    </div>
                    <div class="row fila">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <select name="edad_inicio_vida_sexual" class="form-control">
                          <option value="">Edad de inicio de vida sexual</option>
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



                        <select name="parejas_sexuales" class="form-control">
                          <option value="">Parejas sexuales</option>
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
                        <select name="gestas" class="form-control">
                          <option value="">Gestas</option>
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
                        <select name="para" class="form-control">
                          <option value="">Para</option>
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



                        <select name="cesareas" class="form-control">
                          <option value="">Césareas</option>
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
                        <select name="abortos" class="form-control">
                          <option value="">Abortos</option>
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
   <label for="bday">Fecha de la última regla</label>
   <input type="date" id="bday" name="fecha_ultima_regla">
 </div>

                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label for="bday">Fecha del último papanicolau</label>
                        <input type="date" id="bday" name="fecha_ultimo_papanicolau">
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
                          <textarea class="form-control" rows="2" placeholder="Escribe Antecedentes de Lesión" name="atecedentes_lesion" form="f"></textarea>
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
                          <textarea class="form-control" rows="2" placeholder="Escribe Antecedente de Tratamiento" name="antecedentes_tratamiento" form="f"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row fila">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">


                        <select name="metrorragia" class="form-control">
                          <option value="">Metrorragia</option>
                          <option value="1">SI</option>
                          <option value="0">NO</option>

                        </select>

                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">


                        <select name="hormonoterapia" class="form-control">
                          <option value="">Hormonoterapia</option>
                          <option value="1">SI</option>
                          <option value="0">NO</option>

                        </select>

                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="form-group">

                          <div class="nk-int-st">
                            <input type="text" name="duracion_hormonoterapia" class="form-control" placeholder="¿Duración?">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row fila">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">


                        <select name="ritmo" class="form-control">
                          <option value="">Ritmo</option>
                          <option value="regular">Regular</option>
                          <option value="irregular">Irregular</option>
                          <option value="ausente">Ausente</option>

                        </select>

                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">


                        <select name="antecedente_cancer_cervicouterino" class="form-control">
                          <option value="">Antecedente de Cáncer cervicouterino</option>
                          <option value="1">SI</option>
                          <option value="0">NO</option>

                        </select>
                      </div>


                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">


                        <select name="tratamiento_previo" class="form-control">
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

                                          <select name='colposcopia' id='colposcopia' class="form-control">
                                            <option value="">Selecciona colposcopia</option>
                                            <option value="adecuada">Adecuada</option>
                                            <option value="no_adecuada">No Adecuada</option>
                                          </select>

                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                          <select name='causa' id='causa' class="form-control">
                                            <option value="">Selecciona una Causa</option>
                                            <option value="sangrado">Sangrado</option>
                                            <option value="inflamacion">Inflamación</option>
                                            <option value="cicatrices">Cicatrices</option>
                                            <option value="no">Otras</option>
                                          </select>

                                        </div>




                                      </div>


                                      <div class="row fila">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                          <select name='cervix' id='cervix' class="form-control">
                                            <option value="">Selecciona Cervix</option>
                                            <option value="eutrofico">Eutrófico</option>
                                            <option value="atrofico">Atrófico</option>
                                            <option value="hipotrofico">Hipotrófico</option>
                                            <option value="hipertrofico">Hipertrófico</option>
                                            <option value="ausencia_quirurgica">Ausencia Quirúrgica</option>
                                            <option value="ausencia_otras_causas">Ausencia Otras Causas</option>
                                          </select>

                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                          <select name='union_escamocolumnar' id='union_escamocolumnar' class="form-control">
                                            <option value="">Selecciona Union Escamocolumnar </option>
                                            <option value="completamente_visible">Completamente Visible</option>
                                            <option value="parcialmente_visible">Parcialmente Visible</option>
                                          </select>

                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                          <select name='zona_transformacion' id='zona_transformacion' class="form-control">
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
                                            <div class="panel-heading">Epitelio Acetoblanco</div>

                                          </div>
                                        </div>


                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 fila">

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

                                            <select name='ep_criterios_menores' id='ep_criterios_menores' class="form-control">
                                              <option value="">Selecciona Criterios Menores</option>
                                              <option value="tenue">Tenue</option>
                                              <option value="blanco_intenso_c/brillo_superficial">Blanco Intenso C/Brillo Superficial</option>
                                              <option value="brillo_superficial">Brillo Superficial</option>
                                              <option value="plano">Plano</option>
                                              <option value="transparente">Transparente</option>
                                              <option value="fuera_zt">Fuera de la ZT</option>

                                            </select>

                                          </div>
                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                            <select name='ep_criterios_intermedios' id='ep_criterios_intermedios' class="form-control">
                                              <option value="">Selecciona Criterios Intermedios</option>
                                              <option value="blanco_intermedio_c/brillo">Blanco Intermedio C/Brillo</option>
                                              <option value="mayoria_lesiones">(Mayoría de Lesiones)</option>
                                            </select>

                                          </div>
                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                            <select name='ep_criterios_mayores' id='ep_criterios_mayores' class="form-control">
                                              <option value="">Selecciona Criterios Mayores</option>
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

                                            <select name='bs_criterios_menores' id='bs_criterios_menores' class="form-control">
                                              <option value="">Selecciona Criterios Menores</option>
                                              <option value="microcondilomatoso">Microcondilomatoso</option>
                                              <option value="micropapilar">Micropapilar</option>
                                              <option value="borde_indefinido">Borde Indefinido</option>
                                              <option value="borde_pluma_dentado">Borde en Pluma o Dentado</option>
                                              <option value="lesion_angulada">Lesión Angulada</option>
                                            </select>

                                          </div>
                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                            <select name='bs_criterios_intermedios' id='bs_criterios_intermedios' class="form-control">
                                              <option value="">Selecciona Criterios Intermedios</option>
                                              <option value="lesion_regular">Lesión Regular</option>
                                              <option value="simetrica">Simétrica</option>
                                              <option value="contornos_netos">Contornos Netos</option>
                                              <option value="contornos_rectilineos">Contornos Rectilíneos</option>
                                            </select>

                                          </div>
                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                            <select name='bs_criterios_mayores' id='bs_criterios_mayores' class="form-control">
                                              <option value="">Selecciona Criterios Mayores</option>
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

                                            <select name='ag_criterios_menores' id='ag_criterios_menores' class="form-control">
                                              <option value="">Selecciona Criterios Menores</option>
                                              <option value="capilar_fino">Capilar Fino</option>
                                              <option value="calibre_disposion_uniforme">Calibre y Disposición Uniforme</option>
                                              <option value="puntilleo_fino">Puntilleo Fino</option>
                                              <option value="nmosaico_fino">Mosaico Fino</option>
                                              <option value="vasos_mas_alla_zt">Vasos Más Allá de ZT</option>
                                            </select>

                                          </div>
                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                            <select name='ag_criterios_intermedios' id='ag_criterios_intermedios' class="form-control">
                                              <option value="">Selecciona Criterios Intermedios</option>
                                              <option value="ausencia_vasos">Ausencia de Vasos</option>

                                            </select>

                                          </div>
                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                            <select name='ag_criterios_mayores' id='ag_criterios_mayores' class="form-control">
                                              <option value="">Selecciona Criterios Mayores</option>
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

                                            <select name='cy_menores' id='cy_menores' class="form-control">
                                              <option value="">Criterios Menores</option>
                                              <option value="positiva">Positivo</option>
                                              <option value="negativa_puntos_criterios_anteriores">Negativa Con < 3 Puntos En Criterios Anteriores</option> <option value="zonas_yodo_negativas">Zonas Yodonegativas Más Allá De La ZT</option>
                                            </select>

                                          </div>
                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                            <select name='cy_intermedios' id='cy_intermedios' class="form-control">
                                              <option value="">Citerios Intermedios</option>
                                              <option value="capacitacion_parcial_yodo">Captación Parcial De Yodo</option>
                                              <option value="motedao_jaspeado">(Moteado-Jaspeado)</option>
                                            </select>

                                          </div>
                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                            <select name='cy_mayores' id='cy_mayores' class="form-control">
                                              <option value="">Citerios Mayores</option>
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

                                          <select name='schiller' id='schiller' class="form-control">
                                            <option value="">Selecciona Schiller</option>
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

                                          <select name='vaginoscopia_acetico' id='vaginoscopia_acetico' class="form-control">
                                            <option value="">Selecciona Acético</option>
                                            <option value="positivo">Positivo</option>
                                            <option value="negativo">Negativo</option>
                                          </select>

                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                          <select name='vaginoscopia_lugol' id='vaginoscopia_lugol' class="form-control">
                                            <option value="">Selecciona Lugol</option>
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

                                          <select name='vulvoscopia_acetico' id='vulvoscopia_acetico' class="form-control">
                                            <option value="">Selecciona Acético</option>
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

                                          <select name='miscelaneos' id='miscelaneos' class="form-control">
                                            <option value="">Selecciona Miscelaneos</option>
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
                                                <FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Antecedentes De Importancia (Cirugías Previas, Ctrioterapia, Lasser, Electrocirugía)</FONT>
                                              </div>
                                            </div>
                                            <textarea class="form-control" rows="1" placeholder="Escribe Antecedentes De Importancia (Cirugías Previas, Ctrioterapia, Lasser, Electrocirugía)" name="antecedentes_de_importancia" form="f"></textarea>
                                          </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group purple-border">
                                            <div class="row fila">
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Plan de Tratamiento</FONT>
                                              </div>
                                            </div>
                                            <textarea class="form-control" rows="1" placeholder="Escribe Plan de Tratamiento" name="plan_de_tratamiento" form="f"></textarea>
                                          </div>
                                        </div>

                                      </div>


                                <!--      <div class="row fila">
                                        <h4 class="text-center">Imagenes Colposcopicas </h4>
                                        <div class="form-group">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <center> <input type="file" class="form-control" id="archivo" name="archivo[]" multiple> </center>
                                          </div>
                                        </div>
                                      </div>-->
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
                                              <textarea id=autoDiag class="form-control auto-size" rows="3" placeholder="" name="recomendacion_diagnostica" disabled form="f"></textarea>
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

                                          <select name='posible_recomendacion_diagnostica' id='posible_recomendacion_diagnostica' class="form-control">
                                            <option value="">DIAGNOSTICO MÉDICO</option>
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

                                            <label><input type="radio" name="antecedente_cancer" value="1"> Si</label>

                                            <label><input type="radio" name="antecedente_cancer" value="0"> NO</label>



                                          </p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <p>

                                            Antecedenctes de infecciòn vaginal :<br>

                                            <label><input type="radio" name="antecedente_infeccion_vagina" value="1"> Si</label>

                                            <label><input type="radio" name="antecedente_infeccion_vagina" value="0"> NO</label>



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
                                            <textarea class="form-control" rows="3" placeholder="Escribe  las observaciones" name="observaciones_papinocolau" form="f"></textarea>
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
                                            <div class="panel-body">
                                              <p>
                                                <div class="row fila">
                                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style=" text-align: right; padding: 0 40px;">
                                                    <div class="floating-numner">
                                                      <p>Señala Donde Fue Tomada la muetra</p>
                                                      <img id="recuadroDona" src="../img/dona.JPG" width="200" height="200" ismap style="display:none">
                                                      <canvas id="canvasDona" width="200" height="200">
                                                        <input id="coordCervix" name="coordCervix" value="0" style="display:none">
                                                    </div>
                                                  </div>
                                                  <div id="contCoordCervix" class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding:25px 0px;">

                                                  </div>
                                                <div class="row fila">
                                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group purple-border">
                                                      <div class="row fila">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                          <FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Anotaciones</FONT>
                                                        </div>
                                                      </div>
                                                      <textarea class="form-control" rows="3" placeholder="Escribe  las Anotaciones" name="senalizacion" form="f"></textarea>
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
                                            <div class="panel-body">
                                              <p>
                                              <div class="row fila">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style=" text-align: right; padding: 0 40px;">
                                                  <div class="floating-numner">
                                                    <p>Señala Donde Fue Tomada la muetra</p>
                                                    <img id="recuadroVulva" src="../img/vulva.JPG" width="200" height="200" ismap style="display:none">
                                                    <canvas id="canvasVulva" width="200" height="200">
                                                      <input id="coordVulva" name="coordVulva" value="0" style="display:none">
                                                  </div>
                                                </div>

                                                <div id="contCoordVulva" class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding:25px 0px;">

                                                </div>

                                                <div class="row fila">
                                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group purple-border">
                                                      <div class="row fila">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                          <FONT FACE="Arial" SIZE="2" style="color:rgb(144, 143, 143);">Anotaciones</FONT>
                                                        </div>
                                                      </div>
                                                      <textarea class="form-control" rows="3" placeholder="Escribe  las Anotaciones" name="anotaciones_vulvoscopia" form="f"></textarea>
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

                                                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                    <select name='estudio_solicitar_vaginoscopia' id='estudio_solicitar_vaginoscopia' class="form-control">
                                                      <option value="">Selecciona Estudio A Solicitar</option>
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
                                                        <textarea class="form-control" rows="3" placeholder="Escribe  las Anotaciones" name="anotaciones_vaginoscopia" form="f"></textarea>
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
                                                      <textarea class="form-control" rows="3" placeholder="Escribe  las observaciones" name="observaciones_endometrio" form="f"></textarea>
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
        var ep = 0;
        var bs = 0;
        var ag = 0;
        var cy = 0;
        $("#epitelio_acetoblanco").change(function() {
          if ($("#epitelio_acetoblanco").val() === "presente") {
            $('#ep_criterios_menores').prop('disabled', false);
            $('#ep_criterios_intermedios').prop('disabled', false);
            $('#ep_criterios_mayores').prop('disabled', false);

            $('#bs_criterios_menores').prop('disabled', false);
            $('#bs_criterios_intermedios').prop('disabled', false);
            $('#bs_criterios_mayores').prop('disabled', false);

            $('#ag_criterios_menores').prop('disabled', false);
            $('#ag_criterios_intermedios').prop('disabled', false);
            $('#ag_criterios_mayores').prop('disabled', false);

            $('#cy_criterios_menores').prop('disabled', false);
            $('#cy_criterios_intermedios').prop('disabled', false);
            $('#cy_criterios_mayores').prop('disabled', false);

          } else {

            ep = 0;
            bs = 0;
            ag = 0;
            cy = 0;

            $('#ep_criterios_menores').prop('disabled', 'disabled');
            $('#ep_criterios_intermedios').prop('disabled', 'disabled');
            $('#ep_criterios_mayores').prop('disabled', 'disabled');

            $('#bs_criterios_menores').prop('disabled', 'disabled');
            $('#bs_criterios_intermedios').prop('disabled', 'disabled');
            $('#bs_criterios_mayores').prop('disabled', 'disabled');

            $('#ag_criterios_menores').prop('disabled', 'disabled');
            $('#ag_criterios_intermedios').prop('disabled', 'disabled');
            $('#ag_criterios_mayores').prop('disabled', 'disabled');

            $('#cy_criterios_menores').prop('disabled', 'disabled');
            $('#cy_criterios_intermedios').prop('disabled', 'disabled');
            $('#cy_criterios_mayores').prop('disabled', 'disabled');
          }
          calcularCriterios();
        });


        $("#ep_criterios_menores").change(function() {
          if ($("#ep_criterios_menores").val() === "") {
            ep = 0;
            $('#ep_criterios_intermedios').prop('disabled', false);
            $('#ep_criterios_mayores').prop('disabled', false);
          } else {
            ep = 0;
            $('#ep_criterios_intermedios').prop('disabled', 'disabled');
            $('#ep_criterios_mayores').prop('disabled', 'disabled');
          }
          calcularCriterios();
        });

        $("#ep_criterios_intermedios").change(function() {
          if ($("#ep_criterios_intermedios").val() === "") {
            ep = 0;
            $('#ep_criterios_menores').prop('disabled', false);
            $('#ep_criterios_mayores').prop('disabled', false);
          } else {
            ep = 1;
            $('#ep_criterios_menores').prop('disabled', 'disabled');
            $('#ep_criterios_mayores').prop('disabled', 'disabled');
          }
          calcularCriterios();
        });

        $("#ep_criterios_mayores").change(function() {
          if ($("#ep_criterios_mayores").val() === "") {
            ep = 0;
            $('#ep_criterios_menores').prop('disabled', false);
            $('#ep_criterios_intermedios').prop('disabled', false);
          } else {
            ep = 2;
            $('#ep_criterios_menores').prop('disabled', 'disabled');
            $('#ep_criterios_intermedios').prop('disabled', 'disabled');
          }
          calcularCriterios();
        });
        ///////////////////////////////////////////////////////////////////////////////////////////
        $("#bs_criterios_menores").change(function() {
          if ($("#bs_criterios_menores").val() === "") {
            bs = 0;
            $('#bs_criterios_intermedios').prop('disabled', false);
            $('#bs_criterios_mayores').prop('disabled', false);
          } else {
            bs = 0;
            $('#bs_criterios_intermedios').prop('disabled', 'disabled');
            $('#bs_criterios_mayores').prop('disabled', 'disabled');
          }
          calcularCriterios();
        });

        $("#bs_criterios_intermedios").change(function() {
          if ($("#bs_criterios_intermedios").val() === "") {
            bs = 0;
            $('#bs_criterios_menores').prop('disabled', false);
            $('#bs_criterios_mayores').prop('disabled', false);
          } else {
            bs = 1;
            $('#bs_criterios_menores').prop('disabled', 'disabled');
            $('#bs_criterios_mayores').prop('disabled', 'disabled');
          }
          calcularCriterios();
        });

        $("#bs_criterios_mayores").change(function() {
          if ($("#bs_criterios_mayores").val() === "") {
            bs = 0;
            $('#bs_criterios_menores').prop('disabled', false);
            $('#bs_criterios_intermedios').prop('disabled', false);
          } else {
            bs = 2;
            $('#bs_criterios_menores').prop('disabled', 'disabled');
            $('#bs_criterios_intermedios').prop('disabled', 'disabled');
          }
          calcularCriterios();
        });
        ////////////////////////////////////////////////

        $("#ag_criterios_menores").change(function() {
          if ($("#ag_criterios_menores").val() === "") {
            ag = 0;
            $('#ag_criterios_intermedios').prop('disabled', false);
            $('#ag_criterios_mayores').prop('disabled', false);
          } else {
            ag = 0;
            $('#ag_criterios_intermedios').prop('disabled', 'disabled');
            $('#ag_criterios_mayores').prop('disabled', 'disabled');
          }
          calcularCriterios();
        });

        $("#ag_criterios_intermedios").change(function() {
          if ($("#ag_criterios_intermedios").val() === "") {
            ag = 0;
            $('#ag_criterios_menores').prop('disabled', false);
            $('#ag_criterios_mayores').prop('disabled', false);
          } else {
            ag = 1;
            $('#ag_criterios_menores').prop('disabled', 'disabled');
            $('#ag_criterios_mayores').prop('disabled', 'disabled');
          }
          calcularCriterios();
        });

        $("#ag_criterios_mayores").change(function() {
          if ($("#ag_criterios_mayores").val() === "") {
            ag = 0;
            $('#ag_criterios_menores').prop('disabled', false);
            $('#ag_criterios_intermedios').prop('disabled', false);
          } else {
            ag = 2;
            $('#ag_criterios_menores').prop('disabled', 'disabled');
            $('#ag_criterios_intermedios').prop('disabled', 'disabled');
          }
          calcularCriterios();
        });
        //////////////////////////////////////////////////////

        $("#cy_menores").change(function() {
          if ($("#cy_menores").val() === "") {
            cy = 0;
            $('#cy_intermedios').prop('disabled', false);
            $('#cy_mayores').prop('disabled', false);
          } else {
            cy = 0;
            $('#cy_intermedios').prop('disabled', 'disabled');
            $('#cy_mayores').prop('disabled', 'disabled');
          }
          calcularCriterios();
        });

        $("#cy_intermedios").change(function() {
          if ($("#cy_intermedios").val() === "") {
            cy = 0;
            $('#cy_menores').prop('disabled', false);
            $('#cy_mayores').prop('disabled', false);
          } else {
            cy = 1;
            $('#cy_menores').prop('disabled', 'disabled');
            $('#cy_mayores').prop('disabled', 'disabled');
          }
          calcularCriterios();
        });

        $("#cy_mayores").change(function() {
          if ($("#cy_mayores").val() === "") {
            cy = 0;
            $('#cy_menores').prop('disabled', false);
            $('#cy_intermedios').prop('disabled', false);
          } else {
            cy = 2;
            $('#cy_menores').prop('disabled', 'disabled');
            $('#cy_intermedios').prop('disabled', 'disabled');
          }
          calcularCriterios();
        });

        ///////////////////////////////////////////////

        function calcularCriterios() {
          var calculoCriterio = ep + bs + ag + cy;
          if (calculoCriterio >= 0 && calculoCriterio <= 2) {
            $("#autoDiag").val(calculoCriterio + " - LIEBG");
            // LIEBG
          } else if (calculoCriterio >= 3 && calculoCriterio <= 4) {
            $("#autoDiag").val(calculoCriterio + " - NIC 1 VS NIC 2");
            // NIC 1 VS NIC 2
          } else if (calculoCriterio >= 5 && calculoCriterio <= 8) {
            $("#autoDiag").val(calculoCriterio + " - LIEAG");
            // LIEAG
          }

        }
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
        //Bloque de codigo de JS para hacer la captura de imagenes desde una webcam / colposcopio
        function hasGetUserMedia() {
          return !!(navigator.mediaDevices &&
            navigator.mediaDevices.getUserMedia);
        }

        if (hasGetUserMedia()) {
          // Good to go!
        } else {
          alert('La captura de fotos desde la web no es soportado por tu navegador');
          $(".loader").fadeOut()
          document.getElementById("modalCam").style.display = "none";
          document.getElementById('formulario').style.paddingLeft = "0px";
        }

        'use strict';
        var contadorCanvas = 1;
        var videoElement = document.querySelector('video');
        var audioSelect = document.getElementById('audioSource');
        var videoSelect = document.getElementById('videoSource');
        const captureVideoButton = document.querySelector('#screenshot .capture-button');
        const screenshotButton = document.getElementById('btn-captura');
        const divCanvas = document.getElementById('vectorFotos');

        iniciaTransmicion().then(getDevices).then(gotDevices).then(detenTransmision).then(function() {
          $(".loader").fadeOut()
        });

        function getDevices() {
          // AFAICT in Safari this only gets default devices until gUM is called :/
          return navigator.mediaDevices.enumerateDevices();
        }

        function gotDevices(deviceInfos) {
          window.deviceInfos = deviceInfos; // make available to console
          var dev = 1;
          for (const deviceInfo of deviceInfos) {
            const option = document.createElement('option');
            option.value = deviceInfo.deviceId;
            if (deviceInfo.kind === 'audioinput' && deviceInfo.label.includes("ISST")) {
              option.text = deviceInfo.label || `Microfono ${audioSelect.length + 1}`;
              audioSelect.appendChild(option);
            } else if (deviceInfo.kind === 'videoinput' && deviceInfo.label.includes("gato")) {
              option.text = deviceInfo.label || `Camara ${videoSelect.length + 1}`;
              videoSelect.appendChild(option);
            }
          }
        }

        function iniciaTransmicion() {
          if (window.stream) {
            window.stream.getTracks().forEach(track => {
              track.stop();
            });
          }
          const audioSrc = audioSelect.value;
          const videoSrc = videoSelect.value;
          const constraints = {
            audio: {
              deviceId: audioSrc ? {
                exact: audioSrc
              } : undefined
            },
            video: {
              deviceId: videoSrc ? {
                exact: videoSrc
              } : undefined
            }
          };
          document.getElementById('btn-activar').style.display = "none";
          document.getElementById('btn-captura').style.display = "block";
          document.getElementById('btn-detener').style.display = "block";
          document.getElementById('formulario').style.paddingLeft = "400px";
          document.getElementById('pantallaVideo').style.display = "block";
          document.querySelector("ul.notika-menu-wrap").style.paddingLeft = "200px";
          document.querySelector("div.logo-area").style.paddingLeft = "200px";

          return navigator.mediaDevices.getUserMedia(constraints).
          then(gotStream).catch(handleError);
        }

        function gotStream(stream) {
          window.stream = stream; // make stream available to console
          audioSelect.selectedIndex = [...audioSelect.options].
          findIndex(option => option.text === stream.getAudioTracks()[0].label);
          videoSelect.selectedIndex = [...videoSelect.options].
          findIndex(option => option.text === stream.getVideoTracks()[0].label);
          videoElement.srcObject = stream;
        }

        function handleError(error) {
          console.error('Error > ', error);
        }

        function detenTransmision() {
          if (window.stream) {
            window.stream.getTracks().forEach(function(track) {
              track.stop();
            });
          }
          document.getElementById('btn-activar').style.display = "block";
          document.getElementById('btn-captura').style.display = "none";
          document.getElementById('btn-detener').style.display = "none";
          document.getElementById('formulario').style.paddingLeft = "0px";
          document.getElementById('pantallaVideo').style.display = "none";
          document.querySelector("ul.notika-menu-wrap").style.paddingLeft = "0px";
          document.querySelector("div.logo-area").style.paddingLeft = "0px";

        }


        screenshotButton.onclick = videoElement.onclick = function() {
          var formulario = document.getElementById('f');
          var img = document.createElement('img');
          var canvasHelper = document.createElement('canvas');
          canvasHelper.width = 1000 ;
          canvasHelper.height = 1000 ;
          canvasHelper.getContext('2d').drawImage(videoElement, 0, 0, 1000, 1000);
          var canvas = document.createElement('canvas');
          canvas.width = 300 ;
          canvas.height = 300 ;
          canvas.getContext('2d').drawImage(videoElement, 0, 0, 300, 300);
          img.src = canvas.toDataURL('image/jpeg');
          img.setAttribute("id", "inputImg" + contadorCanvas);
          var input = document.createElement('input');
          input.setAttribute("id", "inputImg" + contadorCanvas);
          input.setAttribute("type", "hidden");
          input.setAttribute("name", "canvas[]");
          var div = document.createElement('div');
          var i = document.createElement('i');
          i.setAttribute("class", "far fa-times-circle fa-2x");
          div.setAttribute("class", "contenedorCanvas");
          div.style.position = "relative";
          div.style.display = "inline-block";
          div.style.margin = "5px";
          div.appendChild(img);
          div.appendChild(i);
          var audioElement = document.createElement('audio');
          audioElement.setAttribute('src', '../Diplomado/efecto/camara.mp3');
          audioElement.play();
          if ($(".chkImagenSeleccionada").length < 8) {
            var ic = document.createElement('i');
            ic.setAttribute("class", "chkImagenSeleccionada fas fa-check-circle fa-2x");
            div.appendChild(ic);
            input.setAttribute("value", "sel," + canvasHelper.toDataURL('image/jpeg'));
          }else{
            input.setAttribute("value", canvasHelper.toDataURL('image/jpeg'));
          }
          document.getElementById('vectorFotos').appendChild(div);
          formulario.appendChild(input);
          contadorCanvas = contadorCanvas + 1;
        }

        function capturaFoto() {
          var formulario = document.getElementById('f');
          var img = document.createElement('img');
          var canvasHelper = document.createElement('canvas');
          canvasHelper.width = 1000 ;
          canvasHelper.height = 1000 ;
          canvasHelper.getContext('2d').drawImage(videoElement, 0, 0, 1000, 1000);
          var canvas = document.createElement('canvas');
          canvas.width = 300 ;
          canvas.height = 300 ;
          canvas.getContext('2d').drawImage(videoElement, 0, 0, 300, 300);
          img.src = canvas.toDataURL('image/jpeg');
          img.setAttribute("id", "inputImg" + contadorCanvas);
          var input = document.createElement('input');
          input.setAttribute("id", "inputImg" + contadorCanvas);
          input.setAttribute("type", "hidden");
          input.setAttribute("name", "canvas[]");
          var div = document.createElement('div');
          var i = document.createElement('i');
          i.setAttribute("class", "far fa-times-circle fa-2x");
          div.setAttribute("class", "contenedorCanvas");
          div.style.position = "relative";
          div.style.display = "inline-block";
          div.style.margin = "5px";
          div.appendChild(img);
          div.appendChild(i);
          var audioElement = document.createElement('audio');
          audioElement.setAttribute('src', '../Diplomado/efecto/camara.mp3');
          audioElement.play();
          if ($(".chkImagenSeleccionada").length < 8) {
            var ic = document.createElement('i');
            ic.setAttribute("class", "chkImagenSeleccionada fas fa-check-circle fa-2x");
            div.appendChild(ic);
            input.setAttribute("value", "sel," + canvasHelper.toDataURL('image/jpeg'));
          }else{
            input.setAttribute("value", canvasHelper.toDataURL('image/jpeg'));
          }
          document.getElementById('vectorFotos').appendChild(div);
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

        $(document).on("click", ".fa-times-circle.fa-2x", function(e) {
          var idElemento = $($(e.target)[0]).prev().attr('id');
          $($(e.target)[0]).parent().fadeOut().remove();
          $('#' + idElemento).remove();
        });

        $(document).on("click", ".contenedorCanvas", function(e) {
          var apuntador = $($(e.target)[0]).parent();
          var inputHidden = document.getElementById($($(e.target)[0]).attr("id"));
          var sel = inputHidden.value.split(",");
          if ($(".chkImagenSeleccionada").length < 8) {
            if ($(apuntador).children(".chkImagenSeleccionada").length == 0) {
              $(apuntador).append('<i class="chkImagenSeleccionada fas fa-check-circle fa-2x"></i>');
              $(inputHidden).val( "sel," + sel.join(","));
            } else {
              $(apuntador).children(".chkImagenSeleccionada").remove();
              sel.splice($.inArray("sel",sel),1);
              $(inputHidden).val(sel.join(","));
            }
          } else if ($(apuntador).children(".chkImagenSeleccionada").length == 1) {
            $(apuntador).children(".chkImagenSeleccionada").remove();
              sel.splice($.inArray("sel",sel),1);
              $(inputHidden).val(sel.join(","));
          }
        });

        $('.inputDeshabilitado').keydown(function() {
          return false;
        });

        


        function eliminaCoordDona(e) {
          var divTemp = $(e).parent();
          var inputTemp = $(e).prev();
          var index = posDona.indexOf($(inputTemp).val());
          var canvasDona = document.getElementById("canvasDona");
          var ctxDona = canvasDona.getContext("2d");
          var dona = document.getElementById("recuadroDona");
          var donax = document.getElementById("coordCervix");

          if (index > -1) {
            posDona.splice(index, 1);
            $(divTemp).remove();
          }
          ctxDona.drawImage(dona, 0, 0, 200, 200);
          $(posDona).each(function(index, value) {
            var coordsTemp = value.split(",");
            ctxDona.lineWidth = 4;
            ctxDona.strokeStyle = "#FFF";
            ctxDona.beginPath();
            ctxDona.arc(coordsTemp[0], coordsTemp[1], 10, 0, 2 * Math.PI);
            ctxDona.stroke();
            ctxDona.lineWidth = 2;
            ctxDona.strokeStyle = "#000";
            ctxDona.beginPath();
            ctxDona.arc(coordsTemp[0], coordsTemp[1], 10, 0, 2 * Math.PI);
            ctxDona.stroke();
          });
          donax.value = posDona.join("|");
        };

        function eliminaCoordVulva(e) {
          var divTemp = $(e).parent();
          var inputTemp = $(e).prev();
          var index = posVulva.indexOf($(inputTemp).val());
          var canvasVulva = document.getElementById("canvasVulva");
          var ctxVulva = canvasVulva.getContext("2d");
          var vulva = document.getElementById("recuadroVulva");
          var vulvax = document.getElementById("coordVulva");

          if (index > -1) {
            posVulva.splice(index, 1);
            $(divTemp).remove();
          }
          ctxVulva.drawImage(vulva, 0, 0, 200, 200);
          $(posVulva).each(function(index, value) {
            var coordsTemp = value.split(",");
            ctxVulva.lineWidth = 4;
            ctxVulva.strokeStyle = "#FFF";
            ctxVulva.beginPath();
            ctxVulva.arc(coordsTemp[0], coordsTemp[1], 10, 0, 2 * Math.PI);
            ctxVulva.stroke();
            ctxVulva.lineWidth = 2;
            ctxVulva.strokeStyle = "#000";
            ctxVulva.beginPath();
            ctxVulva.arc(coordsTemp[0], coordsTemp[1], 10, 0, 2 * Math.PI);
            ctxVulva.stroke();
          });
          vulvax.value = posVulva.join("|");
        };
      </script>


      <!-- ----------------------------------------------------------------------------------------------------->
      <script>
        $("#f").submit(function(event) {
          event.preventDefault(); //prevent default action
          var post_url = $(this).attr("action"); //get form action url
          var request_method = $(this).attr("method"); //get form GET/POST method
          var form_data = $(this).serialize(); //Encode form elements for submission

          $.ajax({
            url: post_url,
            type: request_method,
            data: form_data,
            success: function(result) {
              //console.log(result);
              //if(result === "no_errors"){
              if (!result.includes("error")) {
                location.href = "consulta_paciente.php"
              }
              //}
            }
          });
        });
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



/*
<i class="far fa-times-circle fa-2x" style="
     top: 10px;
     right: 10px;
     position:absolute;
     color:white;
     opacity: 0.5;
     "></i>

*/

?>
