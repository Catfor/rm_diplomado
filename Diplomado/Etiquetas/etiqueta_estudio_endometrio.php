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
			INNER JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_estudio = $id_estudio AND ct.id_tipo_estudio = 4
			INNER JOIN usu_me u ON u.id_usuario = ct.id_usuario
			INNER JOIN estudio_biopsia_endometrio e ON ct.id_estudio = e.id_estudio";
			
		$res =$mysqliL->query($informacion);
		$info = $res->fetch_assoc();
		$fecha = $info['fecha_estudio'];
		$edad = $info['edad_paciente'];
		$paciente = $info['paciente'];
		$medico = $info['medico'];
		$antecedente_metrorragia = $info['antecedente_metrorragia'];
		$antecedente_hormonoterapia = $info['antecedente_hormonoterapia'];
		$duracion_tratamiento = $info['duracion_tratamiento'];
		$periodo_menstrual = $info['periodo_menstrual'];
		$fecha_ultima_menstruacion = $info['fecha_ultima_menstruacion'];
		$metodo_anticonceptivo = $info['metodo_anticonceptivo'];

		if (!endsWith(trim($colposcopico), ".")) {
			$colposcopico = $colposcopico . '.';
		}

		if (!endsWith(trim($observaciones), ".")) {
			$observaciones = $observaciones . '.';
		}

		ob_end_flush();
	}else{
		$fecha ="";
		$edad ="";
		$paciente ="";
		$medico ="";
		$colposcopico ="";
		$observaciones ="";
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
						<p><b>Antecedentes de Metrorragia:</b> <?php echo ucwords($antecedente_metrorragia); ?></p>
						<p><b>Antecedentes de Hormonoterapia:</b> <?php echo ucwords($antecedente_hormonoterapia); ?></p>
						<p><b>Duracion del Tratamiento:</b><?php echo ucwords($duracion_tratamiento); ?></p>
						<p><b>Periodos menstruales:</b> <?php echo ucwords($periodo_menstrual); ?></p>
						<p><b>F.U.M.:</b> <?php echo ucwords($fecha_ultima_menstruacion); ?></p>
						<p><b>M&eacute;todo anticonceptivo:</b> <?php echo ucwords($metodo_anticonceptivo); ?></p>
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