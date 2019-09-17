<?php
//Archivo de conexión a la base de datos
require('../coni/Localhost.php');

//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";


//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001
	//donde el nombre sea igual a $consultaBusqueda,
	//o el apellido sea igual a $consultaBusqueda,
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$consulta = mysqli_query($mysqliL, "SELECT * FROM paciente
	WHERE nombre_paciente  LIKE '%$consultaBusqueda%'
	OR apellidos_paciente  LIKE '%$consultaBusqueda%'
	OR CONCAT(nombre_paciente,' ',apellidos_paciente) LIKE '%$consultaBusqueda%'
	");

	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<center><p><a href='alta_paciente.php?busqueda=$consultaBusqueda'>agregar</a></p></center>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo '<center>Resultados para <strong>'.$consultaBusqueda.'</strong></center>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysqli_fetch_array($consulta)) {
			$nombre = $resultados['nombre_paciente'];
			$apellido = $resultados['apellidos_paciente'];


			//Output
			$mensaje .= '
		<center>	<p>
			<strong>Nombre:</strong> ' . $nombre . '<br>
			<strong>Apellido:</strong> ' . $apellido . '<br>

			</p></center>';

		};//Fin while $resultados

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>
