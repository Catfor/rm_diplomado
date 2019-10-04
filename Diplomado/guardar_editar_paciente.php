
<?php
include('../coni/Localhost.php');
date_default_timezone_set('America/Mexico_City');
$hoys = date("Y-m-d H:i:s");
$id_paciente = $_GET['id_paciente'];

$nombre_paciente = $_GET['nombre_paciente'];
$apellidos_paciente = $_GET['apellidos_paciente'];
$estado_civil = $_GET['estado_civil'];
$direccion_paciente = $_GET['direccion_paciente'];
$municipio_paciente = $_GET['municipio_paciente'];
$codigo_postal = $_GET['codigo_postal'];
$tipo_seguro = $_GET['tipo_seguro'];
$otro_tipo_seguro = $_GET['otro_tipo_seguro'];
  $idUsuario = $_SESSION['id_usuario'];
$ingresomensual = $_GET['ingresomensual'];
$escolaridad_paciente = $_GET['escolaridad_paciente'];
$apoyo_gubernamental_paciente = $_GET['apoyo_gubernamental_paciente'];
$razon_apoyo_paciente = $_GET['razon_apoyo_paciente'];
$nombre_familiar_paciente = $_GET['nombre_familiar_paciente'];
$telefono_familiar_paciente = $_GET['telefono_familiar_paciente'];
$celular_familiar_paciente = $_GET['celular_familiar_paciente'];
$nombre_contacto_paciente = $_GET['nombre_contacto_paciente'];
$telefono_contacto_paciente = $_GET['telefono_contacto_paciente'];
$celular_contacto_paciente = $_GET['celular_contacto_paciente'];
$newDate = date('Y-m-d', strtotime($_GET['edad_paciente']));
 $tipo_seguros = $_GET['tipo_seguros'];

  $cumpleanos = new DateTime("$newDate");
  $hoy = new DateTime();
  $annos = $hoy->diff($cumpleanos);
  $edad = $annos->y;




  $Modifi = "UPDATE paciente
  SET nombre_paciente='$nombre_paciente',apellidos_paciente='$apellidos_paciente',fecha_nacimiento_paciente='$newDate',
  edad_paciente='$edad',estado_civil='$estado_civil',direccion_paciente='$direccion_paciente',
  municipio_paciente='$municipio_paciente',codigo_postal='$codigo_postal',ingreso_mensual='$ingresomensual',
  escolaridad_paciente='$escolaridad_paciente',apoyo_gubernamental_paciente='$apoyo_gubernamental_paciente',
  razon_apoyo_paciente='$razon_apoyo_paciente',nombre_familiar_paciente='$nombre_familiar_paciente',telefono_familiar_paciente='$telefono_familiar_paciente',
  celular_familiar_paciente='$celular_familiar_paciente',nombre_contacto_paciente='$nombre_contacto_paciente',telefono_contacto_paciente='$telefono_contacto_paciente',
  celular_contacto_paciente='$celular_contacto_paciente',otro_tipo_seguro='$otro_tipo_seguro'
  WHERE id_paciente='$id_paciente'";

  $Mo= $mysqliL->query($Modifi);


  $Modifi1 = "DELETE FROM tipo_seguro
  WHERE id_paciente='$id_paciente'";

  $Mo1= $mysqliL->query($Modifi1);


  for ($y = 0; $y < count($tipo_seguro); $y++) {
    $tipos = $tipo_seguro[$y];


    $sql112= "INSERT INTO tipo_seguro
    (id_seguro,id_paciente)
    VALUES
    ('$tipos','$id_paciente')";
   $resultaq1 = $mysqliL->query($sql112);
  }



    $sql11 = "INSERT INTO bitacora_ingreso
    (fecha_ingreso,accion,id_u)
    VALUES
    ('$hoys','Se edito  el paciente $nombre_paciente $apellidos_paciente , con el ID $id_paciente','$idUsuario')";
    $resultaq = $mysqliL->query($sql11);


  header("Location:consulta_paciente1.php");

 ?>
