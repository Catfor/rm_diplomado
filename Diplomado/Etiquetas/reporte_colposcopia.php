<!DOCTYPE html>
<html>

<head>
	<title>Etiqueta Estudio Cervix</title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../css/etiquetas.css" rel="stylesheet" />
	<link rel="shortcut icon" type="image/x-icon" href="../../img/logo/corona.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />


	<?php
	ob_start();
	include('../../coni/Localhost.php');
	
	include('../css.php');
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
			e.x,
			e.y
			FROM
			paciente p
			INNER JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_estudio = $id_estudio AND ct.id_tipo_estudio = 4
			INNER JOIN usu_me u ON u.id_usuario = ct.id_usuario
			INNER JOIN estudio_biopsia_cervix e ON ct.id_estudio = e.id_estudio";

		$res = $mysqliL->query($informacion);
		$info = $res->fetch_assoc();
		$fecha = $info['fecha_estudio'];
		$edad = $info['edad_paciente'];
		$paciente = $info['paciente'];
		$medico = $info['medico'];
		$antecendente_cancer_cervicouterino = $info['antecendente_cancer_cervicouterino'];
		$hallazgos_colposcopicos = $info['hallazgos_colposcopicos'];
		$senalizacion = $info['senalizacion'];
		$x = $info['x'];
		$y = $info['y'];

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
		function imprimeEtiqueta() {
			var mywindow = window.open('', 'PRINT', '', 'false');

			mywindow.document.write('<html> <
					head >
					<
					title > ' + document.title + ' < /title>');
					mywindow.document.write('</head> <
						body > ');
						mywindow.document.write('<link href="../../css/bootstrap.min.css" rel="stylesheet"/>'); mywindow.document.write('<link href="../../css/etiquetas.css" rel="stylesheet"/>'); mywindow.document.write(document.getElementById('etiqueta').innerHTML); mywindow.document.write('</body> <
							/html>');

							mywindow.document.close(); // necessary for IE >= 10
							mywindow.focus(); // necessary for IE >= 10*/

							mywindow.print(); mywindow.close();

							return true;
						}
	</script>

</head>

<body onload="imprimeEtiqueta()">
	<div id="etiqueta">
		<div class="container">
			<div class="row">
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

							<div class="row fila">

								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

									<select name='colposcopia' id='colposcopia' class="selectpicker">
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

										<select name='ep_criterios_menores' id='ep_criterios_menores' class="selectpicker">
											<option value="">Selecciona Criterios Menores</option>
											<option value="tenue">TENUE</option>
											<option value="blanco_intenso_c/brillo_superficial">BLANCO INTENSO C/BRILLO SUPERFICIAL</option>
											<option value="brillo_superficial">BRILLO SUPERFICIAL</option>
											<option value="transparente">TRANSPARENTE</option>
											<option value="fuera_zt">FUERA DE LA ZT</option>

										</select>

									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

										<select name='ep_criterios_intermedios' id='ep_criterios_intermedios' class="selectpicker">
											<option value="">Selecciona Criterios Intermedios</option>
											<option value="blanco_intermedio_c/brillo">BLANCO INTERMEDIO C/BRILLO</option>
											<option value="mayoria_lesiones">(MAYORÍA DE LESIONES)</option>
										</select>

									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

										<select name='ep_criterios_mayores' id='ep_criterios_mayores' class="selectpicker">
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

							</div>


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
							</div>


							<h4 class="text-center">Imagenes Colposcopicas </h4>

							<div class="form-group">

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<center>
										<input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
									</center>
								</div>
							</div>





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
											<textarea class="form-control auto-size" rows="2" placeholder="Escribe recomendacion Diagnostica" name="recomendacion_diagnostica" form="f" />

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
														<textarea class="form-control auto-size" rows="2" placeholder="Escribe recomendacion Diagnostica" name="posible_recomendacion_diagnostica" form="f"/>
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




			</body>

		</html>