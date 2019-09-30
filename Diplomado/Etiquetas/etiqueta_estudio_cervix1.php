<!DOCTYPE html>
<html>

<head>
	<title>Etiqueta Estudio Cervix</title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../css/etiquetas.css" rel="stylesheet" />
	<link rel="shortcut icon" type="image/x-icon" href="../../img/logo/corona.png" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1" />


	<?php
	ob_start();
	include('../../coni/Localhost.php');
	
	setlocale(LC_ALL, 'es_ES.UTF-8');
	date_default_timezone_set('America/Mexico_City');
	if (isset($_GET["id_paciente"]) && isset($_GET["id_estudio"])) {
		$id_paciente = $_GET["id_paciente"];
		$id_estudio = $_GET["id_estudio"];
		$informacion = "SELECT
			CONCAT(p.nombre_paciente,' ',p.apellidos_paciente ) as paciente,
			CONCAT(u.nombre_usuario,' ',u.apellidos_usuario ) as medico,
			p.edad_paciente,
			e.fecha_estudio,
			e.antecendente_cancer_cervicouterino,
			e.hallazgos_colposcopicos,
			e.senalizacion,
			e.coordenadas,
			ec.posible_recomendacion_diagnostica,
			ifnull(lpad(ct.id_atencion,4,'0000'),'-') as id_atencion,
			ct.clasificacion_medico
			FROM
			paciente p
			INNER JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_estudio = $id_estudio AND ct.id_tipo_estudio = 2
			INNER JOIN usu_me u ON u.id_usuario = ct.id_usuario
			INNER JOIN estudio_biopsia_cervix e ON ct.id_estudio = e.id_estudio
			INNER JOIN ctrl_paciente_estudios ctc ON ctc.id_atencion = ct.id_atencion AND ctc.id_tipo_estudio = 1
			INNER JOIN estudio_colposcopico ec ON ec.id_estudio = ctc.id_estudio";

		$res =$mysqliL->query($informacion);
		$info = $res->fetch_assoc();
		$fecha = $info['fecha_estudio'];
		$edad = $info['edad_paciente'];
		$paciente = $info['paciente'];
		$medico = $info['medico'];
		$idAtencion = $info['id_atencion'];
		$antecendente_cancer_cervicouterino = $info['antecendente_cancer_cervicouterino'];
		$hallazgos_colposcopicos = $info['hallazgos_colposcopicos'];
		$senalizacion = $info['senalizacion'];
		$coordenadasHelper = implode('","', explode('|', $info['coordenadas']));
		$posible_recomendacion_diagnostica = ucwords(str_replace("_", " ", $info['posible_recomendacion_diagnostica']));

		if (!endsWith(trim($hallazgos_colposcopicos), ".")) {
			$hallazgos_colposcopicos = $hallazgos_colposcopicos . '.';
		}

		if (!endsWith(trim($senalizacion), ".")) {
			$senalizacion = $senalizacion . '.';
		}

		ob_end_flush();
	} else {
		$fecha = "";
		$edad = "";
		$paciente = "";
		$medico = "";
		$colposcopico = "";
		$observaciones = "";
	}

	function endsWith($string, $endString)
	{
		$len = strlen($endString);
		if ($len == 0) {
			return true;
		}
		return (substr($string, -$len) === $endString);
	}
	?>

	<script>
		$(document).ready(function() {


			var canvasDona = document.getElementById("canvasDona");
			var ctxDona = canvasDona.getContext("2d");
			var dona = document.getElementById("recuadroDona");
			var coordenadas = <?php echo ('["' . $coordenadasHelper . '"]'); ?>;
			ctxDona.drawImage(dona, 0, 0, 200, 200);

            var canvasDona = document.getElementById("canvasDona");
            var ctxDona = canvasDona.getContext("2d");
            var dona = document.getElementById("recuadroDona");
			var coordenadas = <?php echo ('["' . $coordenadasHelper . '"]');?> ;
			ctxDona.drawImage(dona, 0, 0,200,200);

			$(coordenadas).each(function (index, value){
            	var coordsTemp = value.split(",");
				ctxDona.lineWidth = 6;
				ctxDona.strokeStyle = "#FFF";
				ctxDona.beginPath();
				ctxDona.moveTo(coordsTemp[0] - 10, coordsTemp[1] - 10);
				ctxDona.lineTo(coordsTemp[0] + 10, coordsTemp[1] + 10);
				ctxDona.moveTo(coordsTemp[0] - 10, coordsTemp[1] + 10);
				ctxDona.lineTo(coordsTemp[0] + 10, coordsTemp[1] - 10);
				ctxDona.stroke();
				ctxDona.lineWidth = 2;
				ctxDona.strokeStyle = "#000";
				ctxDona.beginPath();
				ctxDona.moveTo(coordsTemp[0] - 10, coordsTemp[1] - 10);
				ctxDona.lineTo(coordsTemp[0] + 10, coordsTemp[1] + 10);
				ctxDona.moveTo(coordsTemp[0] - 10, coordsTemp[1] + 10);
				ctxDona.lineTo(coordsTemp[0] + 10, coordsTemp[1] - 10);
				ctxDona.stroke();
			});
			dona.style.display = "block";
			canvasDona.style.display = "none";
			dona.setAttribute("src",canvasDona.toDataURL());

			$(canvasDona).delay( 200 ).queue(function() {
				imprimeEtiqueta();
			});


		});

		function imprimeEtiqueta() {


			var mywindow = window.open('', 'PRINT', '', 'false');

			mywindow.document.write('<html><head><title>' + document.title + '</title>');
			mywindow.document.write('</head><body >');
			mywindow.document.write('<link href="../../css/bootstrap.min.css" rel="stylesheet"/>');
			mywindow.document.write('<link href="../../css/etiquetas.css" rel="stylesheet"/>');
			mywindow.document.write(document.getElementById('etiqueta').innerHTML);
			mywindow.document.write('</body></html>');

			mywindow.document.close(); // necessary for IE >= 10
			mywindow.focus(); // necessary for IE >= 10*/

			mywindow.print();
			mywindow.close();
			window.close();

			return true;
		}



	</script>

