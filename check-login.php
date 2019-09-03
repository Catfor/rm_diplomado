<?php
ob_start();
session_start();
	include ('coni/Localhost.php');
	date_default_timezone_set('America/Mexico_City');
	 $hoy = date("Y-m-d H:i:s");
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	if (!empty($password) && !empty($email))
	{

		$result123 = mysqli_query($mysqliL, "SELECT apellidos_usuario,rol,id_usuario,nick,nombre_usuario,activo,correo_general, contra
	    FROM usu_me WHERE correo_general = '$email' and contra='$password' and activo=1");


			$rowwe = mysqli_fetch_assoc($result123);
			 $activo = $rowwe['activo'];
 $correo_general = $rowwe['correo_general'];
  $contra = $rowwe['contra'];
  $id_usuario = $rowwe['id_usuario'];
  $nombre_usuario = $rowwe['nombre_usuario'];
$rol = $rowwe['rol'];
	    $total=$result123->num_rows;

	    if($total==0){

	  //    header('Location: index.php?error=1');
	    }
			else{

echo "ando qui";
				$sql11 = "INSERT INTO bitacora_ingreso
				  (id_u,fecha_ingreso)
				  VALUES
				  ('$id_usuario','$hoy')";
				       $resultaq = $mysqliL->query($sql11);
				       $id_bitacora=$mysqliL->insert_id;

				              $resultaq123 = $mysqliL->query($sql11);


											if ($contra!='' & $activo=='1' & $correo_general!='') {

												$_SESSION['loggedin'] = true;
												$_SESSION['nick'] = $rowwe['nick'];
										 $_SESSION['id_usuario'] = $rowwe['id_usuario'];
$_SESSION['correo_general'] = $rowwe['correo_general'];
 $_SESSION['nombre_usuario'] = $rowwe['nombre_usuario'];
$_SESSION['nick'] = $rowwe['nick'];
$_SESSION['rol'] = $rowwe['rol'];
$_SESSION['apellidos_usuario'] = $rowwe['apellidos_usuario'];
								 header('Location: Diplomado/Sistema.php');
										 }
			}
	}
	else{
		header('Location: index.php?error=3');
	}



ob_end_flush();

?>
