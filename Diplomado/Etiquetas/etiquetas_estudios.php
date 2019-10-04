<?php session_start();  ?>
<!DOCTYPE html>
<html>

<head>
	<title>Etiqueta Estudio Papanicolaou</title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../css/etiquetas.css" rel="stylesheet" />
	<link rel="shortcut icon" type="image/x-icon" href="../../img/logo/corona.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<?php
	ob_start();

	include('../../coni/Localhost.php');
	
	setlocale(LC_ALL, 'es_ES.UTF-8');
	date_default_timezone_set('America/Mexico_City');

	if (isset($_GET["id_paciente"])) {

		////////////////////////////////////////////////////////////////////////////////////////////

		$id_paciente = $_GET["id_paciente"];
		$informacionPaciente = "SELECT 
			CONCAT(p.nombre_paciente,' ',p.apellidos_paciente ) as paciente,
			CONCAT(u.nombre_usuario,' ',u.apellidos_usuario ) as medico,
			p.edad_paciente,
			ifnull(lpad(ct.id_atencion,4,'0000'),'-') as id_atencion
			FROM
			paciente p
			INNER JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_tipo_estudio = 0
			INNER JOIN usu_me u ON u.id_usuario = ct.id_usuario";

		$resPaciente = $mysqliL->query($informacionPaciente);
		$infoPaciente = $resPaciente->fetch_assoc();
		$edad = $infoPaciente['edad_paciente'];
		$paciente = $infoPaciente['paciente'];
		$medico = $infoPaciente['medico'];
		$idAtencion = $infoPaciente['id_atencion'];

		////////////////////////////////////////////////////////////////////////////////////////////

		$informacion_paps = "SELECT 
			CONCAT(p.nombre_paciente,' ',p.apellidos_paciente ) as paciente,
			CONCAT(u.nombre_usuario,' ',u.apellidos_usuario ) as medico,
			p.edad_paciente,
			e.fecha_estudio,
			e.hallazgos_colposcopicos,
			e.observaciones_papinocolau,
			ct.clasificacion_medico
			FROM
			paciente p
			INNER JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_tipo_estudio = 7
			INNER JOIN usu_me u ON u.id_usuario = ct.id_usuario
			INNER JOIN estudio_papanicolau e ON ct.id_estudio = e.id_estudio";

		$res_paps = $mysqliL->query($informacion_paps);
		$info_pap = $res_paps->fetch_assoc();
		$fecha_paps = $info_pap['fecha_estudio'];
		$colposcopico_paps = $info_pap['hallazgos_colposcopicos'];
		$observaciones_paps = $info_pap['observaciones_papinocolau'];
		$clasificacion_medico_paps = $info_pap['clasificacion_medico'] == 0 ? "Normal" : "Urgente";

		if (!endsWith(trim($colposcopico_paps), ".")) {
			$colposcopico_paps = $colposcopico_paps . '.';
		}

		if (!endsWith(trim($observaciones_paps), ".")) {
			$observaciones_paps = $observaciones_paps . '.';
		}

		////////////////////////////////////////////////////////////////////////////////////////////

		$informacion_endo =
			$informacion = "SELECT
		CONCAT(p.nombre_paciente,' ',p.apellidos_paciente ) AS paciente,
		CONCAT(u.nombre_usuario,' ',u.apellidos_usuario ) AS medico,
		p.edad_paciente,
		e.fecha_estudio,
		e.observaciones_endometrio,
		am.metrorragia,
		am.hormonoterapia,
		am.duracion_hormonoterapia,
		ct.clasificacion_medico
		FROM
		paciente AS p
		INNER JOIN ctrl_paciente_estudios AS ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_tipo_estudio = 4
		INNER JOIN usu_me AS u ON u.id_usuario = ct.id_usuario
		INNER JOIN estudio_biopsia_endometrio AS e ON ct.id_estudio = e.id_estudio
		INNER JOIN atencion_medica AS am ON am.id_atencion_medica = ct.id_atencion";

		$res_endo = $mysqliL->query($informacion_endo);
		$info_endo = $res_endo->fetch_assoc();
		$fecha_endo = $info_endo['fecha_estudio'];
		$antecedente_metrorragia = $info_endo['metrorragia'];
		$antecedente_hormonoterapia = $info_endo['hormonoterapia'];
		$duracion_tratamiento = isset($info_endo['duracion_hormonoterapia']) && !empty(trim($info_endo['duracion_hormonoterapia'])) ? $info_endo['duracion_hormonoterapia'] : 'N/A';
		$observaciones_endometrio = $info_endo['observaciones_endometrio'];
		$clasificacion_medico_endometrio = $info_endo['clasificacion_medico'] == 0 ? "Normal" : "Urgente";

		////////////////////////////////////////////////////////////////////////////////////////////

		$informacion_vagino = "SELECT 
			CONCAT(p.nombre_paciente,' ',p.apellidos_paciente ) as paciente,
			CONCAT(u.nombre_usuario,' ',u.apellidos_usuario ) as medico,
			p.edad_paciente,
			e.fecha_estudio,
			e.anotaciones_vaginoscopia,
			ec.vaginoscopia_acetico,
			ec.vaginoscopia_lugol,
			ct.clasificacion_medico
			FROM
			paciente p
			INNER JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_tipo_estudio = 5
			INNER JOIN usu_me u ON u.id_usuario = ct.id_usuario
			INNER JOIN estudio_vaginoscopia e ON ct.id_estudio = e.id_estudio
			INNER JOIN ctrl_paciente_estudios ctc ON ctc.id_atencion = ct.id_atencion AND ctc.id_tipo_estudio = 1
			INNER JOIN estudio_colposcopico ec ON ec.id_estudio = ctc.id_estudio";

		$res_vagino = $mysqliL->query($informacion_vagino);
		$info_vagino = $res_vagino->fetch_assoc();
		$fecha_vagino = $info_vagino['fecha_estudio'];
		$vaginoscopia_acetico_vagino = $info_vagino['vaginoscopia_acetico'];
		$vaginoscopia_lugol_vagino = $info_vagino['vaginoscopia_lugol'];
		$anotaciones_vaginoscopia_vagino = $info_vagino['anotaciones_vaginoscopia'];
		$clasificacion_medico_vagino = $info_vagino['clasificacion_medico'] == 0 ? "Normal" : "Urgente";

		////////////////////////////////////////////////////////////////////////////////////////////
		$informacion_vulva = "SELECT 
		CONCAT(p.nombre_paciente,' ',p.apellidos_paciente ) as paciente,
		CONCAT(u.nombre_usuario,' ',u.apellidos_usuario ) as medico,
		p.edad_paciente,
		e.fecha_estudio,
		e.anotaciones_vulvoscopia,
		e.coordenadas,
		ec.vulvoscopia_acetico,
		ct.clasificacion_medico
		FROM
		paciente p
		INNER JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_tipo_estudio = 6
		INNER JOIN usu_me u ON u.id_usuario = ct.id_usuario
		INNER JOIN estudio_vulvoscopia e ON ct.id_estudio = e.id_estudio
		INNER JOIN ctrl_paciente_estudios ctc ON ctc.id_atencion = ct.id_atencion AND ctc.id_tipo_estudio = 1
		INNER JOIN estudio_colposcopico ec ON ec.id_estudio = ctc.id_estudio";

		$res_vulva = $mysqliL->query($informacion_vulva);
		$info_vulva = $res_vulva->fetch_assoc();
		$fecha_vulva = $info_vulva['fecha_estudio'];
		$anotaciones_vulvoscopia_vulva = $info_vulva['anotaciones_vulvoscopia'];
		$coordenadasVulva = implode('","', explode('|', $info_vulva['coordenadas']));
		$vulvoscopia_acetico_vulva = $info_vulva["vulvoscopia_acetico"];
		$clasificacion_medico_vulva = $info_vulva["clasificacion_medico"] == 0 ? "Normal" : "Urgente";

		if (!endsWith(trim($anotaciones_vulvoscopia_vulva), ".")) {
			$anotaciones_vulvoscopia_vulva = $anotaciones_vulvoscopia_vulva . '.';
		}



		////////////////////////////////////////////////////////////////////////////////////////////

		$informacion_cervix = "SELECT 
			CONCAT(p.nombre_paciente,' ',p.apellidos_paciente ) as paciente,
			CONCAT(u.nombre_usuario,' ',u.apellidos_usuario ) as medico,
			p.edad_paciente,
			e.fecha_estudio,
			e.antecendente_cancer_cervicouterino,
			e.hallazgos_colposcopicos,
			e.senalizacion,
			e.coordenadas,
			ec.posible_recomendacion_diagnostica,
			ct.clasificacion_medico
			FROM
			paciente p
			INNER JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_tipo_estudio = 2
			INNER JOIN usu_me u ON u.id_usuario = ct.id_usuario
			INNER JOIN estudio_biopsia_cervix e ON ct.id_estudio = e.id_estudio
			INNER JOIN ctrl_paciente_estudios ctc ON ctc.id_atencion = ct.id_atencion AND ctc.id_tipo_estudio = 1
			INNER JOIN estudio_colposcopico ec ON ec.id_estudio = ctc.id_estudio";

		$res_cervix = $mysqliL->query($informacion_cervix);
		$info_cervix = $res_cervix->fetch_assoc();
		$fecha_cervix = $info_cervix['fecha_estudio'];
		$antecendente_cancer_cervicouterino_cervix = $info_cervix['antecendente_cancer_cervicouterino'];
		$hallazgos_colposcopicos_cervix = $info_cervix['hallazgos_colposcopicos'];
		$senalizacion_cervix = $info_cervix['senalizacion'];
		$clasificacion_medico_cervix = $info_cervix['clasificacion_medico'] == 0 ? "Normal" : "Urgente";
		$coordenadasCervix = implode('","', explode('|', $info_cervix['coordenadas']));
		$posible_recomendacion_diagnostica = ucwords(str_replace("_", " ", $info_cervix['posible_recomendacion_diagnostica']));

		if (!endsWith(trim($hallazgos_colposcopicos_cervix), ".")) {
			$hallazgos_colposcopicos_cervix = $hallazgos_colposcopicos_cervix . '.';
		}

		if (!endsWith(trim($senalizacion_cervix), ".")) {
			$senalizacion_cervix = $senalizacion_cervix . '.';
		}

		ob_end_flush();
	} //END IF -> if (isset($_GET["id_paciente"]))
	else {
		$fecha_paps = "";
		$edad = "";
		$paciente = "";
		$medico = "";
		$colposcopico_paps = "";
		$observaciones_paps = "";
	} // END ELSE -> if (isset($_GET["id_paciente"]))

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
		////////////////////////////////////////////////////////////////////////////////////////////


		$(document).ready().delay(100).queue(function() {

			<?php if (isset($fecha_cervix)) { ?>
				var canvasDona = document.getElementById("canvasDona");
				var ctxDona = canvasDona.getContext("2d");
				var dona = document.getElementById("recuadroDona");
				if (dona) {
					var coordenadas = <?php echo ('["' . $coordenadasCervix . '"]'); ?>;
					ctxDona.drawImage(dona, 0, 0, 200, 200);

					$(coordenadas).each(function(index, value) {
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
					dona.setAttribute("src", canvasDona.toDataURL());
				}
			<?php } ?>

			<?php if (isset($fecha_vulva)) { ?>
				var canvasVulva = document.getElementById("canvasVulva");
				var ctxVulva = canvasVulva.getContext("2d");
				var vulva = document.getElementById("recuadroVulva");
				if (vulva) {
					var coordenadas = <?php echo ('["' . $coordenadasVulva . '"]'); ?>;
					ctxVulva.drawImage(vulva, 0, 0, 200, 200);

					$(coordenadas).each(function(index, value) {
						var coordsTemp = value.split(",");
						ctxVulva.lineWidth = 6;
						ctxVulva.strokeStyle = "#FFF";
						ctxVulva.beginPath();
						ctxVulva.moveTo(coordsTemp[0] - 10, coordsTemp[1] - 10);
						ctxVulva.lineTo(coordsTemp[0] + 10, coordsTemp[1] + 10);
						ctxVulva.moveTo(coordsTemp[0] - 10, coordsTemp[1] + 10);
						ctxVulva.lineTo(coordsTemp[0] + 10, coordsTemp[1] - 10);
						ctxVulva.stroke();
						ctxVulva.lineWidth = 2;
						ctxVulva.strokeStyle = "#000";
						ctxVulva.beginPath();
						ctxVulva.moveTo(coordsTemp[0] - 10, coordsTemp[1] - 10);
						ctxVulva.lineTo(coordsTemp[0] + 10, coordsTemp[1] + 10);
						ctxVulva.moveTo(coordsTemp[0] - 10, coordsTemp[1] + 10);
						ctxVulva.lineTo(coordsTemp[0] + 10, coordsTemp[1] - 10);
						ctxVulva.stroke();
					});
					vulva.setAttribute("src", canvasVulva.toDataURL());
					vulva.style.display = "block";
					canvasVulva.style.display = "none";
				}
			<?php } ?>
			$("body").delay(500).queue(function() {
				imprimeEtiqueta();
			});


		});


		////////////////////////////////////////////////////////////////////////////////////////////
	</script>

</head>

<body>
	<!-- SEPARACION DE ETIQUETAS -->
	<?php if (isset($fecha_paps)) { ?>
		<div class="etiqueta">
			<div class="container">
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
									<b>Solicitud De Estudio De Papanicolaou</b>
								</center>
							</p>
							<div class="row">
								<div class="column">
									<p><b>ID Atención</b> <?php echo $idAtencion ?></p>
								</div>
								<div class="column">
									<p><b>Prioridad</b> <?php echo $clasificacion_medico_paps ?></p>
								</div>
							</div>
							<div class="row">
								<div class="column">
									<p>
										<b>Fecha:</b> <?php echo $fecha_paps; ?>
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
							<p><b>Estudio Solicitado:</b> Citolog&iacute;a Exfoliativa</p>
							<p class="txt-justificado"><b>Hallazgos Colposc&oacute;picos:</b><?php echo $posible_recomendacion_diagnostica; ?></p>
							<p><b>Observaciones:</b></p>
							<p class="txt-justificado"><?php echo $observaciones_paps; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- SEPARACION DE ETIQUETAS -->
	<?php if (isset($fecha_endo)) { ?>
		<div class="etiqueta">
			<div class="container">
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
									<b>Solicitud De Estudio Para Biopsia De Endometrio</b>
								</center>
							</p>
							<div class="row">
								<div class="column">
									<p><b>ID Atención</b> <?php echo $idAtencion ?></p>
								</div>
								<div class="column">
									<p><b>Prioridad</b> <?php echo $clasificacion_medico_endometrio ?></p>
								</div>
							</div>
							<div class="row">
								<div class="column">
									<p>
										<b>Fecha:</b> <?php echo $fecha_endo; ?>
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
							<p><b>Antecedentes de Metrorragia:</b> <?php echo ucwords($antecedente_metrorragia == 0 ? "No" : "Si"); ?></p>
							<p><b>Antecedentes de Hormonoterapia:</b> <?php echo ucwords($antecedente_hormonoterapia == 0 ? "No" : "Si"); ?></p>
							<p><b>Duracion Hormonoterapia:</b><?php echo ucwords($duracion_tratamiento); ?></p>
							<p><b>Observaciones: </b> <?php echo ($observaciones_endometrio); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- SEPARACION DE ETIQUETAS -->
	<?php if (isset($fecha_vagino)) { ?>
		<div class="etiqueta">
			<div class="container">
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
									<b>Solicitud De Estudio Para Biopsia De Vaginoscopia</b>
								</center>
							</p>

							<div class="row">
								<div class="column">
									<p><b>ID Atención</b> <?php echo $idAtencion ?></p>
								</div>
								<div class="column">
									<p><b>Prioridad</b> <?php echo $clasificacion_medico_vagino ?></p>
								</div>
							</div>
							<div class="row">
								<div class="column">
									<p>
										<b>Fecha:</b> <?php echo $fecha_vagino; ?>
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
							<p class="txt-justificado"><b>Estudio solicitado: </b><?php echo ucwords($estudio_solicitar_vaginoscopia); ?></p>
							<p>
								<b>Acetico:</b> <?php echo ucwords($vaginoscopia_acetico_vagino); ?></p>
							<p>
								<b>Lugol:</b> <?php echo ucwords($vaginoscopia_lugol_vagino); ?></p>
							<p><b>Anotaciones:</b></p>
							<p class="txt-justificado"><?php echo $anotaciones_vaginoscopia_vagino; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- SEPARACION DE ETIQUETAS -->
	<?php if (isset($fecha_vulva)) { ?>
		<div class="etiqueta">
			<div class="container">
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
									<b>Solicitud De Estudio Para Biopsia De Vulva</b>
								</center>
							</p>

							<div class="row">
								<div class="column">
									<p><b>ID Atención</b> <?php echo $idAtencion ?></p>
								</div>
								<div class="column">
									<p><b>Prioridad</b> <?php echo $clasificacion_medico_vulva ?></p>
								</div>
							</div>
							<div class="row">
								<div class="column">
									<p>
										<b>Fecha:</b> <?php echo $fecha_vulva; ?>
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
							<b>Acetico:</b> <?php echo ucwords($vulvoscopia_acetico_vulva) ?></p>
							<p>
								<p>
									<b>Se&ntilde;ala Donde Fue Tomada la muestra:</b>
								</p>

								<div class="row">
									<div id="columnaCanvas" class="column">
										<center>
											<img id="recuadroVulva" src="../../img/vulva.JPG" width="200" height="200" style="display:none;max-width:200px;max-height:200px;">
											<canvas id="canvasVulva" width="200" height="200">
										</center>
									</div>
									<div class="column">
										<p>
											<b>Anotaciones:</b>
										</p>
										<p class="txt-justificado"><?php echo ucwords($anotaciones_vulvoscopia_vulva); ?></p>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- SEPARACION DE ETIQUETAS -->
	<?php if (isset($fecha_cervix)) { ?>
		<div class="etiqueta">
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
							</p>

							<div class="row">
								<div class="column">
									<p><b>ID Atención</b> <?php echo $idAtencion ?></p>
								</div>
								<div class="column">
									<p><b>Prioridad</b> <?php echo $clasificacion_medico_cervix ?></p>
								</div>
							</div>
							<div class="row">
								<div class="column">
									<p>
										<b>Fecha:</b> <?php echo $fecha_cervix; ?>
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
								<b>Antecedentes de Cancer Cervicouterino:</b><?php echo ucwords($antecendente_cancer_cervicouterino_cervix); ?></p>
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
									<p class="txt-justificado"><?php echo ucwords($senalizacion_cervix); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- SEPARACION DE ETIQUETAS -->

	<footer>
		<button onclick="imprimeEtiqueta()">Imprimir</button>
	</footer>

	<script>
		function imprimeEtiqueta() {
			var mywindow = window.open('', 'PRINT', '', 'false');

			mywindow.document.write('<html><head><title>Etiquetas Disponibles</title>');
			mywindow.document.write('</head><body >');
			mywindow.document.write('<link href="../../css/bootstrap.min.css" rel="stylesheet"/>');
			mywindow.document.write('<link href="../../css/etiquetas.css" rel="stylesheet"/>');
			var etiquetas = document.getElementsByClassName('etiqueta');
			console.log(etiquetas);
			var contenidos = '';
			for (var i = 0; i < etiquetas.length; i++) {
				contenidos += '<div class="etiqueta">' + etiquetas[i].innerHTML + '</div><br clear="all" style="page-break-before:always" />';
			}
			mywindow.document.write(contenidos);
			mywindow.document.write('</body></html>');

			mywindow.document.close(); // necessary for IE >= 10
			mywindow.focus(); // necessary for IE >= 10*/

			mywindow.print();
			mywindow.close();
			window.close();
			return true;
		}
	</script>


</body>

</html>