<!DOCTYPE html>
<html>

<head>
	<title>Etiqueta Estudio Vulva</title>
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
			e.anotaciones_vulvoscopia,
			e.x,
			e.y
			FROM
			paciente p
			INNER JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente AND p.id_paciente = $id_paciente AND ct.id_estudio = $id_estudio AND ct.id_tipo_estudio = 6
			INNER JOIN usu_me u ON u.id_usuario = ct.id_usuario
			INNER JOIN estudio_vulvoscopia e ON ct.id_estudio = e.id_estudio";
			
		$res =$mysqliL->query($informacion);
		$info = $res->fetch_assoc();
		$fecha = $info['fecha_estudio'];
		$edad = $info['edad_paciente'];
		$paciente = $info['paciente'];
		$medico = $info['medico'];
		$anotaciones_vulvoscopia = $info['anotaciones_vulvoscopia'];
		$x = $info['x'];
		$y = $info['y'];

		if (!endsWith(trim($anotaciones_vulvoscopia), ".")) {
			$anotaciones_vulvoscopia = $anotaciones_vulvoscopia . '.';
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


		window.onload = function(){

			var canvasVulva = document.getElementById("canvasVulva");
			var ctxVulva = canvasVulva.getContext("2d");
			var vulva = document.getElementById("recuadroVulva");
			var x = <?php echo $x ?>;
			var y = <?php echo $y ?>;
			ctxVulva.drawImage(vulva, 0, 0,200,200);
			ctxVulva.lineWidth = 5;
			ctxVulva.strokeStyle = "#FFF";
			ctxVulva.beginPath();
			ctxVulva.moveTo(x-10,y-10);
			ctxVulva.lineTo(x+10,y+10);
			ctxVulva.moveTo(x-10,y+10);
			ctxVulva.lineTo(x+10,y-10);
			ctxVulva.stroke();
			ctxVulva.lineWidth = 2;
			ctxVulva.strokeStyle = "#000";
			ctxVulva.beginPath();
			ctxVulva.moveTo(x-10,y-10);
			ctxVulva.lineTo(x+10,y+10);
			ctxVulva.moveTo(x-10,y+10);
			ctxVulva.lineTo(x+10,y-10);
			ctxVulva.stroke();

			vulva.style.display = "block";
			canvasVulva.style.display = "none";
			vulva.setAttribute("src",canvasVulva.toDataURL());
			
			setTimeout(imprimeEtiqueta(), 1000);


		}


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

			return true;
		}
	</script>

</head>

<body>
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
							<b>Hallazgos Vulvoscopia:</b></p>
						<p>
							<b>Acetico:</b> NEGATIVO</p>
						<p>
							<p>
								<b>Se&ntilde;ala Donde Fue Tomada la muestra:</b>
							</p>

							<div class="row">
								<div class="column">
									<center>
										<img  id="recuadroVulva" src="../../img/vulva.JPG" width="200" height="200"  ismap  style="display:none">
										<canvas id="canvasVulva" width="200" height="200">
									</center>
								</div>
								<div class="column">
									<p>
										<b>Anotaciones:</b>
									</p>
									<p class="txt-justificado"><?php echo ucwords($medico); ?></p>
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