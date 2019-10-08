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
			e.antecedente_cancer_cervicouterino,
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

		$res = $mysqliL->query($informacion);
		$info = $res->fetch_assoc();
		$fecha = $info['fecha_estudio'];
		$edad = $info['edad_paciente'];
		$paciente = $info['paciente'];
		$medico = $info['medico'];
		$idAtencion = $info['id_atencion'];
		$antecendente_cancer_cervicouterino = $info['antecedente_cancer_cervicouterino'];
		$hallazgos_colposcopicos = $info['hallazgos_colposcopicos'];
		$senalizacion = $info['senalizacion'];
		$coordenadasHelper = implode('","', explode('|', $info['coordenadas']));
		$posible_recomendacion_diagnostica = ucwords(str_replace("_", " ", $info['posible_recomendacion_diagnostica']));
		$clasificacion_medico_paps =  $info['clasificacion_medico'] == 0 ? "Normal" : "Urgente";
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

			$(canvasDona).delay(200).queue(function() {
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