</head>

<body>
	<div id="etiqueta">
		<div class="container" style="word-wrap:break-word;">
			<div class="row">
				<div style="background-color:#fff">
					<div>
						<center>
							<div class="logo-area">
								<a href="#">
									<img src="../../img/logo/reina.png" style="max-width: 90px; max-height: 90px" />
								</a>
							</div>
						</center>
					</div>
					<div>
						<p>
							<center>
								<b>Solicitud De Estudio Para Biopsia De Cervix</b>
							</center>
							<div style="float:right;margin-top: 5px;">
								<p><b>ID Atención</b> <?php echo $idAtencion ?></p>
							</div>
						</p>
						<div class="row">
							<div class="column">
								<p>
									<b>Fecha:</b> <?php echo $fecha; ?>
								</p>
							</div>
							<div class="column">
								<p>
									<b>Edad:</b> <?php echo $edad; ?></p>
								<p>
							</div>
						</div>
						<p><b>Paciente:</b> <?php echo ucwords($paciente); ?></p>
						<p><b>Medico:</b> <?php echo ucwords($medico); ?></p>
						<p class="txt-justificado">
							<b>Hallazgos Colposcopia:</b><?php echo ucwords($posible_recomendacion_diagnostica); ?></p>
						<p>
							<b>Antecedentes de Cancer Cervicouterino:</b><?php echo ucwords($antecendente_cancer_cervicouterino); ?></p>
						<p>
							<b>Se&ntilde;ala Donde Fue Tomada la muestra:</b>
						</p>
						<div class="row">
							<div class="column">
								<center>
									<img id="recuadroDona" src="../../img/dona.JPG" width="200" height="200" ismap style="display:none">
									<canvas id="canvasDona" width="200" height="200">
								</center>
							</div>
							<div class="column">
								<p>
									<b>Anotaciones:</b>
								</p>
								<p class="txt-justificado"><?php echo ucwords($senalizacion); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<button onclick="imprimeEtiqueta()">Imprimir</button>
	</footer>

</body>

</html>
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
                            <label><input type="radio" name="celulas_endocervicales" value="1" required> Si</label>
                            <label><input type="radio" name="celulas_endocervicales" value="0" required> NO</label>
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
                            <label><input type="radio" name="celulas_endocervicales" value="1" required> Si</label>
                            <label><input type="radio" name="celulas_endocervicales" value="0" required> NO</label>
                               </p>

                              </div>
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                             <p>COCOIDE
                               <label><input type="radio" name="celulas_endocervicales" value="1" required> Si</label>
                               <label><input type="radio" name="celulas_endocervicales" value="0" required> NO</label>
                                  </p>
                        </div><br><br><br><br>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <p>MIXTA
                            <label><input type="radio" name="celulas_endocervicales" value="1" required> Si</label>
                            <label><input type="radio" name="celulas_endocervicales" value="0" required> NO</label>
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
                            <label><input type="radio" name="celulas_endocervicales" value="1" required> Si</label>
                            <label><input type="radio" name="celulas_endocervicales" value="0" required> NO</label>
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
                                        <select name="polimorfonucleares" class="selectpicker" required>
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
                                        <select name="citolisis" class="selectpicker" required>
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
                                        <select name="parasitos_hongos" class="selectpicker" required>
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
                                        <select name="tricomonas" class="selectpicker" required>
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
                                        <select name="celulas_guia" class="selectpicker" required>
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
                                        <select name="histiocitos" class="selectpicker" required>
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
                                        <select name="eritrocitos" class="selectpicker" required>
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
                                        <select name="candida" class="selectpicker" required>
                                          <option value="" >CANDIDA</option>
                                          <option value="si">SI</option>
                                          <option value="no" >NO</option>
                                </select>
                                    </div>
                                </div>
                              </div>    <div class="row">
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
                      </div>


                              </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                              <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                                  <div class="past-day-statis">
                                      <h2>For The Past 30 Days</h2>
                                      <p>Fusce eget dolor id justo luctus the commodo vel pharetra nisi. Donec velit of libero.</p>
                                  </div>
                      <div class="dash-widget-visits"></div>
                                  <div class="past-statistic-an">
                                      <div class="past-statistic-ctn">
                                          <h3><span class="counter">3,20,000</span></h3>
                                          <p>Page Views</p>
                                      </div>
                                      <div class="past-statistic-graph">
                                          <div class="stats-bar"></div>
                                      </div>
                                  </div>
                                  <div class="past-statistic-an">
                                      <div class="past-statistic-ctn">
                                          <h3><span class="counter">1,03,000</span></h3>
                                          <p>Total Clicks</p>
                                      </div>
                                      <div class="past-statistic-graph">
                                          <div class="stats-line"></div>
                                      </div>
                                  </div>
                                  <div class="past-statistic-an">
                                      <div class="past-statistic-ctn">
                                          <h3><span class="counter">24,00,000</span></h3>
                                          <p>Site Visitors</p>
                                      </div>
                                      <div class="past-statistic-graph">
                                          <div class="stats-bar-2"></div>
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
