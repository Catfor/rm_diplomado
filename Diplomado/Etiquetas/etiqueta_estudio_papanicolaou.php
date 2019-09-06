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
        session_start();
        include('coni/Localhost.php');
        date_default_timezone_set('America/Mexico_City');
		$informacion = mysqli_query($mysqliL, "SELECT apellidos_usuario,rol,id_usuario,nick,nombre_usuario,activo,correo_general, contra
	    FROM usu_me WHERE correo_general = '$email' and contra='$password' and activo=1");
        $info = mysqli_fetch_assoc($informacion);
        
		$fecha = $info['activo'];
		$edad = $info['activo'];
		$paciente = $info['activo'];
		$medico = $info['activo'];
		$colposcopico = $info['activo'];
		$observaciones = $info['activo'];
	
		ob_end_flush();
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
						<p>
							<center>
								<b>Solicitud de Estudio de Papanicolaou</b>
							</center>
						</p>

						<div class="row">
							<div class="column">
								<p>
									<b>Fecha:</b> 03/08/2019</p>
								<p>
							</div>
							<div class="column">
								<p>
									<b>Edad:</b> 23</p>
								<p>
							</div>
						</div>
						<p><b>Paciente:</b> Itzel Paduano Gonzalez</p>
						<p><b>Medico:</b> Susana Nieves Flores</p>
						<p><b>Estudio Solicitado:</b> Citolog&iacute;a Exfoliativa</p>
						<p class="txt-justificado"><b>Hallazgos Colposc&oacute;picos:</b>Lorem ipsum dolor sit amet,
							consectetur adipiscing elit. Praesent in diam interdum, accumsan ante quis, ultrices nibh.
							Mauris at mattis leo. Nulla in dolor laoreet, ullamcorper ipsum in, porttitor el</p>
						<p><b>Observaciones:</b></p>
						<p class="txt-justificado">Quisque id elit sed tortor commodo fringilla ac eget libero. Duis
							pretium
							lobortis vehicula. Duis non augue nec lacus tempor consequat vel et quam. Vivamus eget
							viverra
							augue, nec vestibulum metus. Nullam tincidunt eros at massa ullamcorper, semper finibus
							felis
							euismod. Morbi ultrices, arcu in gravida cursus, risus est porta erat, in faucibus ex ex
							pulvinar nisl. Pellentesque sed dui ac enim aliquet suscipit vel et justo.</p>
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