<?php session_start();

error_reporting(0); ?>
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
			e.hallazgos_colposcopicos,
			e.observaciones_papinocolau,
			ifnull(lpad(ct.id_atencion,4,'0000'),'-') as id_atencion,
			ec.posible_recomendacion_diagnostica,
			ct.clasificacion_medico
			FROM
			paciente p
			INNER JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = '$id_paciente' AND ct.id_estudio = '$id_estudio' AND ct.id_tipo_estudio = 7
			INNER JOIN usu_me u ON u.id_usuario = ct.id_usuario
			INNER JOIN estudio_papanicolau e ON ct.id_estudio = e.id_estudio
			INNER JOIN ctrl_paciente_estudios ctc ON ctc.id_atencion = ct.id_atencion AND ctc.id_tipo_estudio = 7
			INNER JOIN estudio_colposcopico ec ON ec.id_estudio = ctc.id_estudio";

		$res = $mysqliL->query($informacion);
		$info = $res->fetch_assoc();
		$fecha = $info['fecha_estudio'];
		$edad = $info['edad_paciente'];
		$paciente = $info['paciente'];
		$medico = $info['medico'];
		$idAtencion = $info['id_atencion'];
		$observaciones = $info['observaciones_papinocolau'];
		$clasificacion_medico_paps =  $info['clasificacion_medico'] == 0 ? "Normal" : "Urgente";
		$posible_recomendacion_diagnostica = ucwords(str_replace("_", " ", $info['posible_recomendacion_diagnostica']));

		if (!endsWith(trim($colposcopico), ".")) {
			$colposcopico = $colposcopico . '.';
		}

		if (!endsWith(trim($observaciones), ".")) {
			$observaciones = $observaciones . '.';
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

<body onload="imprimeEtiqueta()">
	<div id="etiqueta">
		<div class="container">
			<div class="row">
				<div style="background-color:#fff">
					<div>
						<center>
							<div class="logo-area">
								<a href="sistema.php">
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
						<p><b>Estudio Solicitado:</b> Citolog&iacute;a Exfoliativa</p>
						<p class="txt-justificado"><b>Hallazgos Colposc&oacute;picos:</b><?php echo $posible_recomendacion_diagnostica; ?></p>
						<p><b>Observaciones:</b></p>
						<p class="txt-justificado"><?php echo $observaciones; ?></p>
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
