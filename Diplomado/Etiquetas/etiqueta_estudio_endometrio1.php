<!DOCTYPE html>
<html>

<head>
	<title>Etiqueta Estudio Endometrio</title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../css/etiquetas.css" rel="stylesheet" />
	<link rel="shortcut icon" type="image/x-icon" href="../../img/logo/corona.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<?php
	ob_start();
	include('../../coni/Localhost.php');
	date_default_timezone_set('America/Mexico_City');
	if (isset($_GET["id_paciente"]) && isset($_GET["id_estudio"])) {
		$id_paciente = $_GET["id_paciente"];
		$id_estudio = $_GET["id_estudio"];
		$informacion = "SELECT
		CONCAT(p.nombre_paciente,' ',p.apellidos_paciente ) AS paciente,
		CONCAT(u.nombre_usuario,' ',u.apellidos_usuario ) AS medico,
		p.edad_paciente,
		e.fecha_estudio,
		e.observaciones_endometrio,
		am.metrorragia,
		am.hormonoterapia,
		am.duracion_hormonoterapia,
		ifnull(lpad(ct.id_atencion,4,'0000'),'-') as id_atencion,
			ct.clasificacion_medico
		FROM
		paciente AS p
		INNER JOIN ctrl_paciente_estudios AS ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_estudio = $id_estudio AND ct.id_tipo_estudio = 4
		INNER JOIN usu_me AS u ON u.id_usuario = ct.id_usuario
		INNER JOIN estudio_biopsia_endometrio AS e ON ct.id_estudio = e.id_estudio
		INNER JOIN atencion_medica AS am ON am.id_atencion_medica = ct.id_atencion";

		$res = $mysqliL->query($informacion);
		$info = $res->fetch_assoc();
		$fecha = $info['fecha_estudio'];
		$edad = $info['edad_paciente'];
		$paciente = $info['paciente'];
		$medico = $info['medico'];
		$idAtencion = $info['id_atencion'];
		$antecedente_metrorragia = $info['metrorragia'];
		$antecedente_hormonoterapia = $info['hormonoterapia'];
		$duracion_tratamiento = $info['duracion_hormonoterapia'];
		$observaciones_endometrio = $info['observaciones_endometrio'];

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
						<p><b>Antecedentes de Metrorragia:</b> <?php echo ucwords($antecedente_metrorragia == 0 ? "No" : "Si"); ?></p>
						<p><b>Antecedentes de Hormonoterapia:</b> <?php echo ucwords($antecedente_hormonoterapia == 0 ? "No" : "Si"); ?></p>
						<p><b>Duracion Hormonoterapia:</b><?php echo ucwords($duracion_tratamiento); ?></p>
						<p><b>Observaciones: </b> <?php echo ($observaciones_endometrio); ?></p>
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