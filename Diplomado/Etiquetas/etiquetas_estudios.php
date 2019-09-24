<?php session_start();  ?>
<!DOCTYPE html>
<html>

<head>
	<title>Etiqueta Estudio Papanicolaou</title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../css/etiquetas.css" rel="stylesheet" />
	<link rel="shortcut icon" type="image/x-icon" href="../../img/logo/corona.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<?php
	ob_start();

	include('../../coni/Localhost.php');
	date_default_timezone_set('America/Mexico_City');

	if (isset($_GET["id_paciente"])) {

		////////////////////////////////////////////////////////////////////////////////////////////

		$id_paciente = $_GET["id_paciente"];
		$id_estudio = $_GET["id_estudio"];
		$informacionPaciente = "SELECT 
			CONCAT(p.nombre_paciente,' ',p.apellidos_paciente ) as paciente,
			CONCAT(u.nombre_usuario,' ',u.apellidos_usuario ) as medico,
			p.edad_paciente
			FROM
			paciente p
			INNER JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_tipo_estudio = 0
			INNER JOIN usu_me u ON u.id_usuario = ct.id_usuario";

		$resPaciente = $mysqliL->query($informacion_paps);
		$infoPaciente = $resPaciente->fetch_assoc();
		$edad = $infoPaciente['edad_paciente'];
		$paciente = $infoPaciente['paciente'];
		$medico = $infoPaciente['medico'];

		////////////////////////////////////////////////////////////////////////////////////////////

		$informacion_paps = "SELECT 
			CONCAT(p.nombre_paciente,' ',p.apellidos_paciente ) as paciente,
			CONCAT(u.nombre_usuario,' ',u.apellidos_usuario ) as medico,
			p.edad_paciente,
			e.fecha_estudio,
			e.hallazgos_colposcopicos,
			e.observaciones_papinocolau
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

		if (!endsWith(trim($colposcopico_paps), ".")) {
			$colposcopico_paps = $colposcopico_paps . '.';
		}

		if (!endsWith(trim($observaciones_paps), ".")) {
			$observaciones_paps = $observaciones_paps . '.';
		}

		////////////////////////////////////////////////////////////////////////////////////////////

		$informacion_endo = "SELECT 
			CONCAT(p.nombre_paciente,' ',p.apellidos_paciente ) as paciente,
			CONCAT(u.nombre_usuario,' ',u.apellidos_usuario ) as medico,
			p.edad_paciente,
			e.fecha_estudio,
			e.antecedente_metrorragia, 	
			e.antecedente_hormonoterapia, 	
			e.duracion_tratamiento, 	
			e.periodo_menstrual, 	
			e.fecha_ultima_menstruacion, 	
			e.metodo_anticonceptivo
			FROM
			paciente p
			INNER JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_tipo_estudio = 4
			INNER JOIN usu_me u ON u.id_usuario = ct.id_usuario
			INNER JOIN estudio_biopsia_endometrio e ON ct.id_estudio = e.id_estudio";

		$res_endo = $mysqliL->query($informacion_endo);
		$info_endo = $res_endo->fetch_assoc();
		$fecha_endo = $info_endo['fecha_estudio'];
		$antecedente_metrorragia_endo = $info_endo['antecedente_metrorragia'];
		$antecedente_hormonoterapia_endo = $info_endo['antecedente_hormonoterapia'];
		$duracion_tratamiento_endo = $info_endo['duracion_tratamiento'];
		$periodo_menstrual_endo = $info_endo['periodo_menstrual'];
		$fecha_ultima_menstruacion_endo = $info_endo['fecha_ultima_menstruacion'];
		$metodo_anticonceptivo_endo = $info_endo['metodo_anticonceptivo'];

		////////////////////////////////////////////////////////////////////////////////////////////

		$informacion_vagino = "SELECT 
			CONCAT(p.nombre_paciente,' ',p.apellidos_paciente ) as paciente,
			CONCAT(u.nombre_usuario,' ',u.apellidos_usuario ) as medico,
			p.edad_paciente,
			e.fecha_estudio,
			e.anotaciones_vaginoscopia,
			ec.vaginoscopia_acetico,
			ec.vaginoscopia_lugol
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

		////////////////////////////////////////////////////////////////////////////////////////////
		$informacion = "SELECT 
		CONCAT(p.nombre_paciente,' ',p.apellidos_paciente ) as paciente,
		CONCAT(u.nombre_usuario,' ',u.apellidos_usuario ) as medico,
		p.edad_paciente,
		e.fecha_estudio,
		e.anotaciones_vulvoscopia,
		e.x,
		e.y,
		ec.vulvoscopia_acetico
		FROM
		paciente p
		INNER JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_estudio = $id_estudio AND ct.id_tipo_estudio = 6
		INNER JOIN usu_me u ON u.id_usuario = ct.id_usuario
		INNER JOIN estudio_vulvoscopia e ON ct.id_estudio = e.id_estudio
		INNER JOIN ctrl_paciente_estudios ctc ON ctc.id_atencion = ct.id_atencion AND ctc.id_tipo_estudio = 1
		INNER JOIN estudio_colposcopico ec ON ec.id_estudio = ctc.id_estudio";

		$res = $mysqliL->query($informacion);
		$info = $res->fetch_assoc();
		$fecha = $info['fecha_estudio'];
		$edad = $info['edad_paciente'];
		$paciente = $info['paciente'];
		$medico = $info['medico'];
		$anotaciones_vulvoscopia = $info['anotaciones_vulvoscopia'];
		$x = $info['x'];
		$y = $info['y'];
		$vulvoscopia_acetico = $info["vulvoscopia_acetico"];

		if (!endsWith(trim($anotaciones_vulvoscopia), ".")) {
			$anotaciones_vulvoscopia = $anotaciones_vulvoscopia . '.';
		}



		////////////////////////////////////////////////////////////////////////////////////////////



		////////////////////////////////////////////////////////////////////////////////////////////



		////////////////////////////////////////////////////////////////////////////////////////////




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
	<!-- SEPARACION DE ETIQUETAS -->
	<div id="etiqueta">
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
						<p class="txt-justificado"><b>Hallazgos Colposc&oacute;picos:</b><?php echo $colposcopico_paps; ?></p>
						<p><b>Observaciones:</b></p>
						<p class="txt-justificado"><?php echo $observaciones_paps; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- SEPARACION DE ETIQUETAS -->
	<div id="etiqueta">
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
						<p><b>Antecedentes de Metrorragia:</b> <?php echo ucwords($antecedente_metrorragia_endo); ?></p>
						<p><b>Antecedentes de Hormonoterapia:</b> <?php echo ucwords($antecedente_hormonoterapia_endo); ?></p>
						<p><b>Duracion del Tratamiento:</b><?php echo ucwords($duracion_tratamiento_endo); ?></p>
						<p><b>Periodos menstruales:</b> <?php echo ucwords($periodo_menstrual_endo); ?></p>
						<p><b>F.U.M.:</b> <?php echo ucwords($fecha_ultima_menstruacion_endo); ?></p>
						<p><b>M&eacute;todo anticonceptivo:</b> <?php echo ucwords($metodo_anticonceptivo_endo); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- SEPARACION DE ETIQUETAS -->
	<div id="etiqueta">
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
						<p class="txt-justificado"><b>Hallazgos Vaginoscopia:</b></p>
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
	<!-- SEPARACION DE ETIQUETAS -->

	<!-- SEPARACION DE ETIQUETAS -->

	<!-- SEPARACION DE ETIQUETAS -->

	<footer>
		<button onclick="imprimeEtiqueta()">Imprimir</button>
	</footer>

</body>

</html>